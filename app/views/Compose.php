<?php

use App\Models\Category;

?>

<section style="background-color: var(--shaded); padding: 3rem; height: calc(100vh - 80px);">
    <div class="compose">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;  padding: 40px 40px 20px">
            <div style="font-size: 24px; font-weight: 600; align-self: flex-start;">Compose</div>
            <div style="margin: 0rem 0px;">
                <button onclick="submitCompose()" type="submit" class="button-outlined">Publish</button>
            </div>
        </div>
        <form id="form-compose" style="display: flex; align-items: start; width: 100%; gap: 2rem;" method="post" action="/compose" enctype="multipart/form-data">
            <div class="write-container">

                <label for="category" style="margin-top: 2rem;">Category</label>
                <select id="category" name="category" class="category-dropdown">
                    <?php foreach (Category::all() as $category) : ?>
                        <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="title" style="margin-top: 3rem;">Title</label>
                <input type="text" id="title" name="title" class="input-field" placeholder="Enter your title">

                <label for="content" style="margin-top: 2rem;">Content</label>
                <textarea id="content" rows=12 name="content" class="textarea-field" placeholder="Write your content here"></textarea>
            </div>

            <div class="compose-image-container">
                <img src="../assets/camera.jpg" class="compose-image" id="preview">
                <div class="file-input-container">
                    <input type="file" id="composeImage" name="storyImage" accept="image/jpeg, image/png" class="file-input" onchange="displayImage(this)">
                    <label for="composeImage" class="choose-image-button" style>Choose Image</label>
                </div>
            </div>
        </form>
    </div>
</section>
