<?php
/**
 * Template name: шаблон  Контакты
 *
 */
// send contact
if (isset($_POST['contact'])) {
	$error = ale_send_contact($_POST['contact']);
}
get_header();
?>

  <?php while ( have_posts() ) : the_post(); ?>
        <section class="inner contacts">
            <div class="wrapper">
                <div class="detail">
                    <p class="detail__title"><?php echo get_metadata('post', get_the_ID(),'wayup_contact_title_left', 'true'); ?></p>
                    <ul class="contact">
                        <?php if (get_metadata('post', get_the_ID(),'wayup_contact_address', 'true')) { ?>
                            <li class="contact__item">
                                <div class="contact__icon">
                                    <svg width="19" height="24">
                                        <use xlink:href="#pin"/>
                                    </svg>
                                </div>
                                <p class="contact__text contact__text_address"><?php echo get_metadata('post', get_the_ID(),'wayup_contact_address', 'true'); ?></p>
                            </li>
                        <?php } ?>
                        <?php if (get_metadata('post', get_the_ID(),'wayup_contact_phone1', 'true') || get_metadata('post', get_the_ID(),'wayup_contact_phone2', 'true') ) { ?>
                        <li class="contact__item">
                            <div class="contact__icon">
                                <svg width="17" height="17">
                                    <use xlink:href="#phone"/>
                                </svg>
                            </div>
                            <div class="contact__phones">
                                <?php if (get_metadata('post', get_the_ID(),'wayup_contact_phone1', 'true')) { ?><a href="tel:<?php echo get_metadata('post', get_the_ID(),'wayup_contact_phone1', 'true') ?>" class="contact__text contact__text_phone"><?php echo esc_attr(get_metadata('post', get_the_ID(),'wayup_contact_phone1', 'true')); ?></a><?php } ?>
	                            <?php if (get_metadata('post', get_the_ID(),'wayup_contact_phone2', 'true')) { ?><a href="tel:<?php echo get_metadata('post', get_the_ID(),'wayup_contact_phone2', 'true') ?>" class="contact__text contact__text_phone"><?php echo esc_attr(get_metadata('post', get_the_ID(),'wayup_contact_phone2', 'true')); ?></a><?php } ?>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if (get_metadata('post', get_the_ID(),'wayup_contact_email', 'true')) { ?>
                            <li class="contact__item">
                                <div class="contact__icon">
                                    <svg width="23" height="17">
                                        <use xlink:href="#mail"/>
                                    </svg>
                                </div>
                                <p class="contact__text contact__text_mail"><?php echo get_metadata('post', get_the_ID(),'wayup_contact_email', 'true'); ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php if (get_metadata('post', get_the_ID(),'wayup_contact_calendar', 'true')) { ?>
                        <div class="detail__time">
                            <svg width="35" height="35">
                                <use xlink:href="#time"/>
                            </svg>
                            <p><?php echo get_metadata('post', get_the_ID(),'wayup_contact_calendar', 'true'); ?></p>
                        </div>
                    <?php } ?>
                </div>
                <!--<?php// echo do_shortcode('[contact-form-7 id="93" title="Contact Page"]'); ?>-->

                <form method="post" action="<?php the_permalink(); ?>" class="inner__form log" id="popupOrder">
                    <p class="log__title"><?php echo get_metadata('post', get_the_ID(),'wayup_contact_title_right', true); ?></p>
                    <div class="log__subtitle"><?php the_content(); ?>
                            <?php if (isset($_GET['success'])) : ?>
                        <p class="success"><?php _e('Thank you for your message!', 'wayup')?></p>
                        <?php endif; ?>
                        <?php if (isset($error) && isset($error['msg'])) : ?>
                            <p class="error"><?php echo $error['msg']?></p>
                        <?php endif; ?>

                    </div>
                    <div class="log__group">
                        <label>Имя</label>
                        <input type="text" name="contact[name]" class="log__input">
                    </div>
                    <div class="log__group">
                        <label>Телефон</label>
                        <input type="tel" name="contact[phone]" class="log__input">
                    </div>
                    <div class="log__group log__group_company">
                        <label>Компания</label>
                        <input type="text" name="contact[company]" class="log__input">
                    </div>
                    <div class="log__group log__group_textarea">
                        <label>Сообщение</label>
                        <textarea type="text" name="contact[message]" class="log__input"></textarea>
                    </div>
                    <p class="log__line"><span>*</span>Поля обязательные для заполнения</p>
                    <div class="log__wrap">
                        <div class="log__group check">
                            <input id="insight" type="checkbox" name="contact[learn]" value="learn">
                            <label for="insight">Я ознакомился и согласен с <span><a href="#">Правилами пользования</a></span> и <span><a href="#">политикой конфиденциальности</a></span> сайта</label>
                        </div>
                        <div class="log__btn">
                            <input id="order" type="submit" value="Отправить" class="btn"/>
                        </div>
                    </div>
                    <input type="hidden" name="contact[email]" value="no-reply@yoursite.com" >
	                <?php wp_nonce_field() ?>
                </form>

            </div>
        </section>
<?php if (get_metadata('post', get_the_ID(),'wayup_contact_map', 'true')){ ?>
    <section class="map">
        <?php //echo do_shortcode('[google_map_easy id="1"]'); ?>
        <?php echo do_shortcode(get_metadata('post', get_the_ID(),'wayup_contact_map', 'true')); ?>
    </section>
<?php }
endwhile;
get_footer();


