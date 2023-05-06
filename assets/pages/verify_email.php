<?php
global $user;
?>
<div class="container">
    <form class="verifyEmail position-absolute top-50 start-50 translate-middle" method="post" action="assets/php/actions.php?verify_email">
        <h5 class="display-6 my-3 text-center">Email Verfication</h5>
        <p class="text-center my-3">Verify your email (<?= $user['email'] ?>)</p>
        <div class="form-floating mb-3">
            <input type="text" name="code" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Enter 6 Digit Code Sended to You</label>
        </div>
        <?php
        if (isset($_GET['resended'])) {
        ?>
            <p class="text-success">Verfication code Sended.</p>
        <?php
        }
        ?>
        <?= showError('email_verify') ?>
        <div class="d-flex justify-content-between mb-3">
            <button class="btn verifyBtn" type="submit">Verify Email</button>
            <a href="assets/php/actions.php?resend_code" class="btn resendBtn" type="submit">Send Code</a>
        </div>
        <a href="assets/php/actions.php?logout" class="text-decoration-none"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
    </form>
</div>