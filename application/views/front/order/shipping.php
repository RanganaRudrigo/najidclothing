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
                <li class="step_done  second">
                    <a href="<?= base_url('user/order?step=1') ?>">
                        <em>02.</em> Sign in
                    </a>
                </li>
                <li class="step_done step_done_last third">
                    <a href="<?= base_url('user/order?step=1') ?>">
                        <em>03.</em> Address
                    </a>
                </li>
                <li class="step_current four">
                    <span><em>04.</em> Shipping</span>
                </li>
                <li id="step_end" class="step_todo last">
                    <span><em>05.</em> Payment</span>
                </li>
            </ul>
            <!-- /Steps -->



            <form id="form" action="<?= current_url() ?>?step=2" method="post" name="carrier_area">
                <div class="order_carrier_content box">
                    <div id="HOOK_BEFORECARRIER">

                    </div>
                    <div class="delivery_options_address">
                        <p class="carrier_title">
                            Choose a shipping option for this address: My address
                        </p>
                        <div class="delivery_options">
                            <div class="delivery_option item">
                                <div>
                                    <table class="resume table table-bordered">
                                        <tbody><tr>
                                            <td class="delivery_option_radio">
                                                <div class="radio" id="uniform-delivery_option_32_0">
                                                    <span class="checked"><input id="delivery_option_32_0" class="delivery_option_radio" type="radio" name="delivery_option[32]" data-key="2," data-id_address="32" value="2," checked="checked"></span>
                                                </div>
                                            </td>
                                            <td class="delivery_option_logo">
                                                <img src="<?= IMG ?>2.jpg" alt="My carrier">
                                            </td>
                                            <td>
                                                <strong>My carrier</strong>
                                                Delivery next day!
                                            </td>
                                            <td class="delivery_option_price">
                                                <div class="delivery_option_price">
                                                    Free																																																									</div>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div></div> <!-- end delivery_option --></div> <!-- end delivery_options --><div class="hook_extracarrier" id="HOOK_EXTRACARRIER_32"></div></div> <!-- end delivery_options_address -->				<div id="extra_carrier" style="display: none;"></div>
                    <p class="carrier_title">Terms of service</p>
                    <p class="checkbox">
                    <div class="checker" id="uniform-cgv"><span><input type="checkbox" required name="cgv" id="cgv" value="1"></span></div>
                    <label for="cgv">I agree to the terms of service and will adhere to them unconditionally.</label>
                    <a href="<?= base_url('user/order') ?>?terms=show" class="iframe" rel="nofollow">(Read the Terms of Service)</a>
                    </p>
                </div> <!-- end delivery_options_address -->
                <p class="cart_navigation clearfix">
                    <input type="hidden" name="step" value="3">
                    <input type="hidden" name="back" value="">
                    <a href="<?= base_url() ?>" title="Previous" class="button-exclusive btn btn-default">
                        <i class="fa fa-chevron-left"></i>
                        Continue shopping
                    </a>
                    <button type="submit" name="processCarrier" class="button btn btn-default standard-checkout button-medium" style="">
							<span>
								Proceed to checkout
								<i class="fa fa-chevron-right right"></i>
							</span>
                    </button>
                </p>
            </form>

        </div><!-- #center_column -->

    </div><!-- .row -->
</div>