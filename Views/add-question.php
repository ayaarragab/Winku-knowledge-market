<?php
session_start();
if (!isset($_SESSION['username'])) {
	// Redirect user to landing page if not logged in
	return header('Location: landing.php');
}
require_once '../Controllers/categoryControllers/CategoryMapper.php';
include_once('assests/header.php');
require_once '../Controllers/UserControllers/userMapper.php';
require_once '../Models/User.php';
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Controllers\associativeClasses\subcategoryUser\SubCategoryUsersMapper.php';
// $user=unserialize($_SESSION['user']);
if ($_SESSION['id'] !== '') {
	$objArr = UserMapper::selectObjectAsArray($_SESSION['id'], 'id');
	$user = new User($objArr[0]['fullName'], $objArr[0]['username'], $objArr[0]['gender'], $objArr[0]['email'], $objArr[0]['password']);
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $tags = $_POST['tags'];
		$subcategoryId = intval($_POST['subcategoryId']);
        // Instantiate UserToQuestion class and call addQuestion method
		$question =$user->userToQuestion->addQuestion($objArr[0]['username'], $title, $body, $tags, $subcategoryId);
        }
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
											<?php require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\followed_categories_or_all_categories.php' ?>											
										</div><!-- Shortcuts -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6 ask">
                                    <h3 style="color: black; font-weight: bold;" >Ask a question</h3>
									<div class="central-meta">
										<div class="new-postbox">
											<div class="newpst-input">
												<form action="" method="POST">
                                                    <h5 style="color: black; font-weight: bold;" >Write the question title</h5>
													<textarea name="title" rows="1" style="font-size: large;" placeholder="e.g. What are the princiles of industry today?"></textarea>
                                                    <h5 style="color: black; font-weight: bold;" >Write the question body</h5>
													<textarea  name="body" rows="4" style="font-size: large;" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt molestiae temporibus, earum nihil dolorum odio illo. Blanditiis eligendi ipsum quam sequi corrupti, est expedita explicabo aliquam, porro qui repudiandae minus."></textarea>
													<div class="attachments">
														<ul>
															<li>
																<i class="fa fa-image"></i>
																<label class="fileContainer">
																	<input type="file">
																</label>
															</li>
														</ul>
													</div>
													<h5 style="color: black; font-weight: bold;" >Tags</h5>
													<textarea name="tags" rows="1" style="font-size: large;" placeholder="e.g. #web #python #oop"></textarea>
													<h5 style="color: black; font-weight: bold;">Select Subcategory</h5>
													<select name="subcategoryId">
													<?php
													$subcategories = SubCategoryUsersMapper::getUserJoinedSubategories($_SESSION['id']);
                                                    if ($subcategories) {
                                                        foreach ($subcategories as $subcategory) {
                                                            if ($subcategory['subcategoryId'] == $question['subcategoryId']) {
                                                                echo '<option value=' . $subcategory['id'] . '" selected>' . $subcategory['name'] . '</option>';
                                                                continue;
                                                            }
                                                            echo '<option value=' . $subcategory['id'] . '">' . $subcategory['name'] . '</option>';
                                                        }      
                                                        echo '<option value="">Not to specific subcategory</option>';                                             
                                                    }
                                                    else{
                                                        echo '<option value="" selected>Not to specific subcategory</option>';
                                                    }
														?>	
													</select>
                                                    <button style="border-radius: 10px;" name="submit" class="mt-4" type="submit">Ask</button>
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