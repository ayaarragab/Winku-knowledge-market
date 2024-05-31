<?php 
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
class UserReactsQuestion
{
    public static $tableName = 'userreactsquestion';

    public static function addUpVoteToDb($username, $questionId)
    {
        // Establish a secure database connection
        $conn = DBConnection::getConnection();
    
        // Prepare a parameterized SQL statement to prevent SQL injection
        $sqlCheck = "SELECT * FROM " . self::$tableName . " WHERE username = ? AND questionId = ?";
        $stmt = $conn->prepare($sqlCheck);
        $stmt->bind_param("si", $username, $questionId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // If the user has already voted
            $row = $result->fetch_assoc();
            $upVote = $row['upVote'];
            $downVote = $row['downVote'];
    
            if ($upVote == 0 && $downVote == 0) {
                // If neither upvoted nor downvoted, update upVote
                $upVote = 1;
                $downVote = 0;
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = ?, downVote = ? WHERE username = ? AND questionId = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("iiss", $upVote, $downVote, $username, $questionId);
                $stmt->execute();
    
                // Update the number of upvotes in the question mapper
                QuestionMapper::incrementDataDB($questionId, 'id', 'numUpVotes');
            } elseif ($upVote == 0 && $downVote == 1) {
                // If already downvoted, switch to upvote
                $upVote = 1;
                $downVote = 0;
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = ?, downVote = ? WHERE username = ? AND questionId = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("iiss", $upVote, $downVote, $username, $questionId);
                $stmt->execute();
    
                // Update the number of upvotes and downvotes in the question mapper
                QuestionMapper::incrementDataDB($questionId, 'id', 'numUpVotes');
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numDownVotes');
            } elseif ($upVote == 1 && $downVote == 0) {
                // If already upvoted, remove the upvote
                $upVote = 0;
                $downVote = 0;
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = ?, downVote = ? WHERE username = ? AND questionId = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("iiss", $upVote, $downVote, $username, $questionId);
                $stmt->execute();
    
                // Update the number of upvotes in the question mapper
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numUpVotes');
            }
        } else {
            // If the user hasn't voted yet, insert a new row into the table
            $upVote = 1;
            $downVote = 0;
            $sqlInsert = "INSERT INTO " . self::$tableName . " (username, questionId, upVote, downVote) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param("siii", $username, $questionId, $upVote, $downVote);
            $stmt->execute();
    
            // Update the number of upvotes in the question mapper
            QuestionMapper::incrementDataDB($questionId, 'id', 'numUpVotes');
        }
    }
    
    public static function addDownVoteToDb($username, $questionId)
    {
        // Establish a secure database connection
        $conn = DBConnection::getConnection();
    
        // Check if the user has already downvoted the question
        $sqlCheck = "SELECT * FROM " . self::$tableName . " WHERE username = ? AND questionId = ?";
        $stmt = $conn->prepare($sqlCheck);
        $stmt->bind_param("si", $username, $questionId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $upVote = $row['upVote'];
            $downVote = $row['downVote'];
    
            if ($upVote == 0 && $downVote == 0) {
                // If neither upvoted nor downvoted, update downVote
                $upVote = 0;
                $downVote = 1;
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = ?, downVote = ? WHERE username = ? AND questionId = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("iiss", $upVote, $downVote, $username, $questionId);
                $stmt->execute();
    
                // Update the number of downvotes in the question mapper
                QuestionMapper::incrementDataDB($questionId, 'id', 'numDownVotes');
            } elseif ($upVote == 1 && $downVote == 0) {
                // If already upvoted, switch to downvote
                $upVote = 0;
                $downVote = 1;
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = ?, downVote = ? WHERE username = ? AND questionId = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("iiss", $upVote, $downVote, $username, $questionId);
                $stmt->execute();
    
                // Update the number of upvotes and downvotes in the question mapper
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numUpVotes');
                QuestionMapper::incrementDataDB($questionId, 'id', 'numDownVotes');
            } elseif ($upVote == 0 && $downVote == 1) {
                // If already downvoted, remove the downvote
                $upVote = 0;
                $downVote = 0;
                $sqlUpdate = "UPDATE " . self::$tableName . " SET upVote = ?, downVote = ? WHERE username = ? AND questionId = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("iiss", $upVote, $downVote, $username, $questionId);
                $stmt->execute();
    
                // Update the number of downvotes in the question mapper
                QuestionMapper::decreaseDataDB($questionId, 'id', 'numDownVotes');
            }
        } else {
            // If the user hasn't voted yet, insert a new row into the table
            $upVote = 0;
            $downVote = 1;
            $sqlInsert = "INSERT INTO " . self::$tableName . " (username, questionId, upVote, downVote) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param("siii", $username, $questionId, $upVote, $downVote);
            $stmt->execute();
    
            // Update the number of downvotes in the question mapper
            QuestionMapper::incrementDataDB($questionId, 'id', 'numDownVotes');
        }
    }
    
    public static function getUpVoteStatus($username, $questionId)
    {
        $conn = DBConnection::getConnection();

        // Check if the user has upvoted the question
        $sqlCheck = "SELECT upVote FROM " . self::$tableName . " WHERE username = '$username' AND questionId = '$questionId'";
        $result = $conn->query($sqlCheck);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $upVote = $row['upVote'];
            return $upVote;
        } else {
            return 0;
        }
    }
    public static function getDownVoteStatus($username, $questionId)
    {
        $conn = DBConnection::getConnection();

        // Check if the user has downvoted the question
        $sqlCheck = "SELECT downVote FROM " . self::$tableName . " WHERE username = '$username' AND questionId = '$questionId'";
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