<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperHelper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperInterface.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\database\dbConnection.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\categoryControllers\CategoryMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\categoryControllers\CategoryMapper.php';

class SubCategoryMapper implements Mapper{
    public static $tableName = 'subcategory';
    public static $connection;
    public static $columns = ['categoryId',
                              'name',
                              'numberOfQuestions',
                              'numberOfreports',
                              'ownerUsername',
                              'numberOfAnswers'];

    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
   
    public static function add($object) {
        $columns = "";
        $values ="";
        $conn = SubCategoryMapper::getDBConnection();
        $arrayOfAttributes = MapperHelper::extractDataSubcategory(self::$columns, $object);
        foreach ($arrayOfAttributes as $key => $value) {
            $columns .= "$key, ";
            $values .= "'$value', ";
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $query = "INSERT INTO " . self::$tableName . " ($columns) VALUES ($values)";
        echo '<br>'.$query.'<br>';
        if ($conn->query($query) === TRUE) {
            // Return the last inserted ID
            return $conn->insert_id;
        } else {
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
        
        // Properly escape the unique identifier value
        $escapedIdentifier = $conn->real_escape_string($uniqueIdentifier);
        
        $query = "UPDATE ".self::$tableName." SET $set WHERE ".$UniqueIdentifierName." = '".$escapedIdentifier."'";
        
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    

    public static function delete($uniqueIdentifier, $UniqueIdentifierName){
        $connection = self::getDbConnection();
        $sql = "DELETE FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;
    
        if ($connection->query($sql) === TRUE) {
            // Decrease numOfSubcategories in Category table
            $categoryId = $uniqueIdentifier;
            $NumOfSubcategories = CategoryMapper::selectSpecificAttr($categoryId, 'id', 'numOfSubcategories');
            if ($NumOfSubcategories !== false) {
                $NumOfSubcategories = $NumOfSubcategories-1;
                CategoryMapper::edit($categoryId, ['numOfSubcategories' => $NumOfSubcategories], 'id');
            }
    
            return true;
        } else {
            echo "Error deleting record: " . $connection->error;
            return false;
        }
    
    }
   
    public static function selectObjectAsArray($UniqueIdentifier, $UniqueIdentifierName){
        $conn = self::getDbConnection();
        $sqlStatement = "SELECT * FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = '".$UniqueIdentifier."'";
        $result = $conn->query($sqlStatement);
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
    public static function selectall(){
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
    public static function getSubcategoriesInCategory($categoryId) {
        $conn = self::getDbConnection();
        $query = "SELECT * FROM " . self::$tableName . " WHERE categoryId = '$categoryId'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $subcategories = array();
            while ($row = $result->fetch_assoc()) {
                $subcategories[] = $row;
            }
            return $subcategories;
        } else {
            return false;
        }
    }
}