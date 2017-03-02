<!DOCTYPE >
<html  >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view('admin/inc/head') ?>
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/magnific-popup/magnific-popup.css">
    <!-- multiselect, tagging -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/select2/select2.css">
    <!-- bootstrap switches -->
    <link href="<?= base_url() ?>assets/lib/bootstrap-switch/build/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
    <!-- main stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" media="screen">

    <style>
        .img-grid2 li {
            width: 50%;
        }
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
    <form data-parsley-validate method="post"   >
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
                    <?= $result->id ? '<a href="'.base_url("admin/$this->controller/updateStock/$result->id").'" class="btn btn-info" >Update Quantity</a>' : "" ?>

                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="<?= base_url() ?>admin">Dashboard</a></li>
                <li class="sep">\</li>
                <li><a href="<?= base_url() ?>admin/<?= $this->controller ?>"> <?= ucfirst($this->controller) ?> </a></li>
                <li class="sep">\</li>
                <li >Create</li>
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

                        <div class="panel panel-default">
                            <div class="panel-heading" > Primary Details </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group" >
                                            <label for="name"><?= ucfirst($this->controller) ?> Name </label>
                                            <input type="text" id="name" name="form[title]"
                                                   value="<?= $result->title ?>"
                                                   class="form-control" >
                                        </div>
                                        <div class="form-group" >
                                            <label for="name"> Model Code </label>
                                            <input type="text" id="name"  <?= !empty($result->id)? "readonly":'name="form[model]"' ?>
                                                   value="<?= $result->model ?>"
                                                   class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="short"> Short Description </label>
                                            <textarea id="short" rows="5" name="form[short]"  class="form-control" ><?= $result->short ?></textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-6" >
                                        <label><?= ucfirst($this->controller) ?> Image </label>
                                        <div class="fileinput-button btn btn-success sepH_b">
                                            <i class="fa fa-plus"></i>
                                            <span>Add file </span>
                                            <input class="image_upload" data-for="#default_img_grid_upload"  data-name="image"  type="file" name="userfile">
                                        </div>
                                        <small> image size ( 600px * 600px )</small>
                                        <input   type="hidden" name="form[image]"   value="">
                                        <ul class="img-grid2 img-grid  clearfix" id="default_img_grid_upload">
                                            <?php if ($result->image): ?>
                                                <li>
                                                    <div class="upload_img_single thumbnail">
                                                        <img src="<?= UPT. $result->image ?>"
                                                             class="thumbnail img-responsive" alt=""/>
                                                        <div class="upload_img_actions">
                                                            <span class=" fa fa-times pull-right btn  btn-danger  "
                                                                  onclick="image_upload.remove($(this))"> </span>
                                                            <a style="color: white"
                                                               href="<?= UP. $result->image ?>"
                                                               class="fa fa-search-plus pull-right btn  btn-success">
                                                            </a>
                                                            <input
                                                                type="hidden" name="form[image]"
                                                                value="<?= $result->image ?>"></div>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row form-sep" >
                                    <div class="col-lg-12" >
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" rows="5" name="form[description]"  class="form-control" ><?= $result->description ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading"> More Information </div>
                            <div class="panel-body">
                                <div class="row" >
                                    <div class="col-lg-6" >
                                        <div class="form-group">
                                            <label>Categories</label>
                                            <input type="text" name="category" value="" placeholder="Categories" id="input-category" class="form-control" />
                                            <div id="product-category" class="well well-sm" style="height: 150px; overflow: auto;">
                                                <?php foreach ($product_category as $category): ?>
                                                    <div id="product-category<?=$category['id']?>"><i class="fa fa-minus-circle"></i> <?=$category['text']?><input type="hidden" name="product_category[]" value="<?=$category['id']?>"></div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" >
                                        <div class="form-group">
                                            <label>School</label>
                                            <input type="text" name="school" value="" placeholder="School" id="input-school" class="form-control" />
                                            <div id="product-school" class="well well-sm" style="height: 150px; overflow: auto;">
                                                <?php foreach ($product_school as $school): ?>
                                                    <div id="product-school<?=$school->id?>"><i class="fa fa-minus-circle"></i> <?=$school->school_title ?> &gt; <?=$school->title ?><input type="hidden" name="product_school[]" value="<?=$school->id?>"></div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-sep " >
                                    <div class="col-lg-6" >
                                        <div class="form-group">
                                            <label> Public Product </label>
                                            <input type="hidden"  name="form[public]" value="0"  >
                                            <input type="checkbox"  name="form[public]"   <?= $result->public ? "checked":"" ?>   class="bs_switch" data-size="small"  value="1"  >

                                        </div>
                                    </div>
                                </div>

                                <div class="row form-sep" >
                                    <div class="col-lg-3" >
                                        <div class="form-group">
                                            <label for="discount"> Discount </label>
                                            <div class="input-group" >
                                                <input type="text" name="form[discount]" id="discount" class="form-control price" min="0" max="100" value="<?= $result->discount ?>"  >
                                                <span class="input-group-addon">%</span>
                                            </div>
                                            <span class="help-block"> Discount percentage applied for all size and color </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" >
                                        <div class="form-group">
                                            <label for="reorder_qty"> Reorder Level </label>
                                            <div class="input-group" >
                                                <input type="text" id="reorder_qty" name="form[reorder_qty]"  class="form-control price " value="<?= $result->reorder_qty ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


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
                                            <input type="text"  name="log[qty][]"  data-for="#total_qty" data-available="<?=(int)$default->qty ?>"   onblur="Update.total(this)"  class="form-control price"   value="0"  >
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

                        <div class="panel panel-default" >
                            <div class="panel-heading"> Product More Images </div>

                            <div class="panel-body" >
                                <div class="fileinput-button btn btn-success sepH_b">
                                    <i class="fa fa-plus"></i>
                                    <span>Add files...</span>
                                    <input id="image_upload" type="file" name="userfile" multiple>
                                </div>
                                <small> image size ( 600px * 600px )</small>
                                <ul class="img-grid clearfix" id="img_grid_upload">
                                    <?php foreach ($product_image as $img): ?>
                                        <li>
                                            <div class="upload_img_single thumbnail">
                                                <img
                                                    src="<?= UPT. $img->image ?>"
                                                    class="thumbnail img-responsive" alt=""/>

                                                <div class="upload_img_actions">
                                                                <span class=" fa fa-times pull-right btn  btn-danger  "
                                                                      onclick="image_upload.remove($(this))"> </span>
                                                    <a style="color: white"
                                                       href="<?= UP. $img->image ?>"
                                                       class="fa fa-search-plus pull-right btn  btn-success">
                                                    </a>
                                                    <input
                                                        type="hidden" name="image[]"
                                                        value="<?= $img->image ?>"></div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px" >
                            <?php foreach ($data_option['Color']['result'] as  $op ): ?>
                                <div class="col-lg-6" >
                                    <div class="panel panel-default">
                                        <div class="panel-heading clearfix">
                                            <div class="pull-right" > <b><?= $op->title ?></b>  <img src="<?=base_url().UPT.$op->image?>" width="40" class="thumbnail-new " > </div>
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
                                                                    <?= $f ?  form_hidden('option[product_stock_id][]',$obj->product_stock_id)  :"" ?>
                                                                    <?= $f ?  form_hidden('option[qty][]',$obj->qty)  :"" ?>
                                                                    <input   name="option[option_id][]" type="text" style="display: none" <?= $f ? "":"disabled" ?> class="check_row" value="<?= $op->id ?>">
                                                                    <input  <?= $f ? "checked":"" ?>  name="option[option_detail_id][]" type="checkbox" class="check_row" value="<?= $type->id ?>"> <?= $type->title ?>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text"  <?= $f ? "":"disabled" ?> class="form-control price" name="option[price][]"  value="<?= $obj->price ?>" >
                                                        </td>
                                                        <td>
                                                            <input type="text" <?= $f ? "":"disabled" ?> class="form-control price" name="log[qty][]" data-available="<?= (int) $obj->qty ?>" data-for="#<?= $op->id ?>_<?= $type->id ?>"  value=""  onblur="Update.total(this)"  >
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
<!-- wysiwg editor -->
<script src="<?= base_url() ?>assets/lib/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/lib/ckeditor/adapters/jquery.js"></script>
<!-- multiupload -->
<script src="<?= base_url() ?>assets/lib/jQuery-UI/jquery.ui.widget.min.js"></script>
<script src="<?= base_url() ?>assets/lib/jQuery-File-Upload/js/jquery.fileupload.js"></script>
<script src="<?= base_url() ?>assets/lib/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script src="<?= base_url() ?>assets/lib/jQuery-File-Upload/js/extras/load-image.min.js"></script>
<script src="<?= base_url() ?>assets/lib/jQuery-File-Upload/js/jquery.fileupload-process.js"></script>
<script src="<?= base_url() ?>assets/lib/jQuery-File-Upload/js/jquery.fileupload-image.js"></script>
<!-- magnific popup -->
<script src="<?= base_url() ?>assets/lib/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- multiselect, tagging -->
<script src="<?= base_url() ?>assets/lib/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/lib/autocomplete/autocomplete.min.js"></script>
<!-- masked inputs -->
<script src="<?= base_url() ?>assets/lib/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
<!--  bootstrap switches -->
<script src="<?= base_url() ?>assets/lib/bootstrap-switch/build/js/bootstrap-switch.min.js"></script>

<script>
    // Autocomplete */
    
    $(function () {
        maskedInputs.init(),select_tag.set_default("#country"),select_tag.set_default("#zone"),wysiwg.init(), image_upload.init(), image_upload.default_image(), tisa_image_lightbox.init(),tisa_check_all.init()
    }), wysiwg = {
        init: function () {
            $("#description").length && $("textarea#description").ckeditor()
        }
    }, image_upload = {
        init: function () {
            if ($("#image_upload").length) {
                var e = $("<button/>").addClass("btn btn-success btn-block").prop("disabled", !0).text("Processing...").on("click", function (e) {
                    var a = $(this), i = a.data();
                    a.off("click").text("Abort").on("click", function () {
                        a.remove(), i.abort()
                    }), i.submit().always(function () {
                        a.remove()
                    }), e.preventDefault()
                });
                $("#image_upload").fileupload({
                    url: URL.base +CONTROLLER + "/do_upload/",
                    dataType: "json",
                    autoUpload: !1,
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    maxFileSize: 5e6,
                    disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
                    previewMaxWidth: 220,
                    previewMaxHeight: 220,
                    previewCrop: !0
                }).on("fileuploadsubmit", function (e, a) {
                    var i = $("#image_upload");
                    return a.formData = {files: i.data(a)}, a.formData.files ? void 0 : (i.focus(), !1)
                }).on("fileuploadadd", function (a, i) {
                    i.context = $("<li/>").appendTo("#img_grid_upload"), $("#upload_progress").length || $("body").append('<div id="upload_progress"><i class="fa fa-spinner fa-spin"></i></div>'), $.each(i.files, function (a, o) {
                        var t = $('<div class="upload_img_actions">').wrapInner('<span class=" fa fa-times pull-right btn  btn-danger  " onclick="image_upload.remove($(this))" > </span>  '), n = $('<div class="upload_img_single thumbnail" />').append(t);
                        a || t.append(e.clone(!0).data(i)), n.appendTo(i.context)
                    })
                }).on("fileuploadprocessalways", function (e, a) {
                    var i = a.index, o = a.files[i], t = $(a.context.children()[i]);
                    o.preview && t.prepend(o.preview), o.error && t.find(".upload_img_actions").append($('<div class="alert alert-danger"/>').text(o.error)), i + 1 === a.files.length && a.context.find("button").text("Upload").prop("disabled", !!a.files.error)
                }).on("fileuploadprogressall", function (e, a) {
                    $("#upload_progress").addClass("show_progress");
                    var i = parseInt(a.loaded / a.total * 100, 10);$("#upload_progress div").width(i+"%").html(i+"%");
                    100 == i && setTimeout("$('#upload_progress').removeClass('show_progress')", 500)
                }).on("fileuploaddone", function (e, a) {
                    $.each(a.result.files, function (e, i) {
                        i.url ? $(a.context.children()[e]).find(".upload_img_actions").append('<div class="alert alert-success">   Upload success <input type="hidden" name="image[]" value="' + i.name + '" > </div>') : i.error && $(a.context.children()[e]).find(".upload_img_actions").append($('<div class="alert alert-danger"/>').text(i.error))
                    })
                }).on("fileuploadfail", function (e, a) {
                    $("#upload_progress").addClass("show_progress"), $.each(a.files, function (e, i) {
                        $(a.context.children()[e]).find(".upload_img_actions").append($('<div class="alert alert-danger"/>').text("File upload failed."))
                    }), setTimeout("$('#upload_progress').removeClass('show_progress')", 500)
                }).prop("disabled", !$.support.fileInput).parent().addClass($.support.fileInput ? void 0 : "disabled")
            }
        }, remove: function (e) {
            confirm("Do you want to remove this file ") && e.closest("li").remove()
        },
        default_image: function () {
            var e = $("<button/>").addClass("btn btn-success btn-block").prop("disabled", !0).text("Processing...").on("click", function (e) {
                var a = $(this), i = a.data();
                a.off("click").text("Abort").on("click", function () {
                    a.remove(), i.abort()
                }), i.submit().always(function () {
                    a.remove()
                }), e.preventDefault()
            }), a = null;
            $(".image_upload").click(function () {
                a = $(this)
            }).fileupload({
                url: URL.base +CONTROLLER + "/do_upload/",
                dataType: "json",
                autoUpload: !1,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                maxFileSize: 5e6,
                disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
                previewMaxWidth: 220,
                previewMaxHeight: 220,
                previewCrop: !0
            }).on("fileuploadsubmit", function (e, a) {
                var i = $(".image_upload");
                return a.formData = {files: i.data(a)}, a.formData.files ? void 0 : (i.focus(), !1)
            }).on("fileuploadadd", function (i, o) {
                $(a.data("for")).html(" "), o.context = $("<li/>").appendTo(a.data("for")), $("#upload_progress").length || $("body").append('<div id="upload_progress"><i class="fa fa-spinner fa-spin"></i></div>'), $.each(o.files, function (a, i) {
                    var t = $('<div class="upload_img_actions">').wrapInner('<span class=" fa fa-times pull-right btn  btn-danger  " onclick="image_upload.remove($(this))" > </span> '), n = $('<div class="upload_img_single thumbnail" />').append(t);
                    a || t.append(e.clone(!0).data(o)), n.appendTo(o.context)
                })
            }).on("fileuploadprocessalways", function (e, a) {
                var i = a.index, o = a.files[i], t = $(a.context.children()[i]);
                o.preview && t.prepend(o.preview), o.error && t.find(".upload_img_actions").append($('<div class="alert alert-danger"/>').text(o.error)), i + 1 === a.files.length && a.context.find("button").text("Upload").prop("disabled", !!a.files.error)
            }).on("fileuploadprogressall", function (e, a) {
                $("#upload_progress").addClass("show_progress");
                var i = parseInt(a.loaded / a.total * 100, 10);$("#upload_progress div").width(i+"%").html(i+"%");
                100 == i && setTimeout("$('#upload_progress').removeClass('show_progress')", 500)
            }).on("fileuploaddone", function (e, i) {
                $.each(i.result.files, function (e, o) {
                    o.url ? $(i.context.children()[e]).find(".upload_img_actions").append('<div class="alert alert-success">Upload success <br/><input type="hidden" name="form[' + a.data("name") + ']" value="' + o.name + '" > </div>') : o.error && $(i.context.children()[e]).find(".upload_img_actions").append($('<div class="alert alert-danger"/>').text(o.error))
                })
            }).on("fileuploadfail", function (e, a) {
                $("#upload_progress").addClass("show_progress"), $.each(a.files, function (e, i) {
                    $(a.context.children()[e]).find(".upload_img_actions").append($('<div class="alert alert-danger"/>').text("File upload failed."))
                }), setTimeout("$('#upload_progress').removeClass('show_progress')", 500)
            }).prop("disabled", !$.support.fileInput).parent().addClass($.support.fileInput ? void 0 : "disabled")
        }
    }, tisa_image_lightbox = {
        init: function () {
            $(".img-grid li a , #default_img_grid_upload li a, #logo_img_upload li a").magnificPopup({
                type: "image",
                gallery: {
                    enabled: !0,
                    arrowMarkup: '<i title="%title%" class="glyphicon glyphicon-chevron-%dir% mfp-nav mfp-nav"></i>'
                },
                removalDelay: 500,
                callbacks: {
                    beforeOpen: function () {
                        this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim"), this.st.mainClass = "mfp-zoom-in"
                    }
                },
                closeOnContentClick: !0,
                midClick: !0
            })
        }
    },
        select_tag = {
            set_default: function (selector) {
                $(selector).select2({
                    allowClear: true,
                    placeholder: "Select..."
                });
            }
        }, 
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
    },Update = {
        total : function (self) {
            self = $(self);
            if(isNaN(parseInt( self.val())))  self.val(0);
            $(self.data("for")).val( parseInt( self.val() ) + parseInt(self.data("available")) );
        }
    }
</script>
<script type="text/javascript">

        $('input[name=\'category\']').autocomplete({
            'source': function(request, response) {
                $.ajax({
                    url: API.Category,
                    data:{str: request},
                    dataType: 'json',
                    success: function(json) {
                        response($.map(json, function(item) {
                            return {
                                label: item['text'],
                                value: item['id']
                            }
                        }));
                    }
                });
            },
            'select': function(item) {
                $('input[name=\'category\']').val('');
                $('#product-category' + item['value']).remove();
                $('#product-category').append('<div id="product-category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_category[]" value="' + item['value'] + '" /></div>');
            }
        });

    $('#product-category').delegate('.fa-minus-circle', 'click', function() {
        $(this).parent().remove();
    });

</script>

<script type="text/javascript">
  /*  if ($('.bs_switch').length) {
        $(".bs_switch").bootstrapSwitch()
            .on('switchChange.bootstrapSwitch', function(event, state) {
                $('input[name="form[public]"]').val(state.value?1:0);
                console.log(state.value);
            });
    }*/
</script>
<script type="text/javascript">

        $('input[name=\'school\']').autocomplete({
            'source': function(request, response) {
                $.ajax({
                    url: API.Grade.search,
                    data:{str: request},
                    dataType: 'json',
                    success: function(json) {
                        response($.map(json, function(item) {
                            return {
                                label:item['school_title'] + " &gt; " + item['title'],
                                value: item['id']
                            }
                        }));
                    }
                });
            },
            'select': function(item) {
                $('input[name=\'school\']').val('');
                $('#product-school' + item['value']).remove();
                $('#product-school').append('<div id="product-school' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_school[]" value="' + item['value'] + '" /></div>');
            }
        });

    $('#product-school').delegate('.fa-minus-circle', 'click', function() {
        $(this).parent().remove();
    });

</script>

</body>
</html>


