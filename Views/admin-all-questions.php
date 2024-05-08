<?php require_once 'assests/admin-header-few-differences.php'; 
require_once '../Controllers/questionControllers/questionToAdmin.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\categoryControllers\CategoryMapper.php';
?>
<section>
			<div class="gap gray-bg">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row" id="page-contents">
								<div class="col-lg-3">
									<aside class="sidebar static">
                                    <div class="widget admin-cat"> <!-- Done (categories) -->
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
								<div class="col-lg-6">
									<div class="loadMore">
									<h3 style="color: black; font-weight: bold;" >Users Questions</h3>
									<?php questionToAdmin::showAllQuestionsToAdmin() ?>
									</div>
								</div>
								<div class="col-lg-3"></div><!-- centerl meta -->
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</section><?php require_once 'assests/footer.php'; ?>	
