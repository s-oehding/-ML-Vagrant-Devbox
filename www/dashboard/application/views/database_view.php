<?php include('_partials/header.php'); ?>

<div class="container-fluid">
    <div class="col-sm-12 wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Database status</h2>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-striped table-hover">
                    <tr>
                        <td>MySQL is installed</td>
                        <td>
                            <i class="fa alert fa-<?php echo($mysql_exists ? 'check alert-success' : 'times alert-danger'); ?>"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>MySQL status</td>
                        <td>
                            <i class="fa alert fa-<?php echo($mysql_running ? 'check alert-success' : 'times alert-danger'); ?>"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>MySQLi status</td>
                        <td>
                            <i class="fa alert fa-<?php echo($mysqli_running ? 'check alert-success' : 'times alert-danger'); ?>"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>PDO status</td>
                        <td>
                            <i class="fa alert fa-<?php echo($pdo_running ? 'check alert-success' : 'times alert-danger'); ?>"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>MySQL Version</td>
                        <td><h5>
              <span class="label label-<?php echo($mysqli_running ? 'check alert-success' : 'times alert-danger'); ?>">
                <?php echo($mysql_running ? $mysql_version : 'N/A'); ?>
              </span>
                            </h5>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>

    <?php include('_partials/footer.php'); ?>
