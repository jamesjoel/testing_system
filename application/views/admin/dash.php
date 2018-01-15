<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/admin.css') ?>">
</head>
<body>
<div id="header">
	<div id="inside-header">
		<h2>Administrator Login</h2>
		<ul>
			<li><a href="<?php echo site_url('admin/dash') ?>">Dashborad</a></li>
			<li><a href="<?php echo site_url('admin/add_que') ?>">Add Question</a></li>
			<li><a href="<?php echo site_url('admin/logout') ?>">Logout</a></li>
		</ul>
	</div>
</div>
<div id="content">
	<div id="inside-content">
		<div id="login-box" style="width: 800px !important; padding: 15px;">
			<h2>Welcome Admin</h2>
			<table id="tab" align="center">
				<tr>
					<th>S.No.</th>
					<th>Full Name</th>
					<th>Username</th>
				</tr>
				<?php
				$n=1;
				foreach($user->result_array() as $row)
				{
					
				 ?>
					<tr>
						<td><?php echo $n;?></td>
						<td><?php echo $row['full_name'];?></td>
						<td><?php echo $row['username'];?></td>
					</tr>
				<?php
				$n++;
				}
				?>
			</table>
		</div>
	</div>
</div>
</body>
</html>