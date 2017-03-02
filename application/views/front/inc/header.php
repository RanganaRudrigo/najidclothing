<header id="header">
    <div class="header-nav clearfix">
        <div class="container">
            <div class="row">
                <!-- Block currencies module -->
                <div id="languages-block-top" class="languages-block" style="z-index: 20;">
                    <div class="current">
                        <img src="<?= IMG ?>1.jpg" alt="en">
                        <span>English</span>
                    </div>
                    <ul id="first-languages" class="languages-block_ul toogle_content" style="">

                        <li>
                            <a href="<?=base_url()?>" title=" Arabic (ar-AA)">
															<span><img src="<?= IMG ?>4.jpg" alt="ar">
						 Arabic</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /Block currencies module -->
                <!-- Block languages module -->


                <!-- /Block languages module -->
                <!-- Menu -->

                <div id="block_top_menu" class="sf-contener col-lg-7 col-md-9 clearfix ">
                    <div class="cat-title"><i class="fa fa-bars"></i></div>
                    <ul class="sf-menu clearfix menu-content">
                        <li data-class="menuhome" class="sf-haveshild"><a title="Home" href="<?=base_url()?>">Home</a></li>
                        <?php foreach ($menus as $menu): ?>
                            <li><a href="<?=base_url('category/'.url_title($menu->title)."/$menu->id")?>"> <?= $menu->title ?> </a>
                                <?php if(isset($menu->sub) && !empty($menu->sub) ):?>
                                <ul>
                                <?php foreach ($menu->sub as $sub): ?>
                                    <li>
                                        <a href="<?=base_url('category/'.
                                            url_title($menu->title)."/$menu->id"
                                            ."/".url_title($sub->title)."/$sub->id"
                                        )?>"><?= $sub->title ?></a>
                                        <?php if(isset($sub->sub) && !empty($sub->sub) ):?>
                                        <ul>
                                            <?php foreach ($sub->sub as $s): ?>
                                                <li><a href="<?=base_url('category/'.
                                                        url_title($menu->title)."/$menu->id"
                                                        ."/".url_title($sub->title)."/$sub->id"
                                                        ."/".url_title($s->title)."/$s->id"
                                                    )?>"><?= $s->title ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php endif;?>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                                <?php endif;?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!--/ Menu -->

            </div>
        </div>
    </div>
    <div class="header-top clearfix">
        <div class="container">
            <div class="row">
                <div id="header_logo">
                    <a class="logo" href="<?=base_url()?>" title=""> <img src="<?= IMG ?>logo.png" alt="" width="167"
                                                                             height="66"/> </a></div>
                <div class="header-top-right col-lg-9 col-md-12 col-sm-12">
                    <!-- MODULE Block cart -->
                    <div class="shopping_cart clearfix"><a href="" title="View my shopping cart" rel="nofollow"> Cart
                            <span class="ajax_cart_quantity unvisible">0</span> <span
                                class="ajax_cart_product_txt unvisible">Product</span> <span
                                class="ajax_cart_product_txt_s unvisible">Products</span> <span
                                class="ajax_cart_total unvisible"> </span> <span
                                class="ajax_cart_no_product">is empty</span> </a>
                        <div class="cart_block block exclusive">
                            <div class="block_content">
                                <!-- block list of products -->
                                <div class="cart_block_list">
                                    <p class="cart_block_no_products"> No products </p>
                                    <div class="cart-prices">
                                        <div class="cart-prices-line first-line"><span class="pr"> Shipping </span>
                                            <span class="price cart_block_shipping_cost ajax_cart_shipping_cost"> Free shipping! </span>
                                        </div>
                                        <div class="cart-prices-line last-line"><span
                                                class="price cart_block_total ajax_block_cart_total">$ 0.00</span> <span
                                                class="pr">Total</span></div>
                                    </div>
                                    <p class="cart-buttons"><a id="button_order_cart"
                                                               class="btn btn-default button button-small" href=""
                                                               title="Check out" rel="nofollow"> <span> Check out<i
                                                    class="fa fa-chevron-right right"></i> </span> </a></p>
                                </div>
                            </div>
                        </div>
                        <!-- .cart_block -->

                    </div>
                    <div id="layer_cart">
                        <div class="clearfix">
                            <div class="layer_cart_product col-xs-12 col-md-6"><span class="cross"
                                                                                     title="Close window"></span>
                                <h2><i class="icon-ok"></i>Product successfully added to your shopping cart </h2>
                                <div class="product-image-container layer_cart_img"></div>
                                <div class="layer_cart_product_info"><span id="layer_cart_product_title"
                                                                           class="product-name"></span> <span
                                        id="layer_cart_product_attributes"></span>
                                    <div><strong class="dark">Quantity</strong> <span
                                            id="layer_cart_product_quantity"></span></div>
                                    <div><strong class="dark">Total</strong> <span id="layer_cart_product_price"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="layer_cart_cart col-xs-12 col-md-6">
                                <h2>
                                    <!-- Plural Case [both cases are needed because page may be updated in Javascript] -->
                                    <span class="ajax_cart_product_txt_s  unvisible"> There are <span
                                            class="ajax_cart_quantity">0</span> items in your cart. </span>
                                    <!-- Singular Case [both cases are needed because page may be updated in Javascript] -->
                                    <span class="ajax_cart_product_txt "> There is 1 item in your cart. </span></h2>
                                <div class="layer_cart_row"><strong class="dark"> Total products </strong> <span
                                        class="ajax_block_products_total"> </span></div>
                                <div class="layer_cart_row"><strong class="dark"> Total shipping&nbsp; </strong> <span
                                        class="ajax_cart_shipping_cost"> Free shipping! </span></div>
                                <div class="layer_cart_row"><strong class="dark"> Total </strong> <span
                                        class="ajax_block_cart_total"> </span></div>
                                <div class="button-container"><span
                                        class="continue btn btn-default button exclusive-medium"
                                        title="Continue shopping"> <span> <i class="fa fa-chevron-left left"></i>Continue shopping </span> </span>
                                    <a class="btn btn-default button button-medium" href="<?= base_url('user/order') ?>" title="Proceed to checkout"
                                       rel="nofollow"> <span> Proceed to checkout<i
                                                class="fa fa-chevron-right right"></i> </span> </a></div>
                            </div>
                        </div>
                        <div class="crossseling"></div>
                    </div>
                    <!-- #layer_cart -->
                    <div class="layer_cart_overlay"></div>

                    <!-- /MODULE Block cart --><!-- Block search module TOP -->
                    <div id="search_block_top" class="col-md-offset-3 clearfix">
                        <form id="searchbox" method="get" action="<?=base_url()?>search">
                            <input class="search_query form-control" type="text" id="search_query_top"
                                   name="search_query" placeholder="Enter your Grade Code " value=""/>
                            <button type="submit"  class=" button-search"><i
                                    class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /Block search module TOP --><!-- Block user information module NAV  -->

                    <div class="header_user_info">
                        <ul class="links">
                            <li class="nav-left">
                                <ul>
                                    <li class="first">
                                        <a class="login" href="<?= isset($customer) ? base_url("user"):base_url("user/login")  ?>" rel="nofollow"
                                                         title="Log in to your customer account"> <i
                                                class="fa fa-user"></i>My Account </a>
                                        <?php if(isset($customer)) : ?>
                                            <ul class="dropdown-link dropdown-link-account">
                                                <li>  <a href="<?= base_url('user/order-history') ?>" title="My orders">
                                                        My orders
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('user/address') ?>" title="My addresses">
                                                        My addresses
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('user/identity') ?>" title="My personal info">
                                                        My personal info
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('user/logout') ?>" title="Logout">
                                                        Logout
                                                    </a>
                                                </li>
                                            </ul>
                                        <?php endif; ?>

                                    </li>
                                    <li class="last checkout"><a href="" title="Check out" rel="nofollow"> <i
                                                class="fa fa-check"></i>Checkout</a></li>
                                </ul>
                            </li>
                            <li class="help"><a href="#" title="Help"><i class=""></i> Help</a>
                                <ul class="dropdown-link dropdown-link-help ">
                                    <li><a href="#">Shipping & Delivery</a></li>
                                    <li><a href="#">Returns & Refunds</a></li>
                                    <li><a href="#">Managing Your Account</a></li>
                                    <li><a href="#">Payment, Pricing & Promotions</a></li>
                                </ul>
                            </li>
                            <li class="nav-right">
                                <ul>
                                    <li class="wishlist"><a href="" title="My Wishlist"><i class="fa fa-heart"></i> My
                                            Wishlist</a></li>
                                    <li class="compare"><a href="" title="My Compare"><i
                                                class="fa fa-stack-exchange"></i> My Compare</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /Block usmodule NAV -->

                </div>
            </div>
        </div>
    </div>
</header>
