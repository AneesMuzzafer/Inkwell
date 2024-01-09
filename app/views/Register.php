<div>
    <section class="register-body">
        <div class="register-container">
            <div class="register-form">
                <?= component("components.Logo") ?>
                <p style="margin: 30px 0px; font-weight: 500;">Inkwell Awaits Your Tale – Welcome!</p>

                <p class="login-message"><?php if (isset($msg)) echo $msg ?></p>

                <form method="post" action="/register">
                    <label for="username">Username</label>
                    <input style="background: transparent; border-color: #999;" type="text" id="username" name="username" class="input-field" required>

                    <label for="email">Email</label>
                    <input style="background: transparent; border-color: #999;" type="email" id="email" name="email" class="input-field" required>

                    <label for="password">Password</label>
                    <input style="background: transparent; border-color: #999;" type="password" id="password" name="password" class="input-field" required>

                    <label for="confirm_password">Confirm Password</label>
                    <input style="background: transparent;border-color: #999;" type="password" id="confirm_password" name="confirm_password" class="input-field" required>

                    <div style="text-align: center; margin-top: 2rem;">
                        <button style="background: transparent;" type="submit" class="button-outlined">Register</button>
                    </div>
                </form>
                <p style="margin-top: 30px;">Already have an account? <a class="form-link" href="/login">Login here</a>.</p>
            </div>
        </div>
    </section>
</div>
