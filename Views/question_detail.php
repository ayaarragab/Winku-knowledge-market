<?php
ob_start();
session_start();
include_once('assests/header.php');
require_once '../Controllers/questionControllers/questionToUser.php';
require_once '../Controllers/UserControllers/userMapper.php';
require_once '../Models/User.php';
require_once '../Controllers/answerController/answerToUser.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\auth\Authenticator.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
// session_start();
// include_once('assests/header.php');
// require_once '../Controllers/questionControllers/questionToUser.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	Authenticator::check_login();
	$body = $_POST['body'];
	$qustionId=$_POST['question_id'];
	$question_username=$_POST['question_username'];
	//echo'..........';
	//$objArr = UserMapper::selectObjectAsArray($_SESSION['id'], 'id');
	$user = unserialize($_SESSION['user']);
	//print_r($user);
	// Instantiate UserToQuestion class and call addQuestion method
	$answer = $user->userToAnswer->addAnswer($qustionId,$_SESSION['username'],$body);
	}
?>	
		<section>
			<div class="gap gray-bg">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row" id="page-contents">
								<div class="col-lg-3">
									<aside class="sidebar static">
										<div class="widget">
										<?php
												if (isset($_SESSION['id'])) {
													echo '<h4 class="widget-title">Followed categories</h4>';
													echo '<ul class="naves">';
													$categories = CategoryusersMapper::getUserFollowedCategories($_SESSION['id']);
													foreach ($categories as $category) {
														echo '<li><a href="subcategories.php?categoryId=' . $category['id'] . '">' . $category['name'] . '</a></li>';
													}}
												else {
													echo '<h4 class="widget-title">Categories</h4>';
													echo '<ul class="naves">';
													$categories = CategoryMapper::selectall();
													foreach ($categories as $category) {
														echo '<li><a href="subcategories.php?categoryId=' . $category['id'] . '">' . $category['name'] . '</a></li>';
													}
												}
												?>												
											</ul>
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6">
									<div class="loadMore">
									<?php
									print_r($_POST);
									if (isset($_POST['question_id']) && isset($_POST['react_type'])) {
										echo 'can you hear me?';
										if ($_POST['question_id'] == $_GET['id'] && $_POST['react_type'] == 'upvote') {
											UserReactsQuestion::addUpVoteToDb($_SESSION['id'], $_GET['id']);
										}
										elseif ($_POST['question_id'] == $_GET['id'] && $_POST['react_type'] == 'downVote') {
											UserReactsQuestion::addDownVoteToDb($_SESSION['id'], $_GET['id']);
										}
									}
										// if (isset( $_SESSION['id']) && $_GET['function'] == 'showOneQuestion' && $_SESSION['username'] == $_GET['username']) {
										// 	questionToUser::showOneQuestion($_GET['id'], true, true);
										// }
										// elseif (isset( $_SESSION['id']) && $_GET['function'] == 'showOneQuestion' && $_SESSION['username'] != $_GET['username']) {
										// 	# code...
										// }
										// require_once 'answer_check.php';
										require_once 'answer_check.php';
										// answerToUser::showAllquestionAnswers($_GET['id']);
										ob_end_flush();
										 ?>
								</div>
								<div class="col-lg-3"></div>
								</div><!-- centerl meta -->
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</section>
<?php
include('assests/footer.php')
?>	