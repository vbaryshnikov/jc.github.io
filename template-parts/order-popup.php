<?php global $product; ?>
<div id="one-click" class="click mfp-hide">
	<div id="popupOrder" class="click__form log order-form">
		<div class="click__half">
			<p class="click__head">Купить в один клик</p>
			<p class="click__text">Оставьте свои контакнтые данные и мы свяжемся с вами в ближайшее время для уточнения заказа</p>
			<div class="log__group">
				<label>Имя</label>
				<input type="text" name="name" class="log__input">
			</div>
			<div class="log__group">
				<label>Телефон</label>
				<input type="tel" name="tel" class="log__input">
			</div>
			<div class="log__btn">
				<input id="ordered" type="submit" data-submit value="Отправить" class="btn"/>
			</div>
		</div>
		<div class="click__half">
			<p class="click__info">Информация о заказе</p>
			<div class="result">
				<div class="result__block">
					<a href="<?php the_permalink(); ?>" class="result__image">
						<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
					</a>
					<div class="result__desc">
						<a href="<?php the_permalink(); ?>" class="result__title">
                            <?php
                                if (get_post_meta(get_the_ID(),'wayup_short_title',true)){
                                    echo get_post_meta(get_the_ID());
                                } else {
                                    echo get_the_title();
                                }
                            ?>
                        </a>
						<div class="result__price">
							<?php echo $product->get_price_html(); ?>
						</div>

	                        <?php
	                        /*do_action( 'woocommerce_before_add_to_cart_quantity' );
	                        woocommerce_quantity_input( array(
		                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
		                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
		                        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
                            ));
                                do_action( 'woocommerce_after_add_to_cart_quantity');*/
	                        ?>
                        <div class="quantity">
                            <span class="minus_popup" data-link="<?php echo wc_get_cart_url(); ?>?add-to-cart=<?php echo get_the_ID(); ?>" data-price="<?php echo $product->get_price(); ?>">-</span>
                            <input type="text" step="1" min="1" name="quantity" value="1" size="4" pattern="[0-9]*"/>
                            <span class="plus_popup" data-link="<?php echo wc_get_cart_url(); ?>?add-to-cart=<?php echo get_the_ID(); ?>" data-price="<?php echo $product->get_price(); ?>">+</span>
                        </div>

                            <div class="result__cost">
                                <p>Итого:</p><?php echo get_woocommerce_currency_symbol(); ?><span id="final_popup_price"><?php echo $product->get_price(); ?></span>
                            </div>

                            <a href="<?php echo wc_get_cart_url(); ?>?add-to-cart=<?php echo get_the_ID(); ?>" id="add_popup_cart" class="click__link link-more">
                                <svg width="18" height="20">
                                    <use xlink:href="#nav-right"/>
                                </svg>
                                Перейти в корзину
                            </a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Order -->
<div id="taken" class="sub mfp-hide">
	<p class="sub__thank">Спасибо!</p>
	<p class="sub__text">Ваша заявка принята. Наши специалисты свяжутся с вами в ближайшее время.</p>
</div>
