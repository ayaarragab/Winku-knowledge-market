<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\database\dbConnection.php';
class AdminToAnswers {
  protected $conn;

  public function __construct() {
      // Get the database connection
      $this->conn = DBConnection::getConnection();
  }
  public function getAllAnswers($questionid)
  {

      $sql = "SELECT * FROM answers WHERE questionId = ?";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute([$questionid]);
      
      // Fetch all results
      $answers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      
      return $answers;
  }
  
  public function deleteAnswer($answerId, $questionId) {

    $sql = "DELETE FROM answers WHERE id = ? AND questionId = ?";
    

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$answerId, $questionId]);
    
    // Check if any rows were affected
    if ($stmt->affected_rows> 0) {
        return true; // Answer deleted successfully
    } else {
        return false; // Answer with given ID and question ID not found
    }
}
}
?>