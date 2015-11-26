<?php include('_partials/header.php'); ?>

<div class="container-fluid">
  <div class="col-sm-12 wrap">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">Database stuff</h2>
			</div>
			<div class="panel-body">
	    <table class="table table-responsive table-striped table-hover">
	      <tr>
	        <td>MySQL is installed</td>
	        <td><i class="fa fa-<?php echo ($mysql_exists ? 'check success' : 'times danger'); ?>"></i></td>
	      </tr>
	      <tr>
	        <td>MySQL status</td>
	        <td><i class="fa fa-<?php echo ($mysql_running ? 'check success' : 'times danger'); ?>"></i></td>
	      </tr>
	      <tr>
	      <td>MySQLi status</td>
	        <td><i class="fa fa-<?php echo ($mysqli_running ? 'check success' : 'times danger'); ?>"></i></td>
	      </tr>
	      <tr>
	      <td>PDO status</td>
	        <td><i class="fa fa-<?php echo ($pdo_running ? 'check success' : 'times danger'); ?>"></i></td>
	      </tr>
	      <tr>
	        <td>MySQL Version</td>
	        <td><?php echo ($mysql_running ? $mysql_version : 'N/A'); ?></td>
	      </tr>
	    </table>
		</div>
		<div class="panel-footer">
		</div>
  </div>
</div>

<?php include('_partials/footer.php'); ?>
