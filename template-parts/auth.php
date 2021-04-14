
<!-- Login -->
<div id="enter" class="login mfp-hide">
	<h4 class="login__title modal-title">Войдите в свой аккаунт</h4>
	<p class="login__question modal-text">Еще нет учетной записи? <span><a href="#reg" class="popup-link-2 link-more">Зарегистрируйтесь сейчас</a></span>, это займет не более минуты</p>


	<form id="log" class="log" method="post">

		<div class="log__group">
			<label>Email или Имя пользователя</label>
			<input type="text" name="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" class="log__input">
		</div>
		<div class="log__group show-pass">
			<label>Пароль</label>
			<input id="password" type="password" name="password" class="log__input">
			<span class="log__eye password-eye" data-target="#password">
						<svg width="34" height="22">
							<use xlink:href="#eye"/>
						</svg>
					</span>
		</div>
		<div class="log__wrap">
			<div class="log__group check">
				<input id="check" type="checkbox" name="rememberme" value="forever">
				<label for="check">Запомнить пароль</label>
			</div>
			<a href="#recovery" class="popup-link-1 log__forget">Забыли пароль?</a>
		</div>
		<div class="log__btn">
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			<input id="entry" type="submit" name="login" value="Войти" class="btn"/>
		</div>

	</form>

	<div class="var">
		<p class="var__text">Или войдите в систему с помощью</p>
		<ul class="var__list">
			<li>
				<a href="#" class="var__link var__link_goo">
					<svg width="14" height="14">
						<use xlink:href="#google"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#" class="var__link var__link_vk">
					<svg width="18" height="18">
						<use xlink:href="#vk"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#" class="var__link var__link_fb">
					<svg width="16" height="16">
						<use xlink:href="#facebook"/>
					</svg>
				</a>
			</li>
		</ul>
	</div>
</div>

<!-- Forget password -->
<div id="recovery" class="recovery mfp-hide">
	<div class="forget">
		<p class="forget__title modal-subtitle">Забыли пароль?</p>
		<p class="forget__text modal-text">Введите ваш Email. Вам будет выслан проверочный код. После получения кода подтверждения вы сможете выбрать новый пароль для своей учетной записи.</p>

        <form action="<?php echo home_url('/my-account'); ?>" method="post" id="recover" class="log">
            <div class="log__group">
                <label>Email</label>
                <input type="hidden" name="wc_reset_password" value="true" />
                <input type="email" name="user_login" class="log__input">
            </div>
            <div class="log__btn">
                <input id="pass" type="submit" value="Отправить пароль" class="btn"/>
            </div>

			<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

        </form>

		<a href="#enter" class="popup-link-1 link-more">
			<svg width="18" height="20">
				<use xlink:href="#nav-right"/>
			</svg>
			Назад
		</a>
	</div>
</div>

<!-- Registration -->
<div id="reg" class="reg mfp-hide">
	<h4 class="reg__title modal-title">Регистрация нового аккаунта</h4>
	<p class="reg__question modal-text">Уже есть аккаунт? <span><a href="#enter" class="popup-link-1 link-more">Войдите</a></span></p>

    <form id="regist" method="post" class="log" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
		<?php do_action( 'woocommerce_register_form_start' ); ?>

        <div class="log__group">
            <label>Имя</label>
            <input type="text" name="billing_first_name" class="log__input" value="<?php echo ( ! empty( $_POST['billing_first_name'] ) ) ? esc_attr( wp_unslash( $_POST['billing_first_name'] ) ) : ''; ?>">
        </div>
        <div class="log__group">
            <label>Email</label>
            <input type="email" name="email" class="log__input" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>">
        </div>
        <div class="log__group">
            <label>Телефон</label>
            <input type="text" name="billing_phone" class="log__input" value="<?php echo ( ! empty( $_POST['billing_phone'] ) ) ? esc_attr( wp_unslash( $_POST['billing_phone'] ) ) : ''; ?>">
        </div>
        <div class="log__group show-pass">
            <label>Пароль</label>
            <input id="reg-pass" type="password" name="password" class="log__input">
            <span class="log__eye password-eye" data-target="#reg-pass">
						<svg width="34" height="22">
							<use xlink:href="#eye"/>
						</svg>
					</span>
        </div>
        <div class="log__wrap">

            <div class="log__btn">
                <input id="do-reg" type="submit" name="register" value="Зарегистрироваться" class="btn"/>
            </div>
	        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <div class="log__group check">
                <input id="rem" type="checkbox" name="rememberme" value="forever">
                <label for="rem">Запомнить пароль</label>
            </div>
        </div>
    </form>

	<div class="var">
		<p class="var__text">Или войдите в систему с помощью</p>
		<ul class="var__list">
			<li>
				<a href="#" class="var__link var__link_goo">
					<svg width="14" height="14">
						<use xlink:href="#google"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#" class="var__link var__link_vk">
					<svg width="18" height="18">
						<use xlink:href="#vk"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#" class="var__link var__link_fb">
					<svg width="16" height="16">
						<use xlink:href="#facebook"/>
					</svg>
				</a>
			</li>
		</ul>
	</div>
</div>
