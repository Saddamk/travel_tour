<style type="text/css">
	#recent:hover{
		box-shadow: 2px 3px 9px #000;
	}
	ul li a{
		color: #922;
		font-weight: bold;
	}
	ul li a:hover{
		text-transform: uppercase;
	}
</style>
<div class="navbar navbar-default">
	<div class="container">
		<ul class="nav navbar-nav navbar-right">
		<li><a href="#">home - <span class="glyphicon glyphicon-home"></span></a></li>
		<li><a href="#">write - <span class="glyphicon glyphicon-text-background"></span></a></li>
		<li><a href="#">search - <span class="glyphicon glyphicon-search"></span></a></li>
		<li><a href="<?php echo base_url('Admin/all_users'); ?>">users - <span class="glyphicon glyphicon-user"></span></a></li>
		<li><a href="<?php echo base_url('Login/logout'); ?>">logout - <span class="glyphicon glyphicon-log-out"></span></a></li>
	</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<h2 class="text-primary" style="font-weight: bold;">welcome to dashboard !</h2>
		</div>
		<div class="col-md-3">
		<label>search what you're looking for !</label>
			<form action="<?php echo base_url('Admin/search'); ?>" method="post" class="form-inline">
				<input type="text" name="query" class="form-control" placeholder="Search essays..." required="required">
				<button type="submit" class="btn btn-default">GO!</button>
			</form>
		</div>
	</div><hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<?php if($success = $this->session->flashdata('success')) : ?>
			<div class="alert alert-success">
				<strong><?php echo $success; ?></strong>
			</div>
		<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
		<h2 class="text-primary" style="font-weight: bold;">write essay</h2><hr>
			<form action="<?php echo base_url('Admin/create'); ?>" method="post" class="form-vertical">
			<input type="hidden" name="user_id" value="<?php $this->session->userdata('user_id'); ?>">
				<div class="form-group">
					<label for="title">essay title</label>
					<input type="text" name="title" class="form-control" placeholder="Enter Essay title here..." required>
				</div>
				<div class="form-group">
					<label for="content">essay content</label>
					<textarea name="content" class="form-control" placeholder="Start typing your essay here..." rows="15" required></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Save Essay">
				</div>
			</form>
		</div>
		<div class="col-md-5">
		<h2 class="text-primary" style="font-weight: bold;">recent by users</h2><hr>
			<div class="panel panel-default" id="recent">
			<div class="panel-heading text-right text-primary" style="font-weight: bold; font-size: 15px;"><a href="<?php echo base_url('Admin/see_all'); ?>">see all essays</a></div>
			<div class="panel-body">
				<marquee direction="up" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
						<?php foreach($essays as $essay) : ?>
							<h5 class="text-danger" style="font-weight: bold;"><?php echo $essay->title; ?> |  by <span class="badge badge-xs">Saddam Khan</span> on <code><?php echo date('d M Y', strtotime($essay->date_created)); ?></code></h5><hr>
							<p class="text-muted">
								<?php echo $essay->content; ?>
							</p>
						<?php endforeach; ?>
					</marquee>
				</div>
			</div>
		</div>
	</div>
</div>