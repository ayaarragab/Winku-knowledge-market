<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
class UserReactsQ {
    public static $tableName = 'userreactsquestion';
    public static $connection;
    public static $columns = ['userId',
                             'questionId',
                             'upVote',
                             'downVote'];
    public static function getDbConnection() {
        if (!isset(self::$connection)) {
            self::$connection = DBConnection::getConnection();
        }
        return self::$connection;
    }
    public static function numOfRowforattr($firstUniqueIdentifier, $firstUniqueIdentifierName,$atter )
        {
            $conn = self::getDbConnection();
            $sqlAtatement = "SELECT COUNT($atter)as num FROM ".self::$tableName." WHERE " . $firstUniqueIdentifierName ." = '" . $firstUniqueIdentifier . "' AND " . $atter . " = '1'";
            $result = $conn->query($sqlAtatement);
            $row = $result->fetch_assoc();
            if($row)
            {
                return $row ;
            }else{
                return false;
            }
        }
}
    ?>