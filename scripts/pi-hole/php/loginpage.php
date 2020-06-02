<?php
/* Pi-hole: A black hole for Internet advertisements
*  (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*  Network-wide ad blocking via your own hardware.
*
*  This file is copyright under the latest version of the EUPL.
*  Please see LICENSE file for your rights under this license. */ ?>

<div class="row justify-content-center pt-4">
    <div class="col-sm-8 col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header text-center">
                <img src="img/logo.svg" alt="Pi-hole logo" class="d-block img-fluid mx-auto <?php echo $boxedlayout ? "w-50" : "w-25" ?>">

                <p class="text-xl">Pi-<strong>hole</strong></p>
                <p>Sign in to start your session</p>
                <h2 id="cookieInfo" class="card-title text-danger my-2 d-none">Verify that cookies are allowed for <code><?php echo $_SERVER['HTTP_HOST']; ?></code></h2>

                <?php if ($wrongpassword) { ?>
                    <div class="text-danger mb-3">
                        <i class="fas fa-times-circle"></i> Wrong password!
                    </div>
                <?php } ?>
            </div>

            <div class="card-body"> <!-- TODO this whole form and inputs-->
                <form action="" id="loginform" method="post">
                    <div class="form-group">
                        <label class="sr-only" for="loginpw">Password</label>
                        <input type="password" id="loginpw" name="pw" class="form-control<?php echo $wrongpassword ? " is-invalid" : "" ?>" placeholder="Password" autofocus>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <ul>
                                <li><kbd>Return</kbd> &rarr; Log in and go to requested page (<?php echo $scriptname; ?>)</li>
                                <li><kbd>Ctrl + Return</kbd> &rarr; Log in and go to Settings page</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group pull-left">
                                <div>
                                    <input type="checkbox" id="logincookie" name="persistentlogin">
                                    <label for="logincookie">Remember me for 7 days</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">
                                <i class="fas fa-sign-in-alt"></i> Log in
                            </button>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card card-<?php echo $wrongpassword ? "danger" : "lightblue collapsed-card" ?>">
                                <div class="card-header">
                                    <h3 class="card-title">Forgot password</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas <?php echo $wrongpassword ? "fa-minus" : "fa-plus" ?> text-white"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    After installing Pi-hole for the first time, a password is generated and displayed to the user. The
                                    password cannot be retrieved later on, but it is possible to set a new password (or explicitly disable
                                    the password by setting an empty password) using the command
                                    <pre class="bg-light mt-2">sudo pihole -a -p</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
