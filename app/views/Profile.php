<nav class="nav" style="padding: 0 100px;">
    <a class="logo" href="/">Inkwell</a>
    <div class="nav-link--wrapper">
        <a class="button-outlined" href="/compose">Compose</a>
        <a class="link" href="/profile">
            <img class="story-user-image" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1180&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        </a>
    </div>
</nav>

<div style="font-size: 24px; font-weight: 600; padding: 20px; padding-left: 100px;">Edit Profile</div>

<section class="profile">
    <div class="edit-profile-container">
        <div class="profile-picture-container">
            <img src="" class="profile-picture" id="preview">
            <div class="file-input-container">
                <input type="file" id="profilePicture" name="profilePicture" accept="image/jpeg, image/png" class="file-input" onchange="displayImage(this)">
                <label for="profilePicture" class="choose-image-button">Choose Image</label>
            </div>
        </div>


        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="input-field" value="user@example.com" disabled>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="input-field" value="currentUsername">

        <label for="bio">Bio</label>
        <input type="text" id="bio" name="bio" class="input-field" value="Current Bio">

        <label for="newPassword">New Password</label>
        <input type="password" id="newPassword" name="newPassword" class="input-field" placeholder="Leave blank to keep current password">

        <label for="confirmNewPassword">Confirm New Password</label>
        <input type="password" id="confirmNewPassword" name="confirmNewPassword" class="input-field" placeholder="Leave blank to keep current password">

        <div style="text-align: center; margin-top: 1rem;">
            <button type="submit" class="button-outlined">Save Changes</button>
        </div>
    </div>
</section>
