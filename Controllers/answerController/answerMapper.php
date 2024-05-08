<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperInterface.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\database\dbConnection.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperHelper.php';
class answerMapper implements Mapper{
    public static $tableName = 'answers';
    public static $connection;
    public static $columns = ['username',
                              'body',
                              'questionId',
                              'numOfReports',
                              'publishedDate', 
                              'numUpVotes',
                              'numDownVotes'
                              ];
    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
    public static function add($object){ # When you add a user add its builder
         $columns='';
        $values='';
        $conn = answerMapper::getDBConnection();
        $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object);
       
        foreach ($arrayOfAttributes as $key => $value) {
            $columns .= "$key, ";
            $values .= "'$value', ";        
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $query = "INSERT INTO ".self::$tableName." ($columns) VALUES ($values)";
        return $conn->query($query);
    }
    public static function edit($uniqueIdentifier, $arrOfKeyValue, $UniqueIdentifierName){
        $conn = self::getDbConnection();
        $set = "";
        foreach ($arrOfKeyValue as $column => $value) {
            $set .= "$column = '$value', ";
        }
        $set = rtrim($set, ", ");
        $query = "UPDATE ".self::$tableName." SET $set WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;
        if ($query)
            echo "<br> data changed sucessfully! <br>";
        else {
            echo "<br> can't update it in db <br>";
        }
        return $conn->query($query);
    }
    public static function delete($uniqueIdentifier, $UniqueIdentifierName){
        $connection = self::getDbConnection();
        $sql = "DELETE FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;
    
        if ($connection->query($sql) === TRUE) {
            // Decrease numOfSubcategories in Category table
            $userid = $uniqueIdentifier;
            $questioncount= QuestionMapper::selectSpecificAttr($userid, 'id', 'numQuestions');
            if ($questioncount !== false) {
                $questioncount = $questioncount-1;
                CategoryMapper::edit($userid, ['numQuestions' => $questioncount], 'id');
            }
    
            return true;
        } else {
            echo "Error deleting record: " . $connection->error;
            return false;
        }
    }
    public static function selectObjectAsArray($UniqueIdentifier, $UniqueIdentifierName){
        $conn = self::getDbConnection();
        $sqlAtatement = "SELECT * FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = '".$UniqueIdentifier." '";
        $result = $conn->query($sqlAtatement);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    public static function selectSpecificAttr($uniqueIdentifier, $UniqueIdentifierName, $attrname){
        $objectArr = self::selectObjectAsArray($uniqueIdentifier, $UniqueIdentifierName);
        if ($objectArr !== false) {
            return $objectArr[0][$attrname];
        }
        else {
            echo "couldn't find the data";
        }
    }
    public static function searchAttribute($attributeValue) {
        $conn = self::getDbConnection();
        $query = "SELECT * FROM " . self::$tableName;
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            foreach ($users as $user) {
                foreach ($user as $key => $value) {
                    if ($value == $attributeValue) {
                        return true;
                    }
                }
            }
            return false;
        }
    else{
        return false;
    }
}



public static function selectAllanswers(){
    $conn = self::getDbConnection();
    $sqlAtatement = "SELECT * FROM ".self::$tableName;
    $result = $conn->query($sqlAtatement);
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else {
        return false;
    }
}

public static function incrementDataDB($uniqueIdentifier ,$UniqueIdentifierName, $columnName )
{
    $value = intval(self::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
    if (is_int($value)) {
        self::edit($uniqueIdentifier, array($columnName => ++$value),$UniqueIdentifierName);
    }
    else {
        echo 'Error in updating data';
    }
}


public static function decreaseDataDB($uniqueIdentifier ,$UniqueIdentifierName, $columnName )
{
    $value = intval(self::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
    if (is_int($value)) {
        self::edit($uniqueIdentifier, array($columnName => --$value),$UniqueIdentifierName);
    }
    else {
        echo 'Error in updating data';
    }
}
public static function selectAnswersByQuestionId($questionId) {
    $conn = self::getDbConnection();
    $query = "SELECT * FROM " . self::$tableName . " WHERE questionId = '$questionId'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $answers = array();
        while ($row = $result->fetch_assoc()) {
            $answers[] = $row;
        }
        return $answers;
    } else {
        return false;
    }
}}