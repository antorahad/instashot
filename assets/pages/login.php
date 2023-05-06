    <div class="container">
        <form class="logInForm position-absolute top-50 start-50 translate-middle" method="post" action="assets/php/actions.php?login">
            <?= showError('checkuser') ?>
            <h1 class="display-6 my-3 text-center logoTitle">InstaShot</h1>
            <div class="form-floating mb-3">
                <input type="text" name="username_email" value="<?= showFormData('username_email') ?>" class="form-control" id="floatingInput" placeholder="Username/Email">
                <label for="floatingInput">Username/Email Address</label>
            </div>
            <?= showError('username_email') ?>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <?= showError('password') ?>
            <div class="my-2">
                <a href="?forgotpassword&newfp" class="message">Forget password!</a>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn logInBtn">Login</button>
            </div>
            <div class="my-2">
                <a class="message" href="?signup">Create new account?</a>
            </div>
        </form>
    </div>