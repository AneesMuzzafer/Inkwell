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
                <a class="compose-button" href="/compose">Compose</a>
                <a href="/profile" class="topbar-profile">
                    <img class="story-user-image" src="<?= !is_null(Auth::user()->image) ? "../../" . Auth::user()->image : User::DEFAULT_IMAGE ?>">
                    <span class="nav-name" style="margin-left: 1rem; font-weight: 600;"><?= Auth::user()->username ?></span>
                </a>
            </div>
        </nav>
    </div>

<?php endif; ?>
