<?php
include_once 'addBookmark.html';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\questionControllers\questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\answerController\answerMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\answerController\answerToUser.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\userReactsQuestion\UserReactsQuestion.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmarkMapper.php';
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
        if ($question) {
            require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\question_detail_item_user.php';
            require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\reacts_handelling.php';
            if ($question[0]['numAnswers'] != 0) {
                answerToUser::showAllquestionAnswers($question[0]['id']);
            }
            require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\answer_place.php';
    }else{
        echo '<h2>Your question has been deleted!</h2>';
        echo '<a class="addnewforum d-block p-1 follow-cat" style="font-size:1.5rem;margin-right:10px;width:fit-content" href="index.php"><span style="color:white">Go to home page!</span></a>';
    }
}

    public static function showOneQuestionToAdmin($id)
    {
        $question = QuestionMapper::selectObjectAsArray($id, 'id');
        if ($question) {
            require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\question_detail_item.php';
            require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\reacts_handelling.php';
    
            echo '</div>'; // Close the div with class="we-comet"
            if ($question[0]['numAnswers'] != 0) {
                answerToUser::showAllquestionAnswers($question[0]['id']);
            }
            require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\answer_place.php';        }
        else {
            echo '<h2>The question has been deleted!</h2>';
            echo '<a class="addnewforum d-block p-1 follow-cat" style="font-size:1.5rem;margin-right:10px;width:fit-content" href="index.php"><span style="color:white">Go to home page!</span></a>';
        }
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
            echo '<a href="admin-all-questions.php?function=deleteQuestion&id='.$questions[$i]['id'].'"><li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li></a>';
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
                    echo '<a href="index.php?questionId='.$questions[$i]['id'].'"><li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li></a>';
                    echo '<a href="index.php?function=deleteQuestion&id='.$questions[$i]['id'].'"><li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li></a>';
                }
                else if($sessionUserName && $questions[$i]['username'] != $sessionUserName){
                    if (bookmarkMapper::isBookmarked($_SESSION['id'], $questions[$i]['id'])) {
                        echo '<a href="index.php?function=unbookmarkQuestion&id='.$questions[$i]['id'].'"><li><i class="fa-solid fa-bookmark"></i><span class="p-2">Unbookmark</span></li></a>';
                        echo '<a href="index.php?function=reportQuestion&id='.$questions[$i]['id'].'"><li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li></a>';
                    }
                    else{
                        echo '<a href="index.php?function=bookmarkQuestion&id='.$questions[$i]['id'].'"><li><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></li></a>';
                        echo '<a href="index.php?function=reportQuestion&id='.$questions[$i]['id'].'"><li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li></a>';
                    }
                }
                else{
                    echo '<a href="index.php?function=reportQuestion&id='.$questions[$i]['id'].'"><li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li></a>';
                }
                echo '</ul>';
                echo '</div>';
                echo '<div class="friend-info">';
                echo '<div class="friend-name">';
                $user = UserMapper::selectObjectAsArray($questions[$i]['username'],'username');

                echo '<ins><a title="" href="userProfile.php?id='.$user[0]['id'].'" style="font-size: 1rem;">'.$questions[$i]['username'].'</a></ins>';
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
        $question = QuestionMapper::selectObjectAsArray($questionid, 'id');
        //print_r();
        echo '<div class="central-meta item"> <!-- Questions -->';
        echo '<div class="user-post">';
        echo '<div class="title-and-ellipse d-flex">';
        echo '<a href="question_detail.php?id=' . $question[0]['id'] . '">';
        echo '<h5 style="font-weight: bold; width: 100%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $question[0]['title'] . '</h5></a>';
        echo '<i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>';
        echo '</div>';
        echo '<div class="d-flex ff">';
        echo '<ul id="op-list" class="options-list" style="display: none;">';
        if ($hisQuestionOrNot && $question[0]['username'] == $hisQuestionOrNot) {
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
        echo '<ins><a title="" href="time-line.php" style="font-size: 1rem;">' . $question[0]['username'] . '</a></ins>';
        echo '<span>published: ' . $question[0]['publishedDate'] . '</span>';
        echo '</div>';
        echo '</div>';
        echo '<div class="description" style="display: none;">';
        echo '<p style="font-size: 0.99rem;">' . $question[0]['body'] . '</p>';
        echo '</div>';
        echo '<div class="we-video-info mb-3">';
        echo '<ul>';
        echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-down-long"></i></span>' . $question[0]['numDownVotes'] . '</span></li>';
        echo '<li data-toggle="tooltip" ><span><span><i class="fa-solid fa-up-long"></i></span>' . $question[0]['numUpVotes'] . '</span></li>';
        echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $question[0]['numAnswers'] . '</span></li>';
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