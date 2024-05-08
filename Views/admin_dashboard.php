<?php require_once 'assests/admin-header-few-differences.php';
require_once '../Controllers/categoryControllers/CategoryMapper.php';
require_once '../Controllers/subcategoryControllers/SubCategoryMapper.php';
require_once '../Controllers/questionControllers/questionMapper.php';
require_once '../Controllers/UserControllers/userMapper.php';
require_once '../Controllers/adminControllers/adminPrintFormat.php';
require_once '../Models/Admin.php';
if (/* isset($_SESSION['adminId']) */true) { // Assuming this condition is for admin session check
    // Initialize admin object (replace this with your admin retrieval logic if needed)
    $admin = new Admin('admin', 'admin', 'admin');
    
    if (isset($_GET['function']) && isset($_GET['username']) && isset($_GET['name']) && isset($_GET['description'])) {
        // Get the value of the 'function' parameter
        $functionToExecute = $_GET['function'];

        if ($functionToExecute == 'approveCategory') {
            $admin->AdminToCategory->addCategory($_GET['name'], $_GET['description']);
			$admin->AdminToCategory->discardCategory($_GET['username']);
        } elseif ($functionToExecute == 'discardCategory') {
            $admin->AdminToCategory->discardCategory($_GET['username']);
        }
    }
}
?>	
	
		<section>

			<div class="gap gray-bg">
				<div class="container-fluid">
				<h3 style="color: black; font-weight: bold; width:fit-content; text-align:center; margin:auto; border-color:#088dcd !important;" class="border-bottom mb-3 pb-2">Here's your dashboard!</h3>
					<div class="row">
						<div class="col-lg-12">
							<div class="row widget-page">
								<div class="col-lg-2 col-sm-6">
									<aside class="sidebar">
										<div class="widget"> <!-- Done (categories) -->
											<h4 class="widget-title">Categories</h4>
											<ul class="naves">
												<?php
													$categories = CategoryMapper::selectall();
													foreach ($categories as $category) {
														echo '<li><a href="subcategories.php?adminOrNot=1&categoryId='.intval($category['id']).'">'.$category['name'].'</a></li>';
													}
												 ?>
											</ul>
										</div>
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-4 col-sm-6">
									<aside class="sidebar">
										
										<div class="widget"> <!--Done (statitics) -->
											<h4 class="widget-title">Statistics</h4>
											<?php $numQuestions = count(QuestionMapper::selectAllQuestions());
												  $numCategories = count(CategoryMapper::selectall());
												  $numUsers = count(UserMapper::selectAllUsers());
												  $numAnswers = 10; # will be replaced by sara function
												  $numPrivilegedUsers = count(UserMapper::selectPrivilegedUsers()); # function
												  $numSubcategories = count(SubCategoryMapper::selectall());
											 ?>
											<ul class="recent-photos">
												<div class="one d-flex justify-content-center">
												<li>
													<div class="numThing border-bottom">
														<h6 style="font-weight:bold; text-align:center">Questions</h6>
														<h6 style="font-weight:bold; text-align:center; color:#088dcd"><?php echo $numQuestions ?></h6>
													</div>
												</li>
												<li>
													<div class="numThing border-bottom">
														<h6 style="font-weight:bold; text-align:center">Answers</h6>
														<h6 style="font-weight:bold; text-align:center;color:#088dcd"><?php echo $numAnswers ?></h6>
													</div>
												</li>
												<li>
													<div class="numThing border-bottom">
														<h6 style="font-weight:bold; text-align:center">Categories</h6>
														<h6 style="font-weight:bold; text-align:center;color:#088dcd"><?php echo $numCategories ?></h6>
													</div>
												</li>
												</div>
												<div class="one d-flex justify-content-center mt-3">
												<li class="">
													<div class="numThing border-bottom">
														<h6 style="font-weight:bold; text-align:center">Users</h6>
														<h6 style="font-weight:bold; text-align:center;color:#088dcd"><?php echo $numUsers ?></h6>
													</div>
												</li>
												<li>
													<div class="numThing border-bottom">
														<h6 style="font-weight:bold; text-align:center">P.Users</h6>
														<h6 style="font-weight:bold; text-align:center;color:#088dcd"><?php echo $numPrivilegedUsers ?></h6>
													</div>
												</li>
												<li>
												<div class="numThing border-bottom">
														<h6 style="font-weight:bold; text-align:center">Subcategories</h6>
														<h6 style="font-weight:bold; text-align:center;color:#088dcd"><?php echo $numSubcategories ?></h6>
													</div>
												</li>
												</div>
											</ul>
										</div><!-- recent videos-->
										<div class="widget" style="height:400px;overflow-y:scroll"> <!-- Recommended Categories -->
											<h4 class="widget-title">Recommended Categories</h4>
											<ul class="short-profile">
												<!-- <li>
													<div class="reco-cat-data-and-icons d-flex justify-content-between">
														<div class="reco-cat-data">
															<span>Cyber security</span>
															<small style="color:#088dcd" >Ayaragab</small>
															<p>Docker is an important tool in DevOps that every developer should know about!</p>
														</div>
														<div class="icons-reco d-flex justify-content-between">
															<a class=" pe-1 pl-1 pb-1 pt-1 " style="height:fit-content; text-align:center" href="approve-or-discard-execute.php?function=approve_category&username=<?php # $user['username'] ?>"> Approve <i class="fa-solid fa-check" style="font-size:1.1rem"></i> </a>
															<a  class=" pe-2 pl-2 pb-1 pt-1" style="height:fit-content; text-align:center" href="approve-or-discard-execute.php?function=discard_category&username=<?php # $user['username'] ?>"> Discard <i class="fa-solid fa-x" style="font-size:1.1rem"></i> </a>
														</div>
													</div>
												</li> -->
													<?php adminPrintFormat::viewRecommendedCategories() ?>					
											</ul>
										</div>
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-3 col-sm-6">
									<aside class="sidebar">
										<div class="widget friend-list">
										<h4 class="widget-title">Privileged Users</h4>
										<div id="searchDir"></div>
										<ul id="people-list" class="friendz-list">
											<?php adminPrintFormat::viewAllPrivilegedUsers(); ?>
										</ul>
									</div><!-- friends list sidebar -->
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-3 col-sm-6">
									<aside class="sidebar">
									<div class="widget">
											<h4 class="widget-title">Recently registered users</h4>
											<ul id="people-list" class="friendz-list">
											<?php adminPrintFormat::viewLastRegisteredUsers(); ?>
										</ul>
										</div><!-- who's following --
									</aside>
								</div><!-- sidebar -->
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</section>
<?php require_once 'assests/footer.php'; ?>	
