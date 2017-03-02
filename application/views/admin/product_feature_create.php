<!DOCTYPE >
<html  >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view('admin/inc/head') ?>
    <!-- editable elements -->
    <link rel="stylesheet" href="<?=base_url('assets/lib/x-editable/bootstrap3-editable/css/bootstrap-editable.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/lib/x-editable/inputs-ext/address/address.css') ?>">
    <!-- multiselect, tagging -->
    <link rel="stylesheet" href="<?= base_url('assets/lib/select2/select2.css') ?>">
    <!-- main stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" media="screen">

    <style>
        .text-muted{
            font-size: 12px;
            margin: 0;
        }

    </style>
</head>
<body class="side_nav_hover theme_b">
<!-- top bar -->
<?php $this->load->view('admin/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">

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
            </div>
        </div>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="<?= base_url() ?>admin">Dashboard</a></li>
                <li class="sep">\</li>
                <li><a href="<?= base_url() ?>admin/<?= $this->controller ?>"> <?= ucfirst($this->controller) ?> </a></li>
                <li class="sep">\</li>
                <li > <?= ucfirst($this->method) ?> </li>
            </ul>
        </nav>
        <div class="page_content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Create New Feature </div>
                            <div class="panel-body">
                                <form data-parsley-validate method="post">

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

                                    <div class="row" >
                                        <div class="col-lg-6">
                                            <div class="form-group" >
                                                <label for="name"> <?= ucfirst($this->method) ?>  </label>
                                                <input type="text" id="name" name="form[name]" data-parsley-required="true"
                                                       value="<?= $result->name ?>"
                                                       class="form-control" >
                                            </div>
                                        </div>
                                        <div  class="col-lg-6" >
                                            <label for="name"> &nbsp;  </label>
                                            <button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php if(!empty($records)): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"> Feature List
                                    <p class="text-muted"> Your can edit Name by clicking the name  </p>
                                </div>
                                <div class="panel-body  ">
                                    <div class="table-responsive" >
                                        <table class="table table-bordered" >
                                            <tr>
                                                <th> # </th>
                                                <th> Name </th>
                                                <th> Product List Page View </th>
                                                <th> Home Page View </th>
                                                <th> Status </th>
                                            </tr>
                                            <?php foreach ($records as $k => $row): ?>
                                                <tr>
                                                    <td> <?= $k+1 ?> </td>
                                                    <td  > <span class="names" data-pk="<?=$row->feature_list_id?>" ><?= $row->name ?></span>  </td>
                                                    <td> <span class="status" data-for="product_list" data-type="select" data-value="<?= $row->product_list ?>"   data-pk="<?=$row->feature_list_id?>" > <?= $row->product_list? "Active" :"Deactivate" ?> </span>   </td>
                                                    <td> <span class="status" data-for="home_page" data-type="select" data-value="<?= $row->home_page ?>"   data-pk="<?=$row->feature_list_id?>" > <?= $row->home_page? "Active" :"Deactivate" ?> </span>   </td>
                                                    <td> <span class="status" data-for="status" data-type="select" data-value="<?= $row->status ?>"   data-pk="<?=$row->feature_list_id?>" > <?= $row->status? "Active" :"Deactivate" ?> </span>   </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
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
<!-- parsley.js validation -->
<script src="<?=base_url('assets/lib/Parsley.js/dist/parsley.min.js')?>"></script>

<!-- editable elements -->
<script src="<?= base_url('assets/lib/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/x-editable/inputs-ext/address/address.js') ?>"></script>
<script src="<?= base_url('assets/lib/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js') ?>"></script>
<script src="<?= base_url('assets/lib/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js') ?>"></script>

<script>
    $('.names').editable({
        name: 'Feature Name',
        title: 'Enter Feature Name',
        validate: function (value) {
            if ($.trim(value) == '') return 'This field is required';
            else {
                var b = $(this);
                console.log(b.data());
                if (!b.data('pk')) return !0;
                console.log({id:b.data('pk') , val:value});
                $.ajax({
                    url: URL.base +CONTROLLER + "/feature/update/"  ,
                    type:'post',
                    data: {id:b.data('pk') ,name:'name', val:value},
                    response: function (xhr) {
                        return this.responseText ;
                    }
                });

            }
        }
    });


    $('.status').editable({
        source: [
            {value: 1, text: 'Active'},
            {value: 0, text: 'Deactivate'}
        ],
        display: function(value, sourceData) {
            var colors = { 1: "green", 0: "red"},
                elem = $.grep(sourceData, function(o){return o.value == value;});
            if(elem.length) {
                $(this).text(elem[0].text).css("color", colors[value]);
                var id =$(this).data('pk'), name =$(this).data('for');
                $.ajax({
                    url: URL.base +CONTROLLER + "/feature/update/"  ,
                    type:'post',
                    data: {id: id ,name: name , val:value},
                    response: function (xhr) {
                        return this.responseText ;
                    }
                });
            } else {
                $(this).empty();
            }
        }
    });
</script>
<!-- multiselect, tagging -->
</body>
</html>


