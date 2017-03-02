<?php foreach ($products as $pro ): ?>
    <li class="item product-box ajax_block_product first_item product_accessories_description">
        <div class="product_desc">
            <a class="product_img_link" href="<?=$link.url_title($pro->title)."~$pro->id"?>"  title="<?=$pro->title?>"   itemprop="url">
                <img  src="<?=UPT.$pro->image?>"    alt="<?=$pro->title?>"/>
                <img class="img_0"  src="<?=UPT.$pro->image?>"   alt="<?=$pro->title?>"/>
            </a>

        </div>
        <div class="s_title_block">
            <h5 itemprop="name"><a href="<?=$link.url_title($pro->title)."~$pro->id"?>" itemprop="url"><?=$pro->title?></a></h5>
        </div>
        <!--<div class="comments_note" itemprop="aggregateRating" itemscope itemtype="">
            <div class="star_content clearfix">
                <div class="star star_on"></div>
                <div class="star star_on"></div>
                <div class="star star_on"></div>
                <div class="star star_on"></div>
                <div class="star star_on"></div>
                <meta itemprop="worstRating" content="0"/>
                <meta itemprop="ratingValue" content="5"/>
                <meta itemprop="bestRating" content="5"/>
            </div>
            <span class="nb-comments"><span itemprop="reviewCount">1</span> Review(s)</span>
        </div>-->
        <div class="price"> <?= $pro->price->min ==  $pro->price->max ? $pro->price->max : $pro->price->min." -".$pro->price->max ?> QAR </div>
        <div class="no-print">
            <a class="exclusive button ajax_add_to_cart_button "  href="<?=$link.url_title($pro->title)."~$pro->id"?>"  class="button " > View </a>
        </div>
        <div class="functional-buttons clearfix">
            <div class="compare"><a class="add_to_compare" href=""
                                    data-id-product="3"><i
                        class="fa fa-exchange"></i></a></div>
            <div class="wishlist">
                <!-- <a class="addToWishlist wishlistProd_3" data-toggle="tooltip"  title="Add to wishlists" href="#" rel="nofollow" onclick="WishlistCart('wishlist_block_list', 'add', '3', false, 1); return false;"> -->
                <a class="addToWishlist wishlistProd_3" href="#" rel="nofollow"
                   onclick="WishlistCart('wishlist_block_list', 'add', '3', false, 1); return false;"
                   title="My wishlist"> <i class="fa fa-heart"></i> </a></div>
        </div>
    </li>
<?php endforeach; ?>