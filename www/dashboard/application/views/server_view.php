<?php include('_partials/header.php'); ?>
<div class="container-fluid">
    <div class="col-sm-12 wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">PHP Extensions</h3>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-striped table-hover">

                    <?php foreach ($phpExtensions as $key => $extension) : ?>
                        <tr class="paginate">
                            <td><?php echo $key ?></td>
                            <td><a class="trigger" name="<?php echo $extension ?>" href="#"><?php echo $extension ?></a>
                            </td>
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
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript" src="/static/js/server.js"></script>
<script type="text/javascript" src="/static/js/simplePaginations.js"></script>
<?php include('_partials/footer.php'); ?>
