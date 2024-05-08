<?php
include_once 'addBookmark.html';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\questionControllers\questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\answerController\answerMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\answerController\answerToUser.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\userReactsQuestion\UserReactsQuestion.php';
class questionToUser
{
    /**
     * We should differniate between options of user on his Questions and his answers, and his options on other answers and other questions 
     */
    public static function showCurrentUserQuestions($id)
    {
       
        $questions = QuestionMapper::selectQuestionsPerUser($id);
        //if($questions!==false)
        for ($i = count($questions) - 1; $i >= 0; $i--) {
            echo '<div class="central-meta item"> <!-- Questions -->';
            echo '<div class="user-post">';
            echo '<div class="title-and-ellipse d-flex">';
            echo '<a href="question_detail.php?id=' . $questions[$i]['id'] . '">';
            echo '<h5 style="font-weight: bold; width: 100%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $questions[$i]['title'] . '</h5></a>';
            echo '<i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>';
            echo '</div>';
            echo '<div class="d-flex ff">';
            echo '<ul id="op-list" class="options-list" style="display: none;">';
            echo '<li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>';
            echo '<li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>';
            echo '<li><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="friend-info">';
            echo '<div class="friend-name">';
            echo '<ins><a title="" href="time-line.php" style="font-size: 1rem;">' . $questions[$i]['username'] . '</a></ins>';
            echo '<span>published: ' . $questions[$i]['publishedDate'] . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="description" style="display: none;">';
            echo '<p style="font-size: 0.99rem;">' . $questions[$i]['body'] . '</p>';
            echo '</div>';
            echo '<div class="we-video-info mb-3">';
            echo '<ul>';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $questions[$i]['numDownVotes'] . '</span></li>';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>' . $questions[$i]['numUpVotes'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questions[$i]['numAnswers'] . '</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    public static function showOneQuestion($id, $hisQuestionOrNot=false, $registeredOrNot)
    {
        $question = QuestionMapper::selectObjectAsArray($id, 'id');
        echo '
        <div class="central-meta item"> <!-- Questions -->
            <div class="user-post">
                <div class="title-and-ellipse d-flex">
                    <h5 style="font-weight: bold; width: 70%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $question[0]['title'] . '</h5>
                    <i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>
                </div>
                <div class="d-flex ff">
                    <ul id="op-list" class="options-list" style="display: none;">';
                    if ($registeredOrNot && $hisQuestionOrNot) {
                        echo '<li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>
                              <li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>';
                    }
                    else if ($registeredOrNot && !$hisQuestionOrNot){
                        echo '<li><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></li>';
                    }
                    else if (!$registeredOrNot) {
                        echo '<li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li>';
                    }
                    echo '</ul>
                </div>
                <div class="friend-info">
                    <div class="friend-name">
                        <ins><a title="" href="time-line.html" style="font-size: 1rem;">' . $question[0]['username'] . '</a></ins>
                        <span>published: ' . $question[0]['publishedDate'] . '</span>
                    </div>
                </div>
                <div class="description">
                    <p style="font-size: 0.99rem;" >' . $question[0]['body'] . '</p>
                </div>
                <div class="we-video-info mb-3">';
        echo '<ul class="select-in-js-another-time">';

        if ($registeredOrNot) {
            //downVote
            // echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $question[0]['numDownVotes'] . '</span></li>';
            echo '<a style="cursor:pointer" class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
            echo ' onclick="' . 'increaseDownVote' . '(' . $question[0]['id'].','.UserReactsQuestion::getDownVoteStatus($_SESSION['id'], $id).')' . '">';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>';
            echo $question[0]['numDownVotes'] . '</span></li>'; //Ask Sara about the increment and decrement functions, will be replaced with code in JS
            //upVote
            // echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>' . $question[0]['numUpVotes'] . '</span></li>';
            echo '<a style="cursor:pointer" class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
            echo ' onclick="' . 'increaseUpVote' . '(' . $question[0]['id'].', '.UserReactsQuestion::getUpVoteStatus($_SESSION['id'], $id).')' . '">';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>';
            echo $question[0]['numUpVotes'] . '</span></li>'; //will be replaced with code in JS
        }
        else {
        //downVote
        // echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $question[0]['numDownVotes'] . '</span></li>';
        echo '<a style="cursor:pointer" class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
        echo ' href ="landing.php">';
        echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>';
        echo $question[0]['numDownVotes'] . '</span></li>'; //Ask Sara about the increment and decrement functions, will be replaced with code in JS

        //upVote
        // echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>' . $question[0]['numUpVotes'] . '</span></li>';
        echo '<a style="cursor:pointer" class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
        echo ' href ="landing.php">';
        echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>';
        echo $question[0]['numUpVotes'] . '</span></li>'; //will be replaced with code in JS
        }

        //numAnswers
        echo '<a class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
        echo ' onclick="' . 'ViewNumAnswers' . '(' . $question[0]['id'] . ')' . '">';
        echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>';
        echo $question[0]['numAnswers'] . '</span></li>';         echo '</ul>';
        echo '</div>'; // Close the div with class="we-comet"
        if (isset($_GET['function']) && $_GET['function'] == 'showQuestionWithItsAnswers') {
            #...
        }
        if ($question[0]['numAnswers'] != 0) {
            answerToUser::showAllquestionAnswers($question[0]['id']);
        }
        // echo '<div class="coment-area">';
        // echo '<ul class="we-comet">';
        // echo '<li class="post-comment">';
        // echo '<div class="comet-avatar">';
        // echo '<img src="images/resources/comet-1.jpg" alt="">';
        // echo '</div>';
        echo '<div class="newpst-input">';
        echo '<form action="http://localhost/Winku-aya-s_branch/Views/question_detail.php?id='. $id.'" method="POST">';
        echo '<textarea name="body" rows="2" style="font-size: large;" placeholder="Add an wink wink answer!"></textarea>';
        echo '<input type="hidden" name="question_id" value="'.$id.'">';
        echo '<input type="hidden" name="question_username" value="'.$question[0]['username'].'">';
        echo '<div class="attachments">';
        echo '<ul>';
        echo '<li>';
        echo '<button name="submit" type="submit">Answer</button>';
        echo '</li>';
        echo '</ul>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        // echo '</li>';
        // echo '</ul>';
        // echo '</div>'; // Close the div with class="coment-area"
        echo '</div>'; // Close the outer div
        echo '</div>'; // Close the outer div
    }

    public static function showOneQuestionToAdmin($id)
    {
        $question = QuestionMapper::selectObjectAsArray($id, 'id');
        require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\question_detail_item.php';
        require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\reacts_handelling.php';

        echo '</div>'; // Close the div with class="we-comet"
        if ($question[0]['numAnswers'] != 0) {
            answerToUser::showAllquestionAnswers($question[0]['id']);
        }
        require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\answer_place.php';
    }
    public static function showQuestionsPerUser($username, $hisQuestionOrNot)
    {
        $questions = QuestionMapper::selectObjectAsArray($username, 'username');
        if($questions!==false)
        for ($i = count($questions) - 1; $i >= 0; $i--) {

            echo '<div class="central-meta item"> <!-- Questions -->';
            echo '<div class="user-post">';
            echo '<div class="title-and-ellipse d-flex">';
            echo '<a href="question_detail.php?id=' . $questions[$i]['id'] . '">';
            echo '<h5 style="font-weight: bold; width: 100%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $questions[$i]['title'] . '</h5></a>';
            echo '<i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>';
            echo '</div>';
            echo '<div class="d-flex ff">';
            echo '<ul id="op-list" class="options-list" style="display: none;">';
            echo '<li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>';
            echo '<li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>';
            echo '<li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li>';
            echo '<li><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="friend-info">';
            echo '<div class="friend-name">';
            echo '<ins><a title="" href="time-line.php" style="font-size: 1rem;">' . $questions[$i]['username'] . '</a></ins>';
            echo '<span>published: ' . $questions[$i]['publishedDate'] . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="description" style="display: none;">';
            echo '<p style="font-size: 0.99rem;">' . $questions[$i]['body'] . '</p>';
            echo '</div>';
            echo '<div class="we-video-info mb-3">';
            echo '<ul>';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $questions[$i]['numDownVotes'] . '</span></li>';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>' . $questions[$i]['numUpVotes'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questions[$i]['numAnswers'] . '</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    public static function showAllQuestionsToAdmin(){
        $questions = QuestionMapper::selectAllQuestions();
        if($questions!==false)
        for ($i = count($questions) - 1; $i >= 0; $i--) {
            echo '<div class="central-meta item"> <!-- Questions -->';
            echo '<div class="user-post">';
            echo '<div class="title-and-ellipse d-flex">';
            echo '<a href="question_detail.php?id=' . $questions[$i]['id'] . '">';
            echo '<h5 style="font-weight: bold; width: 100%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $questions[$i]['title'] . '</h5></a>';
            echo '<i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>';
            echo '</div>';
            echo '<div class="d-flex ff">';
            echo '<ul id="op-list" class="options-list" style="display: none;">';
            echo '<li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>';
            echo '<li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="friend-info">';
            echo '<div class="friend-name">';
            echo '<ins><a title="" href="time-line.php" style="font-size: 1rem;">' . $questions[$i]['username'] . '</a></ins>';
            echo '<span>published: ' . $questions[$i]['publishedDate'] . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="description" style="display: none;">';
            echo '<p style="font-size: 0.99rem;">' . $questions[$i]['body'] . '</p>';
            echo '</div>';
            echo '<div class="we-video-info mb-3">';
            echo '<ul>';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $questions[$i]['numDownVotes'] . '</span></li>';
            echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-up-long"></i></span>' . $questions[$i]['numUpVotes'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questions[$i]['numAnswers'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-flag"></i></span>' . $questions[$i]['numOfReports'] . '</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    public static function showAllQuestions($sessionUserName){
        $questions = QuestionMapper::selectAllQuestions();
        if($questions)
        {
            for ($i = count($questions) - 1; $i >= 0; $i--) {
                echo '<div class="central-meta item"> <!-- Questions -->';
                echo '<div class="user-post">';
                echo '<div class="title-and-ellipse d-flex">';
                echo '<a href="question_detail.php?id=' . $questions[$i]['id'] . '">';
                echo '<h5 style="font-weight: bold; width: 100%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $questions[$i]['title'] . '</h5></a>';
                echo '<i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>';
                echo '</div>';
                echo '<div class="d-flex ff">';
                echo '<ul id="op-list" class="options-list" style="display: none;">';
                if ($sessionUserName && $questions[$i]['username'] == $sessionUserName) {
                    echo '<li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>
                          <li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>';
                }
                else if($sessionUserName && $questions[$i]['username'] != $sessionUserName){
                    echo '<li><a href="javascript:void(0);" onclick="addBookmark(\'' . $_SESSION['id'] . '\', \'' .  $questions[$i]['id']. '\')"><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></a></li>'; //bookmark by JavaScript
                    echo '<li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li>';
                }
                else{
                    echo '<li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '<div class="friend-info">';
                echo '<div class="friend-name">';
                echo '<ins><a title="" href="time-line.php" style="font-size: 1rem;">' . $questions[$i]['username'] . '</a></ins>';
                echo '<span>published: ' . $questions[$i]['publishedDate'] . '</span>';
                echo '</div>';
                echo '</div>';
                echo '<div class="description" style="display: none;">';
                echo '<p style="font-size: 0.99rem;">' . $questions[$i]['body'] . '</p>';
                echo '</div>';
                echo '<div class="we-video-info mb-3">';
                echo '<ul>';
                echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-down-long"></i></span>' . $questions[$i]['numDownVotes'] . '</span></li>';
                echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-up-long"></i></span>' . $questions[$i]['numUpVotes'] . '</span></li>';
                echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questions[$i]['numAnswers'] . '</span></li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }   
        }
    }
    public static function showAllQuestionsPerSubcategory($subcategoryId, $hisQuestionOrNot){
        $questions = QuestionMapper::selectQuestionsBySubcategory($subcategoryId);
        if($questions!==false)
        for ($i = count($questions) - 1; $i >= 0; $i--) {
            echo '<div class="central-meta item"> <!-- Questions -->';
            echo '<div class="user-post">';
            echo '<div class="title-and-ellipse d-flex">';
            echo '<a href="question_detail.php?id=' . $questions[$i]['id'] . '">';
            echo '<h5 style="font-weight: bold; width: 100%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $questions[$i]['title'] . '</h5></a>';
            echo '<i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>';
            echo '</div>';
            echo '<div class="d-flex ff">';
            echo '<ul id="op-list" class="options-list" style="display: none;">';
            if ($hisQuestionOrNot && $questions[$i]['username'] == $hisQuestionOrNot) {
                echo '<li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>
                      <li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>';
            }
            else {
                echo '<li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li>';
            }
            echo '<li><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="friend-info">';
            echo '<div class="friend-name">';
            echo '<ins><a title="" href="time-line.php" style="font-size: 1rem;">' . $questions[$i]['username'] . '</a></ins>';
            echo '<span>published: ' . $questions[$i]['publishedDate'] . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="description" style="display: none;">';
            echo '<p style="font-size: 0.99rem;">' . $questions[$i]['body'] . '</p>';
            echo '</div>';
            echo '<div class="we-video-info mb-3">';
            echo '<ul>';
            echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $questions[$i]['numDownVotes'] . '</span></li>';
            echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-up-long"></i></span>' . $questions[$i]['numUpVotes'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questions[$i]['numAnswers'] . '</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }   
    }
    public static function showBYQuestionId($questionid,$hisQuestionOrNot){
        echo '<div class="central-meta item"> <!-- Questions -->';
        echo '<div class="user-post">';
        echo '<div class="title-and-ellipse d-flex">';
        echo '<a href="question_detail.php?id=' . $questionid['id'] . '">';
        echo '<h5 style="font-weight: bold; width: 100%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $questionid['title'] . '</h5></a>';
        echo '<i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>';
        echo '</div>';
        echo '<div class="d-flex ff">';
        echo '<ul id="op-list" class="options-list" style="display: none;">';
        if ($hisQuestionOrNot && $questionid['username'] == $hisQuestionOrNot) {
            echo '<li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>
                  <li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>';
        }
        else {
            echo '<li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li>';
        }
        echo '<li><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></li>';
        echo '</ul>';
        echo '</div>';
        echo '<div class="friend-info">';
        echo '<div class="friend-name">';
        echo '<ins><a title="" href="time-line.php" style="font-size: 1rem;">' . $questionid['username'] . '</a></ins>';
        echo '<span>published: ' . $questionid['publishedDate'] . '</span>';
        echo '</div>';
        echo '</div>';
        echo '<div class="description" style="display: none;">';
        echo '<p style="font-size: 0.99rem;">' . $questionid['body'] . '</p>';
        echo '</div>';
        echo '<div class="we-video-info mb-3">';
        echo '<ul>';
        echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $questionid['numDownVotes'] . '</span></li>';
        echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>' . $questionid['numUpVotes'] . '</span></li>';
        echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questionid['numAnswers'] . '</span></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    public static function isHisQuestion($userId, $questionId)
    {
        $user = UserMapper::selectObjectAsArray($userId, 'id');
        $question = QuestionMapper::selectObjectAsArray($questionId, 'id');

        if ($user && $question && $user[0]['username'] == $question[0]['username']) {
            return true;
        } else {
            return false;
        }
    }
}