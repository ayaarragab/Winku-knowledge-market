<?php
class UserReactsAnswer
{
    public static $tableName = 'userreactsanswer';
    public $userId;
    public $questionId;
    public $answerId;
    public $upVote;

    public $downVote;

    public function __construct($userId, $questionId, $answerId, $upVote, $downVote)
    {
        $this->userId = $userId;
        $this->questionId = $questionId;
        $this->answerId = $answerId;
        $this->upVote = $upVote;
        $this->downVote = $downVote;
    }
}