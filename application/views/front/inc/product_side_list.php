<ul class="product_images">
    <?php foreach ($products as $pro): ?>
        <li class="item clearfix">
            <a class="products-block-image" href=""
               title="Guran mire tuna cursus in mi"
               class="content_img clearfix">
                <!--  <span class="number">1</span> -->
                <img src="<?= UPT.$pro->image ?>"
                     height="98" width="98"
                     alt="<?=$pro->title?>"/> </a>
            <div class="product-content">
                <h5><a class="product-name" href="" title="<?=$pro->title?>"> <?=$pro->title?></a>
                </h5>
                <div class="price-box"><span class="price"> <?= $pro->price->min ==  $pro->price->max ? $pro->price->max : $pro->price->min." -".$pro->price->max ?> QAR </span></div>
                 
            </div>
        </li>
    <?php endforeach; ?>
</ul>