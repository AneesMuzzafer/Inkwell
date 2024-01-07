<div style="font-size: 24px; font-weight: 600; padding: 20px; padding-left: 100px; color: var(--text-gray)">All Categories</div>

<section class="compose" style="flex-direction: column; padding: 0 var(--px)">
    <div style="width: 100%; display: flex; flex-wrap: wrap; gap: 10px; ">

        <?php foreach ($categories as $category) : ?>
            <span class="story-category"><?= $category["name"] ?></span>
        <?php endforeach; ?>

    </div>


    <form class="write-container" method="post" action="/category">

        <label for="name" style="margin-top: 2rem;">Name</label>
        <input type="text" id="name" name="name" class="input-field" placeholder="Enter your title">

        <div style="text-align: right;">
            <button type="submit" class="button-outlined">Add Category</button>
        </div>
    </form>
</section>
