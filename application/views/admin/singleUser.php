<div class="container-fluid">
<div class="jumbotron">
	<h1 class="text-center" style="font-weight: bold; font-family: lucida handwriting; color: #890f3c;">user's detailed info</h1>
</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="text-center" style="font-weight: bold; font-family: lucida handwriting; color: #890f3c;">user's info</h3>
				</div>
				<div class="panel-body">
					<?php foreach($single as $user): ?>
						<div class="row">
							<div class="col-md-4">
								<label>Full Name</label>
							</div>
							<div class="col-md-8">
								<p><?php echo $user->name; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Username</label>
							</div>
							<div class="col-md-8">
								<p><?php echo $user->username; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Email</label>
							</div>
							<div class="col-md-8">
								<a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Date Joined</label>
							</div>
							<div class="col-md-8">
								<p><?php echo date('M d, Y', strtotime($user->join_date)); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="panel-footer text-right">
					<a href="<?php echo base_url('Admin/all_users'); ?>" class="btn btn-info">Back to Home</a>
				</div>
			</div>
		</div>
	</div>
</div>