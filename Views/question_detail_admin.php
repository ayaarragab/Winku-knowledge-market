<?php
require_once 'assests/admin-header-few-differences.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\categoryControllers\CategoryMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\questionControllers\questionToUser.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\auth\Authenticator.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	Authenticator::check_login();
	$body = $_POST['body'];
	$qustionId=$_POST['question_id'];
	$question_username=$_POST['question_username'];
	//echo'..........';
	//$objArr = UserMapper::selectObjectAsArray($_SESSION['id'], 'id');
	$admin = unserialize($_SESSION['admin']);
	//print_r($admin);
	// Instantiate UserToQuestion class and call addQuestion method
	$answer = $admin->AdminToAnswer->addAnswer($qustionId,$_SESSION['username'],$body);
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
											<h4 class="widget-title">Categories</h4>
											<ul class="naves">
											<?php
													$categories = CategoryMapper::selectall();
													foreach ($categories as $category) {
														echo '<li><a href="subcategories.php?adminOrNot=1&categoryId='.intval($category['id']).'">'.$category['name'].'</a></li>';
													}
												 ?>											
											</ul>
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6">
									<div class="loadMore">
										<?php
										if (isset($_GET['function']) && $_GET['function'] == 'deleteQuestion') {
											$admin = unserialize($_SESSION['admin']);
											$admin->AdminToQuestions->deleteQuestion($_GET['id']);
										}
										require_once 'get_reacts_handelling.php'; 
										questionToUser::showOneQuestionToAdmin($_GET['id']);
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