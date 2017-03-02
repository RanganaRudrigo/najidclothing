<div id="columns" class="container">
    <div class="row">
        <div id="center_column" class="center_column col-sm-12 col-md-12 ">
            <h1 id="cart_title" class="page-heading">Order confirmation  </h1>

            <!-- Steps -->
            <ul class="step clearfix" id="order_step">
                <li class="step_done first">
                    <a href="<?= base_url('user/order') ?>">
                        <em>01.</em> Summary
                    </a>
                </li>
                <li class="step_done  second">
                    <a href="<?= base_url('user/order?step=1') ?>">
                        <em>02.</em> Sign in
                    </a>
                </li>
                <li class="step_done third">
                    <a href="<?= base_url('user/order?step=1') ?>">
                        <em>03.</em> Address
                    </a>
                </li>
                <li class="step_done four">
                    <a href="<?= base_url('user/order?step=2') ?>">
                        <em>04.</em> Shipping
                    </a>
                </li>
                <li id="step_end" class="step_current step_done_last">
                    <span><em>05.</em> Payment</span>
                </li>
            </ul>
            <!-- /Steps -->

            <div class="box">
                <p class="cheque-indent">
                    <strong class="dark">Your order on <?= $order->status ?>.</strong>
                </p>
                Please send us a <?= $order->payment_type ?> with
                <br>- Amount <span class="price"> <strong><?= number_format($order->total+$order->shipment_amount) ?> QAR</strong></span>
                <br>- Name of account owner  <strong><?= $customer->gender ?><?= $customer->firstname ?> <?= $customer->lastname ?></strong>
                <br>- Your order reference No #<?= $order->order_id ?> .
                <br>An email has been sent with this information.
                <br> <strong>Your order will be sent as soon as we receive payment.</strong>
                <br>If you have questions, comments or concerns, please contact our <a href="">expert customer support team. </a>.
            </div>
            <p class="cart_navigation exclusive">
                <a class="button-exclusive btn btn-default" href="<?= base_url('user/order-history') ?>" title="Back to orders"><i class="fa fa-chevron-left left"></i>Back to orders</a>
            </p>

        </div>
        <!-- #center_column -->

    </div>
    <!-- .row -->
</div>