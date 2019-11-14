<div class="container">
<div class="row">
	<div class="col-md-6">
		<h3 class="text-primary">search results for: <span style="font-weight: bold; background: yellow;"> <?php echo $query; ?></span><br></h3><hr>
		<?php foreach($results as $result): ?> 
			<h4 class="text-primary" style="font-weight: bold;"><?php echo $result->title; ?> | by <span class="badge">Saddam Khan</span> on <code><?php echo date('d M Y', strtotime($result->date_created)); ?></code></h4>
			<p style="border: 2px solid blue; border-radius: 10px; margin: 5px 0 0 4px; padding: 10px;"><?php echo $result->content; ?></p>
		<?php endforeach; ?>
	</div>
	<div class="col-md-6">
		<h3 class="text-right text-primary">see also | <span><a href="<?php echo base_url('Admin'); ?>" class="btn btn-info">Return Home</a></span></h3><hr>
		<div class="panel panel-default">
		<div class="panel-heading text-right"><a href="<?php echo base_url('Admin/see_all'); ?>" style="font-weight: bold; font-size: 15px;">see all essays</a></div>
			<div class="panel-body">
				<marquee direction="up" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
					<?php $essays = $this->Admin_model->get_data('tbl_essays'); ?>
					<?php foreach($essays as $essay) : ?>
					<h5 class="text-primary text-primary" style="font-weight: bold;"><?php echo $essay->title; ?> | by <span class="badge">Saddam Khan</span> On <code><?php echo date('d M Y', strtotime($essay->date_created)); ?></code></h5><hr>
					<p class="text-muted"><?php echo $essay->content; ?></p><hr>
					<?php endforeach; ?>
				</marquee>
			</div>
		</div>
	</div>
</div>
	
</div>