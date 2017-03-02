<ul class="product_list grid row">
    <?php    foreach ($products as $pro): ?>
        <li class="ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
            <div class="product-container" itemscope itemtype="http://schema.org/Product">
                <div class="left-block">
                    <div class="product-image-container">
                        <a class="product_img_link" href="<?=$link.url_title($pro->title)."~$pro->id"?>"  title="<?=$pro->title?>"   itemprop="url">
                            <img  src="<?=UPT.$pro->image?>"    alt="<?=$pro->title?>"/>
                            <img class="img_0"  src="<?=UPT.$pro->image?>"   alt="<?=$pro->title?>"/>
                        </a>

                    </div>
                </div>
                <div class="right-block">
                    <h5 itemprop="name"><a href="<?=$link.url_title($pro->title)."~$pro->id"?>" itemprop="url"><?=$pro->title?></a></h5>
                    <p class="product-desc" itemprop="description"> <?=$pro->short?></p>
                    <div itemprop="offers" itemscope itemtype="" class="content_price">
                        <!--<div class="comments_note" itemprop="aggregateRating" itemscope itemtype="">
                            <div class="star_content clearfix">
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star"></div>
                                <meta itemprop="worstRating" content="0"/>
                                <meta itemprop="ratingValue" content="4"/>
                                <meta itemprop="bestRating" content="5"/>
                            </div>
                                            <span class="nb-comments"><span
                                                    itemprop="reviewCount">2</span> Review(s)</span>
                        </div>-->
                        <span itemprop="price" class="price product-price">   <?= $pro->price->min ==  $pro->price->max ? $pro->price->max : $pro->price->min." -".$pro->price->max ?> QAR </span>
                        <meta itemprop="priceCurrency" content="QAR"/>
                    </div>
                    <div class="button-container">
                        <a  href="<?=$link.url_title($pro->title)."~$pro->id"?>"  class="button " > View </a>
                       <!-- <a class="button ajax_add_to_cart_button cart_button"
                                                     href="" rel="nofollow" title="Add to cart"
                                                     data-id-product="<?=$pro->id?>"> <i
                                class="fa fa-shopping-cart"></i><span>Add to Cart</span> </a> -->
                    </div>
                    <div class="functional-buttons clearfix">
                        <div class="compare"><a class="add_to_compare" href="" data-id-product="<?=$pro->id?>"><i
                                    class="fa fa-exchange"></i></a></div>
                        <div class="wishlist">
                             <a class="addToWishlist wishlistProd_<?=$pro->id?>" href="#" rel="nofollow"
                               onclick="WishlistCart('wishlist_block_list', 'add', '<?=$pro->id?>', false, 1); return false;"
                               title="My wishlist"> <i class="fa fa-heart"></i> </a></div>
                    </div>
                    </div>
            </div>
            <!-- .product-container> -->
        </li>
    <?php endforeach; ?>
</ul>