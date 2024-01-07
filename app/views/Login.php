<div>
    <section class="register-body">
        <div class="register-container">
            <div class="register-form">
                <a class="logo" href="/">Inkwell</a>
                <p style="margin: 30px 0px; font-weight: 500;">Reconnect with Your Story – Welcome Back!</p>

                <p><?php if (isset($msg)) echo $msg ?></p>

                <form method="post" action="/login">
                    <label for="email">Username</label>
                    <input type="text" id="email" name="email" class="input-field" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="input-field" required>

                    <div style="text-align: center; margin-top: 2rem;">
                        <button type="submit" class="button-outlined">Login</button>
                    </div>
                </form>
                <p style="margin-top: 30px;">New to Inkwell? <a class="form-link" href="/register">Join now</a>.</p>
            </div>
        </div>
    </section>
</div>
