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
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group" >
                                                            <label for="name">School Name </label>
                                                            <input type="text" id="name" name="form[title]"
                                                                   value="<?= $result->title ?>"
                                                                   class="form-control" >
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6" >
                                                        <label>Company Logo </label>
                                                        <div class="fileinput-button btn btn-success sepH_b">
                                                            <i class="fa fa-plus"></i>
                                                            <span>Add file </span>
                                                            <input class="image_upload" data-for="#default_img_grid_upload"  data-name="image"  type="file" name="userfile">
                                                        </div>
                                                        <input   type="hidden" name="form[image]"   value="">
                                                        <small> image size ( 200px * 200px )</small>
                                                        <ul class="img-grid2 img-grid  clearfix" id="default_img_grid_upload">
                                                            <?php if ($result->image): ?>
                                                                <li>
                                                                    <div class="upload_img_single thumbnail">
                                                                        <img src="<?= UP. $result->image ?>"
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
                                                <div class="form-group form-sep ">

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="country" >Country</label>
                                                                <select class="form-control" id="country"  onchange="AjaxLoad.zone(this,'#zone')" name="form[country_id]"   >
                                                                    <option> --Select Country-- </option>
                                                                    <?php foreach ($country as $con ): ?>
                                                                        <option value="<?= $con->country_id ?>" <?= $con->country_id == $result->country_id ? 'selected':'' ?>  > <?=$con->name?> </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="zone" >State</label>
                                                                <select class="form-control" id="zone"   name="form[zone_id]"   >
                                                                    <option> --Select State -- </option>
                                                                    <?php foreach ($zone as $con ): ?>
                                                                        <option value="<?= $con->zone_id ?>" <?= $con->zone_id == $result->zone_id ? 'selected':'' ?>  > <?=$con->name?> </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" class="form-control"  name="form[city]" value="<?= $result->city ?>" >
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control"   name="form[address]" value="<?= $result->address ?>"  >
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="tel" class="form-control"   name="form[phone]" value="<?= $result->phone ?>" >
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>E-mail</label>
                                                                <input type="email" class="form-control"  name="form[email]" value="<?= $result->email ?>"  >
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Website</label>
                                                                <input type="url" class="form-control"  name="form[website]" value="<?= $result->website ?>" >
                                                            </div>
                                                        </div>
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
<script>
    $(function () {
        select_tag.set_default("#country"),select_tag.set_default("#zone"),wysiwg.init(), image_upload.init(), image_upload.default_image(), tisa_image_lightbox.init()
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
                        i.url ? $(a.context.children()[e]).find(".upload_img_actions").append('<div class="alert alert-success">  <textarea name="image_des[]" class="form-control" ></textarea>  <input type="hidden" name="image[]" value="' + i.name + '" > </div>') : i.error && $(a.context.children()[e]).find(".upload_img_actions").append($('<div class="alert alert-danger"/>').text(i.error))
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
    AjaxLoad = {
        zone:function (country,zone) {
            country = $(country);
            $(zone).select2("destroy");
            $.ajax({
                url : URL.api +"zone/getZoneByCountryId",
                dataType: 'json',
                data:{ country_id : country.val() } ,
                success : function (zone_list) {
                    var option = "<option> --Select State -- </option>";
                    for(var k in zone_list){
                        option += "<option value='"+ zone_list[k]['zone_id'] +"' > "+ zone_list[k]['name'] +" </option>";
                    }
                    $(zone).html(option),select_tag.set_default(zone);
                }
            });
        }
    }
</script>
</body>
</html>


