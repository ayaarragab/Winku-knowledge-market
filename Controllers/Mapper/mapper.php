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
        public static $columns = ['username',
                                'followerUsername'
                                ];
        public static function getDbConnection() {
            if (!isset(self::$connection)) {
                self::$connection = DBConnection::getConnection();
            }
            return self::$connection;
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
            $sqlAtatement = "SELECT COUNT(*) FROM your_table WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;
            $result = $conn->query($sqlAtatement);
            if($result)
            {
                return $result;
            }else{
                return false;
            }
        }
        public static function deletesAsociationClass($firstUniqueIdentifier, $firstUniqueIdentifierName,$secondUniqueIdentifier, $secondUniqueIdentifierName){
            $connection = self::getDbConnection();
    
            $sql = "DELETE FROM ".self::$tableName." WHERE ".$firstUniqueIdentifierName." = ".$firstUniqueIdentifier ."AND".$secondUniqueIdentifierName." = ".$secondUniqueIdentifier;
    
            if ($connection->query($sql) === TRUE) {
                return true;
            } else {
                echo "Error deleting record: " . $connection->error;
                return false;
            }
        }

    }