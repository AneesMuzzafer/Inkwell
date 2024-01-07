<?php

use App\Models\User;
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
            <a class="link" href="/category">Category</a>
            <a class="compose-button" href="/compose">Compose</a>
            <a href="/profile" class="topbar-profile">
                <img class="story-user-image" src="<?= !is_null(Auth::user()->image) ? "../" . Auth::user()->image : User::DEFAULT_IMAGE?>">
                <span style="margin-left: 1rem; font-weight: 600;"><?= Auth::user()->username ?></span>
            </a>
        </div>
    </nav>

<?php endif; ?>
