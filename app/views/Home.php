<div>
    <?php

    use App\Models\Story;
    use App\Services\Auth;

    if (!Auth::isAuth()) : ?>

        <section class="home-header">
            <div style="flex: 1;">
                <p class="home-header--title"><span class="quill">Quill</span> Ready?</p>
                <p class="home-header--subtitle" style="margin-bottom: 10px;">Inkwell Awaits Your Tale.</p>
                <p class="home-header--subtitle">Your Ideas, Our Ink. Let's Start a Colorful Journey!</p>
                <div class="button-outlined" style="margin-top: 2rem;">
                    <a href="/register">Dive In</a>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <section class="stories-wrapper">

        <?php foreach ($stories as $story) : ?>
            <div class="home-story">
                <img class="story-img" src="<?= $story->image ?>" />
                <div class="story-body">
                    <div class="story-header">
                        <span class="story-category"><?= $story->category->name ?></span>
                        <span class="story-mins"><?= $story->readTime ?> min<?= ($story->readTime == 1 ? "" : "s") ?> read</span>
                    </div>
                    <div style="flex:1;">
                        <div class="story-title">
                            <a href="/story/<?= $story->id ?>">
                                <?= $story->title ?>
                            </a>
                        </div>
                        <div class="story-content"><?= $story->content ?></div>
                    </div>
                    <div class="story-footer">
                        <img class="story-user-image" src="<?= $story->user->image ?>">
                        <span class="story-user-name"><?= $story->user->username ?></span>
                        <span class="story-dot">.</span>
                        <span class="story-time"><?= date("M j, Y", strtotime($story->created_at)) ?></span>
                        <span class="story-dot">.</span>
                        <span class="story-likes"><?= $story->likes ?> likes</span>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </section>
</div>
