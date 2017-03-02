<div id="columns" class="container">

    <div class="row">
        <div id="center_column" class="center_column col-sm-12 col-md-12 ">

            <h1 class="page-heading">Authentication</h1>


            <!---->
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <form action="" method="post" id="create-account_form" class="box">
                        <h3 class="page-subheading">Create an account</h3>
                        <div class="form_content clearfix">
                            <p>Please enter your email address to create an account.</p>
                            <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                            <div class="form-group">
                                <label for="email_create">Email address</label>
                                <input type="text" class="is_required validate account_input " data-validate="isEmail"
                                       id="email_create" name="email_create" size="45" value="">
                            </div>
                            <div class="submit">
                                <input type="hidden" class="hidden" name="back" value="my-account">
                                <button class="button button-medium exclusive" type="submit" id="SubmitCreate"
                                        name="SubmitCreate">
							<span>
								<i class="fa fa-user left"></i>
								Create an account
							</span>
                                </button>
                                <input type="hidden" class="hidden" name="SubmitCreate" value="Create an account">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <form action="" method="post" id="login_form" class="box">
                        <h3 class="page-subheading">Already registered?</h3>
                        <div class="form_content clearfix">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="is_required validate account_input " size="45" data-validate="isEmail"
                                       type="text" id="email" name="email" value="">
                            </div>
                            <div class="form-group">
                                <label for="passwd">Password</label>
                                <input class="is_required validate account_input " size="45" type="password"
                                       data-validate="isPasswd" id="passwd" name="passwd" value="">
                            </div>
                            <p class="lost_password form-group"><a href="<?= base_url('user/password-recovery') ?>"
                                                                   title="Recover your forgotten password"
                                                                   rel="nofollow">Forgot your password?</a></p>
                            <p class="submit">
                                <input type="hidden" class="hidden" name="back" value="my-account">
                                <button type="submit" id="SubmitLogin" name="SubmitLogin" value="1" class="button">
							<span>
								<i class="fa fa-lock left"></i>
								Sign in
							</span>
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>