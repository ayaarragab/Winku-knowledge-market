<?php session_start();
session_unset();
session_destroy();
require_once 'assests/header.php';
?>
	<section>
		<div class="gap100 gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="logout-meta">
							<h2>logged out</h2>
							<p>
								Please <a href="landing.php" title="">Login</a> or <a href="landing.php" title="">Register</a> now to create your own profile and have access to all the Winku awesome features!
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>

<?php require_once 'assests/footer.php'; ?>