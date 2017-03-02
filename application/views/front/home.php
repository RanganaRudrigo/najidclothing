<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="en"><![endif]-->
<html lang="en">
<head> 
    <meta charset="utf-8"/>
    <title><?= $tags['title'] ?></title>
    <meta name="description" content=""/>
    <meta name="generator" content=""/>
    <meta name="robots" content="index,follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <link rel="shortcut icon" type="image/x-icon" href=""/>

    <?php $this->view('front/inc/common_css'); ?>

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
        var generated_date = 1463555461;
        var homeslider_loop = 1;
        var homeslider_pause = 3000;
        var homeslider_speed = 429;
        var homeslider_width = 1170;
        var id_lang = 1;
        var img_dir = '<?=base_url()?>images';
        var instantsearch = false;
        var isGuest = 0;
        var isLogged = 1;
        var isMobile = false;
        var loggin_required = 'You must be logged in to manage your wishlist.';
        var max_item = 'You cannot add more than 3 product(s) to the product comparison';
        var min_item = 'Please select at least one product';
        var mywishlist_url = '<?=base_url()?>user/mywishlist';
        var page_name = 'index';
        var placeholder_blocknewsletter = 'Confirm your Email';
        var priceDisplayMethod = 1;
        var priceDisplayPrecision = 2;
        var quickView = true;
        var removingLinkText = 'remove this product from my cart';
        var roundMode = 2;
        var search_url = '<?=base_url()?>/search';
        var static_token = 'efd6eab0bec1e906d18b942fa8bc3907';
        var token = '74a2ed314f9c3188a7793e72674fe724';
        var usingSecureMode = false;
        var wishlistProductsIds = false;
    </script>

    <script type="text/javascript" src="<?=base_url('js/jquery/jquery-1.11.0.min.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery/jquery-migrate-1.2.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery/plugins/jquery.easing.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/tools.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/global.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/autoload/10-bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/autoload/15-jquery.total-storage.min.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/autoload/15-jquery.uniform-modified.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery/plugins/fancybox/jquery.fancybox.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/products-comparison.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/tools/treeManagement.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('modules/blockfacebook/blockfacebook.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/blocknewsletter/blocknewsletter.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('modules/homeslider/js/homeslider.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery/plugins/bxslider/jquery.bxslider.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/blockwishlist/js/ajax-wishlist.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('modules/spmanufacturerslider/js/slider.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('modules/spmanufacturerslider/js/jquery.cj-swipe.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/sphomeslider/js/homeslider.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/blockcart/ajax-cart.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery/plugins/jquery.scrollTo.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery/plugins/jquery.serialScroll.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery/plugins/autocomplete/jquery.autocomplete.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('modules/spsupercategory/js/owl.carousel.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/blocktopmenu/js/hoverIntent.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/blocktopmenu/js/superfish-modified.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/modules/blocktopmenu/js/blocktopmenu.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/index.js') ?>"></script>



    <script type="text/javascript" src="<?=base_url('js/backtotop.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/scrollReveal.js') ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery.prettyPhoto.js') ?>"></script>

    
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
<body id="index" itemscope itemtype="" class="index hide-left-column hide-right-column lang_en">
<div id="page">
    <div class="header-container">
        <?php $this->view('front/inc/header'); ?>
        <div class="header-bottom2 clearfix">
            <div class="container">

                <!-- SP Custom Html -->
                <div class="moduletable  ">
                    <div class="static-top-home">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 banner-no-padding banner-padding-left free-shipping">
                                    <div class="banner-block-content">
                                        <div class="content-banner-top">
                                            <h2><a title="Free Shipping Item" href="#">Free Shipping Item</a></h2>
                                            <p>Lorem ipsum dolor amet consectetur</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 odd-item banner-no-padding free-return">
                                    <div class="banner-block-content">
                                        <div class="content-banner-top">
                                            <h2><a title="30 Days Free Return" href="#">30 days free return</a></h2>
                                            <p>Lorem ipsum dolor amet consectetur</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 banner-no-padding cash-on-delivery">
                                    <div class="banner-block-content">
                                        <div class="content-banner-top">
                                            <h2><a title="Cash On Delivery" href="#">CASH ON DELIVERY</a></h2>
                                            <p>Lorem ipsum dolor amet consectetur</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-md-3 col-sm-6 odd-item banner-no-padding banner-padding-right free-call">
                                    <div class="banner-block-content">
                                        <div class="content-banner-top">
                                            <h2><a title="Call Us : + 0123.4567.89" href="#">Call Us : +974 3366
                                                    3625</a></h2>
                                            <p>Lorem ipsum dolor amet consectetur</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /SP Custom Html -->
            </div>
        </div>
    </div>
    <div class="slider-container">
        <div class="container">
            <div class="row">

                <!-- Module HomeSlider -->
                <div id="homepage-slider">
                    <ul id="homeslider" style="max-height:500px;">
                        <?php foreach ($sliders as $k => $obj ): ?>
                            <li class="homeslider-container">
                                <a href="<?= strlen($obj->title)? $obj->title : "#" ?>" title="slider-<?=$k+1?>">
                                    <img src="<?= UP.$obj->image ?>"      width="1170" height="500"  alt="slider-<?=$k+1?>"/>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- /Module HomeSlider -->
            </div>
        </div>
    </div>
    <div id="breadcum">
        <div class="container">
            <div class="row"></div>
        </div>
    </div>
    <div class="columns-container">

        <!-- #columns -->

        <div class="ps-spotlight1 clearfix">
            <div class="container">
                <div class="row">

                    <!-- SP Custom Html -->
                    <div class="moduletable  ">
                        <div class="banner-under-tab banner-wrapper-s">
                            <div class="col-md-6 col-left big-banner">
                                <div class="banner-ct"><a title="Women Fasion" href="#"><img src="<?= IMG ?>banner_1.jpg"
                                                                                             alt="Women Fasion"/></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-right">
                                <div class="big-banner"><a title="2014 Collections" href="#"><img
                                            src="<?= IMG ?>banner_2.jpg" alt="2014 Collections"></a></div>
                                <div class="big-banner"><a title="2014 Collections" href="#"><img
                                            src="<?= IMG ?>banner_3.jpg" alt="2014 Collections"></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /SP Custom Html -->
                </div>
            </div>
        </div>
        <div class="ps-spotlight2 clearfix">
            <div class="container">
                <div class="row">
                    <div class="moduletable  tab-slider col-xs-12">
                        <h3><span class='color-theme'>Uniforms</span> Collections </h3>


                        <!--[if lt IE 9]>
                        <div id="sp_super_category_7" class="sp-sp-cat msie lt-ie9 first-load sp-super-preload"><![endif]-->
                        <!--[if IE 9]>
                        <div id="sp_super_category_7" class="sp-sp-cat msie first-load sp-super-preload"><![endif]-->
                        <!--[if gt IE 9]><!-->
                        <div id="sp_super_category_7" class="sp-sp-cat first-load sp-super-preload"><!--<![endif]-->

                            <div class="sp-super-loading"></div>
                            <div class="spcat-wrap ">

                                <div class="spcat-tabs-container"
                                     data-delay="1500"
                                     data-duration="500"
                                     data-effect=""
                                     data-ajaxurl="<?=base_url()?>home/feature"
                                     data-modid="7">
                                    <div class="spcat-tabs-wrap"><span class='spcat-tab-selected'></span> <span
                                            class='spcat-tab-arrow'>&#9660;</span>
                                        <ul class="spcat-tabs cf">
                                            <?php foreach ($features as $k =>$feature ): ?>
                                                <li class="spcat-tab   <?=!$k?" tab-sel tab-loaded":""?>"
                                                    data-active-content=".items-category-<?= $feature->feature_list_id ?>"
                                                    data-feature_id="<?= $feature->feature_list_id ?>" ><span class="spcat-tab-label"> <?= $feature->name ?> </span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                </div>
                                <!--Begin Items-->
                                <div class="spcat-items-container show-slider">
                                    <?php foreach ($features as $k =>$feature ):  ?>
                                        <div   class="spcat-items  <?= !$k ?'spcat-items-selected spcat-items-loaded' :'' ?>  items-category-<?= $feature->feature_list_id ?>">
                                            <div class="spcat-items-inner  ">
                                                <?php $this->load->view("front/inc/feature_product",array('products'=>$feature->products , 'link' =>base_url()."category/" )) ; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!--End Items-->
                            </div>
                        </div>
                        <script type="text/javascript">
                            //<![CDATA[
                            jQuery(document).ready(function ($) {
                                ;
                                (function (element) {
                                    var $element = $(element),
                                        $tab = $('.spcat-tab', $element),
                                        $tab_label = $('.spcat-tab-label', $tab),
                                        $tabs = $('.spcat-tabs', $element),
                                        ajax_url = $tabs.parents('.spcat-tabs-container').attr('data-ajaxurl'),
                                        effect = $tabs.parents('.spcat-tabs-container').attr('data-effect'),
                                        delay = $tabs.parents('.spcat-tabs-container').attr('data-delay'),
                                        duration = $tabs.parents('.spcat-tabs-container').attr('data-duration'),
                                        rl_moduleid = $tabs.parents('.spcat-tabs-container').attr('data-modid'),
                                        $items_content = $('.spcat-items', $element),
                                        $items_inner = $('.spcat-items-inner', $items_content),
                                        $items_first_active = $('.spcat-items-selected', $element),
                                        $load_more = $('.spcat-loadmore', $element),
                                        $btn_loadmore = $('.spcat-loadmore-btn', $load_more),
                                        $select_box = $('.spcat-selectbox', $element),
                                        $id_cate = $('.spcat-tab', $element).attr('data-id-cate'),
                                        $tab_label_select = $('.spcat-tab-selected', $element),
                                        category_id = $('.sp-cat-title-parent', $element).attr('data-catids');

                                    $(window).on('load', function () {
                                        setTimeout(function () {
                                            $('.sp-super-loading', $element).remove();
                                            $element.removeClass('sp-super-preload');
                                        }, 1000);

                                    });

                                    enableSelectBoxes();
                                    function enableSelectBoxes() {
                                        $tab_wrap = $('.spcat-tabs-wrap', $element);
                                        $tab_label_select.html($('.spcat-tab', $element).filter('.tab-sel').children('.spcat-tab-label').html());
                                        if ($(window).innerWidth() <= 479) {
                                            $tab_wrap.addClass('spcat-selectbox');
                                        } else {
                                            $tab_wrap.removeClass('spcat-selectbox');
                                        }
                                    }

                                    $('span.spcat-tab-selected, span.spcat-tab-arrow', $element).click(function () {
                                        if ($('.spcat-tabs', $element).hasClass('spcat-open')) {
                                            $('.spcat-tabs', $element).removeClass('spcat-open');
                                        } else {
                                            $('.spcat-tabs', $element).addClass('spcat-open');
                                        }
                                    });

                                    $(window).resize(function () {
                                        if ($(window).innerWidth() <= 479) {
                                            $('.spcat-tabs-wrap', $element).addClass('spcat-selectbox');
                                        } else {
                                            $('.spcat-tabs-wrap', $element).removeClass('spcat-selectbox');
                                        }
                                    });

                                    function showAnimateItems(el) {
                                        var $_items = $('.new-spcat-item', el), nub = 0;
                                        $('.spcat-loadmore-btn', el).fadeOut('fast');
                                        $_items.each(function (i) {
                                            nub++;
                                            switch (effect) {

                                                case 'none' :
                                                    $(this).css({'opacity': '1', 'filter': 'alpha(opacity = 100)'});
                                                    break;

                                                default:
                                                    animatesItems($(this), nub * delay, i, el);
                                            }
                                            if (i == $_items.length - 1) {
                                                $('.spcat-loadmore-btn', el).fadeIn(delay);
                                            }
                                            $(this).removeClass('new-spcat-item');
                                        });
                                    }

                                    function animatesItems($this, fdelay, i, el) {
                                        var $_items = $('.spcat-item', el);
                                        $this.attr("style",
                                            "-webkit-animation:" + effect + " " + duration + "ms;"
                                            + "-moz-animation:" + effect + " " + duration + "ms;"
                                            + "-o-animation:" + effect + " " + duration + "ms;"
                                            + "-moz-animation-delay:" + fdelay + "ms;"
                                            + "-webkit-animation-delay:" + fdelay + "ms;"
                                            + "-o-animation-delay:" + fdelay + "ms;"
                                            + "animation-delay:" + fdelay + "ms;").delay(fdelay).animate({
                                            opacity: 1,
                                            filter: 'alpha(opacity = 100)'
                                        }, {
                                            delay: 100
                                        });
                                        if (i == ($_items.length - 1)) {
                                            $(".spcat-items-inner").addClass("play");
                                        }
                                    }

                                    showAnimateItems($items_first_active);
                                    $tab.on('click.tab', function () {
                                        var $this = $(this);
                                        if ($this.hasClass('tab-sel')) return false;
                                        if ($this.parents('.spcat-tabs').hasClass('spcat-open')) {
                                            $this.parents('.spcat-tabs').removeClass('spcat-open');
                                        }
                                        $tab.removeClass('tab-sel');
                                        $this.addClass('tab-sel');
                                        var items_active = $this.attr('data-active-content');

                                        var _items_active = $(items_active, $element);
                                        $items_content.removeClass('spcat-items-selected');
                                        _items_active.addClass('spcat-items-selected');
                                        $tab_label_select.html($tab.filter('.tab-sel').children('.spcat-tab-label').html());
                                        var $loading = $('.spcat-loading', _items_active);
                                        var loaded = _items_active.hasClass('spcat-items-loaded');

                                        if (!loaded && !_items_active.hasClass('spcat-process')) {
                                            _items_active.addClass('spcat-process');
                                            var feature_id = $this.attr('data-feature_id');
                                            $loading.show();
                                            _items_active.addClass('spcat-items-loaded').removeClass('spcat-process');
                                            $loading.remove();
                                            showAnimateItems(_items_active);
                                            updateStatus(_items_active);

                                            console.log($('.spcat-items-inner', _items_active));
                                            CreateProSlider($('.spcat-items-inner', _items_active));

                                        } else {


                                            var owl = $('.spcat-items-inner', _items_active);
                                            owl = owl.data('owlCarousel');
                                            if (typeof owl === 'undefined') {
                                            } else {
                                                owl.onResize();
                                            }


                                        }
                                    });

                                    function updateStatus($el) {
                                        $('.spcat-loadmore-btn', $el).removeClass('loading');
                                        var countitem = $('.spcat-item', $el).length;

                                        $('.spcat-image-loading', $el).css({display: 'none'});

                                        $('.spcat-loadmore-btn', $el).parent().attr('data-rl_start', countitem);
                                        var rl_total = $('.spcat-loadmore-btn', $el).parent().attr('data-rl_total');
                                        var rl_load = $('.spcat-loadmore-btn', $el).parent().attr('data-rl_load');
                                        var rl_allready = $('.spcat-loadmore-btn', $el).parent().attr('data-rl_allready');

                                        if (countitem >= rl_total) {
                                            $('.spcat-loadmore-btn', $el).addClass('loaded');

                                            $('.spcat-image-loading', $el).css({display: 'none'});

                                            $('.spcat-loadmore-btn', $el).attr('data-label', rl_allready);
                                            $('.spcat-loadmore-btn', $el).removeClass('loading');
                                        }
                                    }

                                    $btn_loadmore.on('click.loadmore', function () {
                                        var $this = $(this);
                                        if ($this.hasClass('loaded') || $this.hasClass('loading')) {
                                            return false;
                                        } else {
                                            $this.addClass('loading');

                                            $('.spcat-image-loading', $this).css({display: 'inline-block'});

                                            var rl_start = $this.parent().attr('data-rl_start'),
                                                rl_moduleid = $this.parent().attr('data-modid'),
                                                rl_ajaxurl = $this.parent().attr('data-ajaxurl'),
                                                effect = $this.parent().attr('data-effect'),
                                                field_order = $this.parent().attr('data-field_order'),
                                                items_active = $this.parent().attr('data-active-content'),
                                                category_id = $this.parent().attr('data-catids');
                                            var _items_active = $(items_active, $element);
                                            $.ajax({
                                                type: 'POST',
                                                url: rl_ajaxurl,
                                                data: {
                                                    spcat_module_id: rl_moduleid,
                                                    is_ajax_super_category: 1,
                                                    ajax_limit_start: rl_start,
                                                    categoryid: category_id,
                                                    fieldorder: field_order
                                                },
                                                success: function (data) {
                                                    if (data.items_markup != '') {
                                                        $(data.items_markup).insertAfter($('.spcat-item', _items_active).nextAll().last());

                                                        $('.spcat-image-loading', $this).css({display: 'none'});

                                                        showAnimateItems(_items_active);
                                                        updateStatus(_items_active);
                                                    }
                                                }, dataType: 'json'
                                            });
                                        }
                                        return false;
                                    });
                                    var $cat_slider_inner = $('.cat_slider_inner', element);
                                    $cat_slider_inner.owlCarousel({
                                        center: false,
                                        nav: true,
                                        loop: true,
                                        margin: 5,
                                        navText: ['prev', 'next'],
                                        slideBy: 1,
                                        autoplay: true,
                                        autoplayHoverPause: true,
                                        autoplayTimeout: 1000,
                                        autoplaySpeed: 1500,
                                        navSpeed: 1500,
                                        smartSpeed: 1500,
                                        startPosition: 0,
                                        mouseDrag: true,
                                        touchDrag: true,
                                        pullDrag: true,
                                        dots: false,
                                        autoWidth: false,
                                        navClass: ['owl-prev', 'owl-next'],
                                        responsive: {
                                            0: {items: 1},
                                            480: {items: 2},
                                            768: {items: 3},
                                            1200: {items: 4}
                                        }
                                    });


                                    if ($('.spcat-items-inner', $element).parent().hasClass('spcat-items-selected')) {
                                        var items_active = $('.spcat-tab.tab-sel', $element).attr('data-active-content');
                                        var _items_active = $(items_active, $element);
                                        CreateProSlider($('.spcat-items-inner', _items_active));
                                    }

                                    function CreateProSlider($items_inner1) {

                                        console.log($items_inner1);

                                        $items_inner1.owlCarousel({
                                            center: false,
                                            nav: true,
                                            loop: true,
                                            margin: 5,
                                            slideBy: 1,
                                            autoplay: true,
                                            autoplayHoverPause: true,
                                            autoplayTimeout: 1000,
                                            autoplaySpeed: 1500,
                                            navSpeed: 1500,
                                            smartSpeed: 1500,
                                            startPosition: 0,
                                            mouseDrag: true,
                                            touchDrag: true,
                                            pullDrag: true,
                                            dots: false,
                                            autoWidth: false,
                                            navClass: ['owl-prev', 'owl-next'],
                                            navText: ['&#139;', '&#155;'],
                                            responsive: {
                                                0: {items: 1},
                                                480: {items: 2},
                                                768: {items: 2},
                                                1200: {items: 4}
                                            }
                                        });
                                    }

                                })('#sp_super_category_7');
                            });
                            //]]>
                        </script>
                    </div>

                    <!-- Block Newsletter module-->
                    <div id="newsletter_block_home" class="newsletter_home">
                        <div class="col-md-5">
                            <div class="new-static">
                                <h2 class="page-heading" data-scroll-reveal="enter bottom and move 50px over 0.5s">
                                    Become A <span> Bright Insider</span> Don's Miss Out On ... 25% OFF</h2>
                                <p class="page-heading-sub" data-scroll-reveal="enter bottom and move 40px over 0.6s">
                                    Sign up for style tips <br>
                                    news and an exclusive offer </p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="block_content" data-scroll-reveal="enter bottom and move 30px over 0.7s">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <input class="inputNew grey newsletter-input" size="80"
                                                   id="newsletter-input" type="text" name="email"
                                                   placeholder="Confirm your Email" value=""/>
                                        </div>
                                        <div class="subcribe">
                                            <button type="submit" name="submitNewsletter"
                                                    class="btn btn-default button button-small"><span>Subscribe</span>
                                            </button>
                                            <div class="new-note">
                                                <p>*Offer valid for first-time registrants only &amp; applies to regular
                                                    price items only*</p>
                                                <a href="#" title="Privacy Policy">Privacy Policy</a></div>
                                            <input type="hidden" name="action" value="0"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Block Newsletter module-->

                </div>
            </div>
        </div>

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