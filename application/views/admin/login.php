<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	small{
		color: red;
		font-weight: bold;
	}
</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<title><?php echo $title; ?></title>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center text-primary" style="font-weight: bold; font-family: lucida handwriting; color: #ff880c;">{ login to write }</h1>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4 class="text-center" style="font-weight: bold; font-family: lucida handwriting;">{ login with your credentials }</h4>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url('Login/admin_login'); ?>" method="post">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Email:</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<input type="text" name="email" class="form-control" required value="<?php echo set_value('email'); ?>">
										<small><?php echo form_error('email'); ?></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Password:</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<input type="password" name="password" class="form-control" required>
										<small><?php echo form_error('password'); ?></small>
									</div>
									<div class="form-group">
										<input type="submit" name="submit" class="btn btn-primary" value="Sign In"> |
										<a href="<?php echo base_url('login/signup'); ?>">New user? Register here</a>
									</div>
								</div>
							</div>
						</form>
						<?php if($error = $this->session->flashdata('login_failed')): ?>
							<div class="alert alert-danger text-center">
								<?php echo $error; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="panel-footer">
						<p class="text-right">&copy; <?php echo date('Y'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>