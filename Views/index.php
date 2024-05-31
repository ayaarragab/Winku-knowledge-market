<?php
session_start();
require_once 'assests/header.php';
require_once '../Controllers/questionControllers/questionToUser.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\UserControllers\userMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\User.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
if(isset($_SESSION['id'])){
	$user = UserMapper::retrieveObject('id', $_SESSION['id']);
}

if (isset($_GET['function']) && $_GET['function'] == 'deleteQuestion') {
	$user->userToQuestion->deleteQuestion($_GET['id']);
}
elseif (isset($_GET['function']) && $_GET['function'] == 'bookmarkQuestion') {
	$user->userToQuestion->bookmarkQuestion($_GET['id'], $_SESSION['id']);	
}
elseif (isset($_GET['function']) && $_GET['function'] == 'unbookmarkQuestion') {
	$user->userToQuestion->unbookmarkQuestion($_GET['id'], $_SESSION['id']);	
}
elseif (isset($_GET['function']) && $_GET['function'] == 'reportQuestion') {
	$user->userToQuestion->reportQuestion($_GET['id']);	
}
?>		<section>
			<div class="gap gray-bg">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row" id="page-contents">
								<div class="col-lg-3">
									<aside class="sidebar static">
										<div class="widget">
											<?php require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\followed_categories_or_all_categories.php' ?>
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6">
									<div class="loadMore">
									<h3 style="color: black; font-weight: bold;" >Top Questions</h3>
									<?php if (isset($_SESSION['username'])) {
											questionToUser::showAllQuestions($_SESSION['username']);
									}
									else {
										questionToUser::showAllQuestions(false);
									} ?>
									</div>
								</div>
								<div class="col-lg-3"></div><!-- centerl meta -->
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</section>
<?php 
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\bookmarkedQuestions\bookmarkMapper.php';
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a session or some authentication mechanism to identify the user
    
    // Retrieve any data sent via POST request
     $userId= $_POST['userId'];
	 $questionId=$_POST['$questionId'];
	 //userToquestion ممكن يالطريقه دي
	 $user=unserialize($_SESSION['user']);
	 $user=$user->UserToQuestion->bookmarkQuestion($questionId,$userId);
    // Perform necessary validation on the data (e.g., check if required fields are present)
    // Then, perform the bookmarking action (e.g., insert data into the database)
    
    // For demonstration purposes, let's just simulate a successful response
    $response = array('success' => true, 'message' => 'Bookmark added successfully');

    // Convert the response to JSON and send it back
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the request method is not POST, return an error response
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Method Not Allowed'));
}


?>
<?php
include_once('assests/footer.php')
?>