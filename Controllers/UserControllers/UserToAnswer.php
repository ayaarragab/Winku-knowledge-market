<?php
 include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\answerController\answerMapper.php';
 include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Answer.php';
 include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';


// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\answerController\answerMapper.php';
// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\Answer.php';
// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\questionControllers\questionMapper.php';
 class UserToAnswer{
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
            UserControllerHelper::incrementData($_SESSION['username'],'username','numAnswers');
            //inc num of answers in user
            // Assuming $result contains some identifier of the added question

        } else {
            echo "Error adding answer ";
        }
    }
    public function deleteAnswer($answerId,$questionId)
    {
      $result = answerMapper::delete($answerId, 'id');
        
            if ($result) {
                echo "answer deleted successfully";
              UserControllerHelper::decreaseData($_SESSION['username'],'username','numAnswers');
              //dec num of answers in user  
              $rep =questionMapper::selectSpecificAttr($questionId, 'id', 'numberOfAnswers');
              $newrep = $rep + 1;
              $arr = array("numOfAnswers" => $newrep);
              $result = QuestionMapper::edit($questionId, $arr, "id");
            echo $result; // Assuming $result contains some identifier of the added question
            } else {
                echo "Error deleting question";
            }
      
      
    }
    
    
    public function reportAnswer($answerId)
    {
        answerMapper::incrementDataDB($answerId,'id','numOfReports');
    }

    public function UpVoteToanswer($answerId){
      answerMapper::incrementDataDB($answerId,'id','numUpVotes');
    }

    public function CancelUpVoteToanswer($answerId){
        answerMapper::decreaseDataDB($answerId,'id','numUpVotes');
      }
    
    public function DownVoteToanswer($answerId){
      answerMapper::incrementDataDB($answerId,'id','numDownVotes');
    }
    
    public function CancelDownVoteToanswer($answerId){
        answerMapper::decreaseDataDB($answerId,'id','numDownVotes');
      }

    // public function reportAnswer($answerId)
    // {
    //     $rep =answerMapper::selectSpecificAttr($answerId, 'id', 'numberOfReports');
    //     $newrep = $rep + 1;
    //     $arr = array("numOfReports" => $newrep);
    //     $result = QuestionMapper::edit($answerId, $arr, "id");
    //     if ($result) {
    //         echo "quesstion reported successfully";
    //     } else {
    //         echo "Error reporting question";}
    //     // Add logic to report an answer
    // }
}
