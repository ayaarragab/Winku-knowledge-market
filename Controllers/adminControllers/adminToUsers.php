<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
class AdminToUsers{
    protected $conn;

    public function __construct() {
        // Get the database connection
        $this->conn = DBConnection::getConnection();
    }
    public function getAllUsersNames() {
        try {
            // Prepare SQL statement
            $sql = "SELECT username FROM users";

            // Prepare and execute the SQL statement
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            // Fetch all results
            $names = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            print_r($names);
            return $names;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteUser($username) {
        try {
            $sql = "DELETE FROM users WHERE username = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $username); // 's' indicates a string parameter
            $stmt->execute();
    
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                echo "User deleted successfully.";
            } else {
                echo "No user found with the given username.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
    


?>

<!-- <?php

// $admin = new AdminToUsers();
// $admin->getAllUsersNames();
// $admin->deleteUser('ayoyaaa');
?>  -->