<?php

use App\Models\Category;
use App\Models\Story;
use App\Models\User;
use App\Services\Auth;

if (!Auth::isAuth()) : ?>

    <section class="home-header">
        <div style="flex: 1;">
            <p class="home-header--title"><span class="quill">Quill</span> Ready?</p>
            <p class="home-header--subtitle" style="margin-bottom: 10px;">Inkwell Awaits Your Tale.</p>
            <p class="home-header--subtitle">Your Ideas, Our Ink. Let's Start a Colorful Journey!</p>
            <div class="button-outlined" style="margin-top: 3rem; background: transparent;">
                <a href="/register">Dive In</a>
            </div>
        </div>
        <div class="background-overlay"></div>
    </section>

<?php endif; ?>
<div class="stories-container">

    <section class="stories-wrapper">

        <form id="category-form" action="/" method="get">
            <div style="display: flex; flex-wrap: wrap; align-items: end; gap: 1rem; width: 100%; margin-top: 2rem;">
                <div class="search-wrapper">
                    <button class="search-button" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                        </svg></button>
                    <input oninput="onSearchInput(this)" id="search" placeholder="Search..." class="search-input" value="<?= $search ?>" name="search" />
                    <button id="clear-search" class="clear-button" style="<?= $search ? "display:'inline-block;" : "display:none;" ?>" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4" />
                        </svg></button>
                </div>
                <div class="dropdown-wrapper" style="flex:1; min-width: 100px;">
                    <label style="margin-bottom: 10px; margin-left: 20px;" for="category">Select Category</label>
                    <select id="category" name="category" class="home-dropdown" onchange="submitForm()">
                        <option value="all">All</option>
                        <?php foreach (Category::all() as $category) : ?>
                            <option value="<?= $category["id"] ?>" <?= $selectedCategory == $category["id"] ? "selected" : ""  ?>>
                                <?= $category["name"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="dropdown-wrapper" style="flex:1; min-width: 100px; max-width: 400px;">
                    <label style="margin-bottom: 10px; margin-left: 20px;" for="sortBy">Sort By</label>
                    <select id="sortBy" name="sortBy" class="home-dropdown" onchange="submitForm()">
                        <option value="DESC" <?= $sortBy == "DESC" ? "selected" : ""  ?>>Latest</option>
                        <option value="ASC" <?= $sortBy == "ASC" ? "selected" : "" ?>>Oldest</option>
                    </select>
                </div>
            </div>
            <input hidden id="page-old" value="<?= $page ?>" name="page" />
            <input hidden id="page" value="<?= 1 ?>" name="page" />
        </form>

        <?php foreach ($stories as $story) : ?>
            <div class="home-story">
                <img class="story-img" src="<?= !is_null($story->image) ? "../" . $story->image : Story::DEFAULT_IMAGE ?>" />
                <div class="story-body">
                    <div class="story-header">
                        <span class="story-category"><?= $story->category->name ?></span>
                        <span class="story-mins"><?= $story->readTime ?> min<?= ($story->readTime == 1 ? "" : "s") ?> read</span>
                        <a class="see-more" href="/story/<?= $story->id ?>">Read more</a>
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
                        <img class="story-user-image" src="<?= !is_null($story->user->image) ? "../" . $story->user->image : User::DEFAULT_IMAGE ?>">
                        <span class="story-user-name"><?= $story->user->username ?></span>
                        <span class="story-dot">.</span>
                        <span class="story-time"><?= date("M j, Y", strtotime($story->created_at)) ?></span>
                        <span class="story-dot">.</span>
                        <span class="story-likes"><?= $story->likes ?> like<?= $story->likes !== 1 ? "s" : "" ?></span>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <?php if (!count($stories)) : ?>
            <div class="empty-stories">
                <img src="../assets/empty.svg" class="empty-image">
                <div style="text-align: center;">
                    Nothing to show here! Back to&nbsp;<a style="font-size: inherit;" class="link" href="/">Home!</a>
                </div>
            </div>
        <?php endif; ?>

        <div style="display: flex; justify-content: flex-end; width: 100%; margin: 2rem 0; gap: 1rem">
            <button <?= $page <= 1 ? "disabled" : "" ?> class="page-button" onclick="previous()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M14.71 6.71a.996.996 0 0 0-1.41 0L8.71 11.3a.996.996 0 0 0 0 1.41l4.59 4.59a.996.996 0 1 0 1.41-1.41L10.83 12l3.88-3.88c.39-.39.38-1.03 0-1.41" />
                </svg>
                <span>Prev</span>
            </button>
            <button <?= count($stories) < Story::PAGE_SIZE ? "disabled" : "" ?> class="page-button" onclick="next()">
                <span>Next</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M9.29 6.71a.996.996 0 0 0 0 1.41L13.17 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.7 6.7c-.38-.38-1.02-.38-1.41.01" />
                </svg>
            </button>
        </div>


    </section>
</div>
