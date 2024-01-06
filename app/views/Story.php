<div>

    <?php

    use App\Services\Auth;

    if (!Auth::isAuth()) : ?>
        <nav class="nav">
            <a class="logo" href="/">Inkwell</a>
            <ul class="nav-link--wrapper">
                <a class="link" href="/register">Register</a>
                <a class="link" href="/login">Login</a>
            </ul>
        </nav>

    <?php else : ?>

        <nav class="nav" style="padding: 0 100px;">
            <a class="logo" href="/">Inkwell</a>
            <div class="nav-link--wrapper">
                <a class="button-outlined" href="/compose">Compose</a>
                <a class="link" href="/profile">
                    <img class="story-user-image" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1180&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </a>
            </div>
        </nav>

    <?php endif; ?>

    <a class="back-home" href="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <path fill="currentColor" fill-rule="evenodd" d="M10.53 2.97a.75.75 0 0 1 0 1.06L6.56 8l3.97 3.97a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 0" clip-rule="evenodd" />
        </svg>
        <span> Back to Home</span>
    </a>

    <!-- <?php dump($story->user()); ?> -->

    <section class="stories-wrapper" style="padding: 0 var(--spx);">
        <div class="story">
            <div class="story-head">
                <img class="story-user-image" src="<?= $story->user()->image ?>">
                <div class="story-head-left">
                    <span class="story-user-name"><?= $story->user()->username ?></span>
                    <span class="story-time">Dec 31, 2022</span>
                </div>
                <div class="story-head-right">
                    <span class="story-mins">2 mins read</span>
                    <span class="story-category"><?= $story->category()->name ?></span>
                </div>
            </div>
            <img class="story-img-lg" src="<?= $story->image ?>" />
            <div class="likes-row">
                <div style="cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                        <path fill="var(--text-gray)" d="M178 34c-21 0-39.26 9.47-50 25.34C117.26 43.47 99 34 78 34a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.68 334.68 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.68 334.68 0 0 0 53.06-37C219.8 153.59 238 123.2 238 94a60.07 60.07 0 0 0-60-60m-50 175.11C111.59 199.64 30 149.72 30 94a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 56.83 157.72 46 178 46a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                    </svg>
                </div>
                <span class="story-likes"><?= $story->likes ?> people liked this.</span>
            </div>
            <div class="story-title"><?= $story->title ?></div>
            <div class="story-content-lg">
                <?= $story->content ?>
                <!-- In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and <br>
                <br>
                In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and<br>
                <br>
                In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and<br>
                <br>
                In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and
                seat on the table and<br>
                <br>
                In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and
                seat on the table and<br>
                <br>
                In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and
                seat on the table and<br>
                <br>
                In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and
                seat on the table and<br>
                <br>
                In 2021 I landed my dream job. Working at Apple, the holy grail of minimalistic
                design, innovation and creativity yoyo yoyo. A place where misfits have a seat o
                n the table and In 2021 I landed my dream job. Working at Apple, the holy grail of
                minimalistic design here, innovation and creativity. A place where misfits have a s
                eat on the table and In 2021 I landed my dream job. Working at Apple, the holy gra
                il of minimalistic design, innovation and creativity. A place where misfits have a
                seat on the table and -->
            </div>
        </div>
    </section>

    <div class="story-divider">
        Suggested stories
    </div>

    <section class="stories-wrapper">
        <div class="home-story">
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
        </div>

    </section>
</div>
