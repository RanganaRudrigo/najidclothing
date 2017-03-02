<?php foreach ($products as $pro):   ?>
    <div class="spcat-item new-spcat-item">
        <div class="item-inner">
            <div class="item-image">
                <a class="product_img_link"  href="<?=$link.url_title($pro->title)."~$pro->id"?>"   title="<?=$pro->title?>">
                    <img  src="<?=UPT.$pro->image?>"    alt="<?=$pro->title?>"/>
                    <img class="img_0"  src="<?=UPT.$pro->image?>"   alt="<?=$pro->title?>"/>
                </a>
                <div class="quick-view-wrapper-mobile">
                    <a class="quick-view-mobile"
                       href=""  rel=""><i   class="icon-eye-open"></i>
                    </a>
                </div>
            </div>
            <div class="item-title ">
                <a  href="<?=$link.url_title($pro->title)."~$pro->id"?>"   title="<?=$pro->title?>"><?=$pro->title?></a></div> 
            <div class="item-price">
                <div itemprop="offers" itemscopeitemtype="http://schema.org/Offer" class="content_price"><span
                        itemprop="price" class="price product-price">
                        <?= $pro->price->min ==  $pro->price->max ? $pro->price->max : $pro->price->min." -".$pro->price->max ?> QAR</span>
                    <meta itemprop="priceCurrency" content="QAR"/>
                </div>
            </div>
            <div class="button-container">
                <a class="button  btn btn-default"
                   href="<?=$link.url_title($pro->title)."~$pro->id"?>"
                   rel="nofollow" title="Add to cart"
                   data-id-product="<?=$pro->id?>">
                    <span>View</span></a>
                <div class="functional-buttons clearfix">
                    <div class="wishlist">
                        <a class="addToWishlist wishlistProd_<?=$pro->id?>"
                           href="#" rel="nofollow"   onclick="WishlistCart('wishlist_block_list', 'add', '<?=$pro->id?>', false, 1); return false;"
                                             title="My wishlist"><i class="fa fa-heart"></i>
                        </a>
                    </div>
                    <div class="compare">
                        <a class="add_to_compare"
                           href=""  title="Add to Compare" data-id-product="<?=$pro->id?>"><i
                                class="fa fa-exchange"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>