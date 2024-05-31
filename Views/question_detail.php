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
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmark.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmarkMapper.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	Authenticator::check_login();
	$body = $_POST['body'];
	$qustionId=$_POST['question_id'];
	$question_username=$_POST['question_username'];
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
											require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\followed_categories_or_all_categories.php';
											 ?>
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6">
									<div class="loadMore">
									<?php
										if (isset($_GET['function']) && $_GET['function'] == 'deleteQuestion') {
											$user = unserialize($_SESSION['user']);
											$user->userToQuestion->deleteQuestion($_GET['id']);
										}
										elseif (isset($_GET['function']) && $_GET['function'] == 'bookmarkQuestion') {
											$user = unserialize($_SESSION['user']);
											$user->userToQuestion->bookmarkQuestion($_GET['id'], $_SESSION['id']);	
										}
										elseif (isset($_GET['function']) && $_GET['function'] == 'unbookmarkQuestion') {
											$user = unserialize($_SESSION['user']);
											$user->userToQuestion->unbookmarkQuestion($_GET['id'], $_SESSION['id']);	
										}
										elseif (isset($_GET['function']) && $_GET['function'] == 'reportQuestion') {
											$user = unserialize($_SESSION['user']);
											$user->userToQuestion->reportQuestion($_GET['id']);	
										}
										require_once 'get_reacts_handelling.php';
										require_once 'answer_check.php';
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