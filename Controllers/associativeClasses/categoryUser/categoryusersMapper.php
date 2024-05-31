<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\categoryControllers\CategoryMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\categoryControllers\CategoryMapper.php';

class CategoryusersMapper implements Mapper{
    public static $tableName = 'categoryusers';
    public static $connection;
    public static $columns = ['categoryid',
                              'userid'];
    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
    public static function add($object){
        $columns = "";
        $values ="";
        $conn = CategoryusersMapper::getDBConnection();
        $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object);
        foreach ($arrayOfAttributes as $key => $value) {
            $columns .= "$key, ";
            $values  .= "'$value', ";        
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
    public static function delete($userId, $categoryId){
        $connection = self::getDbConnection();
    
        $sql = "DELETE FROM " . self::$tableName . " WHERE " . 'userId' . " = " . $userId .' AND '.'categoryId = '.$categoryId;
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error deleting record: " . $connection->error;
            return false;
        }
    }
    public static function selectObjectAsArray($userId, $categoryId){
        $conn = self::getDbConnection();
        $sql = "SELECT * FROM " . self::$tableName . " WHERE " . 'userId' . " = " . $userId .' AND '.'categoryId = '.$categoryId;
        $result = $conn->query($sql);
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
            return $objectArr[$attrname];
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
    public static function isFollowed($userId, $categoryId){
           if (self::selectObjectAsArray($userId, $categoryId)) {
            return true;
           }
           else{
            return false;
           }
    }
    public static function getNumFollowersPerCategory($categoryId){
        $conn = self::getDbConnection();
        $query = 'SELECT COUNT(*) AS num_rows
        FROM categoryusers
        WHERE categoryId = '.intval($categoryId);
        
        $result = $conn->query($query);
        if ($result) {
            $row = $result->fetch_assoc(); // Fetch the row
            return $row['num_rows']; // Return the count value
        } else {
            return 0; // Return 0 if query fails
        }
    }
    public static function getUserFollowedCategories($userId){
        $categories = CategoryMapper::selectall();
        $categoriesArr = array();
        if ($categories) {
            for ($i=0; $i < count($categories); $i++) { 
                if (self::isFollowed($userId, $categories[$i]['id'])) {
                    array_push($categoriesArr, $categories[$i]);
                }
            }        }
        if (!empty($categoriesArr)) {
            return $categoriesArr;
        }
        else{
            return false;
        }
    }
}