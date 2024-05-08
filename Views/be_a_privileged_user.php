<?php 
session_start();
include_once('assests/header.php'); 
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\categoryUser\categoryusersMapper.php';
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
											<ul class="naves">
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
								<div class="col-lg-6 ask">
                                    <h3 style="color: black; font-weight: bold;" >Be a privileged User!</h3>
									<div class="central-meta">
										<div class="new-postbox">
											<div class="newpst-input">
												<form action="" method="POST">
                                                    <h5 style="color: black; font-weight: bold;" >Please write your professional email:</h5>
													<textarea  name="body" rows="1" style="font-size: large;" placeholder="JSmith@google.com"></textarea>
                                                    <button style="border-radius: 10px;" name="submit" class="mt-4" type="submit">Verify</button>
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
include('assests/footer.php')
?>