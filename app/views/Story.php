<?php

use App\Models\Story;
use App\Models\User;
?>
<div>

    <a class="back-home" href="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <path fill="currentColor" fill-rule="evenodd" d="M10.53 2.97a.75.75 0 0 1 0 1.06L6.56 8l3.97 3.97a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 0" clip-rule="evenodd" />
        </svg>
        <span> Back to Home</span>
    </a>

    <section class="stories-wrapper" style="padding: 0 var(--spx);">
        <div class="story">
            <div class="story-head">
                <img class="story-user-image" src="<?= $story->user()->image ?? User::DEFAULT_IMAGE ?>">
                <div class="story-head-left">
                    <span class="story-user-name"><?= $story->user()->username ?></span>
                    <span class="story-time"><?= date("M j, Y", strtotime($story->created_at)) ?></span>
                </div>
                <div class="story-head-right">
                    <span class="story-mins"><?= $story->getReadTime() ?> min<?= ($story->getReadTime() == 1 ? "" : "s") ?> read</span>
                    <span class="story-category"><?= $story->category()->name ?></span>
                </div>
            </div>
            <img class="story-img-lg" src="<?= $story->image ?? Story::DEFAULT_IMAGE ?>" />
            <div class="likes-row">
                <button data-liked="true" id="like" class="like-button" onclick="toggleLike(<?= $story->id ?>)">
                    <svg id="unliked" style="display: <?= !$isLiked ? 'inline-block' : 'none' ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                        <path fill="var(--gray)" d="M178 34c-21 0-39.26 9.47-50 25.34C117.26 43.47 99 34 78 34a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.68 334.68 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.68 334.68 0 0 0 53.06-37C219.8 153.59 238 123.2 238 94a60.07 60.07 0 0 0-60-60m-50 175.11C111.59 199.64 30 149.72 30 94a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 56.83 157.72 46 178 46a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                    </svg>

                    <svg id="liked" style="display: <?= $isLiked ? 'inline-block' : 'none' ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
                        <path fill="red" d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39c-10 6.1-19.5 12.8-28.5 20.1c-9-7.3-18.5-14-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9" />
                    </svg>
                </button>
                <span class="story-likes"><span id="total-likes"><?= $totalLikes ?></span> people liked this.</span>
            </div>
            <div class="story-title"><?= $story->title ?></div>
            <div class="story-content-lg">
                <?= $story->content ?>
            </div>
        </div>
    </section>

    <div class="story-divider">
        Suggested stories
    </div>

    <section class="stories-wrapper">

        <?php foreach ($relatedStories as $story) : ?>
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

        <!-- <div class="home-story">
            <img class="story-img" src="http://dl.fujifilm-x.com/global/products/cameras/gfx100s/sample-images/gfx100s_sample_02_eibw.jpg?_ga=2.203782416.1852843908.1704352190-106227692.1704352190" />
            <div class="story-body">
                <div class="story-header">
                    <span class="story-category">Gaming</span>
                    <span class="story-mins">2 mins read</span>
                </div>
                <div style="flex:1;">
                    <div class="story-title">
                        <a href="/story/1">
                            Autem aut sint voluptatibus.bus Autem aut sint voluptatibus Autem aut
                        </a>
                    </div>
                    <div class="story-content">In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design, innovation and creativity yoyo yoyo. A place where misfits have a seat on the table and In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design here, innovation and creativity. A place where misfits have a seat on the table and In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design, innovation and creativity. A place where misfits have a seat on the table and </div>
                </div>
                <div class="story-footer">
                    <img class="story-user-image" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1180&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <span class="story-user-name">Bianca Pacheco</span>
                    <span class="story-dot">.</span>
                    <span class="story-time">Dec 31, 2022</span>
                    <span class="story-dot">.</span>
                    <span class="story-likes">2 likes</span>
                </div>
            </div>
        </div>

        <div class="home-story">
            <img class="story-img" src="http://dl.fujifilm-x.com/global/products/cameras/gfx100s/sample-images/gfx100s_sample_02_eibw.jpg?_ga=2.203782416.1852843908.1704352190-106227692.1704352190" />
            <div class="story-body">
                <div class="story-header">
                    <span class="story-category">Gaming</span>
                    <span class="story-mins">2 mins read</span>
                </div>
                <div style="flex:1;">
                    <div class="story-title">Autem aut sint voluptatibus.bus Autem aut sint voluptatibus Autem aut</div>
                    <div class="story-content">In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design, innovation and creativity yoyo yoyo. A place where misfits have a seat on the table and In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design here, innovation and creativity. A place where misfits have a seat on the table and In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design, innovation and creativity. A place where misfits have a seat on the table and </div>
                </div>
                <div class="story-footer">
                    <img class="story-user-image" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1180&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <span class="story-user-name">Bianca Pacheco</span>
                    <span class="story-dot">.</span>
                    <span class="story-time">Dec 31, 2022</span>
                    <span class="story-dot">.</span>
                    <span class="story-likes">2 likes</span>
                </div>
            </div>
        </div>

        <div class="home-story">
            <img class="story-img" src="http://dl.fujifilm-x.com/global/products/cameras/gfx100s/sample-images/gfx100s_sample_02_eibw.jpg?_ga=2.203782416.1852843908.1704352190-106227692.1704352190" />
            <div class="story-body">
                <div class="story-header">
                    <span class="story-category">Gaming</span>
                    <span class="story-mins">2 mins read</span>
                </div>
                <div style="flex:1;">
                    <div class="story-title">Autem aut sint voluptatibus.bus Autem aut sint voluptatibus Autem aut</div>
                    <div class="story-content">In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design, innovation and creativity yoyo yoyo. A place where misfits have a seat on the table and In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design here, innovation and creativity. A place where misfits have a seat on the table and In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic design, innovation and creativity. A place where misfits have a seat on the table and </div>
                </div>
                <div class="story-footer">
                    <img class="story-user-image" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1180&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <span class="story-user-name">Bianca Pacheco</span>
                    <span class="story-dot">.</span>
                    <span class="story-time">Dec 31, 2022</span>
                    <span class="story-dot">.</span>
                    <span class="story-likes">2 likes</span>
                </div>
            </div>
        </div> -->

    </section>
</div>
