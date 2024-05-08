<?php
session_start();
require_once 'assests/header.php';
require_once '../Controllers/questionControllers/questionToUser.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
// require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
?>		<section>
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
														// echo '<li><a href="subcategories.php?categoryId=' . $category['id'] . '">' . $category['name'] . '</a></li>';
														echo '<li><a href="landing.php">' . $category['name'] . '</a></li>';
													}
												}
												?>											
											</ul>
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