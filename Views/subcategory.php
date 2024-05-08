<?php
session_start();
include_once('assests/header.php');
require_once '../Controllers/questionControllers/questionMapper.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\categoryUser\CategoryusersMapper.php';
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
										<h4 class="widget-title">Followed categories</h4>
										<ul class="naves">
										<?php
												$categories = CategoryusersMapper::getUserFollowedCategories($_SESSION['id']);
												foreach ($categories as $category) {
													echo '<li><a href="subcategories.php?subcategoryId=' . $category['id'] . '">' . $category['name'] . '</a></li>';
												}
												?>	
										</ul>
									</div><!-- Shortcuts -->										
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="loadMore">
									<h3 style="color: black; font-weight: bold;" >Top Questions in <span style="text-decoration: underline;"><?php echo $_GET['subcategoryName'] ?></span></h3>
									<?php QuestionMapper::selectQuestionsBySubcategory($_GET['subcategoryId']) ?>
							</div>
							<div class="col-lg-3"></div>
							</div><!-- centerl meta -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
	
	<section>
		<div class="getquot-baner">
			<span>Want to join our awesome forum and start interacting with others?</span>
			<a href="#" title="">Sign up</a>
		</div>
	</section>
<?php
include('assests/footer.php')
?>