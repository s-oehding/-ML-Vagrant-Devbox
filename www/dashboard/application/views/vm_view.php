<?php include('_partials/header.php'); ?>

<div class="container-fluid">
  <div class="col-sm-12 col-md-6 wrap">
    <div class="panel panel-default">
      <div class="panel-heading">
      <h2 class="panel-title">Server Load</h2>
      </div>
      <div class="panel-body">
        <h3>Cpu</h3>
        <span class="label label-default">User</span>
        <div class="progress">
          <div id="cpu-load-user" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span></span>
          </div>
        </div>
        <span class="label label-default">Nice</span>
        <div class="progress">
          <div id="cpu-load-nice" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span></span>
          </div>
        </div>
        <span class="label label-default">System</span>
        <div class="progress">
          <div id="cpu-load-sys" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span></span>
          </div>
        </div>
        <span class="label label-default">Idle</span>
        <div class="progress">
          <div id="cpu-load-idle" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span></span>
          </div>
        </div>
        <hr>
        <h3>Ram</h3>
        <div class="progress">
          <div id="memory-load" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span></span>
          </div>
        </div>
      </div>
      <div class="panel-footer">
      </div>
    </div>
    <pre>
      <div id="cpu-chart" style="height: 250px;"></div>
    </pre>
  </div>
</div>

<script type="text/javascript" src="/static/js/vm.js"></script>
<?php include('_partials/footer.php'); ?>
