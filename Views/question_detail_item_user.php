<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmark.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmarkMapper.php';
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
                            echo '<a href="user_edit_question.php?questionId='.$question[0]['id'].'"><li><i class="fa-solid fa-pen"></i><span class="p-2">Edit</span></li></a>
                                  <a href="question_detail.php?function=deleteQuestion&id='.$question[0]['id'].'"><li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li></a>';
                                  echo '<a href="question_detail.php?function=reportQuestion&id='.$question[0]['id'].'"><li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li></a>';
                                }
                        else if ($registeredOrNot && !$hisQuestionOrNot){
                            if (bookmarkMapper::isBookmarked($_SESSION['id'], $question[0]['id'])) {
                                echo '<a href="question_detail.php?function=unbookmarkQuestion&id='.$question[0]['id'].'"><li><i class="fa-solid fa-bookmark"></i><span class="p-2">Unbookmark</span></li></a>';
                                echo '<li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li>';
                            }
                            else{
                                echo '<a href="question_detail.php?function=bookmarkQuestion&id='.$question[0]['id'].'"><li><i class="fa-solid fa-bookmark"></i><span class="p-2">Bookmark</span></li></a>';
                                echo '<a href="question_detail.php?function=reportQuestion&id='.$question[0]['id'].'"><li><i class="fa-solid fa-flag"></i><span class="p-2">Report</span></li></a>';
                            }
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
    