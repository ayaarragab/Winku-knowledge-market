<?php 
session_start();
include_once('assests/header.php'); 
require_once '..\Controllers\UserControllers\UserToSystem.php';
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
										<?php require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Views\followed_categories_or_all_categories.php' ?>
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
													<input type="email" id="professionalemail" name="professionalemail" >
                                                    <button style="border-radius: 10px;" name="submit" class="mt-4" type="submit">Verify</button>
												</form>
												<?php 
												if(isset($_POST['submit'])){
													$email=Authenticator::checkInput($_POST['professionalemail']);
													if(isset($email)){
														$result= UserToSystem::verifyMyAccount($_POST['professionalemail']);
														if($result)
														{
															echo "You privilege user Now!!";
														}else{
															echo "Sorry you can't be privilege user";
														}

													}
												}	
												
												?>
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