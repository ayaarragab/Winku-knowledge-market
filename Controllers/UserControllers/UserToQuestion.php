<?php
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionBuilder.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Question.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmark.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmarkMapper.php';


// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\questionControllers\questionBuilder.php';
// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\questionControllers\questionMapper.php';
// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\Question.php';
// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\bookmarkedQuestions\bookmark.php';
// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\bookmarkedQuestions\bookmarkMapper.php';

class UserToQuestion{

  public function addQuestion($username, $title, $body, $tags, $subcategoryId)
  {
      // Check if user is logged in
          
          // Create a new Question object
          $date = date("Y-m-d");
          $question = new Question($username, $date, $body, $tags ,$subcategoryId, 0, $title ,0, 0, 0);
          
          // Insert the question into the database
          $result = QuestionMapper::add($question);

          // Check if question was added successfully
          if ($result) {
              UserControllerHelper::incrementData($_SESSION['username'],'username','numQuestions');

              echo $result; // Assuming $result contains some identifier of the added question
          } else {
              echo "Error adding question";
          }
  }




  
   
    public function deleteQuestion($id)
    {
      $result = QuestionMapper::delete($id, 'id');
        
            if ($result) {
                echo "question deleted successfully";
              UserControllerHelper::decreaseData($_SESSION['username'],'username','numQuestions');

            } else {
                echo "Error deleting question";
            }
      
      
    }
    public function bookmarkQuestion($questionId,$userId)
    {
      $bookmark=new bookmark($questionId,$userId);
      $result = bookmarkMapper::add($bookmark);
      if ($result) {
        echo "question deleted successfully";

    } else {
        echo "Error deleting question";
    }
    }
    public function unbookmarkQuestion($questionId,$userId)
    {
      
      $result = bookmarkMapper::deletesAsociationClass($questionId,'questionId',$userId ,'userId');
      if ($result) {
        echo "question deleted successfully";

    } else {
        echo "Error deleting question";
    }
    }
    


    public function reportQuestion($questionId)
    {
        QuestionMapper::incrementDataDB($questionId,'id','numberOfReports');
    }

    public function UpVoteToQuestion($questionId){
      QuestionMapper::incrementDataDB($questionId,'id','numUpVotes');
    }

    public function DownVoteToQuestion($questionId){
      QuestionMapper::incrementDataDB($questionId,'id','numDownVotes');
    }

    public function CancelUpVoteToanswer($questionId){
      answerMapper::decreaseDataDB($questionId,'id','numUpVotes');
    }
    
    public function CancelDownVoteToanswer($questionId){
      answerMapper::decreaseDataDB($questionId,'id','numDownVotes');
    }


} 


/*public function addQuestion($title, $body, $tags ,$subcategoryId)
    {
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Process form data
      print(var_dump($_POST));
        $title = $_POST['title'];
        $body = $_POST['body'];
        $tags = $_POST['tags'];
        $subcategoryId = $_POST['subcategoryId'];
      echo'yarab elproject ymooot';
        // Instantiate UserToQuestion class and call addQuestion method
        $userToQuestion = new UserToQuestion();
        $userToQuestion->addQuestion($title, $body, $tags, $subcategoryId);
    }
    else
    {echo'aaaaaab';}

      if(!isset($_SESSION['username']))
        {
          echo 'eeeeh';
          return header('Location: landing.php');
        } 



  
	/*if ($_SESSION && isset($_SESSION['username'])) {
        // User is logged in
        $username = $_SESSION['username'];	
    }
	echo $title;
	$date = date("Y-m-d");
	// Create an object (assuming your DBController expects an object)
    $question = new Question('temp', $body, $tags ,$subcategoryId,$date , "0", '0', '0', $title);
    
    
    // Insert the object into the database using your DBController
    $result = QuestionMapper::add($question); // Modify this according to your DBController
    
    if ($result) {
        echo "Question added successfully";
		echo $result;
    } else {
        echo "Error adding question";
    }


    }*/