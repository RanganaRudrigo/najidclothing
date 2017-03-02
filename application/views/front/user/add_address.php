 <div id="columns" class="container">

    <div class="row">


        <div id="center_column" class="center_column col-sm-12 col-md-12 ">


            <div class="box">
                <h1 class="page-subheading">Your addresses</h1>
                <p class="info-title">
                    To add a new address, please fill out the form below.
                </p>


                <p class="required"><sup>*</sup>Required field</p>
                <form action="" method="post" class="std" id="add_address">
                    <!--h3 class="page-subheading">Your address</h3-->
                    <div class="required form-group">
                        <label for="firstname">First name <sup>*</sup></label>
                        <input class="is_required validate form-control" data-validate="isName" type="text" name="firstname" id="firstname" value="<?= set_value('firstname',$customer->firstname)   ?>">
                    </div>
                    <div class="required form-group">
                        <label for="lastname">Last name <sup>*</sup></label>
                        <input class="is_required validate form-control" data-validate="isName" type="text" id="lastname" name="lastname" value="<?= set_value('lastname',$customer->lastname)  ?>">
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input class="form-control validate" data-validate="isGenericName" type="text" id="company" name="company" value="<?= set_value('company',$customer->company)   ?>">
                    </div>
                    <div class="required form-group">
                        <label for="address1">Address <sup>*</sup></label>
                        <input class="is_required validate form-control" data-validate="isAddress" type="text" id="address1" name="address1" value="<?= set_value('address1',$customer->address1)  ?>">
                    </div>
                    <div class="required form-group">
                        <label for="address2">Address (Line 2)</label>
                        <input class="validate form-control" data-validate="isAddress" type="text" id="address2" name="address2" value="<?= set_value('address2',$customer->address2)  ?>">
                    </div>
                    <div class="required form-group">
                        <label for="city">City <sup>*</sup></label>
                        <input class="is_required validate form-control" data-validate="isCityName" type="text" name="city" id="city" value="<?= set_value('city',$customer->city) ?>" maxlength="64">
                    </div>

                    <div class="required postcode form-group unvisible" style="display: block;">
                        <label for="postcode">Zip/Postal Code <sup>*</sup></label>
                        <input class="is_required validate form-control uniform-input text" data-validate="isPostCode" type="text" id="postcode" name="postcode" value="<?= set_value('postcode',$customer->postcode) ?>">
                    </div>
                    <div class="required form-group">
                        <label for="id_country">Country <sup>*</sup></label>
                        <select id="id_country" class="form-control" name="id_country"  >
                            <?php foreach ($countries as $country): ?>
                                <option value="<?=$country->country_id?>"  <?= $country->country_id == set_value('id_country',$customer->id_country) ?"selected":"" ?> > <?=$country->name?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="required id_state form-group" style="">
                        <label for="id_state">State <sup>*</sup></label>
                        <select name="zone_id" id="id_state" class="form-control" data-id="<?= set_value('zone_id',$customer->zone_id) ?>" >
                            <?php foreach ($zones as $zone): ?>
                                <option value="<?=$zone->zone_id?>"  > <?=$zone->name?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group phone-number">
                        <label for="phone">Home phone <sup>**</sup></label>
                        <input class="is_required validate form-control" data-validate="isPhoneNumber" type="tel" id="phone" name="phone" value="<?= set_value('phone',$customer->phone) ?>">
                    </div>
                    <div class="clearfix"></div>
                    <div class="required form-group">
                        <label for="phone_mobile">Mobile phone <sup>**</sup></label>
                        <input class="validate form-control" data-validate="isPhoneNumber" type="tel" id="phone_mobile" name="phone_mobile" value="<?= set_value('phone_mobile',$customer->phone_mobile) ?>">
                    </div>

                    <div class="form-group">
                        <label for="other">Additional information</label>
                        <textarea class="validate form-control" data-validate="isMessage" id="other" name="other" cols="26" rows="3"><?= set_value('other',$customer->other) ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                    <p class="submit2">
                        <button type="submit" name="submitAddress" id="submitAddress" value="1"
                                class="btn btn-default button button-medium">
                            <span>
                                Save
                                <i class="fa fa-chevron-right right"></i>
                            </span>
                        </button>
                    </p>
                </form>
            </div>
            <ul class="footer_links clearfix">
                <li>
                    <a class="btn btn-defaul button button-small" href="http://prestashop.magentech.com/sp_lovefashion/sp_lovefashion4/en/addresses">
                        <span><i class="fa fa-chevron-left"></i> Back to your addresses</span>
                    </a>
                </li>
            </ul>

        </div><!-- #center_column -->

    </div><!-- .row -->
</div>