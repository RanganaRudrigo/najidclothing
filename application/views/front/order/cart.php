<div id="columns" class="container">
    <div class="row">
        <div id="center_column" class="center_column col-sm-12 col-md-12 ">
            <h1 id="cart_title" class="page-heading">Shopping-cart summary
                <?php if(count($carts) > 0 ):?>
                <span class="heading-counter">Your shopping cart contains: <span id="summary_products_quantity"><?= count($carts) ?> product</span> </span>
                <?php endif; ?>
            </h1>

            <!-- Steps -->
            <ul class="step clearfix" id="order_step">
                <li class="step_current  first"> <span><em>01.</em> Summary</span> </li>
                <li class="step_todo second"> <span><em>02.</em> Sign in</span> </li>
                <li class="step_todo third"> <span><em>03.</em> Address</span> </li>
                <li class="step_todo four"> <span><em>04.</em> Shipping</span> </li>
                <li id="step_end" class="step_todo last"> <span><em>05.</em> Payment</span> </li>
            </ul>
            <!-- /Steps -->
            <?php if(count($carts) > 0 ):?>
                <div id="order-detail-content" class="table_block table-responsive">
                    <table id="cart_summary" class="table table-bordered stock-management-on">
                        <thead>
                        <tr>
                            <th class="cart_product first_item">Product</th>
                            <th class="cart_description item" colspan="2" >Description</th>
                            <th class="cart_unit item">Unit price</th>
                            <th class="cart_quantity item">Qty</th>
                            <th class="cart_total item">Total</th>
                            <th class="cart_delete last_item">&nbsp;</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <!--<tr class="cart_total_price">
                            <td rowspan="5" colspan="3" id="cart_voucher" class="cart_voucher"></td>
                            <td colspan="3" class="text-right">Total products</td>
                            <td colspan="2" class="price" id="total_product">$ 4.51</td>
                        </tr>
                        <tr style="display: none;">
                            <td colspan="3" class="text-right"> Total gift-wrapping cost: </td>
                            <td colspan="2" class="price-discount price" id="total_wrapping"> $ 0.00 </td>
                        </tr>
                        <tr class="cart_total_delivery">
                            <td colspan="3" class="text-right">Total shipping</td>
                            <td colspan="2" class="price" id="total_shipping" >$ 7.00</td>
                        </tr>
                        <tr class="cart_total_voucher" style="display:none">
                            <td colspan="3" class="text-right"> Total vouchers </td>
                            <td colspan="2" class="price-discount price" id="total_discount"> $ 0.00 </td>
                        </tr>
                        <tr class="cart_total_price">
                            <td colspan="3" class="text-right">Total</td>
                            <td colspan="2" class="price" id="total_price_without_tax">$ 11.51</td>
                        </tr>
                        <tr class="cart_total_tax">
                            <td colspan="3" class="text-right">Tax</td>
                            <td colspan="2" class="price" id="total_tax">$ 0.00</td>
                        </tr>-->
                        <tr class="cart_total_price">
                            <td rowspan="5" colspan="3" id="cart_voucher" class="cart_voucher"></td>
                            <td colspan="3" class="total_price_container text-right"><span>Total</span></td>
                            <td colspan="2" class="price" id="total_price_container"><span id="total_price"> <?= $this->cart->format_number($this->cart->total() )?> QAR </span></td>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($carts as $item): ?>
                            <?php  sscanf($item['id'], "%d-%d", $id, $option_id);
                            $url = base_url("category/".url_title($item['name'])."~$id")."#" ;
                            $url .= $item['options']['color_id'] != 1? "/color-{$item['options']['Color']}" :"";
                            $url .= $item['options']['size_id'] != 1? "/size-{$item['options']['Size']}" :"";
                            ?>
                            <tr id="product_5_19_0_0" class="cart_item last_item first_item address_0 odd">
                                <td class="cart_product">
                                    <a href=""><img src="<?= UPT. $item['options']['image'] ?>" width="98" height="98"  /></a>
                                </td>
                                <td class="cart_description" colspan="2" >
                                    <p class="product-name"><a href="<?= $url ?>"><?= $item['name']?></a></p>
                                    <small class="cart_ref">SKU : <?= $item['options']['model']?></small>
                                    <small>
                                        <?= $item['options']['size_id'] != 1? "Size :".$item['options']['Size']."," :""?>
                                        <?= $item['options']['color_id'] != 1? "Color :".$item['options']['Color'] :""?>
                                    </small>
                                </td>

                                <td class="cart_unit" data-title="Unit price">
                                    <span class="price" id="product_price_5_19_0">
                                        <span class="price special-price"><?= number_format($item['price'],2) ?> QAR</span>
                                        <?php  if( $item['options']['discount'] > 0 ) :  ?>
                                            <span class="price-percent-reduction small"> &nbsp;-<?= $item['options']['discount']?>%&nbsp; </span>
                                            <span class="old-price">
                                                <?= number_format(
                                                    (100/$item['price']) * ( 100 - $item['options']['discount']  )
                                                    ,2) ?> QAR
                                            </span>
                                        <?php  endif;  ?>
                                    </span>
                                </td>
                                <td class="cart_quantity text-center">
                                    <input type="hidden" value="1" name="quantity_<?=$item['rowid']?>_hidden" />
                                    <input size="2" type="text" autocomplete="off" class="cart_quantity_input form-control grey" value="<?= $item['qty']?>" id="quantity_<?=$item['rowid']?>" name="quantity_<?=$item['rowid']?>" />
                                    <div class="cart_quantity_button clearfix">
                                        <a rel="nofollow" class="cart_quantity_down btn btn-default button-minus" id="cart_quantity_down_<?=$item['rowid']?>" href="" title="Subtract">
                                            <span><i class="fa fa-minus"></i></span> </a>
                                        <a rel="nofollow" class="cart_quantity_up btn btn-default button-plus" id="cart_quantity_up_<?=$item['rowid']?>" href="" title="Add">
                                            <span><i class="fa fa-plus"></i></span></a>
                                    </div>
                                </td>
                                <td class="cart_total" data-title="Total">
                                    <span class="price" id="total_product_price_<?=$item['rowid']?>"> <?= number_format($item['subtotal'],2) ?> QAR    </span>
                                </td>
                                <td class="cart_delete text-center" data-title="Delete">
                                    <div> <a rel="nofollow" title="Delete" class="cart_quantity_delete" id="<?=$item['rowid']?>" href=""><i class="fa fa-trash"></i></a> </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <!-- end order-detail-content -->

                <div id="HOOK_SHOPPING_CART"></div>
                <p class="cart_navigation clearfix">
                    <a  href="<?= current_url() ?>?step=1"
                        class="button btn btn-default standard-checkout button-medium pull-right"
                        title="Proceed to checkout"> <span>Proceed to checkout<i class="fa fa-chevron-right right"></i></span> </a>
                    <a   href="<?=base_url()?>"
                        class="button-exclusive button"
                        title="Continue shopping"> <i class="fa fa-chevron-left left"></i>Continue shopping </a> </p>
            <?php else: ?>
                <p   id="emptyCartWarning" class="alert alert-warning">Your shopping cart is empty.</p>
            <?php endif; ?>
        </div>
        <!-- #center_column -->

    </div>
    <!-- .row -->
</div>