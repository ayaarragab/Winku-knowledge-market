<?php
//downVote
if (isset($_SESSION['adminOrNot'])) {
    echo '<a style="cursor:pointer" class="to-select-in-js" data-id="' . $question[0]['id'] . '"';
    echo ' href="question_detail_admin.php?username=' . $_SESSION['username'] . '&id=' . $question[0]['id'] . '&function=addDownVoteToDb">';
    echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-down-long"></i></span>';
    echo $question[0]['numDownVotes'] . '</span></li>'; //Ask Sara about the increment and decrement functions, will be replaced with code in JS
    
    //upVote
    echo '<a style="cursor:pointer" class="to-select-in-js" data-id="' . $question[0]['id'] . '"';
    echo ' href="question_detail_admin.php?username=' . $_SESSION['username'] . '&id=' . $question[0]['id'] . '&function=addUpVoteToDb">';
    echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-up-long"></i></span>';
    echo $question[0]['numUpVotes'] . '</span></li>'; //will be replaced with code in JS
    echo '<a class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
echo ' href="question_detail_admin.php?id=' . $question[0]['id'] . '">';
echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>';
echo $question[0]['numAnswers'] . '</span></li>';         echo '</ul>';
}
elseif (isset($_SESSION['user'])) {
echo '<a style="cursor:pointer" class="to-select-in-js" data-id="' . $question[0]['id'] . '"';
echo ' href="question_detail.php?username=' . $_SESSION['username'] . '&id=' . $question[0]['id'] . '&function=addDownVoteToDb">';
echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-down-long"></i></span>';
echo $question[0]['numDownVotes'] . '</span></li>'; //Ask Sara about the increment and decrement functions, will be replaced with code in JS

//upVote
echo '<a style="cursor:pointer" class="to-select-in-js" data-id="' . $question[0]['id'] . '"';
echo ' href="question_detail.php?username=' . $_SESSION['username'] . '&id=' . $question[0]['id'] . '&function=addUpVoteToDb">';
echo '<li data-toggle="tooltip"><span><span><i class="fa-solid fa-up-long"></i></span>';
echo $question[0]['numUpVotes'] . '</span></li>'; //will be replaced with code in JS
echo '<a class="to-select-in-js" data-id=' . $question[0]['id'] . "'";
echo ' href="question_detail.php?id=' . $question[0]['id'] . '">';
echo '<li><span class="comment" data-toggle="tooltip" title="Answers"><span><i class="fa-solid fa-pen-to-square"></i></span>';
echo $question[0]['numAnswers'] . '</span></li>';         echo '</ul>';
}
else{
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