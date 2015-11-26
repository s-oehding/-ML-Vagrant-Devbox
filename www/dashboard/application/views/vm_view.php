<?php include('_partials/header.php'); ?>

<div class="container-fluid">
  <div class="col-sm-12 wrap">
    <div class="panel panel-default">
      <div class="panel-heading">
      <h2 class="panel-title">System</h2>
      </div>
      <div class="panel-body">
        <h3>Cpu</h3>
        <div class="progress">
          <div id="cpuUsage" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span></span>
          </div>
        </div>
        <h3>Ram</h3>
        <div class="progress">
          <div id="memoryUsage" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span></span>
          </div>
        </div>
      </div>
      <div class="panel-footer">
      </div>
    </div>
    <pre>

    </pre>
  </div>
</div>

<?php include('_partials/footer.php'); ?>
