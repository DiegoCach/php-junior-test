<?php

namespace Subscription\Entity;

class Following
{
    private $followerId;
    private $authorId;
    private $enabled;

    /**
     * Get followerId.
     *
     * @return followerId.
     */
    public function getFollowerId()
    {
        return $this->followerId;
    }
    
    /**
     * Set followerId.
     *
     * @param followerId the value to set.
     *
     * @return $this.
     */
    public function setFollowerId($followerId)
    {
        $this->followerId = $followerId;

        return $this;
    }
    
    /**
     * Get authorId.
     *
     * @return authorId.
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }
    
    /**
     * Set authorId.
     *
     * @param authorId the value to set.
     *
     * @return $this.
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;

        return $this;
    }
    
    /**
     * Get enabled.
     *
     * @return enabled.
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
    
    /**
     * Set enabled.
     *
     * @param enabled the value to set.
     *
     * @return $this.
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }
}
