<?php
require_once 'assests/admin-header-few-differences.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\categoryControllers\CategoryMapper.php';
require_once '../Controllers/adminControllers/adminToCategory.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $describtion = $_POST['describtion'];
	$category = new Category($name, 0, 0, 0, $describtion);
	$admin = UserMapper::retrieveObject('id', $_SESSION['id']);
	$admin->AdminToCategory->addCategory($name, $describtion);	
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
											require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\followed_categories_or_all_categories.php';
											 ?>													
											</ul>
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6 ask">
                                    <h3 style="color: black; font-weight: bold;" >Add a category</h3>
									<div class="central-meta">
										<div class="new-postbox">
											<div class="newpst-input">
												<form action="" method="POST">
                                                    <h5 style="color: black; font-weight: bold;" >Please enter the category name</h5>
													<textarea name="name" rows="1" style="font-size: large;" placeholder="e.g. Web development"></textarea>
                                                    <h5 style="color: black; font-weight: bold;" >Please enter the category describtion</h5>
													<textarea  name="describtion" rows="4" style="font-size: large;" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt molestiae temporibus, earum nihil dolorum odio illo. Blanditiis eligendi ipsum quam sequi corrupti, est expedita explicabo aliquam, porro qui repudiandae minus."></textarea>

                                                    <button style="border-radius: 10px;" name="Add" class="mt-4" type="submit">Add</button>
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