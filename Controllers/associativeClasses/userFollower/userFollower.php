<?php
class UserFollower{
    private $userId;
    private $followerId;
    public function __construct($userId, $followerId) {
        $this->$followerId = $followerId;
        $this->$userId = $userId;
    }
    
}
