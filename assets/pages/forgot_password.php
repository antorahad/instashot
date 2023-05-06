    <div class="container">
        <?php
        if (isset($_SESSION['forgot_code']) && !isset($_SESSION['auth_temp'])) {
            $action = 'verifycode';
        } elseif (isset($_SESSION['forgot_code']) && isset($_SESSION['auth_temp'])) {
            $action = 'changepassword';
        } else {
            $action = 'forgotpassword';
        }
        ?>
        <form class="forgetPassword position-absolute top-50 start-50 translate-middle" method="post" action="assets/php/actions.php?<?= $action ?>">
            <?php
            if ($action == 'forgotpassword') {
            ?>
                <h5 class="display-6 my-3 text-center">Forget Password</h5>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="Email Address">
                    <label for="floatingPassword">Enter your email</label>
                </div>
                <?= showError('email') ?>
                <div class="d-grid mb-3">
                    <button class="btn resendBtn" type="submit">Send Verfication Code</button>
                </div>
            <?php
            }
            ?>


            <?php
            if ($action == 'verifycode') {
            ?>
                <h5 class="display-6 my-3 text-center">Verify Code</h5>
                <p class="text-center">Enter 6 Digit Code Sended to You (<?= $_SESSION['forgot_email'] ?>)</p>
                <div class="form-floating mb-3">
                    <input type="text" name="code" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">######</label>
                </div>
                <?= showError('email_verify') ?>
                <div class="d-grid mb-3">
                    <button class="btn verifyBtn" type="submit">Verify Code</button>
                </div>
            <?php
            }
            ?>


            <?php
            if ($action == 'changepassword') {
            ?>
                <h5 class="display-6 my-3 text-center">Change Password</h5>
                <p class="text-center">Enter your new password (<?= $_SESSION['forgot_email'] ?>)</p>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Enter new password</label>
                </div>
                <?= showError('password') ?>
                <div class="d-grid mb-3">
                    <button class="btn verifyBtn" type="submit">Change Password</button>
                </div>
            <?php
            }
            ?>
            <a href="?login" class="text-decoration-none"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        </form>
    </div>