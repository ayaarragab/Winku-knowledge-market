<?php require_once 'assests/admin-header-few-differences.php'; 
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
													$categories = CategoryMapper::selectall();
													foreach ($categories as $category) {
														echo '<li><a href="subcategories.php?adminOrNot=1&categoryId='.intval($category['id']).'">'.$category['name'].'</a></li>';
													}
												 ?>													
											</ul>
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
													foreach ($subcategories as $subcategory) {
														echo '<option value=' . $subcategory['id'] . '">' . $subcategory['name'] . '</option>';
													}
														?>	
														<!-- <option value="1">Normal Question</option>
														<option value="2">Mobile App Development</option>
														<option value="3">Web Development</option> -->
														<!-- Add more options for other subcategories -->
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