<?php
        echo '<div class="central-meta item"> <!-- Questions -->
        <div class="user-post">
            <div class="title-and-ellipse d-flex">
                <h5 style="font-weight: bold; width: 70%; color: rgb(45, 45, 45); font-size: 1.6rem;">' . $question[0]['title'] . '</h5>
                <i id="ellipse-element" class="fa-solid fa-ellipsis-vertical cursor-pointer" style="font-size:30px; margin-top:2px"></i>
            </div>
            <div class="d-flex ff">
                <ul id="op-list" class="options-list" style="display: none;">';
                    echo '<a href="question_detail_admin.php?function=deleteQuestion&id='.$question[0]['id'].'"><li><i class="fa-solid fa-trash"></i><span class="p-2">Delete</span></li></a>';
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