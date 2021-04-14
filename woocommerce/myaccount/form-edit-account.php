<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' );

$user_id = get_current_user_id();
$user = get_userdata( $user_id );
if ( !$user )
    return;
$phone = get_user_meta( $user_id, 'billing_phone', true);

?>

<form action="" id="displayMessage" method="post" class="cabinet__form" style="flex-wrap:wrap;">
    <div class="avatar" style="width: 100%;">
        <div class="avatar__img" style="margin: 0 auto;">
            <img src="<?php echo get_avatar_url($user_id, array('size'=>200)); ?>>" alt="Личное фото">
            <a href="http://gravatar.com" title="Удалить аватарку" class="avatar__delete"></a>
        </div>
        <div class="avatar__load" style="margin: 7px auto;">
            <a href="http://gravatar.com">
                <button type="button">
                    <svg>
                        <use xlink:href="#camera"/>
                    </svg>
                    Сменить аватарку
                </button>
            </a>
        </div>
    </div>
    <div class="edit"  style="width: 100%;">
        <a href="<?php echo wp_logout_url(home_url()); ?>" class="exit">
            <svg class="exit__icon" width="17" height="15">
                <use xlink:href="#login"/>
            </svg>
            Выход
        </a>
        <span class="modal-сaution">Личные данные успешно изменены</span>
        <div class="edit__block">
	        <?php do_action( 'woocommerce_edit_account_form_start' ); ?>
            <div class="edit__group">
                <label><?php esc_html_e( 'First name', 'woocommerce' ); ?></label>
                <input type="text" name="account_first_name" class="edit__input" value="<?php echo esc_attr( $user->first_name ); ?>">
            </div>
            <div class="edit__group">
                <label><?php esc_html_e( 'Last name', 'woocommerce' ); ?></label>
                <input type="text" name="account_last_name" class="edit__input" value="<?php echo esc_attr( $user->last_name ); ?>">
            </div>
            <div class="edit__group">
                <label><?php esc_html_e( 'Display name', 'woocommerce' ); ?></label>
                <input type="text" name="account_display_name" class="edit__input" value="<?php echo esc_attr( $user->display_name ); ?>">
            </div>
            <div class="edit__group">
                <label><?php esc_html_e( 'Email address', 'woocommerce' ); ?></label>
                <input type="email" name="account_email" class="edit__input" value="<?php echo esc_attr( $user->user_email ); ?>">
            </div>
            <div class="edit__group">
                <label>Телефон</label>
                <input type="tel" name="billing_phone" class="edit__input" value="<?php echo esc_attr( $phone); ?>">
            </div>

            <div class="edit__group show-pass">
                <label><?php esc_html_e( 'Current password', 'woocommerce' ); ?></label>
                <input id="edit-pass" type="password" name="password_current" class="edit__input">
                <span class="edit__eye password-eye" data-target="#edit-pass">
									<svg width="34" height="22">
										<use xlink:href="#eye"/>
									</svg>
								</span>
            </div>
            <div class="edit__group show-pass">
                <label><?php esc_html_e( 'New password', 'woocommerce' ); ?></label>
                <input id="edit-pass" type="password" name="password_1" class="edit__input">
                <span class="edit__eye password-eye" data-target="#edit-pass">
									<svg width="34" height="22">
										<use xlink:href="#eye"/>
									</svg>
								</span>
            </div>
            <div class="edit__group show-pass">
                <label><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
                <input id="edit-pass" type="password" name="password_2" class="edit__input">
                <span class="edit__eye password-eye" data-target="#edit-pass">
									<svg width="34" height="22">
										<use xlink:href="#eye"/>
									</svg>
								</span>
            </div>
	        <?php do_action( 'woocommerce_edit_account_form' ); ?>
            <div class="edit__btn">
                <input type="submit" id="save-edit" name="save_account_details" value="Сохранить" class="btn"/>
            </div>
	        <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
            <input type="hidden" name="action" value="save_account_details" />
	        <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
        </div>
    </div>

</form>


<?php // do_action( 'woocommerce_edit_account_form_tag' ); ?>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
