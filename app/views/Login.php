<div>
    <section class="register-body">
        <div class="register-container">
            <div class="register-form">
                <?= component("components.Logo") ?>
                <p style="margin: 30px 0px; font-weight: 500;">Reconnect with Your Story – Welcome Back!</p>

                <p class="login-message"><?php if (isset($msg)) echo $msg ?></p>

                <form method="post" action="/login">
                    <label for="email">Email</label>
                    <input style="background: transparent; border-color: #999;" type="text" id="email" name="email" class="input-field" required>

                    <label for="password">Password</label>
                    <input style="background: transparent; border-color: #999;" type="password" id="password" name="password" class="input-field" required>

                    <div style="text-align: center; margin-top: 2rem;">
                        <button style="background: transparent;" type="submit" class="button-outlined">Login</button>
                    </div>
                </form>
                <p style="margin-top: 30px;">New to Inkwell? <a class="form-link" href="/register">Join now</a>.</p>
            </div>
        </div>
    </section>
</div>
