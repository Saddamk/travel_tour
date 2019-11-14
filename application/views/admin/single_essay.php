<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="text-primary">read the essay <br><span ><a href="<?php echo base_url('Admin/see_all'); ?>" class="btn btn-info" style="color: white;">back to essays</a></span></h1><hr>
		</div>
		<div class="col-md-4">
			<h1 class="text-primary"></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h2 class="text-danger"><?php echo $single_ess['title']; ?></h2>
			<p><?php echo $single_ess['content']; ?></p>
			<span class="badge"><?php echo date('D M d, Y', strtotime($single_ess['date_created'])); ?></span>
		</div>
		<div class="col-md-2 text-right"></div>
	</div>
</div>