<div style="font-size: 24px; font-weight: 600; padding: 20px; padding-left: 100px;">Compose</div>

<section class="compose">
    <form class="write-container" method="post" action="/compose">
        <div>
            <button type="submit" class="button-outlined">Publish</button>
        </div>

        <label for="category" style="margin-top: 2rem;">Category</label>
        <select id="category" name="category" class="category-dropdown">
            <option value="1">Fiction</option>
            <option value="2">Non-Fiction</option>
            <option value="3">Poetry</option>
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
    </form>
</section>
