<?php
class UserFollower{
    private $userId;
    private $followerId;
    public function __construct($userId, $followerId) {
        $this->followerId = $followerId;
        $this->userId = $userId;
    }
    public function setUserId($userId)
    {
        $this->userId=$userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }
    public function setFollowerId($followerId)
    {
        $this->followerId=$followerId;
    }

    public function getFollowerId()
    {
        return $this->followerId;
    }
    
}
