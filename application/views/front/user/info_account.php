<div id="columns" class="container">

    <div class="row">
        <form action="" method="post" id="account-creation_form" class="std box form-horizontal">

            <div class="account_creation">
                <h3 class="page-subheading">Your personal information</h3>
                <p class="required"><sup>*</sup>Required field</p>
                <div class="clearfix form-group">
                    <label class="control-label col-sm-4">Title</label>
                    <div class="col-sm-6">
                        <div class="radio-inline">
                            <label for="id_gender1" class="top">
                                <input type="radio" name="gender" id="id_gender1"  <?= set_value('gender',$customer->gender) == 'Mr.' ? "checked" :"" ?> value="Mr.">
                                Mr.
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label for="id_gender2" class="top">
                                <input type="radio" name="gender" id="id_gender2"  <?= set_value('gender',$customer->gender) == 'Mrs.' ? "checked" :"" ?>  value="Mrs.">
                                Mrs.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="required form-group">
                    <label class="control-label col-sm-4" for="customer_firstname">First name <sup>*</sup></label>
                    <div class="col-sm-6">
                        <input onkeyup="$('#firstname').val(this.value);" type="text" class="is_required validate form-control" data-validate="isName" id="customer_firstname" name="firstname" value="<?= set_value('firstname',$customer->firstname)?>">
                    </div>
                </div>
                <div class="required form-group">
                    <label class="control-label col-sm-4" for="customer_lastname">Last name <sup>*</sup></label>
                    <div class="col-sm-6">
                        <input onkeyup="$('#lastname').val(this.value);" type="text" class="is_required validate form-control" data-validate="isName" id="customer_lastname" name="lastname" value="<?= set_value('lastname',$customer->lastname)?>">
                    </div>
                </div>
                <div class="required form-group">
                    <label class="control-label col-sm-4" for="email">Email <sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="email" class="is_required validate form-control" data-validate="isEmail" id="email" name="email" value="<?= set_value('email', $customer->email ) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Date of Birth</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-3 col-xs-3">
                                <select class="form-control" id="days" name="days">
                                    <option value="">-</option>
                                    <?php for($i=1;$i<32;$i++): ?>
                                        <option value="<?=$i?>"  <?= set_value('days', $customer->days ) == $i ? "selected" :"" ?> ><?=$i?>&nbsp;&nbsp;</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <select class="form-control" id="months" name="months">
                                    <option value="">-</option>
                                    <option value="1" <?= set_value('months', $customer->months ) == 1 ? "selected" :"" ?> >January&nbsp;</option>
                                    <option value="2" <?= set_value('months', $customer->months ) == 2 ? "selected" :"" ?> >February&nbsp;</option>
                                    <option value="3" <?= set_value('months', $customer->months ) == 3 ? "selected" :"" ?> >March&nbsp;</option>
                                    <option value="4" <?= set_value('months', $customer->months ) == 4 ? "selected" :"" ?> >April&nbsp;</option>
                                    <option value="5" <?= set_value('months', $customer->months ) == 5 ? "selected" :"" ?> >May&nbsp;</option>
                                    <option value="6" <?= set_value('months', $customer->months ) == 6 ? "selected" :"" ?> >June&nbsp;</option>
                                    <option value="7" <?= set_value('months', $customer->months ) == 7 ? "selected" :"" ?> >July&nbsp;</option>
                                    <option value="8" <?= set_value('months', $customer->months ) == 8 ? "selected" :"" ?> >August&nbsp;</option>
                                    <option value="9" <?= set_value('months', $customer->months ) == 9 ? "selected" :"" ?> >September&nbsp;</option>
                                    <option value="10" <?= set_value('months', $customer->months ) == 10 ? "selected" :"" ?> >October&nbsp;</option>
                                    <option value="11" <?= set_value('months', $customer->months ) == 11 ? "selected" :"" ?> >November&nbsp;</option>
                                    <option value="12" <?= set_value('months', $customer->months ) == 12 ? "selected" :"" ?> >December&nbsp;</option>
                                </select>
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <?php $year = date("Y");   ?>
                                <select class="form-control" id="years" name="years">
                                    <option value="">-</option>
                                    <?php for($i=$year; $i > ($year-100) ;$i--): ?>
                                        <option value="<?=$i?>"  <?= set_value('years', $customer->years ) == $i ? "selected" :"" ?> ><?=$i?>&nbsp;&nbsp;</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Current Password </label>
                    <div class="col-sm-6">
                    <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="password[old]" id="old_passwd">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">New Password  </label>
                    <div class="col-sm-6">
                        <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="password[new]" id="passwd">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="email"> Confirmation </label>
                    <div class="col-sm-6">
                        <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="password[confirmation]" id="confirmation">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <div class="checkbox">
                            <input type="hidden"  name="newsletter"   value="0">
                            <input type="checkbox" <?= set_value('newsletter', $customer->newsletter ) == 1 ?"checked":"" ?>  name="newsletter" id="newsletter" value="1">
                            <label for="newsletter">Sign up for our newsletter!</label>
                        </div>
                    </div>
                </div>



            </div>

            <div class="submit clearfix">
                <button type="submit" name="submitAccount" value="1" id="submitAccount" class="btn btn-outline button button-medium">
                    <span>Register</span>
                </button>
                <p class="pull-right required"><span><sup>*</sup>Required field</span></p>
            </div>
        </form>
    </div>