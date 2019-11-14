<div class="container">
	<div class="row">
		<div class="col-md-7 text-primary">
			<h1>All Essays</h1><hr>
		</div>
		<div class="col-md-5 text-right">
			<h1 class="text-right text-primary">see also | <span><a href="<?php echo base_url('Admin'); ?>" class="btn btn-info">Return Home</a></span></h1><hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php foreach($all_essays as $essay) : ?>
				<a href="<?php echo base_url();?>Admin/single_essay/<?php echo $essay->essay_id; ?>"><h3 class="text-primary" style="font-weight: bold;"><?php echo $essay->title; ?></h3></a>
				<p><?php echo substr($essay->content, 0, 100); ?><a href="<?php echo base_url(); ?>/Admin/single_essay/<?php echo $essay->essay_id; ?>">&hellip;read more&hellip;</a></p>
				<small>By: Saddam Khan on <?php echo date('D M d, Y', strtotime($essay->date_created)); ?></small><hr>
			<?php endforeach; ?>
		</div>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>