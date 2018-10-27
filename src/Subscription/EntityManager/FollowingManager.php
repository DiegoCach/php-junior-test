<?php

namespace Subscription\EntityManager;

use Subscription\Entity\Unknown;
use Subscription\EntityManager\TokenGenerator;

include("ConnectDB.php");

class FollowingManager
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
	*		AddSuscription
	*
	*		@param token				String
	*		@param authorName 	String
	*/
	function addSubscription($token, $authorName)
	{
		//We get the token and the author's id by name
		$resultToken = $this->getUserByToken($token);
		$resultauthor = $this->getAuthorByName($name);
		//Do the query to add the subscription to the author
		$INSERT_SQL = "INSERT INTO wp_followings (follower_id, author_id, enabled)
		 VALUES ('{$this->unknown->getId()}', '{$resultauthor->id}', '1')";
		$result = mysqli_query($BD_Connection, $INSERT_SQL);

		//see if there is a Unknown user with that token in the DB
		if ($resultado->num_rows <= 0)
		{
			echo("Errorcode: " . mysqli_error($BD_Connection));
		}else{
		//store data extracted from the DB
			echo "Usuario Subscrito al autor";
		}
	}

	/**
	*		DeleteSuscription
	*
	*		@param idUser				int
	*		@param authorEmail		String
	*/
	function disableSubscription($idUser, $authorEmail)
	{

		$resultauthor = $this->getAuthorWithEmail($authoremail);

		//Do the query to remove the subscription to the author
		$UPDATE_SQL = "UPDATE wp_followings SET enabled = '0' WHERE follower_id = $idUser AND author_id = $resultauthor->id";
		$result = mysqli_query($BD_Connection, $UPDATE_SQL);
		
		if ($result){
			echo "Suscripción desactivada con éxito";
		} else {
			echo "Error al desactivar la suscripción en disableSubscription";
		}
	}

	/**
	*		GetUserByToken
	*
	*		@param token	String	
	*/
	function getUserByToken($token)
	{	
		try{
		//store the query in a variable
			$READ_SQL = "SELECT * FROM wp_unknown_followers WHERE token = '{$token}'";

		//Connect to de DB
			$result = mysqli_query($BD_Connection, $READ_SQL);

		//see if there is a Unknown user with that token in the DB
			if ($resultado->num_rows <= 0)
			{
				echo("Errorcode: " . mysqli_error($BD_Connection));
			}else{
			//store data extracted from the DB
				while ($row = $result->fetch_assoc())
				{
					$this->unknown->setId($result['id']);
					$this->unknown->setEmail($result['email']);
					$this->unknown->setToken($token);
					$this->getFollowedAuthors($result['id']);
				}
			}
		}catch(Exception $e){
			return ("ERROR: ".$e);
		}
	}

	/**
	*		GetAuthorByName
	*
	*		@param name		String
	*		@return id						int
	*/ 
	function getAuthorByName($name)
	{	
		try{
			$READ_SQL = "SELECT * FROM wp_authors WHERE name = '{$name}'";
			$result = mysqli_query($BD_Connection, $READ_SQL);
		}catch(Exception $e){
			return ("ERROR: ".$e);
		}

		return $result['id'];
	}
	/**
	*		GetAuthorByEmail
	*
	*		@param authorEmail		String
	*		@return id						int
	*/ 
	function getAuthorByEmail($authorEmail)
	{
		try{
			$READ_SQL = "SELECT * FROM wp_authors WHERE email = '{$authorEmail}'";
			$result = mysqli_query($BD_Connection, $READ_SQL);
		}catch(Exception $e){
			return ("ERROR: ".$e);
		}
		return $result['id'];
	}

	/**
	*		GetFollowedAuthors
	*
	*		@param idUser		int
	*		@return array 		Following
	*/
	function getFollowedAuthors($id)
	{
		$authorList = array();
		try{
			$READ_SQL = "SELECT author_id FROM wp_followings WHERE follower_id = '{$id}' AND enabled = 1 ";
			$result = mysqli_query($BD_Connection, $READ_SQL);

			if ($resultado->num_rows <= 0)
			{
				echo("Errorcode: " . mysqli_error($BD_Connection));
			}else{
			//store data extracted from the DB
				while ($row = $result->fetch_assoc())
				{
					$following = new Following;
					$following->setFollowerId($row['follower_id']);
					$following->setAuthorId($row['author_id']);
					$following->setEnabled($row['enabled']);
					$authorList[] = $following;
				}
			}	
		}catch(Exception $e){
			return ("ERROR: ".$e);
		}
		
		return $authorList;
	}
}
