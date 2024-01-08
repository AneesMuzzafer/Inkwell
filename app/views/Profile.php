<section style="background-color: var(--shaded); padding: 3rem; height: calc(100vh - 140px);">
    <div class="profile">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding: 40px">
            <div style="font-size: 24px; font-weight: 600; align-self: flex-start;">Edit Profile</div>
            <a class="compose-button" href="/logout">Logout</a>
        </div>
        <p style="color: green;"><?php if (isset($msg)) echo $msg ?></p>

        <form style="display: flex; align-items: start; width: 100%;" method="post" action="/profile" enctype="multipart/form-data">
            <div class="profile-picture-container">
                <img src="<?= $data["image"] ?>" class="profile-picture" id="preview">
                <div class="file-input-container">
                    <input type="file" id="profilePicture" name="profilePicture" accept="image/jpeg, image/png" class="file-input" onchange="displayImage(this)">
                    <label for="profilePicture" class="choose-image-button">Choose Image</label>
                </div>
            </div>

            <div class="edit-profile-container">

                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="input-field" value="<?= $data["email"] ?>" disabled>

                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="input-field" value="<?= $data["username"] ?>">

                <label for="bio">Bio</label>
                <input type="text" id="bio" name="bio" placeholder="bio" class="input-field" value="<?= $data["bio"] ?>">

                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="password" class="input-field" placeholder="Leave blank to keep current password">

                <label for="confirmNewPassword">Confirm New Password</label>
                <input type="password" id="confirmNewPassword" name="confirm_password" class="input-field" placeholder="Leave blank to keep current password">

                <div style="text-align: right; margin-top: 1rem;">
                    <button type="submit" class="button-outlined">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</section>
