<style>
    .myaccount-link-list li {
        padding: 7px 0;
    }
</style>
<div id="columns" class="container">

    <div class="row">

        <div id="left_column" class="column col-sm-4 col-md-3"><!-- Block categories module -->
            <div id="categories_block_left" class="block box-menu">
                <h2 class="title_block">
                    Categories
                </h2>
                <div class="block_content" style="">
                    <ul class="tree dynamized" style="display: block;">

                        <?php foreach ($menus as $menu): ?>
                            <li><a href="<?=base_url('category/'.url_title($menu->title)."/$menu->id")?>"> <?= $menu->title ?> </a></li>
                        <?php endforeach;  ?>

                    </ul>
                </div>
            </div>
            <!-- /Block categories module -->

            <!-- Block myaccount module -->
            <div class="block myaccount-column">
                <p class="title_block">
                    <a href="<?= base_url('user/my-account') ?>" title="My account">
                        My account
                    </a>
                </p>
                <div class="block_content list-block" style="">
                    <ul>
                        <li>
                            <a href="<?= base_url('user/order-history') ?>" title="My orders">
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

                    </ul>
                    <div class="logout">
                        <a class="btn btn-default button button-small" href="<?= base_url('user/logout') ?>" title="Sign out">
                            <span>Sign out<i class="fa fa-chevron-right right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Block myaccount module -->

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

            <h1 class="page-heading">My account</h1>

            <p class="info-account">Welcome to your account. Here you can manage all of your personal information and orders.</p>
            <div class="row addresses-lists">
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <ul class="myaccount-link-list">
                         <li><a href="<?= base_url('user/order-history') ?>" title="Orders"><i class="fa fa-list-ol"></i><span>Order history and details</span></a></li>
                         <li><a href="<?= base_url('user/address') ?>" title="Addresses"><i class="fa fa-building"></i><span>My addresses</span></a></li>
                        <li><a href="<?= base_url('user/identity') ?>" title="Information"><i class="fa fa-user"></i><span>My personal information</span></a></li>
                        <li class="lnk_wishlist">
                            <a href="<?= base_url('user/mywishlist') ?>" title="My wishlists">
                                <i class="fa fa-heart"></i>
                                <span>My wishlists</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <ul class="footer_links clearfix">
                <li><a class="button button-small" href="<?=base_url()?>" title="Home"><span><i class="fa fa-home"></i> Home</span></a></li>
            </ul>

        </div><!-- #center_column -->

    </div><!-- .row -->
</div>