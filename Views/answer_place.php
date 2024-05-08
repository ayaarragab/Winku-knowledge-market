<?php
        echo '<div class="newpst-input">';
        if (!isset($_SESSION['adminOrNot'])) {
            echo '<form action="http://localhost/Winku-aya-s_branch/Views/question_detail.php?id='. $id.'" method="POST">';
            }
        else{
            echo '<form action="http://localhost/Winku-aya-s_branch/Views/question_detail_admin.php?id='. $id.'" method="POST">';
        }
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
        echo '</div>'; // Close the outer div
        echo '</div>'; // Close the outer div