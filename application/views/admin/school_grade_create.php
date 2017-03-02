<!DOCTYPE >
<html  >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view('admin/inc/head') ?>
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/magnific-popup/magnific-popup.css">
    <!-- multiselect, tagging -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/select2/select2.css">
    <!-- main stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" media="screen">
    <!-- date range picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <style>
        .img-grid2 li {
            width: 50%;
        }
        .panel-primary {
            border-color: #428bca !important; ;
        }
        #room_list .panel {
            border:  1px solid #d0d0d0;
        }
        #room_list .col-lg-4 {
            margin: 0 0 10px 0 ;
        }
    </style>
</head>
<body class="side_nav_hover theme_b">
<!-- top bar -->
<?php $this->load->view('admin/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <form data-parsley-validate method="post">
        <div class="page_bar clearfix">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="page_title"> <?= $result->id ? "Edit " : "Create" ?> <?= ucfirst($this->controller) ?>  </h1>
                    <p class="text-muted"> </p>
                </div>
                <div class="col-md-4 ">
                    <div class="progress" id="upload_progress" >
                        <div class="progress-bar"  role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="<?= base_url() ?>admin">Dashboard</a></li>
                <li class="sep">\</li>
                <li><a href="<?= base_url() ?>admin/<?= $this->controller ?>"> <?= ucfirst($this->controller) ?> </a></li>
                <li class="sep">\</li>
                <li><a href="<?= base_url() ?>admin/<?= $this->controller ?>/grade"> Grade </a></li>
                <li class="sep">\</li>
                <li >Create</li>
            </ul>
        </nav>
        <div class="page_content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <?php
                                $error = isset($error) ? $error : $this->session->flashdata('error');
                                $valid = $this->session->flashdata('valid');
                                if (isset($valid)) $error = $valid;
                                if (isset($error)) { ?>
                                    <div
                                        class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                        <?= $error ?>
                                    </div>
                                <?php }  ?>

                                <div class="tabbable ">
                                    <div class="tab-content">
                                        <div id="prod_tab_general" class="tab-pane active">
                                            <div class="row" >
                                                <div class="col-lg-6">
                                                    <div class="form-group" >
                                                        <label for="name">Grade Name </label>
                                                        <input type="text" id="name" name="form[title]"
                                                               value="<?= $result->title ?>"
                                                               class="form-control" >
                                                    </div>
                                                    <div class="form-group" >
                                                        <label for="name">Grade Code </label>
                                                        <div class="input-group" >
                                                            <input type="text" id="name" name="form[code]"
                                                                   value="<?= $result->code ?>"
                                                                   class="form-control" >
                                                            <span class="input-group-addon" onclick="Code.getCode($(this))" > <i class="fa fa-refresh" ></i> </span>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="school" >School</label>
                                                        <select class="form-control" id="school"   name="form[school_id]"   >
                                                            <option> --Select School-- </option>
                                                            <?php foreach ($schools as $con ): ?>
                                                                <option value="<?= $con->id ?>" <?= $con->id == $result->school_id ? 'selected':'' ?>  > <?=$con->title ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix" ></div>
                                <div class="form-sep">
                                    <button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- side navigation -->
    <?php $this->load->view('admin/inc/nav') ?>
    <!-- right slidebar -->
    <div id="slidebar">
        <div id="slidebar_content">
        </div>
    </div>
</div>
<?php $this->load->view('admin/inc/foot') ?>

<!-- multiselect, tagging -->
<script src="<?= base_url() ?>assets/lib/select2/select2.min.js"></script>
<script>
    $(function () {
          select_tag.set_default('#school');
    }) ,
    select_tag = {
        set_default: function (selector) {
            $(selector).select2({
                allowClear: true,
                placeholder: "Select..."
            });
        }
    },Code = {
        getCode :function (self) {
            self.find(".fa-refresh").addClass("fa-spin");
            $.ajax({
                url : API.Grade.code ,
                success : function (json) {
                    self.find(".fa-refresh").removeClass("fa-spin");
                    self.closest('div').find('input').val(json['code']);
                }
            })
        }
    }
</script>
</body>
</html>


