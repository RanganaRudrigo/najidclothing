<div style="background-color:#fff;width:650px;font-family:Open-sans,sans-serif;color:#555454;font-size:13px;line-height:18px;margin:auto">
    <table style="width:100%;margin-top:10px">
        <tbody><tr>
            <td style="width:20px;padding:7px 0">&nbsp;</td>
            <td align="center" style="padding:7px 0">
                <table bgcolor="#ffffff" style="width:100%">
                    <tbody>
                    <tr>
                        <td align="center" style="border-bottom:4px solid #333333;padding:7px 0">
                            <a  href="<?=base_url()?>" style="color:#337ff1" target="_blank">
                                <img src="<?=base_url()?>images/logo.png"  class="CToWUd">
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:7px 0">
                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                <span style="font-weight:500;font-size:28px;text-transform:uppercase;line-height:33px">Hi <?= $customer->firstname ?> <?= $customer->lastname ?>,</span><br>
                                <span style="font-weight:500;font-size:16px;text-transform:uppercase;line-height:25px">Thank you for shopping with <?= TITLE ?>!</span>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #d6d4d4;background-color:#f8f8f8;padding:7px 0">
                            <table style="width:100%">
                                <tbody><tr>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                    <td style="padding:7px 0">
                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                            <p style="border-bottom:1px solid #d6d4d4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                                Order details : #<?= $order->order_id ?>				</p>
						<span style="color:#777">
							<span style="color:#333"><strong>Order:</strong></span>   Placed on <?= date("d/m/Y H:i:s", strtotime($order->date) ) ?><br><br>
							<span style="color:#333"><strong>Payment:</strong></span> <?= $order->payment_type ?><br><br>
							<span style="color:#333"><strong>Delivery:</strong></span>  with in 2-3 working days.
						</span>
                                        </font>
                                    </td>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:7px 0">
                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                <table bgcolor="#ffffff" style="width:100%;border-collapse:collapse">
                                    <tbody><tr>
                                        <th bgcolor="#f8f8f8" style="border:1px solid #d6d4d4;background-color:#fbfbfb;color:#333;font-family:Arial;font-size:13px;padding:10px">Reference</th>
                                        <th bgcolor="#f8f8f8" style="border:1px solid #d6d4d4;background-color:#fbfbfb;color:#333;font-family:Arial;font-size:13px;padding:10px">Product</th>
                                        <th bgcolor="#f8f8f8" style="border:1px solid #d6d4d4;background-color:#fbfbfb;color:#333;font-family:Arial;font-size:13px;padding:10px" width="17%">Unit price (QAR)</th>
                                        <th bgcolor="#f8f8f8" style="border:1px solid #d6d4d4;background-color:#fbfbfb;color:#333;font-family:Arial;font-size:13px;padding:10px">Quantity</th>
                                        <th bgcolor="#f8f8f8" style="border:1px solid #d6d4d4;background-color:#fbfbfb;color:#333;font-family:Arial;font-size:13px;padding:10px" width="17%">Total price (QAR)</th>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="border:1px solid #d6d4d4;text-align:center;color:#777;padding:7px 0">
                                            &nbsp;&nbsp;</td></tr>
                                    <?php  $total =0 ; ?>
                                    <?php foreach($order_detail as $item ): ?>
                                        <tr>
                                            <td style="border:1px solid #d6d4d4">
                                                <table>
                                                    <tbody><tr>
                                                        <td width="10">&nbsp;</td>
                                                        <td>
                                                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                                <?=$item->product->model?>
                                                            </font>
                                                        </td>
                                                        <td width="10">&nbsp;</td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                            <td style="border:1px solid #d6d4d4">
                                                <table>
                                                    <tbody><tr>
                                                        <td width="10">&nbsp;</td>
                                                        <td>
                                                            <img src="<?= UPT.$item->product->image ?>" width="45" ><br/>
                                                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                                <strong> <?=$item->product->title?> <?=$item->product->size?> <?=$item->product->color?> <span style="color: red" > <?= $item->discount != 0 ? "$item->discount %" : ""?></span> </strong>
                                                            </font>
                                                        </td>
                                                        <td width="10">&nbsp;</td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                            <td style="border:1px solid #d6d4d4">
                                                <table>
                                                    <tbody><tr>
                                                        <td width="10">&nbsp;</td>
                                                        <td align="right"  >
                                                                <font size="2" face="Open-sans, sans-serif" color="#555454" style="<?=$item->discount != 0 ?"text-decoration: line-through;font-size: 12px":""?> "   >
                                                                    <?= number_format($item->price,2) ?>
                                                                </font>
                                                            <?= $item->discount != 0 ? number_format( $item->price - (  ($item->discount / 100) * $item->price )  ,2)."" : ""?>
                                                            </td>
                                                        <td width="10">&nbsp;</td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                            <td style="border:1px solid #d6d4d4">
                                                <table>
                                                    <tbody><tr>
                                                        <td width="10">&nbsp;</td>
                                                        <td align="right">
                                                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                                <?= $item->qty ?>
                                                            </font>
                                                        </td>
                                                        <td width="10">&nbsp;</td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                            <td style="border:1px solid #d6d4d4">
                                                <table>
                                                    <tbody><tr>
                                                        <td width="10">&nbsp;</td>
                                                        <td align="right">
                                                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                                <?= number_format($item->total , 2) ?>
                                                            </font>
                                                        </td>
                                                        <td width="10">&nbsp;</td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        <?php $total +=   $item->total ;  ?>
                                    <?php endforeach; ?>





                                    <tr>
                                        <td colspan="5" style="border:1px solid #d6d4d4;text-align:center;color:#777;padding:7px 0">
                                            &nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                            <strong>Products</strong>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                        <td bgcolor="#f8f8f8" align="right" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                            <?= number_format($order->total,2) ?>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                            <strong>Total Discount</strong>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                        <td bgcolor="#f8f8f8" align="right" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                            <?= number_format($order->total - $total,2) ?>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                            <strong>Shipping</strong>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                        <td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                            <?= number_format($order->shipment_amount,2) ?>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                            <strong>Total paid (QAR) </strong>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                        <td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            <table style="width:100%;border-collapse:collapse">
                                                <tbody><tr>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                    <td align="right" style="color:#333;padding:0">
                                                        <font size="4" face="Open-sans, sans-serif" color="#555454">
                                                            <?= number_format($total + $order->shipment_amount ,2) ?>
                                                        </font>
                                                    </td>
                                                    <td width="10" style="color:#333;padding:0">&nbsp;</td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>

                                    </tbody></table>
                            </font>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding:7px 0">
                            <table style="width:100%">
                                <tbody><tr>
                                    <td width="310" style="border:1px solid #d6d4d4;background-color:#f8f8f8;padding:7px 0">
                                        <table style="width:100%">
                                            <tbody><tr>
                                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                                <td style="padding:7px 0">
                                                    <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                        <p style="border-bottom:1px solid #d6d4d4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                                            Billing address									</p>
									<span style="color:#777">
										<span style="font-weight:bold"><?= $customer->firstname ?></span> <span style="font-weight:bold"><?= $customer->lastname ?></span><br><?= $customer->company ?>
                                        <br><?= $customer->address1 ?> <?= $customer->address2 ?>, <?= $customer->city ?>, <?= $customer->state ?><br>Qatar<br>
									</span>

                                                    </font>
                                                </td>
                                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding:7px 0">
                            <font size="2" face="Open-sans, sans-serif" color="#555454">
			<span>
				You can review your order and download your invoice from the <a href="<?= base_url("user/order-history/?order_id=$order->order_id") ?>" style="color:#337ff1" target="_blank">"Order history"</a> section of your customer account by clicking <a href="<?= base_url('user/my-account') ?>" style="color:#337ff1" target="_blank">"My account"</a> on our shop.			</span>
                            </font>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border-top:4px solid #333333;padding:7px 0">
                            <span><a href="<?= base_url() ?>" style="color:#337ff1" target="_blank"><?= TITLE ?></a> powered by <a href="http://itmart.lk/" style="color:#337ff1" target="_blank">ITMARTX</a></span>
                        </td>
                    </tr>
                    </tbody></table>
            </td>
            <td style="width:20px;padding:7px 0">&nbsp;</td>
        </tr>
        </tbody></table><div class="yj6qo"></div><div class="adL">
    </div></div>