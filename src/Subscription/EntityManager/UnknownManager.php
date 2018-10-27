<?php

namespace Subscription\EntityManager;

use Subscription\Entity\Unknown;
use Subscription\EntityManager\TokenGenerator;

include("ConnectDB.php");

class UnknownManager
{	
	protected $unknown;
	/**
  * 	Constructor
  *
  */
	function __construct(){
		$this->unknown = new Unknown;
	}

	/**
	*  	Create Unknown User
	*
	*		@param email	String
	*/
	function createUnknownUser ($email)
	{
		//We look if the email has a valid format
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{	
			//Creates a token and sets the email to the unknow user
			$this->unknown->setToken(TokenGenerator::GetNewToken());
			$this->unknown->setEmail($email);
			
			//We insert the data into the DB
			$INSERT_SQL = "INSERT INTO wp_unknown_followers (token, email)
			VALUES ($this->unknown->getToken(), $this->unknown->getEmail())";

			$result = mysqli_query($BD_Connection, $INSERT_SQL);

			//Look if the data inserted succesfully
			if($result)
			{
				echo "Usuario Unknown creado";
			}else{
				echo "Error al crear Usuario Unknown";
			}	
		} else {
			echo "Formato de Email incorrecto";
		}
	}
}
