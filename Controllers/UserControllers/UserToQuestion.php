<?php
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionBuilder.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Question.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmark.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmarkMapper.php';
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

              // echo $result; // Assuming $result contains some identifier of the added question
          } else {
              echo "Error adding question";
          }
  }




  
   
    public function deleteQuestion($id)
    {
      $result = QuestionMapper::delete($id, 'id');
        
            if ($result) {
              UserControllerHelper::decreaseData($_SESSION['username'],'username','numQuestions');

            } else {
                echo "Error deleting question";
            }
      
      
    }
    public function bookmarkQuestion($questionId,$userId)
    {
      $bookmark=new bookmark($questionId,$userId);
      $result = bookmarkMapper::add($bookmark);
    //   if ($result) {
    //     echo "Question has been unbookmarked";

    // } else {
    //     echo "Error deleting question";
    // }
    }
    public function unbookmarkQuestion($questionId,$userId)
    {
      
      $result = bookmarkMapper::deletesAsociationClass($questionId,'questionId',$userId ,'userId');
    //   if ($result) {
    //     echo "question deleted successfully";

    // } else {
    //     echo "Error deleting question";
    // }
    }
    public static function showBookmarks($userId)
    {
      $result=bookmarkMapper::selectObjectAsArray($userId,'userId');
      if($result)
      {
        for($i=count($result)-1;$i>=0;$i--)
        {
          $hisQuestion=($userId==$_SESSION['id'])?true:false;
          questionToUser::showOneQuestion($userId,$hisQuestion, true);
        }
      }
    }


    public function reportQuestion($questionId)
    {
        QuestionMapper::incrementDataDB($questionId,'id','numOfReports');
    }
} 
