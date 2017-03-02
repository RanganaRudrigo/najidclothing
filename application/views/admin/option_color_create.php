<!DOCTYPE >
<html  >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view('admin/inc/head') ?>
    <!-- color picker --> 
    <link href="<?= base_url('assets/lib/colorpicker/css/bootstrap-colorpicker.min.css') ?>" rel="stylesheet">
    <!-- main stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" media="screen">

    <style>
        .colorpicker-2x .colorpicker-saturation {
            width: 200px;
            height: 200px;
        }

        .colorpicker-2x .colorpicker-hue,
        .colorpicker-2x .colorpicker-alpha {
            width: 30px;
            height: 200px;
        }

        .colorpicker-2x .colorpicker-color,
        .colorpicker-2x .colorpicker-color div {
            height: 30px;
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
                    <h1 class="page_title"> <?= $result->id ? "Edit " : "Create" ?> <?= ucfirst($this->controller) ?> - <?= ucfirst($this->method) ?>  </h1>
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
                <li><a href="<?= base_url() ?>admin/<?= $this->controller ?>/<?= $this->method ?>"> <?= ucfirst($this->method) ?> </a></li>
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
                                                        <?= form_hidden("form[option_id]",2) ?>
                                                        <label for="name"> <?= ucfirst($this->method) ?>  </label>
                                                        <input type="text" id="name" name="form[title]"
                                                               value="<?= $result->title ?>"
                                                               class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" >
                                                    <label>  Color Image </label>
                                                    <input   type="text"  name="form[image]"  class="form-control" value="<?= $result->image ?>" />
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
<script src="<?=base_url('assets/lib/colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script>
    $(function() {
        $('input[name="form[image]"]').colorpicker({
            customClass: 'colorpicker-2x',
            sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            }
        });
    });
</script>
</body>
</html>


