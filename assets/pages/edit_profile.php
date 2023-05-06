<?php 
global $user;
?>
<div class="container">
    <form class="editForm" method="post" action="assets/php/actions.php?updateprofile" enctype="multipart/form-data">
        <h3 class="display-6 my-3 text-center">Edit profile</h3>
        <?php
            if(isset($_GET['success'])){
        ?>
            <p class="text-success text-center">Profile is updated !</p>
        <?php
            }
        ?>
        <div class="form-floating mt-1">
            <div class="my-2 text-center">
                <img src="assets/images/profile/<?=$user['profile_pic']?>" style="width: 150px; height:150px; border-radius: 50%;" alt="...">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Change Profile Picture</label>
                <input class="form-control" type="file" name="profile_pic" id="formFile">
            </div>
            <?= showError('profile_pic') ?>
        </div>
        
        <div class="d-flex gap-3">
            <div class="form-floating mb-3">
                <input type="text" name="first_name" value="<?=$user['first_name']?>" class="form-control" id="floatingInput" placeholder="First Name">
                <label for="floatingInput">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text"  name="last_name" value="<?=$user['last_name']?>" class="form-control" id="floatingInput" placeholder="Last Name">
                <label for="floatingInput">Last Name</label>
            </div>
        </div>
        <?= showError('first_name') ?>
        <?= showError('last_name') ?>
        <div class="d-flex gap-3 mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" <?=$user['gender']==1?'checked':''?> disabled>
                <label class="form-check-label" for="exampleRadios1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2" <?=$user['gender']==2?'checked':''?> disabled>
                <label class="form-check-label" for="exampleRadios2">
                    Female
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="3" <?=$user['gender']==3?'checked':''?> disabled>
                <label class="form-check-label" for="exampleRadios3">
                    Other
                </label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="email" value="<?=$user['email']?>" class="form-control" id="floatingInput" placeholder="Email Address" disabled>
            <label for="floatingInput">Email Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="username" value="<?=$user['username']?>" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <?= showError('username') ?>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">New Password</label>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn UpBtn">Update Profile</button>
        </div>
    </form>
</div>