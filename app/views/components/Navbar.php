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
            <a class="button-outlined" href="/category">Create Category</a>
            <a class="button-outlined" href="/compose">Compose</a>
            <a class="link" href="/profile">
                <img class="story-user-image" src="<?=Auth::user()->image?>">
            </a>
            <a class="link" href="/logout">Logout</a>
        </div>
    </nav>

<?php endif; ?>
