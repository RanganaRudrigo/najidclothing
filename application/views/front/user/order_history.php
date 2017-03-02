<script type="text/javascript" src="<?= base_url('js/history.js') ?>"></script>
<div id="columns" class="container">

    <div class="row">



        <div id="center_column" class="center_column col-sm-12 col-md-12 ">







            <h1 class="page-heading bottom-indent">Order history</h1>
            <p class="info-title">Here are the orders you've placed since your account was created.</p>
            <div class="block-center" id="block-history">
                <table id="order-list" class="table table-bordered footab default footable-loaded footable">
                    <thead>
                    <tr>
                        <th class="first_item footable-first-column" data-sort-ignore="true">Order reference</th>
                        <th class="item footable-sortable">Date<span class="footable-sort-indicator"></span></th>
                        <th data-hide="phone" class="item footable-sortable">Total price<span class="footable-sort-indicator"></span></th>
                        <th data-sort-ignore="true" data-hide="phone,tablet" class="item">Payment</th>
                        <th class="item footable-sortable">Status<span class="footable-sort-indicator"></span></th>
                        <th data-sort-ignore="true" data-hide="phone,tablet" class="item">Invoice</th>
                        <th data-sort-ignore="true" data-hide="phone,tablet" class="last_item footable-last-column">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $orders as $order ): ?>
                            <tr class="item ">
                                <td class="history_link bold footable-first-column"><span class="footable-toggle"></span>
                                    <a class="color-myaccount" href="javascript:showOrder( <?= $order->order_id ?> ,'<?= base_url( 'user/order_history' ) ?>');">
                                        #<?= $order->order_id ?>
                                    </a>
                                </td>
                                <td  class="history_date bold">
                                    <?= date("d/m/Y", strtotime($order->date) ) ?>
                                </td>
                                <td class="history_price" data-value="11.510000">
							<span class="price">
								<?= $order->total ?> QAR
							</span>
                                </td>
                                <td class="history_method"><?= $order->payment_type ?></td>
                                <td data-value="10" class="history_state">
															<span class="label" style="background-color:#4169E1; border-color:#4169E1;">
									 <?= $order->status ?>
								</span>
                                </td>
                                <td class="history_invoice">
                                    -
                                </td>
                                <td class="history_detail footable-last-column">
                                    <a class="btn btn-default button button-small" href="javascript:showOrder( <?= $order->order_id ?> ,'<?= base_url( 'user/order_history' ) ?>');">
								<span>
									Details<i class="fa fa-chevron-right right"></i>
								</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div id="block-order-detail"  >
                    <?= $content ?>
                </div>
            </div>
            <ul class="footer_links clearfix">
                <li>
                    <a class="btn btn-default button button-small" href="<?= base_url('user/my-account') ?>">
			<span>
				<i class="fa fa-chevron-left"></i> Back to Your Account
			</span>
                    </a>
                </li>
                <li>
                    <a class="btn btn-default button button-small" href="<?= base_url() ?>">
                        <span><i class="fa fa-home"></i> Home</span>
                    </a>
                </li>
            </ul>

        </div><!-- #center_column -->

    </div><!-- .row -->
</div>