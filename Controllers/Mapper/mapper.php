<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperHelper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\Mapper\mapperInterface.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
    class userfollowermapper{
        public static $tableName = 'userFollower';
        public static $connection;
        public static $columns = ['userId',
                                'followerId'
                                ];
        public static function getDbConnection() {
            if (!isset(self::$connection)) {
                self::$connection = DBConnection::getConnection();
            }
            return self::$connection;
        }

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
        
        public static function selectObjectAsArray($UniqueIdentifier, $UniqueIdentifierName)
        {
            $conn = self::getDbConnection();
            $sqlAtatement = "SELECT * FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = ".$UniqueIdentifier;
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
        public static function numOfRow($uniqueIdentifier, $UniqueIdentifierName)
        {
            $conn = self::getDbConnection();
            $sqlAtatement = "SELECT COUNT(*)as num FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;
            $result = $conn->query($sqlAtatement);
            $row = $result->fetch_assoc();
            if($row)
            {
                return $row ;
            }else{
                return false;
            }
        }
        public static function deletesAsociationClass($firstUniqueIdentifier, $firstUniqueIdentifierName, $secondUniqueIdentifier, $secondUniqueIdentifierName){
            // Get the database connection
            $connection = self::getDbConnection();
        
            // Construct the SQL query to delete records
            $sql = "DELETE FROM " . self::$tableName . " WHERE " . $firstUniqueIdentifierName . " = '" . $firstUniqueIdentifier . "' AND " . $secondUniqueIdentifierName . " = '" . $secondUniqueIdentifier . "'";
        
            // Execute the SQL query
            if ($connection->query($sql) === TRUE) {
                // If deletion is successful, return true
                return true;
            } else {
                // If there's an error, display it and return false
                echo "Error deleting record: " . $connection->error;
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

    }