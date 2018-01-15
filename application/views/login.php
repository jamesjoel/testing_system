
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet" type="text/css" />

<title>company name</title>

</head>

<body>

<div id="container" align="center">
<div id="header">
<h1>company name</h1>

<?php
$this->load->view('navbar.php');
?>
</div>

<div id="content">
<br><br>
<h3>Login</h3>
	<div id="login-box">
		<h4>Login</h4>
		<form action="" method="post">
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

  
<div id="footer">
Copyright © 2005 | All Rights Reserved  
</div>
</div>

</body>
</html>
