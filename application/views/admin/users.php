<div class="container-fluid">
<div class="jumbotron text-center">
	<h1 class="text-center" style="font-weight: bold; font-family: lucida handwriting; color: #ff902c">{ users management }</h1>
	<a href="<?php echo base_url('Admin'); ?>" class="btn btn-info btn-lg">Return to Home</a>
</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="text-center" style="font-weight: bold; font-family: lucida handwriting; color: green;">recent essays</h4>
				</div>
				<div class="panel-body">
					<marquee direction="up" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
					<?php foreach($essays as $essay) : ?>
						<h5 style="font-weight: bold; color: #933;"><?php echo $essay->title; ?> | by <span class="badge">Saddam Khan</span> on <code><?php echo date('d M Y', strtotime($essay->date_created)); ?></code></h5>
						<p class="text-muted">
						<?php echo $essay->content; ?><a href="#">read more...</a>
						</p><hr>
					<?php endforeach; ?>
					</marquee>
				</div>
				<div class="panel-footer text-right">
					<small>recent essays written by users, you can read them and modify them if you want !</small>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>S No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $serial = 1; foreach($users as $user): ?>
					<tr>
						<td><?php echo $serial; ?></td>
						<td><?php echo $user->name; ?></td>
						<td><?php echo $user->email; ?></td>
						<td>
						<a href="<?php echo base_url(); ?>Admin/edit/<?php echo $user->id; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="<?php echo base_url(); ?>Admin/delete/<?php echo $user->id; ?>" class="btn btn-danger btn-xs" onclick="javascript: return confirm('Are you sure to delete ?');"><span class="glyphicon glyphicon-remove"></span></a>
						<a href="<?php echo base_url(); ?>Admin/get_single/<?php echo $user->id; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>