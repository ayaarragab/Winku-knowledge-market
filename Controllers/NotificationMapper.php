<?php
// require_once 'c:\xampp2\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperHelper.php';
// require_once 'c:\xampp2\htdocs\Winku-aya-s_branch\Controllers\Mapper\mapperInterface.php';
// require_once 'c:\xampp2\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';



// class NotificationMapper implements Mapper{
//     public static $tableName = 'Notifications';
//     public static $connection;
//     public static $columns = ['Userid',
//                               'messageid',
//                               'message'];
//     public static function getDbConnection() {
//         if (!isset(self::$connection)) {
//             self::$connection = DBConnection::getConnection();
//         }
//         return self::$connection;
//     }
//     public static function add($object){
//         $columns = "";
//         $values ="";
//         $conn = NotificationMapper::getDBConnection();
//         $arrayOfAttributes = MapperHelper::extractData(self::$columns, $object);
//         print_r($arrayOfAttributes);
//         foreach ($arrayOfAttributes as $key => $value) {
//             $columns .= "$key, ";
//             $values .= "'$value', ";        
//         }
//         $columns = rtrim($columns, ', ');
//         $values = rtrim($values, ', ');
//         $query = "INSERT INTO ".self::$tableName." ($columns) VALUES ($values)";
//         echo '<br>'.$query.'<br>';
//         return $conn->query($query);
//     }
//     public static function edit($uniqueIdentifier, $arrOfKeyValue, $UniqueIdentifierName){
//         $conn = self::getDbConnection();
//         $set = "";
//         foreach ($arrOfKeyValue as $column => $value) {
//             $set .= "$column = '$value', ";
//         }
//         $set = rtrim($set, ", ");
//         $query = "UPDATE ".self::$tableName." SET $set WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;
//         if ($query)
//             echo "<br> data changed sucessfully! <br>";
//         else {
//             echo "<br> can't update it in db <br>";
//         }
//         return $conn->query($query);
//     }
//     public static function delete($uniqueIdentifier, $UniqueIdentifierName){
//         $connection = self::getDbConnection();

//         $sql = "DELETE FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = ".$uniqueIdentifier;

//         if ($connection->query($sql) === TRUE) {
//             return true;
//         } else {
//             echo "Error deleting record: " . $connection->error;
//             return false;
//         }
//     }
    
//     public static function selectObjectAsArray($UniqueIdentifier, $UniqueIdentifierName){
//         $conn = self::getDbConnection();
//         $sqlAtatement = "SELECT * FROM ".self::$tableName." WHERE ".$UniqueIdentifierName." = ' ".$UniqueIdentifier."'";
//         $result = $conn->query($sqlAtatement);
//         if ($result->num_rows > 0) {
//             $data = array();
//             while ($row = $result->fetch_assoc()) {
//                 $data[] = $row;
//             }
//             return $data;
//         } else {
//             return false;
//         }
//     }
//     public static function selectSpecificAttr($uniqueIdentifier, $UniqueIdentifierName, $attrname){
//         $objectArr = self::selectObjectAsArray($uniqueIdentifier, $UniqueIdentifierName);
//         if ($objectArr !== false) {
//             return $objectArr[$attrname];
//         }
//         else {
//             echo "couldn't find the data";
//         }
//     }
//     public static function selectall($userid){
//         $conn = self::getDbConnection();
//         $sqlAtatement = "SELECT * FROM ".self::$tableName." WHERE Userid = ' ".$userid."'";
//         $result = $conn->query($sqlAtatement);
//         if ($result->num_rows > 0) {
//             $data = array();
//             while ($row = $result->fetch_assoc()) {
//                 $data[] = $row;
//             }
//             return $data;
//         } else {
//             return false;
//         }
//     }
//     public static function searchAttribute($attributeValue) {
//         $conn = self::getDbConnection();
//         $query = "SELECT * FROM " . self::$tableName;
//         $result = $conn->query($query);
//         if ($result->num_rows > 0) {
//             $users = array();
//             while ($row = $result->fetch_assoc()) {
//                 $users[] = $row;
//             }
//             foreach ($users as $user) {
//                 foreach ($user as $key => $value) {
//                     if ($value == $attributeValue) {
//                         return true;
//                     }
//                 }
//             }
//             return false;
//         }
//     else{
//         return false;
//     }
// }
// // public static function selectNotification($userId){
// //     $conn = self::getDbConnection();
// //     $query ="SELECT message FROM notification WHERE userId = ".$userId." ORDER BY messageid DESC LIMIT 5";
// //     $result = $conn->query($query);
// //     $data = array(); // على حسب هيتعرضوا ازاي ف الفرونت
// //     if ($result->num_rows > 0) {
// //         while ($row = $result->fetch_assoc()) {
// //             $data[] = $row;
// //         }
// //         return $data;
// //     } else {
// //         return false;
// //     }
// //     }

// //     public static function selectAllNotifications($userId){
// //         $conn = self::getDbConnection();
// //         $query ="SELECT message FROM notification WHERE userId = ".$userId."";
// //         $result = $conn->query($query);
// //         $data = array(); 
// //         if ($result->num_rows > 0) {
// //             while ($row = $result->fetch_assoc()) {
// //                 $data[] = $row;
// //             }
// //             return $data;
// //         } else {
// //             return false;
// //         }
// //         }
//         public static function selectNotification($userId){
//             $conn = self::getDbConnection();
//             $query ="SELECT message FROM notification WHERE userId = ".$userId." ORDER BY messageid DESC LIMIT 5";
//             $result = $conn->query($query);
//             $data = array(); // على حسب هيتعرضوا ازاي ف الفرونت
//             if ($result->num_rows > 0) {
//                 while ($row = $result->fetch_assoc()) {
//                     $data[] = $row;
//                 }
//                 return $data;
//             } else {
//                 return false;
//             }
//             }
        
//             public static function selectAllNotifications($userId){
//                 $conn = self::getDbConnection();
//                 $query ="SELECT message FROM notification WHERE userId = ".$userId."";
//                 $result = $conn->query($query);
//                 $data = array(); 
//                 if ($result->num_rows > 0) {
//                     while ($row = $result->fetch_assoc()) {
//                         $data[] = $row;
//                     }
//                     return $data;
//                 } else {
//                     return false;
//                 }
//                 }
        
// }