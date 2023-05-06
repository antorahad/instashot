<?php
global $user;
?>
<div class="container">
    <form class="blockedPage position-absolute top-50 start-50 translate-middle">
        <h1 class="display-6 my-3 text-center logoTitle">InstaShot</h1>
        <p class="block_msg text-center">Hello, <?=$user['first_name'].' '.$user['last_name'].' ('.$user['email'].')'?> Your Account Has Been Blocked By InstaShot Authority.</p>
        <div class="my-3 text-center">
            <a href="assets/php/actions.php?logout" class="btn logoutBtn" type="submit">Logout</a>
        </div>
    </form>
</div>