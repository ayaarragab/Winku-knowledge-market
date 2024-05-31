<?php
require_once 'answerMapper.php';
class answerToUser{
    public static function showAllquestionAnswers($questionId){
        $answers=answerMapper::selectAnswersByQuestionId($questionId);
        if($answers){
        for ($i=count($answers) - 1; $i >= 0; $i--) {
            ?>
        <div class="coment-area"> <!-- Answers -->
            <ul class="we-comet">
                <li>
                    <div class="comet-avatar">
                        <img src="images/default-avatar-icon-of-social-media-user-vector.jpg" style="width:30px;height:30px;display:block" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title=""><?php echo $answers[$i]['username']; ?></a></h5>
                            <span><?php echo $answers[$i]['publishedDate']; ?></span>
                        </div>
                        <p><?php echo $answers[$i]['body']; ?></p>
                    </div>
                    <div class="we-video-info m-0 p-0">
                        <ul>
                        <li data-toggle="tooltip" title="downvote"><span><span><i class="fa-solid fa-down-long"></i></span><?php echo $answers[$i]['numDownVotes']; ?></span></li>
                    <li data-toggle="tooltip" title="upvote"><span><span><i class="fa-solid fa-up-long"></i></span><?php echo $answers[$i]['numUpVotes']; ?></span></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <?php
        }
        echo '';
    }

    }
    public static function showUserAnswers($username){
        $answers=answerMapper::selectObjectAsArray($username,'username');
        if($answers!==false){
        for ($i=count($answers) - 1; $i >= 0; $i--) {
            ?>
        <div class="coment-area"> <!-- Answers -->
            <ul class="we-comet">
                <li>
                    <div class="comet-avatar">
                        <img src="images/resources/comet-1.jpg" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title=""><?php echo $answers[$i]['username']; ?></a></h5>
                            <span><?php echo $answers[$i]['publishedDate']; ?></span>
                        </div>
                        <p><?php echo $answers[$i]['body']; ?></p>
                    </div>
                    <div class="we-video-info m-0 p-0">
                        <ul>
                        <li data-toggle="tooltip" title="downvote"><span><span><i class="fa-solid fa-down-long"></i></span><?php echo $answers[$i]['numDownVotes']; ?></span></li>
                    <li data-toggle="tooltip" title="upvote"><span><span><i class="fa-solid fa-up-long"></i></span><?php echo $answers[$i]['numUpVotes']; ?></span></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <?php
        }
    }

    }

    public static function showQuestionWithItsAnswers($questionId){}

}