<?php
session_start();
if (!isset($_SESSION['username'])) {
	// Redirect user to landing page if not logged in
	return header('Location: landing.php');
}
include_once('assests/header.php');
require_once '../Controllers/UserControllers/UserToSubcategory.php';
require_once '../Controllers/UserControllers/userMapper.php';
require_once '../Models/User.php';
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
											<?php require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\followed_categories_or_all_categories.php' ?>
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6 ask">
                                    <h3 style="color: black; font-weight: bold;" >Create a subcategory!</h3>
									<div class="central-meta">
										<div class="new-postbox">
											<div class="newpst-input">
												<?php
												if (isset($_SESSION['id'])) {
													if (isset($_POST['subcategoryName']) && isset($_POST['categoryName'])) {
														$user = UserMapper::retrieveObject('id', $_SESSION['id']);
														$categoryname=CategoryMapper::selectObjectAsArray($_POST['categoryName'],'name');
														if($categoryname!==false){
														$user->AdminToSubcategory->addSubCategory($_POST['subcategoryName'], $_POST['categoryName'], $_SESSION['username']);
													}else{
														echo 'Category Not Found';
													}
													}
												}
												?>
												<form action="" method="POST">
                                                    <h5 style="color: black; font-weight: bold;" >Please enter subcategory name</h5>
													<textarea name="subcategoryName" rows="1" style="font-size: large;" placeholder="e.g. Laravel"></textarea>
                                                    <h5 style="color: black; font-weight: bold;" >Please enter category name</h5>
													<textarea name="categoryName" rows="1" style="font-size: large;" placeholder="e.g. web development"></textarea>
                                                    <button style="border-radius: 10px;width:fit-content" name="submit" class="mt-4" type="submit">Create subcategory</button>
												</form>
											</div>
										</div>
									</div><!-- add post new box -->
								</div>
								<div class="col-lg-3"></div>
								</div><!-- centerl meta -->
							</div>	
						</div>
					</div>
			</div>
	
	</section>

<?php
include_once('assests/footer.php')
?>