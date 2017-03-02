<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Najd Clothing</title>
    <meta name="description" content=""/>
    <meta name="generator" content=""/>
    <meta name="robots" content="index,follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="shortcut icon" type="image/x-icon" href=""/>
    <?php $this->view('front/inc/common_css'); ?>
    <link rel="stylesheet" href="<?=base_url('css/category.css')?>" type="text/css" media="all"/>
    <link rel="stylesheet" href="<?=base_url('css/modules/blocklayered/blocklayered.css')?>" type="text/css" media="all"/>
    <script type="text/javascript">
        var CUSTOMIZE_TEXTFIELD = 1;
        var FancyboxI18nClose = 'Close';
        var FancyboxI18nNext = 'Next';
        var FancyboxI18nPrev = 'Previous';
        var added_to_wishlist = 'Added to your wishlist.';
        var ajax_allowed = true;
        var ajaxsearch = true;
        var baseDir = '<?=base_url()?>';
        var baseUri = '<?=base_url()?>';
        var blocksearch_type = 'top';
        var comparator_max_item = 3;
        var comparedProductsIds = [];
        var contentOnly = false;
        var customizationIdMessage = 'Customization #';
        var delete_txt = 'Delete';
        var displayList = false;
        var freeProductTranslation = 'Free!';
        var freeShippingTranslation = 'Free shipping!';
        var generated_date = 1462596304;
        var homeslider_loop = 1;
        var homeslider_pause = 3000;
        var homeslider_speed = 429;
        var homeslider_width = 1170;
        var id_lang = 1;
        var img_dir = '';
        var instantsearch = false;
        var isGuest = 0;
        var isLogged = 0;
        var isMobile = false;
        var loggin_required = 'You must be logged in to manage your wishlist.';
        var max_item = 'You cannot add more than 3 product(s) to the product comparison';
        var min_item = 'Please select at least one product';
        var mywishlist_url = '';
        var page_name = 'category';
        var placeholder_blocknewsletter = 'Confirm your Email';
        var priceDisplayMethod = 1;
        var priceDisplayPrecision = 2;
        var quickView = true;
        var removingLinkText = 'remove this product from my cart';
        var roundMode = 2;
        var search_url = '';
        var static_token = '9e6036f90e1d113b3c65a4430835477d';
        var token = 'e5db2ef3d21dc6bea23fbb80196ec19a';
        var usingSecureMode = false;
        var wishlistProductsIds = false;
    </script>
    <?php $this->view('front/inc/common_js'); ?>

    <script type="text/javascript" src="<?=base_url('js/category.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/blocklayered/blocklayered.js')?>"></script>
    <script type="text/javascript">
        var homeslider_loop = 1;
        var homeslider_width = 1170;
        var homeslider_speed = 429;
        var homeslider_pause = 3000;
    </script>
    <style>
        .big-banner {
            margin-bottom: 10px;
        }
    </style>
</head>

<body id="category" itemscope itemtype="" class="category category-54 category-cardigans hide-right-column lang_en
								
	">
<div id="page">
    <div class="header-container">
        <?php $this->view('front/inc/header'); ?>
    </div>
    <div id="breadcum">
        <div class="container">
            <div class="row">

                <!-- Breadcrumb -->

                <div class="breadcrumb ">
                    <a class="home" href="<?=base_url()?>" title="Return to Home"><i class="fa fa-home"></i></a>
                    <?php
                        $path = base_url('category');
                        foreach ($categories as $cat ):    $path .= "/".url_title($cat->title)."/".$cat->id ;   ?>
                        <span class="navigation-pipe"><i class="fa fa-angle-double-right"></i></span>
                        <a href="<?=$path?>"  title="<?=$cat->title?>" data-gg=""><?=$cat->title?></a>
                    <?php endforeach;
                    ?>
                </div>

                <!-- /Breadcrumb -->
            </div>
        </div>
    </div>
    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row">
                <div id="left_column" class="column col-sm-4 col-md-3">
                    <!-- Block layered navigation module -->
                    <div id="layered_block_left" class="block">
                        <p class="title_block">Shop by</p>
                        <div class="block_content">
                            <form action="#" id="layered_form">
                                <input type="hidden" name="category_id" value="<?=$cat->id?>" >
                                <input type="hidden" name="url" value="<?= current_url()?>/" >
                                <div>
                                    <?php foreach ($data_option as $option_title => $option): ?>
                                        <div class="layered_filter">
                                            <div class="layered_subtitle_heading">
                                                <span class="layered_subtitle"><?= $option_title ?></span>
                                            </div>
                                            <ul id="ul_layered_manufacturer_<?=$option['id']?>" class="col-lg-12 layered_filter_ul">
                                                <?php foreach ($option['result'] as $filter): ?>

                                                    <?php if( !empty($filter->image) ): ?>
                                                        <li class="nomargin hiddable col-lg-6">
                                                            <input class="color-option  " type="button" name="filter" data-for="<?=$option['id']?>" rel="<?=$filter->id?>" id="layered_id_attribute_group_<?=$option['id']?>" style="background: <?=$filter->image?>;">
                                                            <label class="" rel="<?=$option['id']?>_<?=$filter->id?>">
                                                                <a href=""><?= $filter->title ?></a>
                                                            </label>
                                                        </li>
                                                    <?php else: ?>
                                                        <li class="nomargin hiddable col-lg-6">
                                                            <input type="checkbox" class="checkbox" name="size[]"   id="layered_manufacturer_1" value="<?=$filter->id?>"/>
                                                            <label for="layered_manufacturer_1"> <a href="" rel="nofollow"> <?= $filter->title ?> </a> </label>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </form>
                        </div>
                        <div id="layered_ajax_loader" style="display: none;">
                            <p><img src="<?=IMG?>loader.gif" alt=""/> <br/>
                                Loading... </p>
                        </div>
                    </div>
                    <!-- /Block layered navigation module -->

                    <!-- MODULE Block best sellers -->
                    <?php foreach ($features as $feature): ?>
                        <div id="best-sellers_block_right" class="block products-block">
                            <h4 class="title_block"><a href="" title="View a top sellers products"> <?=$feature->name ?> </a></h4>
                            <div class="block_content">
                                <?php $this->view('front/inc/product_side_list',array('products'=>$feature->products)) ?>                                
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- /MODULE Block best sellers -->
                </div>
                <div id="center_column" class="center_column col-sm-8 col-md-9 ">
                    <div class="home-page"></div>
                    <div class="content_scene_cat ">
                        <!-- Category image -->

                        <div class="content_scene_cat_bg"
                             style="background:url(<?= UP.$cat->image ?>) right center no-repeat; background-size:cover; min-height:217px;">
                            <div class="content_scene">
                                <h1 class="category-name"> <?= ucfirst($cat->title) ?> </h1>
                                <?php if(strlen($cat->description) > 0 ): ?>
                                <div class="rte">
                                    <p><?= $cat->description ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="content_sortPagiBar clearfix">
                        <div class="sortPagiBar  clearfix">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="sortPagiBar-left col-md-8 col-sm-12 col-xs-12">
                                        <ul class="display hidden-xs">
                                            <li id="grid"><a rel="nofollow" href="#" title="Grid"><i
                                                        class="fa fa-th-large"></i></a></li>
                                            <li id="list"><a rel="nofollow" href="#" title="List"><i
                                                        class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- /Sort products -->
                                    </div>
                                    <div class="content_sortPagiBar col-md-4 col-sm-12 col-xs-12">
                                        <div class="bottom-pagination-content ">
                                            <!-- Pagination -->
                                            <div id="pagination" class="pagination clearfix">
                                            <ul class="pagination">
                                                <?php if(ceil($count /  LIMIT ) > 1 )  for ($i = 0; $i < ceil($count /  LIMIT ); $i++): ?>
                                                    <?php if ($i + 1 == $this->input->get('page_id') || (!$this->input->get('page_id') && $i == 0)): ?>
                                                        <li class="active current">
                                                            <span>   <span><?=$i+1?></span>  </span>
                                                        </li>
                                                    <?php else : ?>
                                                        <li>
                                                            <a href="">
                                                                <span><?= $i + 1 ?></span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </ul>
                                            </div>
                                            <!-- /Pagination -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products list -->
                    <?php   $this->view('front/inc/product_list_ul',array('products'=>$products , 'link' => current_url()."/" ) ); ?>
                    <div class="content_sortPagiBar clearfix">
                        <div class="sortPagiBar  clearfix">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="sortPagiBar-left col-md-8 col-sm-12 col-xs-12">
                                        <ul class="display hidden-xs">
                                            <li id="grid"><a rel="nofollow" href="#" title="Grid"><i
                                                        class="fa fa-th-large"></i></a></li>
                                            <li id="list"><a rel="nofollow" href="#" title="List"><i
                                                        class="fa fa-th-list"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="content_sortPagiBar col-md-4 col-sm-12 col-xs-12">
                                        <div class="bottom-pagination-content ">

                                            <!-- Pagination -->

                                            <div id="pagination_bottom" class="pagination clearfix">

                                                <ul class="pagination">
                                                    <?php if(ceil($count /  LIMIT ) > 1 )  for ($i = 0; $i < ceil($count /  LIMIT ); $i++): ?>
                                                        <?php if ($i + 1 == $this->input->get('page_id') || (!$this->input->get('page_id') && $i == 0)): ?>
                                                            <li class="active current">
                                                                <span>   <span><?=$i+1?></span>  </span>
                                                            </li>
                                                        <?php else : ?>
                                                            <li>
                                                                <a href="<?= current_url() ?>?page_id=<?= $i + 1 ?>">
                                                                    <span><?= $i + 1 ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </ul> 


                                            </div>

                                            <!-- /Pagination -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #center_column -->

            </div>
            <!-- .row -->
        </div>
        <!-- #columns -->

    </div>
    <!-- .columns-container -->

    <!-- Footer -->
    <?php $this->view('front/inc/footer'); ?>
    <!-- #footer -->

</div>
<!-- #page -->

<?php $this->view('front/inc/social_link') ?>
</body>
</html>