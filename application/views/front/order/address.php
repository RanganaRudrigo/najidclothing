<div id="columns" class="container">

    <div class="row">



        <div id="center_column" class="center_column col-sm-12 col-md-12 ">





            <h1 class="page-heading">Addresses</h1>




            <!-- Steps -->
            <ul class="step clearfix" id="order_step">
                <li class="step_done first">
                    <a href="<?= base_url('user/order') ?>">
                        <em>01.</em> Summary
                    </a>
                </li>
                <li class="step_done step_done_last second">
                    <a href="<?= base_url('user/order?step=1') ?>">
                        <em>02.</em> Sign in
                    </a>
                </li>
                <li class="step_current third">
                    <span><em>03.</em> Address</span>
                </li>
                <li class="step_todo four">
                    <span><em>04.</em> Shipping</span>
                </li>
                <li id="step_end" class="step_todo last">
                    <span><em>05.</em> Payment</span>
                </li>
            </ul>
            <!-- /Steps -->



            <form action="<?= current_url()."?step=1" ?>" method="post">
                <div class="addresses clearfix">

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <ul class="address alternate_item box" id="address_invoice">
                                <li class="address_title"><h3 class="page-subheading">Your billing/shipping address</h3></li>
                                <li class="address_firstname address_lastname"> <?= $customer->gender ?><?= $customer->firstname ?> <?= $customer->lastname ?> </li>
                                <li class="address_address1 address_address2"><?= $customer->address1 ?> <?= $customer->address2 ?></li>
                                <li class="address_city address_state_name address_postcode"><?= $customer->city ?>, <?= $zone->name ?></li>
                                <li class="address_country_name"> <?= $country->name ?> </li>
                                <li class="address_phone"><?= $customer->phone ?></li>
                                <li class="address_update">
                                    <a class="button button-small btn btn-default"
                                       href="<?= base_url('user/order?update=address') ?>"
                                       title="Update">
                                        <span>Update<i  class="fa fa-chevron-right right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end row -->
                    <div id="ordermsg" class="form-group">
                        <label>If you would like to add a comment about your order, please write it in the field below.</label>
                        <textarea class="form-control" cols="60" rows="6" name="message"></textarea>
                    </div>
                </div> <!-- end addresses -->
                <p class="cart_navigation clearfix">
                    <input type="hidden" class="hidden" name="step" value="2">
                    <input type="hidden" name="back" value="">
                    <a href="<?= base_url() ?>" title="Previous" class="pull-left button-exclusive btn btn-default">
                        <i class="fa fa-chevron-left"></i>
                        Continue Shopping
                    </a>
                    <button type="submit" name="processAddress" class="button pull-right ">
                        <span>Proceed to checkout<i class="fa fa-chevron-right right"></i></span>
                    </button>
                </p>
            </form>

        </div><!-- #center_column -->

    </div><!-- .row -->
</div>