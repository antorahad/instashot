<div class="container">
    <form class="signUpForm position-absolute top-50 start-50 translate-middle" method="post" action="assets/php/actions.php?signup">
        <h1 class="display-6 my-3 text-center logoTitle">InstaShot</h1>
        <div class="d-flex gap-3">
            <div class="form-floating mb-3">
                <input type="text" name="first_name" value="<?= showFormData('first_name') ?>" class="form-control" id="floatingInput" placeholder="First Name">
                <label for="floatingInput">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="last_name" value="<?= showFormData('last_name') ?>" class="form-control" id="floatingInput" placeholder="Last Name">
                <label for="floatingInput">Last Name</label>
            </div>
        </div>
        <?= showError('first_name') ?>
        <?= showError('last_name') ?>
        <div class="d-flex gap-3 mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" <?= isset($_SESSION['formdata']) ? '' : 'checked' ?> <?= showFormData('gender') == 1 ? 'checked' : '' ?>>
                <label class="form-check-label" for="exampleRadios1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="2" <?= showFormData('gender') == 2 ? 'checked' : '' ?>>
                <label class="form-check-label" for="exampleRadios2">
                    Female
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="3" <?= showFormData('gender') == 3 ? 'checked' : '' ?>>
                <label class="form-check-label" for="exampleRadios3">
                    Other
                </label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" value="<?= showFormData('email') ?>" class="form-control" id="floatingInput" placeholder="Email Address">
            <label for="floatingInput">Email Address</label>
        </div>
        <?= showError('email') ?>
        <div class="form-floating mb-3">
            <input type="text" name="username" value="<?= showFormData('username') ?>" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <?= showError('username') ?>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <?= showError('password') ?>
        <div class="d-grid">
            <button type="submit" class="btn signUpBtn">Sign Up</button>
        </div>
        <div class="my-3">
            <a class="message" href="?login">Have an account?</a>
        </div>
    </form>
</div>