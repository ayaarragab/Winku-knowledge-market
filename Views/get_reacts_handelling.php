<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\userReactsQuestion\UserReactsQuestion.php';
// this file should be put in question_detail.php and question_detail_admin.php
if (isset($_GET['function']) && isset($_GET['id']) && isset($_GET['username'])) {
    if ($_GET['function'] == 'addUpVoteToDb') {
        
        UserReactsQuestion::addUpVoteToDb($_GET['username'], $_GET['id']);
    }
    elseif ($_GET['function'] == 'addDownVoteToDb') {
        UserReactsQuestion::addDownVoteToDb($_GET['username'], $_GET['id']);
    }
}