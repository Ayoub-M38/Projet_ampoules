<?php

include_once 'header.php';

?>

<section class="form my-4 mx-5">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <img src="./images/bulb.jpg" alt="" class="img-fluid img-log">
            </div>
            <div class="col-lg-7 px-5 pt-5">
                <h1 class="font-weight-bold py-3">Logo</h1>
                <h4>Sign into your account</h4>
                <form action="login.php" method="post">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="email" name="email" placeholder="Email address" class="form-control my-3 p-4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" name="password" placeholder="Password" class="form-control my-3 p-4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7 mt-3 mb-5">
                            <button type="submit" name="submit" class="btn1">Login</button>
                        </div>
                    </div>
                    <a href="#">Forgot password</a>
                    <p>Don't have an account? <a href="#">Register here</a></p>
                </form>
            </div>
        </div>
    </div>
</section>