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
            <a class="link" href="/logout">Logout</a>
        </div>
    </nav>

<?php endif; ?>
