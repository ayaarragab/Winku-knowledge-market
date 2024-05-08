<?php 
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
class UserReactsQuestion
{
    public static $tableName = 'userreactsquestion';

    public static function addUpVoteToDb($userId, $questionId)
    {
        $conn = DBConnection::getConnection();
        
        // Check if the user has already upvoted the question
        $sqlCheck = "SELECT * FROM " . self::$tableName . " WHERE userId = '$userId' AND questionId = '$questionId'";
        $result = $conn->query($sqlCheck);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $upVote = $row['upVote'];
            $downVote = $row['downVote'];
            if ($upVote == 0 && $downVote == 0) {
                $upVote = 1;
                $downVote = 0;

                // Update the upVote column in the database
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = '$upVote' WHERE userId = '$userId' AND questionId = '$questionId'";
                QuestionMapper::incrementDataDB($questionId, 'id', 'numUpVotes');
                $conn->query($sqlUpdate);
            }
            elseif ($upVote == 0 && $downVote == 1) {
                $upVote = 1;
                $downVote = 0;

                // Update the upVote and downVote columns in the database
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = '$upVote', downVote = '$downVote' WHERE userId = '$userId' AND questionId = '$questionId'";
                QuestionMapper::incrementDataDB($questionId, 'id', 'numUpVotes');
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numDownVotes');
                $conn->query($sqlUpdate);
            }elseif ($upVote == 1 && $downVote == 0) {
                $upVote = 0;
                $downVote = 0;

                // Update the upVote and downVote columns in the database
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = '$upVote', downVote = '$downVote' WHERE userId = '$userId' AND questionId = '$questionId'";
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numUpVotes');
                $conn->query($sqlUpdate);
            }
        } }
    public static function addDownVoteToDb($userId, $questionId)
    {
        $conn = DBConnection::getConnection();
        
        // Check if the user has already downvoted the question
        $sqlCheck = "SELECT * FROM " . self::$tableName . " WHERE userId = '$userId' AND questionId = '$questionId'";
        $result = $conn->query($sqlCheck);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $upVote = $row['upVote'];
            $downVote = $row['downVote'];
            if ($upVote == 0 && $downVote == 0) {
                $upVote = 0;
                $downVote = 1;

                // Update the downVote column in the database
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = '$upVote', downVote = '$downVote' WHERE userId = '$userId' AND questionId = '$questionId'";
                QuestionMapper::incrementDataDB($questionId, 'id', 'numDownVotes');
                $conn->query($sqlUpdate);
            }
            elseif ($upVote == 1 && $downVote == 0) {
                $upVote = 0;
                $downVote = 1;

                // Update the upVote and downVote columns in the database
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = '$upVote', downVote = '$downVote' WHERE userId = '$userId' AND questionId = '$questionId'";
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numUpVotes');
                QuestionMapper::incrementDataDB($questionId, 'id', 'numDownVotes');
                $conn->query($sqlUpdate);
            }elseif ($upVote == 0 && $downVote == 1) {
                $upVote = 0;
                $downVote = 0;

                // Update the upVote and downVote columns in the database
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = '$upVote', downVote = '$downVote' WHERE userId = '$userId' AND questionId = '$questionId'";
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numDownVotes');
                $conn->query($sqlUpdate);
            }
        } else {
            return null;
        }
    }
    public static function getUpVoteStatus($userId, $questionId)
    {
        $conn = DBConnection::getConnection();

        // Check if the user has upvoted the question
        $sqlCheck = "SELECT upVote FROM " . self::$tableName . " WHERE userId = '$userId' AND questionId = '$questionId'";
        $result = $conn->query($sqlCheck);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $upVote = $row['upVote'];
            return $upVote;
        } else {
            return 0;
        }
    }
    public static function getDownVoteStatus($userId, $questionId)
    {
        $conn = DBConnection::getConnection();

        // Check if the user has downvoted the question
        $sqlCheck = "SELECT downVote FROM " . self::$tableName . " WHERE userId = '$userId' AND questionId = '$questionId'";
        $result = $conn->query($sqlCheck);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $downVote = $row['downVote'];
            return $downVote;
        } else {
            return 0;
        }
    }
}