<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5 style="m-0"><?php echo $user[0]['username']; ?></h5>
                  <h6><?php echo $user[0]['professionalTitle']; ?></h6>
								</li>
								<li>
									<a class="active" href="<?php echo'userProfile.php?id='.$user[0]['id'];?>" title="" data-ripple="">Questions</a>
									<a class="" href="user-answers.php?id=<?php echo $user[0]['id']?>" title="" data-ripple="">Answers</a>
									<?php 
									if($_SESSION['id']==$_GET['id']){?>
									<a class="" href="user-bookmarked-questions.php?id=<?php echo $user[0]['id']?>" title="" data-ripple="">Bookmarked</a>
									<?php }else{?>
									<a class="" href="user-bookmarked-questions.php?id=<?php echo $user[0]['id']?>" title="" data-ripple="">Bookmarked</a>
									<?php }?>
									<a class="" href="user-followers.php?id=<?php echo $user[0]['id']?>" title="" data-ripple="">Followers</a>
									<a class="" href="user-followings.php?id=<?php echo $user[0]['id']?>" title="" data-ripple="">Followings</a>
									<a class="" href="#" title="" data-ripple="">Reputations</a>
									<a class="" href="user-badges.php?id=<?php echo $user[0]['id']?>" title="" data-ripple="">badges</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>