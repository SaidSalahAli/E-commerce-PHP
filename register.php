<?php 



ob_start() ;
// session_start();
include "style/header.php";

if (isset($_SESSION["login_users"])){
    header("Location:index.php");
    exit; 
}


ob_end_flush(); 
?>

?>

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Registration</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li>
                        <a href="index-2.html"><i class="lni lni-home"></i> Home</a>
                    </li>
                    <li>Registration</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">

                <div class="register-form">
                    <div class="title">
                        <h3>No Account? Register</h3>
                        <p>
                            Registration takes less than a minute but gives you full
                            control over your orders.
                        </p>
                    </div>
                    <form class="row  send_register">
                        <div class="valCall"></div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-fn">First Name</label>
                                <input class="form-control first_name" type="text" id="reg-fn" />
                                <div class="invalid-feedback error-message" style="display:none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-ln">Last Name</label>
                                <input class="form-control last_name" type="text" id="reg-ln" />
                                <div class="invalid-feedback error-message" style="display:none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-email ">E-mail Address</label>
                                <input class="form-control e_mail" type="email" id="reg-email" />
                                <div class="invalid-feedback error-message" style="display:none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-phone">Phone Number</label>
                                <input class="form-control phone_number" type="number" id="reg-phone" />
                                <div class="invalid-feedback error-message" style="display:none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <!-- <span class="alert-dangerr  error-message" style="display:none;" role="alert">
                                </span> -->
                                <label for="reg-pass">Password</label>
                                <input class="form-control password" type="password" autocomplete="off"
                                    class="form-control form-control-sm" id="newPassword" placeholder="New Password"
                                    aria-describedby="inputGroupPrepend" />
                                <div class="invalid-feedback error-message" style="display:none;">

                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6">
                            <div class="form-group">
                                <!-- <span class="error-message"></span> -->
                                <label for="reg-pass-confirm">Confirm Password</label>
                                <input class=" error form-control confirm_password " type="password" autocomplete="off"
                                    class="form-control form-control-sm" id="confirmPassword"
                                    placeholder="Confirm Password" aria-describedby="inputGroupPrepend" />
                                <div class="invalid-feedback error-message" style="display:none;">

                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">Register</button>
                        </div>
                        <p class="outer-link">
                            Already have an account? <a href="login.php">Login Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "style/footer.php"?>