<div class="box box-small clearfix">
    <p class="dark">
        <strong>Order Reference <?= $order->order_id ?> - Placed on <?= date("d/m/Y H:i:s", strtotime($order->date) ) ?></strong>
    </p>
    <p><strong class="dark">Payment method</strong> <span class="color-myaccount"><?= $order->payment_type ?> </span></p>
</div>

<div class="adresses_bloc">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <ul class="address alternate_item box" id="address_invoice">
                <li class="address_title"><h3 class="page-subheading">Your billing/shipping address</h3></li>
                <li class="address_firstname address_lastname"> <?= $customer->gender ?><?= $customer->firstname ?> <?= $customer->lastname ?> </li>
                <li class="address_address1 address_address2"><?= $customer->address1 ?> <?= $customer->address2 ?></li>
                <li class="address_city address_state_name address_postcode"><?= $customer->city ?>, <?= $zone->name ?></li>
                <li class="address_country_name"> <?= $country->name ?> </li>
                <li class="address_phone"><?= $customer->phone ?></li>
            </ul>
        </div>
    </div>
</div>
    <div id="order-detail-content" class="table_block table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="first_item">Reference</th>
                <th class="item">Product</th>
                <th class="item">Quantity</th>
                <th class="item">Unit price</th>
                <th class="last_item">Total price</th>
            </tr>
            </thead>

            <tbody>
            <!-- Customized products -->
            <!-- Classic products -->
            <?php
            $total = 0;
            foreach ($order_details as $item): ?>
                <tr class="item">
                <td><label for="cb_31"><?=$item->product->model?></label></td>
                <td class="bold">
                    <label for="cb_31">
                        <?=$item->product->title?> <?=$item->product->size?> <?=$item->product->color?>
                    </label>
                </td>
                <td class="return_quantity">
                    <label for="cb_31"><span class="order_qte_span editable">  <?=$item->qty ?>  </span></label>
                </td>
                <td  >
                    <label  class="price" for="cb_31" style="<?=$item->discount != 0 ?"text-decoration: line-through;font-size: 12px":""?> " >
                        <?= $item->price ?> QAR
                    </label>
                    <label  class="price" for="cb_31"  >
                        <?= $item->discount != 0 ? number_format( $item->price - (  ($item->discount / 100) * $item->price )  ,2)."" : ""?>
                    </label>
                </td>
                <td >
                    <label  class="price" for="cb_31">
                        <?= $item->total ?> QAR
                    </label>
                </td>
                </tr>
            <?php
                $total +=  $item->total  ;
            endforeach; ?>

            </tbody>
            <tfoot>
            <tr class="item">
                <td colspan="1">
                    <strong>Items (tax excl.)</strong>
                </td>
                <td colspan="4">
                    <span class="price"><?= number_format($order->total) ?> QAR</span>
                </td>
            </tr>
            <tr class="item">
                <td colspan="1">
                    <strong>Shipment</strong>
                </td>
                <td colspan="4">
                    <span class="price"><?= number_format($order->shipment_amount,2) ?> QAR</span>
                </td>
            </tr>

            <tr class="totalprice item">
                <td colspan="1">
                    <strong>Total</strong>
                </td>
                <td colspan="4">
                    <span class="price"><?= number_format($order->shipment_amount + $total,2) ?> QAR</span>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

<div class="  clearfix">
    <a  class="btn btn-default button button-small pull-right " >
			<span>
				<i class="fa fa-print"></i> Print
			</span>
    </a>
</div>