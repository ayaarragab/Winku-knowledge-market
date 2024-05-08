<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperHelper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperInterface.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\database\dbConnection.php';

require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';

class CategoryMapper implements Mapper{
    public static $tableName = 'category';
    public static $connection;
    public static $columns = ['name',
                              'numberOfQuestions',
                              'numberOfreports',
                              'numOfSubcategories', 
                              'description'];
    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
    public static function add($object){
        $columns = "";
        $values ="";
        $conn = CategoryMapper::getDBConnection();
        $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object);
        print_r($arrayOfAttributes);
        foreach ($arrayOfAttributes as $key => $value) {
            $columns .= "$key, ";
            $values .= "'$value', ";        
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $query = "INSERT INTO ".self::$tableName." ($columns) VALUES ($values)";
        echo '<br>'.$query.'<br>';
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
    
        // delete sub first
        $subcategories = SubCategoryMapper::selectObjectAsArray($uniqueIdentifier, 'Category_id');
        if ($subcategories !== false) {
            foreach ($subcategories as $subcategory) {
                $subcategoryId = $subcategory['id'];
                SubCategoryMapper::delete($subcategoryId, 'id');
            }
        }
        $sql = "DELETE FROM " . self::$tableName . " WHERE " . $UniqueIdentifierName . " = " . $uniqueIdentifier;
    
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error deleting record: " . $connection->error;
            return false;
        }
    }
    
    public static function selectObjectAsArray($UniqueIdentifier, $UniqueIdentifierName){
        $conn = self::getDbConnection();
        // Properly escape the values and remove the extra space in the WHERE clause
        $sqlStatement = "SELECT * FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = '".$conn->real_escape_string($UniqueIdentifier)."'";
        $result = $conn->query($sqlStatement);
        if ($result) {
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return false;
            }
        } else {
            // Handle query error
            echo "Error: " . $conn->error;
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



}