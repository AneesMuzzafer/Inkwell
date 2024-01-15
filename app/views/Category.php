
<section class="compose" style="flex-direction: column; padding: 0 var(--px); border: 0px; min-height: calc(100vh - 140px);">
    <div style="font-size: 24px; font-weight: 600; padding: 20px; color: var(--text-gray); ">All Categories</div>
    <div class="category-container" >

        <?php foreach ($categories as $category) : ?>
            <span class="story-category"><?= $category["name"] ?></span>
        <?php endforeach; ?>

    </div>

    <p style="color: red; margin-top: 2rem;"><?php if (isset($msg)) echo $msg ?></p>

    <form class="write-container" style="border: none;" method="post" action="/category">

        <label for="name" style="margin-top: 2rem;">Name</label>
        <input required type="text" id="name" name="name" class="input-field" placeholder="Category name">

        <div style="text-align: right; margin-bottom: 20px;">
            <button type="submit" class="button-outlined">Add Category</button>
        </div>
    </form>
</section>
