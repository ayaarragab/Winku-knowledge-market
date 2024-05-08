<?php
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\questionControllers\questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionMapper.php';
class questionToAdmin
{
    public static function showAllQuestionsToAdmin(){
        $questions = QuestionMapper::selectAllQuestions();
        for ($i = count($questions) - 1; $i >= 0; $i--) {
            echo '<div class="central-meta item"> <!-- Questions -->';
            echo '<div class="user-post">';
            echo '<div class="title-and-ellipse d-flex">';
            echo '<a href="question_detail_admin.php?id=' . $questions[$i]['id'] . '">';
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
            echo '<li data-toggle="tooltip" title="downvote"><span><span><i class="fa-solid fa-down-long"></i></span>' . $questions[$i]['numDownVotes'] . '</span></li>';
            echo '<li data-toggle="tooltip" title="upvote"><span><span><i class="fa-solid fa-up-long"></i></span>' . $questions[$i]['numUpVotes'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questions[$i]['numAnswers'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-flag"></i></span>' . $questions[$i]['numOfReports'] . '</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    public static function showOneQuestion($id)
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
                    <ul id="op-list" class="options-list" style="display: none;">
                        <li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li>
                        <li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li>
                    </ul>
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
        echo '<ul>';


        //downVote
        // echo '<li data-toggle="tooltip" title="downvote"><span><span><i class="fa-solid fa-down-long"></i></span>' . $question[0]['numDownVotes'] . '</span></li>';
        echo '<a class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
        echo ' onclick="' . 'decreaseReacts' . '(' . $question[0]['id'] . ')' . '">';
        echo '<li data-toggle="tooltip" title="downvote"><span><span><i class="fa-solid fa-down-long"></i></span>';
        echo $question[0]['numDownVotes'] . '</span></li>'; //Ask Sara about the increment and decrement functions, will be replaced with code in JS

        //upVote
        // echo '<li data-toggle="tooltip" title="upvote"><span><span><i class="fa-solid fa-up-long"></i></span>' . $question[0]['numUpVotes'] . '</span></li>';
        echo '<a class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
        echo ' onclick="' . 'increaseReacts' . '(' . $question[0]['id'] . ')' . '">';
        echo '<li data-toggle="tooltip" title="upvote"><span><span><i class="fa-solid fa-down-long"></i></span>';
        echo $question[0]['numUpVotes'] . '</span></li>'; //will be replaced with code in JS

        //numAnswers
        echo '<a class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
        echo ' onclick="' . 'ViewNumAnswers' . '(' . $question[0]['id'] . ')' . '">';
        echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>';
        echo $question[0]['numAnswers'] . '</span></li>'; //will be replaced with code in JS

        echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-flag"></i></span>' . $question[0]['numOfReports'] . '</span></li>';
        echo '</ul>';
        echo '</div>
                <div class="coment-area"> <!-- Answers -->
                    <ul class="we-comet">
    
                        <li class="post-comment">
                            <div class="comet-avatar">
                                <img src="images/resources/comet-1.jpg" alt="">
                            </div>
                            <div class="newpst-input">
                                <form method="post">
                                    <textarea rows="2" style="font-size: large;" placeholder="Add an answer!"></textarea>
                                    <div class="attachments">
                                        <ul>
                                            <li>
                                                <i class="fa fa-image"></i>
                                                <label class="fileContainer">
                                                    <input type="file">
                                                </label>
                                            </li>
                                            <li>
                                                <button type="submit">Answer</button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>';
    }
    public static function showQuestionsPerUser($username)
    {

        $questions = QuestionMapper::selectObjectAsArray($username, 'username');
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
            echo '<li data-toggle="tooltip" title="downvote"><span><span><i class="fa-solid fa-down-long"></i></span>' . $questions[$i]['numDownVotes'] . '</span></li>';
            echo '<li data-toggle="tooltip" title="upvote"><span><span><i class="fa-solid fa-up-long"></i></span>' . $questions[$i]['numUpVotes'] . '</span></li>';
            echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>' . $questions[$i]['numAnswers'] . '</span></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
}