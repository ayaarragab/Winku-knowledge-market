<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Admin.php';

/**
 * This class is responsible for mapping user data between the database and the application.
 * It provides methods to retrieve, create, update, and delete user records.
 */

class UserMapper implements Mapper{
    public static $tableName = 'users';
    public static $connection;
    public static $columns = ['fullName',
                              'username',
                              'gender',
                              'email', 
                              'password', 
                              'numAnswers', 
                              'numFollowers', 
                              'numFollowings', 
                              'profilePhoto', 
                              'bio', 
                              'country', 
                              'professionalTitle', 
                              'numQuestions', 
                              'privilgedOrNot', 
                              'numberOfReports', 
                              'numOfBadges', 
                              'badges', 
                              'reputations', 
                              'suggestedCategory'];
    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
    // public static function add($object){ # When you add a user add its builder
    //     $columns="";
    //     $values ="";
    //     $conn = UserMapper::getDBConnection();
    //     $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object);
    //     print_r($arrayOfAttributes);
        
    //     foreach ($arrayOfAttributes as $key => $value) {
    //         $columns .= "$key, ";
    //         $values .= "'$value', ";        
    //     }
    //     $columns = rtrim($columns, ', ');
    //     $values = rtrim($values, ', ');
    //     $query = "INSERT INTO ".self::$tableName." ($columns) VALUES ($values)";
    //     echo '<br>'.$query.'<br>';
    //     return $conn->query($query);
    // }
    public static function add($object){ # When you add a user add its builder
        $conn = UserMapper::getDBConnection();
        $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object);
        
        $columns = "";
        $values = "";
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
            $types = ""; // Define types based on the data types of attributes
            foreach ($arrayOfAttributes as $value) {
                if (is_int($value)) {
                    $types .= 'i'; // Integer
                } elseif (is_float($value)) {
                    $types .= 'd'; // Double
                } else {
                    $types .= 's'; // String
                }
            }
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
        $query = "UPDATE ".self::$tableName." SET $set WHERE ".$UniqueIdentifierName." = '".$uniqueIdentifier."'";
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
        else {
            echo "couldn't find the data";
        }
    }

    public static function searchAttribute($attributeValue, $attributeName) {
        $conn = self::getDbConnection();
        $sqlStatement = "SELECT * FROM " . self::$tableName . " WHERE " . $attributeName." = '" . $attributeValue . "'";
        $result = $conn->query($sqlStatement);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function searchAttributeWithOther($attributeValue, $attributeName, $uniqueIdentifier, $UniqueIdentifierName) {
        $conn = self::getDbConnection();
        $sqlStatement = "SELECT * FROM " . self::$tableName . " WHERE " . $attributeName . " = '" . $attributeValue . "' AND " . $UniqueIdentifierName . " = '" . $uniqueIdentifier . "'";
        $result = $conn->query($sqlStatement);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    /*public static function searchAttribute($attributeValue) {
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
    }*/

    public static function selectAllUsers(){
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
    public static function selectPrivilegedUsers(){
        $allUsers = self::selectAllUsers();
        $allPrivileged = array();
        for ($i=0; $i < count($allUsers); $i++) { 
            if ($allUsers[$i]['privilgedOrNot'] == 1) {
                array_push($allPrivileged, $allUsers[$i]);
            }
        }
        return $allPrivileged;
    }
    public static function retrieveObject($UniqueIdentifierName, $uniqueIdentifier){
        $userArr = '';
        if ($UniqueIdentifierName == 'id') {
            $userArr = self::selectObjectAsArray($uniqueIdentifier, 'id');
        }
        elseif ($UniqueIdentifierName == 'username') {
            $userArr = self::selectObjectAsArray($uniqueIdentifier, 'username');
        }
        if (!isset($userArr[0]['adminOrNot'])) {
            $user = new User($userArr[0]['fullName'], $userArr[0]['username'], $userArr[0]['gender'], $userArr[0]['email'], $userArr[0]['password']);
            return $user;
        }
        else{
            $admin = new Admin($userArr[0]['username'], $userArr[0]['email'], $userArr[0]['password']);

            return $admin;
        }
    }

}
    
