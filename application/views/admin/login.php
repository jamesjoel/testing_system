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
	</div>
</div>
<div id="content">
	<div id="inside-content">
		<div id="login-box">
			<form action="" method="post">
				<Hr />
				<table align="center">
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" class="input" placeholder="Username/Email"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="Password" name="password" class="input" placeholder="Password"></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="submit" value="Login" class="btn">
						</td>
					</tr>
				</table>
				<?php
				echo $this->session->flashdata("msg");
				?>
			</form>
		</div>
	</div>
</div>
</body>
</html>