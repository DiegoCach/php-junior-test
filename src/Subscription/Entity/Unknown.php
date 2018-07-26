<?php

namespace Subscription\Entity;

class Unknown
{
    protected $id;
    protected $token;
    protected $email;
    protected $followedAuthors = array();

    /**
     * Get id.
     *
     * @return id.
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set id.
     *
     * @param id the value to set.
     *
     * @return $this.
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    /**
     * Get token.
     *
     * @return token.
     */
    public function getToken()
    {
        return $this->token;
    }
    
    /**
     * Set token.
     *
     * @param token the value to set.
     *
     * @return $this.
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
    
    /**
     * Get email.
     *
     * @return email.
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set email.
     *
     * @param email the value to set.
     *
     * @return $this.
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
    /**
     * Get followedAuthors.
     *
     * @return followedAuthors.
     */
    public function getFollowedAuthors()
    {
        return $this->followedAuthors;
    }
    
    /**
     * Set followedAuthors.
     *
     * @param followedAuthors the value to set.
     *
     * @return $this.
     */
    public function setFollowedAuthors($followedAuthors)
    {
        $this->followedAuthors = $followedAuthors;

        return $this;
    }
}
