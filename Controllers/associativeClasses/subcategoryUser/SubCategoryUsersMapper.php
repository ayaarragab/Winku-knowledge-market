<?php
require_once '../Controllers/Mapper/mapperHelper.php';
require_once '../Controllers/Mapper/mapperInterface.php';
require_once '../Controllers/database/dbConnection.php';

class SubCategoryUsersMapper implements Mapper{
    public static $tableName = 'Subcategoryusers';
    public static $connection;
    public static $columns = ['userId',
                              'subcategoryId'];

    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
    public static function add($object){
        $columns = "";
        $values = "";
        $conn = SubCategoryUsersMapper::getDBConnection();
        $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object);
        print_r($arrayOfAttributes);
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
    public static function delete($userid, $subcategoryId){
        $connection = self::getDbConnection();

        $sql = "DELETE FROM ".self::$tableName." WHERE subcategoryid = ".$subcategoryId." AND userid = ".$userid;

        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error deleting record: " . $connection->error;
            return false;
        }
    }

    public static function searchAttributeWithOther($attributeValue,$attributeName,$uniqueIdentifier, $UniqueIdentifierName) {
        $conn = self::getDbConnection();
        $sqlAtatement = "SELECT * FROM ".self::$tableName." WHERE ".$attributeName." = '".$attributeValue."' AND".$UniqueIdentifierName." = '".$uniqueIdentifier."'";
        $result = $conn->query($sqlAtatement);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function selectSpecificAttr($uniqueIdentifier, $UniqueIdentifierName, $attrname){
        // $objectArr = self::selectObjectAsArray($uniqueIdentifier, $UniqueIdentifierName);
        // if ($objectArr !== false) {
        //     return $objectArr[$attrname];
        // }
        // else {
        //     echo "couldn't find the data";
        // }
    }
    public static function isJoined($userId, $subcategoryId){
        if (self::selectObjectAsArray($userId, $subcategoryId)) {
         return true;
        }
        else{
         return false;
        }
    }
    public static function selectObjectAsArray($userId, $subcategoryId){
        $conn = self::getDbConnection();
        $sql = "SELECT * FROM " . self::$tableName . " WHERE " . 'userId' . " = " . $userId .' AND '.'subcategoryId = '.$subcategoryId;
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
    public static function getNumMembersPerSubcategory($categoryId){
        $conn = self::getDbConnection();
        $query = 'SELECT COUNT(*) AS num_rows
        FROM subcategoryusers
        WHERE subcategoryId = '.intval($categoryId);
        $result = $conn->query($query);
        if ($result) {

            $row = $result->fetch_assoc(); // Fetch the row
            print_r($row);
            return $row['num_rows']; // Return the count value
        } else {
            return 0; // Return 0 if query fails
        }
    }
    public static function getUserJoinedSubategories($userId){
        $categories = SubCategoryMapper::selectall();
        $categoriesArr = array();
        for ($i=0; $i < count($categories); $i++) { 
            if (self::isJoined($userId, $categories[$i]['id'])) {
                array_push($categoriesArr, $categories[$i]);
            }
        }
        return $categoriesArr;
    }
}