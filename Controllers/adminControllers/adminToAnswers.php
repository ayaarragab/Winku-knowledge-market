<?php
 include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\answerController\answerMapper.php';
 include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Answer.php';
 include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\database\dbConnection.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\UserControllers\userControllersHelper.php';
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
public function addAnswer($questionId,$username,$body){
    $date = date("Y-m-d");
    $answer = new Answer($username, $body,$questionId,0,$date,0,0);
    $result = answerMapper::add($answer);

    // Check if question was added successfully
    if ($result) {
        $rep =QuestionMapper::selectSpecificAttr($questionId, 'id', 'numAnswers');
        $newrep = $rep + 1;
        $arr = array("numAnswers" => $newrep);
        $result = QuestionMapper::edit($questionId, $arr, "id");
        //add answer and increament num of answers in  question by 1
        UserControllerHelper::incrementDataAdmin($_SESSION['username'],'username','numAnswers');
        //inc num of answers in user
        // Assuming $result contains some identifier of the added question

    } else {
        echo "Error adding answer ";
    }
}
}