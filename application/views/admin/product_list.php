<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/inc/head') ?>
    <link rel="stylesheet"
          href="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
</head>
<body class="side_nav_hover theme_b">
<!-- top bar -->
<?php $this->load->view('admin/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_bar clearfix">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page_title">  <?= ucfirst($this->controller) ?>  </h1>
                <p class="text-muted"> </p>
            </div>
            <div class="col-md-4 text-right">
                <a href="<?= base_url() ?>admin/<?= $this->controller ?>/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create </a>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="<?= base_url() ?>admin">Dashboard</a></li>
            <li class="sep">\</li>
            <li ><?= ucfirst($this->controller) ?></li>
        </ul>
    </nav>
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body table-responsive">
                            <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th> 
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (is_array($records)) foreach ($records as $k => $row): ?>
                                    <tr>
                                        <td><?= $k + 1 ?></td>
                                        <td>
                                            <img src="<?= base_url() . "uploads/thumbs/" . $row->image ?>" class="thumbnail img-responsive" style="height: 75px">
                                        </td>
                                        <td><?= $row->title ?></td>
                                        <td>
                                            <a class=" btn btn-info ion-compose "
                                               href="<?= current_url() ?>/updateStock/<?= $row->id ?>"> Update Qty </a>
                                            <a class=" btn btn-warning ion-compose "
                                               href="<?= current_url() ?>/edit/<?= $row->id ?>">edit</a>

                                            <a class=" btn btn-danger fa fa-times " onclick="row.remove($(this))"
                                               data-id="<?= $row->id ?>"> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- side navigation -->
    <?php $this->load->view('admin/inc/nav') ?>
    <!-- right slidebar -->
    <div id="slidebar">
        <div id="slidebar_content">
        </div>
    </div>
</div>

<?php $this->load->view('admin/inc/foot') ?>
<!-- datatables -->
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<!-- datatables functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>
<script>
    row = {
        remove: function (self) {
            if (confirm("Are You Sure Do your can to delete this record ???  ")) {
                $.ajax({
                    url: URL.base +CONTROLLER + "/remove/" + self.data('id'),
                    dataType: "json",
                    success: function (json) {
                        if (json['result'])
                            self.closest('tr').remove();
                        else
                            alert("Unable to delete Record !!!")
                    }
                });
            }
        }
    }
</script>


</body>


</html>