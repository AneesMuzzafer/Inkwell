<nav class="nav" style="padding: 0 100px;">
    <a class="logo" href="/">Inkwell</a>
    <div class="nav-link--wrapper">
        <!-- <a class="button-outlined" href="/compose">Compose</a> -->
        <a class="link" href="/profile">
            <img class="story-user-image" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1180&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        </a>
    </div>
</nav>

<div style="font-size: 24px; font-weight: 600; padding: 20px; padding-left: 100px;">Compose</div>

<section class="compose">
    <div class="write-container">
        <div>
            <button type="submit" class="button-outlined">Publish</button>
        </div>

        <label for="category" style="margin-top: 2rem;">Category</label>
        <select id="category" name="category" class="category-dropdown">
            <option value="fiction">Fiction</option>
            <option value="non-fiction">Non-Fiction</option>
            <option value="poetry">Poetry</option>
        </select>

        <label for="title" style="margin-top: 2rem;">Title</label>
        <input type="text" id="title" name="title" class="input-field" placeholder="Enter your title">

        <label for="content" style="margin-top: 2rem;">Content</label>
        <textarea id="content" rows=8 name="content" class="textarea-field" placeholder="Write your content here"></textarea>

        <div class="compose-image-container">
            <div class="file-input-container">
                <input type="file" id="composeImage" name="profilePicture" accept="image/jpeg, image/png" class="file-input" onchange="displayImage(this)">
                <label for="composeImage" class="choose-image-button" style>Choose Image</label>
            </div>
            <img src="../assets/camera.jpg" class="compose-image" id="preview">
        </div>
    </div>
</section>
