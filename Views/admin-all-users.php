<?php
require_once 'assests/admin-all-users-header.php';
require_once '../Controllers/UserControllers/userMapper.php';
require_once '../Controllers/adminControllers/adminToUsers.php'?>
<tbody>
	<?php
		$users = UserMapper::selectAllUsers();
		for ($i=0; $i < count($users); $i++) { 
			echo '<tr>';
			echo '<td>'.$users[$i]['id'].'</td>';
			echo '<td><h5 class="font-medium mb-0">'.$users[$i]['fullName'].'</h5>';
			echo '<span class="text-muted">'.$users[$i]['country'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['username'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['email'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['reputations'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['numQuestions'].'</span></td>';
			echo '<td><span class="text-muted">'.$users[$i]['numberOfReports'].'</span></td>';
			echo '<td><a href="admin-all-users.php?function=deleteUser&userId='.$users[$i]['id'].'"><button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i></button></a></td>';

		}
		if (isset($_GET['function'])) {
			# I'll put this
		}
	 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</section>
<?php require_once 'assests/footer-all-users.php' ?>