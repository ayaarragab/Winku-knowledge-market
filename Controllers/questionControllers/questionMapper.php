<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperInterface.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\database\dbConnection.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperHelper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';

class QuestionMapper implements Mapper{
    public static $tableName = 'questions';
    public static $connection;
    public static $columns = ['username',
                              'publishedDate',
                              'body',
                              'tags', 
                              'subcategoryId', 
                              'numberOfReports',
                              'title',
                              'numAnswers',
                            'numUpVotes',
                            'numDownVotes'];
    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
    // public static function add($object){ # When you add a user add its builder
    //     $conn = QuestionMapper::getDBConnection();
    //     $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object->builder);
    //     $columns='';
    //     $values='';
    //     foreach ($arrayOfAttributes as $key => $value) {
    //         $columns .= "$key, ";
    //         $value = 
    //         $values .= "'$value', ";        
    //     }
    //     $columns = rtrim($columns, ', ');
    //     $values = rtrim($values, ', ');
    //     $query = "INSERT INTO ".self::$tableName." ($columns) VALUES ($values)";
    //     echo '<br>'.$query.'<br>';
    //     return $conn->query($query);
    // }
    public static function add($object){ # When you add a user add its builder
        $conn = QuestionMapper::getDBConnection();
        $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object->builder);
        $columns='';
        $values='';
        $params = []; // Array to hold parameter values
        foreach ($arrayOfAttributes as $key => $value) {
            $columns .= "$key, ";
            $values .= "?, ";
            $params[] = $value; // Add value to the parameters array
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $query = "INSERT INTO ".self::$tableName." ($columns) VALUES ($values)";
        // Prepare the statement
        $stmt = $conn->prepare($query);
        if ($stmt) {
            // Bind parameters
            $types = str_repeat('s', count($params)); // Assuming all values are strings
            $stmt->bind_param($types, ...$params);
            // Execute the statement
            $result = $stmt->execute();
            // Close the statement
            $stmt->close();
            return $result;
        } else {
            // Handle error if prepare fails
            return false;
        }
    }
    
    public static function edit($uniqueIdentifier, $arrOfKeyValue, $UniqueIdentifierName){
        $conn = self::getDbConnection();
        $set = "";
        foreach ($arrOfKeyValue as $column => $value) {
            $set .= "$column = '$value', ";
        }
        $set = rtrim($set, ", ");
        $query = "UPDATE ".self::$tableName." SET $set WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;
        // if ($query)
        //     echo "<br> data changed sucessfully! <br>";
        // else {
        //     echo "<br> can't update it in db <br>";
        // }
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
        $sqlAtatement = "SELECT * FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = '".$UniqueIdentifier."'";
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

public static function selectAllQuestions(){
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
public static function selectQuestionsBySubcategory($subcategoryId) {
    $conn = self::getDbConnection();
    $query = "SELECT * FROM " . self::$tableName . " WHERE subcategoryId = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param('i', $subcategoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $questions = array();
            while ($row = $result->fetch_assoc()) {
                $questions[] = $row;
            }
            return $questions;
        } else {
            return false;
        }
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
}


public static function decreaseDataDB($uniqueIdentifier ,$UniqueIdentifierName, $columnName )
{
    $value = intval(self::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
    if (is_int($value) && is_int($value) != 0) {
        self::edit($uniqueIdentifier, array($columnName => --$value),$UniqueIdentifierName);
    }
}

}