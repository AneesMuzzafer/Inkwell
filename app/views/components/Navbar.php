<?php

use App\Models\User;
use App\Services\Auth;

if (!Auth::isAuth()) : ?>
    <div class="nav-container">
        <nav class="nav">
            <?= component("components.Logo") ?>
            <ul class="nav-link--wrapper">
                <a class="link" href="/register">Register</a>
                <a class="compose-button" href="/login">Login</a>
            </ul>
        </nav>
    </div>

<?php else : ?>

    <div class="nav-container">
        <nav class="nav" style="width: 1400px;">
            <?= component("components.Logo") ?>
            <div class="nav-link--wrapper">
                <a class="link cat" href="/category">Category</a>
                <a class="compose-button-main" href="/compose">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M21.455 5.416a.75.75 0 0 1-.096.943l-9.193 9.192a.75.75 0 0 1-.34.195l-3.829 1a.75.75 0 0 1-.915-.915l1-3.828a.778.778 0 0 1 .161-.312L17.47 2.47a.75.75 0 0 1 1.06 0l2.829 2.828a.756.756 0 0 1 .096.118m-1.687.412L18 4.061l-8.518 8.518l-.625 2.393l2.393-.625z" clip-rule="evenodd" />
                        <path fill="currentColor" d="M19.641 17.16a44.4 44.4 0 0 0 .261-7.04a.403.403 0 0 1 .117-.3l.984-.984a.198.198 0 0 1 .338.127a45.91 45.91 0 0 1-.21 8.372c-.236 2.022-1.86 3.607-3.873 3.832a47.77 47.77 0 0 1-10.516 0c-2.012-.225-3.637-1.81-3.873-3.832a45.922 45.922 0 0 1 0-10.67c.236-2.022 1.86-3.607 3.873-3.832a47.75 47.75 0 0 1 7.989-.213a.2.2 0 0 1 .128.34l-.993.992a.402.402 0 0 1-.297.117a46.164 46.164 0 0 0-6.66.255a2.89 2.89 0 0 0-2.55 2.516a44.421 44.421 0 0 0 0 10.32a2.89 2.89 0 0 0 2.55 2.516c3.355.375 6.827.375 10.183 0a2.89 2.89 0 0 0 2.55-2.516" />
                    </svg>
                    <span>
                        Compose
                    </span>
                </a>
                <a href="/profile" class="topbar-profile">
                    <img class="story-user-image" src="<?= !is_null(Auth::user()->image) ? "../../" . Auth::user()->image : User::DEFAULT_IMAGE ?>">
                    <span class="nav-name" style="margin-left: 1rem; font-weight: 600;"><?= Auth::user()->username ?></span>
                </a>
            </div>
        </nav>
    </div>

<?php endif; ?>
