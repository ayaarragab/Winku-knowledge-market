<?php if (isset($_SESSION['id'])) { ?>
					<li id="logout" >
						<a href="logout.php" title="logout" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 0.5px;">
							<i class="ti-power-off"></i>
							<small>logout</small>
						</a>
					</li>
				<?php } else { ?>
					<li>
						<a href="landing.php" title="login" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 0.5px;">
							<small>login</small>
						</a>
					</li>

				<?php } ?>
				<script>
    document.addEventListener('DOMContentLoaded', function () {
        var logoutLi = document.getElementById('logout');
        if (logoutLi) {
            logoutLi.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the default anchor behavior
                window.location.href = 'logout.php';
            });
        }
    });
</script>