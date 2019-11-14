<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title><?php echo $title; ?></title>
	<style type="text/css">
		body{
			padding-top: 40px;
		}
	</style>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo base_url(); ?>">Essays</a>
	</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
		<a href="<?php echo base_url('Login'); ?>" class="btn btn-warning navbar-btn navbar-right">Login / Signup</a>
			<ul class="nav navbar-nav">
				<li><a href="#">home</a></li>
				<li><a href="#">essays</a></li>
				<li><a href="#">downloads</a></li>
				<li><a href="#">about</a></li>
				<li><a href="#">contact</a></li>
				<li></li>
			</ul>
		</div>
	</div>
</div>
