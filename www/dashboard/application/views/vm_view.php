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
                    <div id="cpu-load-user" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                         aria-valuemax="100" style="width: 20%">
                        <span></span>
                    </div>
                </div>
                <span class="label label-default">Nice</span>

                <div class="progress">
                    <div id="cpu-load-nice" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                         aria-valuemax="100" style="width: 20%">
                        <span></span>
                    </div>
                </div>
                <span class="label label-default">System</span>

                <div class="progress">
                    <div id="cpu-load-sys" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                         aria-valuemax="100" style="width: 20%">
                        <span></span>
                    </div>
                </div>
                <span class="label label-default">Idle</span>

                <div class="progress">
                    <div id="cpu-load-idle" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                         aria-valuemax="100" style="width: 20%">
                        <span></span>
                    </div>
                </div>
                <hr>
                <h3>Ram</h3>

                <div class="progress">
                    <div id="memory-load" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                         aria-valuemax="100" style="width: 20%">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>

    </div>
      <div class="col-md-6 wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">System Information</h3>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-striped table-hover">

                    <?php foreach ($systemInfo as $key => $item) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $item ?></td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>
            <div class="panel-footer">
                <div class="text-right">
                    <ul id="page-nav">
                    </ul>
                </div>
            </div>
        </div>
    </div>
      <div class="col-md-6 wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">System Services</h3>
            </div>
            <div class="panel-body">
              <?php foreach ($services as $service) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?php echo $service['name'];?></h4>
                    </div>
                    <div class="panel-body">
                      <table class="table table-responsive table-striped table-hover">
                        <thead>
                          <tr>
                            <th>
                              Port:
                            </th>
                            <th>
                              Status:
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <?php echo $service['port'];?>
                            </td>
                            <td>
                              <div class="label label-<?php echo($service['status'] ? 'success' : 'danger'); ?> text-right"><?php echo($service['status'] ? 'running' : 'error'); ?></div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              <?php endforeach ?>
            </div>
            <div class="panel-footer">
                <div class="text-right">
                    <ul id="page-nav">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/static/js/vm.js"></script>
<?php include('_partials/footer.php'); ?>
