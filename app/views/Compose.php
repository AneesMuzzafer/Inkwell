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
                <select required id="category" name="category" class="category-dropdown">
                    <?php foreach (Category::all() as $category) : ?>
                        <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="title" style="margin-top: 3rem;">Title</label>
                <input required type="text" id="title" name="title" class="input-field" placeholder="Enter your title">

                <input hidden name="content" id="content">

                <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                    <label for="content" style="margin-top: 2rem;">Content</label>
                    <div id="editor" class="editor-group" style="position: relative;">
                        <button class="editor-button" onclick="applyStyle('bold')" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor" d="M4 2h4.5a3.501 3.501 0 0 1 2.852 5.53A3.499 3.499 0 0 1 9.5 14H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1m1 7v3h4.5a1.5 1.5 0 0 0 0-3Zm3.5-2a1.5 1.5 0 0 0 0-3H5v3Z" />
                            </svg></button>
                        <button class="editor-button" onclick="applyStyle('italic')" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h6M7 19h6m1-14l-4 14" />
                            </svg></button>
                        <button class="editor-button" onclick="applyStyle('underline')" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 5v5a5 5 0 0 0 10 0V5M5 19h14" />
                            </svg></button>
                        <button class="editor-button" onclick="createLink()" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11 17H7q-2.075 0-3.537-1.463T2 12q0-2.075 1.463-3.537T7 7h4v2H7q-1.25 0-2.125.875T4 12q0 1.25.875 2.125T7 15h4zm-3-4v-2h8v2zm5 4v-2h4q1.25 0 2.125-.875T20 12q0-1.25-.875-2.125T17 9h-4V7h4q2.075 0 3.538 1.463T22 12q0 2.075-1.463 3.538T17 17z" />
                            </svg></button>
                        <button class="editor-button" onclick="insertParagraphBreak()" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 48 48">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                                    <path d="M6 4v40M42 4v40M18 26l-4 4l4 4" />
                                    <path d="M15 30h13a6 6 0 0 0 0-12H14" />
                                </g>
                            </svg></button>
                    </div>

                </div>

                <div id="editableContent" class="content-field" contenteditable="true"></div>

            </div>

            <div class="compose-image-container">
                <img src="../assets/camera.jpg" class="compose-image" id="preview">
                <div class="file-input-container">
                    <input type="file" id="composeImage" name="storyImage" accept="image/jpeg, image/png" class="file-input" onchange="displayImage(this)">
                    <label for="composeImage" class="choose-image-button">Choose Image</label>
                </div>
            </div>
        </form>
    </div>
</section>
