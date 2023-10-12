<div class="login container row justify-content-center align-items-center">
            <div class="logimg col-xl-7 d-flex justify-content-center align-items-center">
                <img src="./assets/images/webworks-logo(with name).png" alt="Webworks Logo">
            </div>

            <div class="card justify-content-between border-0 col-sm-8 col-xl-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h1>Login</h1>
                    <hr>
                    <div class="message row m-0">      
                            <div class="col left-content">
                            <?= show_message(); ?>
                            </div>
                    </div>
                    <form method="post">
                    <?= csrf_token()?>
                    <input type="hidden" name="action" value="validate_user">
                        <div class="row p-3">
                            <input type="text" class="form-control mb-3" name="username" required placeholder="Username or Email Address">
                            <input type="password" class="form-control" name="password" required placeholder="Password">
                        </div>
                        
                        <div class="reset-pw p-2">
                            <a href="/pages/reset">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary col-sm-12 m-2" name="submit">Login</button>

 
                        <div class="register p-2 d-flex align-items-center justify-content-center">
                            <p>Don't have an account?<a href="<?php echo SITE_URL?>/?page=register">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        