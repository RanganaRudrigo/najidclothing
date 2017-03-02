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
        .thumbnail-new{
            padding: 4px;
            line-height: 1.428571429;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        .text-muted{
            font-size: 12px;
            margin: 0;
        }
        .panel-heading label{
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body class="side_nav_hover theme_b">
<!-- top bar -->
<?php $this->load->view('admin/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <form data-parsley-validate method="post"   >
        <div class="page_bar clearfix">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="page_title"> <?= $result->title ?>   </h1>
                    <p class="text-muted"> This page will auto refresh every minutes for maintain the correct stock   </p>
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
                <li><a href="<?= base_url() ?>admin/<?= $this->controller ?>/edit/<?= $result->id ?>"> <?= $result->title ?> </a></li>
                <li class="sep">\</li>
                <li >Update Stock</li>
            </ul>
        </nav>
        <div class="page_content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
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

                        <?php
                        $i = 0 ;
                        $default = $option['default'];
                        unset($option['default']);
                        $option = $option['more'];
                        ?>

                        <div class="row" >
                            <div class="col-lg-3" >
                                <div class="panel panel-default">
                                    <div class="panel-heading" ><?= $result->title ?> </div>
                                    <div class="panel-body">
                                        <img src="<?= UPT . $result->image ?>" class="thumbnail img-responsive" width="75">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9" >
                                <div class="panel panel-default">
                                    <div class="panel-heading"> Default Item Price <p  class="text-muted"> This details will only works if item has no color and size wise maintain </p> </div>
                                    <div class="panel-body">
                                        <div class="row" >
                                            <div class="col-lg-4" >
                                                <div class="form-group">
                                                    <label for="description"> Price </label>
                                                    <div class="input-group" >
                                                        <?= is_object($default) ?  form_hidden('option[product_stock_id][]',$default->product_stock_id)  :"" ?>
                                                         <?= is_object($default) ?  form_hidden('option[qty][]',$default->qty)  :"" ?>
                                                        <input type="hidden" name="option[option_id][]"  class="form-control price"  value="1" >
                                                        <input type="hidden" name="option[option_detail_id][]"  class="form-control price"  value="1" >
                                                        <input type="text" name="option[price][]"  class="form-control price"  value="<?= $default->price ?>" >
                                                        <span class="input-group-addon">QAR</span>
                                                    </div>
                                                    <span class="help-block">It's default price but it's change depend on size wise</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4" >
                                                <div class="form-group">
                                                    <label for="description"> Update Qty </label>
                                                    <input type="text"  name="log[qty][<?=$i++?>]"  data-for="#total_qty" data-available="<?=(int)$default->qty ?>"   onblur="Update.total(this)"  class="form-control price"   value="0"  >
                                                </div>
                                            </div>
                                            <div class="col-lg-4" >
                                                <div class="form-group">
                                                    <label for="description"> Total Available Qty </label>
                                                    <input type="text"    readonly class="form-control price"  id="total_qty" value="<?= $default->qty ?>"  >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px" >
                            <?php foreach ($data_option['Color']['result'] as  $op ): ?>
                                <div class="col-lg-6" >
                                    <div class="panel panel-default">
                                        <div class="panel-heading clearfix">
                                            <div class="pull-right" > <b><?= $op->title ?></b>  <div class="pull-right"  style="background-color: <?=$op->image?>;width: 25px;height: 25px;padding: 5px;border: 1px solid #ddd;margin-left: 5px" ></div> </div>
                                            <label for="<?= $op->title  ?>"  >   <input   type="checkbox" class="check_all"  > All  </label>
                                        </div>
                                        <div class="panel-body table-responsive">
                                            <table class="table table-bordered " >
                                                <thead>
                                                <tr>
                                                    <th> Size </th>
                                                    <th> Price (QAR) </th>
                                                    <th> Update Qty </th>
                                                    <th> Available Qty </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($data_option['Size']['result'] as $x => $type ): ?>
                                                    <tr  >
                                                        <td>
                                                            <?php
                                                            $obj = new stdClass();
                                                            $f = false ;
                                                            foreach ($option as $k => $o ){
                                                                if($o->option_id == $op->id && $o->option_detail_id == $type->id ) {
                                                                    $f = true ;
                                                                    $obj = $o ;
                                                                    unset($option[$k]);
                                                                    break;
                                                                }
                                                            }
                                                            ?>
                                                            <div class="checkbox">
                                                                <label for="<?= $type->title ?>_<?= $type->id ?>" >
                                                                    <?= $f ?  form_hidden("option[product_stock_id][$i]",$obj->product_stock_id)  :"" ?>
                                                                     <?= $f ?  form_hidden("option[qty][$i]",$obj->qty)  :"" ?>
                                                                    <input   name="option[option_id][<?=$i?>]" type="text" style="display: none" <?= $f ? "":"disabled" ?> class="check_row" value="<?= $op->id ?>">
                                                                    <input  <?= $f ? "checked":"" ?>  name="option[option_detail_id][<?=$i?>]" type="checkbox" class="check_row" value="<?= $type->id ?>"> <?= $type->title ?>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text"  <?= $f ? "":"disabled" ?> class="form-control price" name="option[price][<?=$i?>]"  value="<?= $obj->price ?>" >
                                                        </td>
                                                        <td>
                                                            <input type="text" <?= $f ? "":"disabled" ?> class="form-control price" name="log[qty][<?=$i++?>]" data-available="<?= (int) $obj->qty ?>" data-for="#<?= $op->id ?>_<?= $type->id ?>"  value=""  onblur="Update.total(this)"  >
                                                        </td>
                                                        <th>
                                                            <input type="text" readonly   class="form-control price"    id="<?= $op->id ?>_<?= $type->id ?>" value="<?= (int) $obj->qty ?>" >
                                                        </th>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="clearfix" ></div>
                        <div class="form-sep">
                            <button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
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

<!-- masked inputs -->
<script src="<?= base_url() ?>assets/lib/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
<script>
    $(function () {
        maskedInputs.init(), tisa_check_all.init() , set_refresh.init(60);
    }),
        maskedInputs = {
            val: null,
            init: function () {
                if ($('.price').length) {
                    $(".price").inputmask("decimal", {
                        radixPoint: ".",
                        groupSeparator: ",",
                        digits: 2,
                        autoGroup: true
                    }).on('keydown', function (e) {
                        this.val = $(this).val();
                    }).on('keyup', function () {
                        v = $(this).val().replace(",", "");
                        if ($(this).data('max-value') < v)
                            $(this).val($(this).data('max-value'));
                    });
                }
            }
        },
        tisa_check_all = {
            init: function() {
                if ($('.check_all').length) {
                    $(".check_all").each(function() {
                        $(this).click(function(){
                            var body = $(this).closest('.panel').find(".panel-body");
                            $(body).find('input.check_row:checkbox').not(this).prop('checked', this.checked);
                            $(body).find('input[type=text]').prop('disabled', !this.checked);
                        });
                    })
                }
                if ($('input.check_row').length) {
                    $("input.check_row").each(function() {
                        $(this).click(function(){
                            var tr = $(this).closest('tr');
                            $(tr).find('input[type=text]').prop('disabled', !this.checked);
                            if(!this.checked) $(this).closest('.panel').find('.check_all:checkbox').not(this).prop('checked', this.checked)
                        });
                    })
                }
            }

        },
        Update = {
            total : function (self) {
                self = $(self);
                if(isNaN(parseInt( self.val())))  self.val(0);
                $(self.data("for")).val( parseInt( self.val() ) + parseInt(self.data("available")) );
            }
        },
        set_refresh = {
            init : function (timer) {
                var i=0;var counter_id = $("#counter");
                setInterval(function () {
                   if(i == timer)  location.reload();
                    if(i+10 == (timer) )counter_id.css("color",'red');
                    var duration = moment.duration(timer - i++, 'seconds');
                    counter_id.html(  duration.minutes() + ":" + duration.seconds() );
                },1000);
            }
        }
</script>
</body>
</html>


