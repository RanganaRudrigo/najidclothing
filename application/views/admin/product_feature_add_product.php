<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/inc/head') ?>
    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/select2/select2.css">
    <!-- bootstrap-datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-datepicker/css/datepicker3.css">
    <!-- bootstrap switches -->
    <link href="<?= base_url() ?>assets/lib/bootstrap-switch/build/css/bootstrap3/bootstrap-switch.css"
          rel="stylesheet">
    <!-- 2col multiselect -->
    <link href="<?= base_url() ?>assets/lib/multi-select/css/multi-select.css" rel="stylesheet">
    <!-- date range picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/magnific-popup/magnific-popup.css">

    <!-- main stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" media="screen">

    <style>
        .item_select {
            cursor: pointer;
        }
    </style>

</head>
<body  >
<!-- top bar -->
<?php $this->load->view('admin/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">

    <form data-parsley-validate method="post">
        <div class="page_bar clearfix">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page_title"> Feature Product List  </h1>
                </div>
                <div class="col-md-4 text-right">
                    <button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>

        <div class="page_content">
            <div class="container-fluid">
                <?php
                $error = isset($error) ? $error : $this->session->flashdata('error');
                $valid = $this->session->flashdata('valid');
                if (isset($valid)) $error = $valid;
                if (isset($error)) {
                    ?>
                    <div
                        class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                        <?= $error ?>
                    </div>
                    <?php
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <?php foreach ($records as $k => $row): ?>
                                        <li class="<?= !$k? 'active' :'' ?>"><a data-toggle="tab" href="#prod_tab_<?=$row->feature_list_id?>" class="tab-default"><?=$row->name?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="tab-content">
                                        <?php foreach ($records as $k => $row): ?>
                                        <div id="prod_tab_<?=$row->feature_list_id?>" class="tab-pane <?= !$k? 'active' :'' ?> ">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="p_related_products">Products List </label>

                                                    <div class="sepH_a">
                                                        &nbsp;
                                                    </div>
                                                    <select name="pro[<?=$row->feature_list_id?>][]" id="new_arrivals" multiple>
                                                        <?php foreach ($products as $pro):
                                                            $f= false;
                                                            foreach ($selected_products as $selected_product)
                                                                if($selected_product->feature_list_id == $row->feature_list_id && $selected_product->product_id == $pro->id ){
                                                                    $f = true ;
                                                                    unset($selected_product);
                                                                }
                                                            ?>
                                                            <option <?= $f ?"selected":"" ?> value="<?= $pro->id ?>" ><?= $pro->title ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- side navigation -->
<?php $this->load->view('admin/inc/nav') ?>

<!-- right slidebar -->
<div id="slidebar">
    <div id="slidebar_content">

    </div>
</div>
<?php $this->load->view('admin/inc/foot') ?>
<!-- parsley.js validation -->
<script src="<?= base_url() ?>assets/lib/Parsley.js/dist/parsley.min.js"></script>
<!-- form validation functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_validation.js"></script>
<!-- page specific plugins -->

<!-- select2 -->
<script src="<?= base_url() ?>assets/lib/select2/select2.min.js"></script>
<!--  bootstrap-datepicker -->
<script src="<?= base_url() ?>assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!--  bootstrap switches -->
<script src="<?= base_url() ?>assets/lib/bootstrap-switch/build/js/bootstrap-switch.min.js"></script>
<!--  2col multiselect -->
<script src="<?= base_url() ?>assets/lib/multi-select/js/jquery.multi-select.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.quicksearch.js"></script>

<script>
    $(function(){
        $('select').multiSelect({
            selectableHeader: '<div class="custom-header-search"><input type="text" class="search-input input-sm form-control" autocomplete="off" placeholder="Selectable..."></div>',
            selectionHeader: '<div class="custom-header-search"><input type="text" class="search-input input-sm form-control" autocomplete="off" placeholder="Selection..."></div>',
            afterInit: function(ms){
                var that = this,
                    $selectableSearch = that.$selectableUl.prev('div').children('input'),
                    $selectionSearch = that.$selectionUl.prev('div').children('input'),
                    selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e){
                        if (e.which === 40){
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e){
                        if (e.which == 40){
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
        });
    })
</script>

</body>

</html>

