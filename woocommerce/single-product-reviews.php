<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>

<div class="clients">
		<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>

	<?php if ( have_comments() ) : ?>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			echo '<nav class="woocommerce-pagination">';
			paginate_comments_links(
				apply_filters(
					'woocommerce_comment_pagination_args',
					array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
						'type'      => 'list',
					)
				)
			);
			echo '</nav>';
		endif;
		?>
	<?php else : ?>
        <p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce
        ' ); ?></p>
	<?php endif; ?>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
        <!--<form action="#" class="log clients__form review-form" id="popupMessage">-->
            <p class="log__title">Оставьте ваш отзыв</p>
            <!--<div class="log__wrap" id="review_form">-->

	            <?php
	            $commenter = wp_get_current_commenter();

	            $comment_form = array(
		            /* translators: %s is product title */
		            'title_reply'         => '', //have_comments() ? __( 'Add a review', 'woocommerce' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
		            /* translators: %s is product title */
		            'title_reply_to'      => __( 'Leave a Reply to %s', 'woocommerce' ),
		            'class_form'          => 'log clients__form review-form log__wrap',
		            'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
		            'title_reply_after'   => '</span>',
		            'comment_notes_after' => '',
		            'fields'              => array(
			            'author' => '<div class="log__group"><label for="author">Имя</label> ' .
			                        '<input id="author" class="log__input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></div>',
			            'email'  => '<div class="log__group"><label for="email">' . esc_html__('Email', 'woocommerce' ) . '</label> ' .
			                        '<input id="email" class="log__input" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></div>',
			            'phone'  => '<div class="log__group"><label for="phone">Телефон</label> ' .
			                        '<input id="phone" class="log__input" name="phone" type="text" value="" size="30" aria-required="true" required /></div>',
			            'social' => '<div class="log__group log__group_socials"><label for="social">Ссылка на соцсеть</label> ' .
			                        '<input id="social" class="log__input" name="social" type="text" value="" size="30"/></div>',
		            ),
		            'label_submit'        => __( 'Submit', 'woocommerce' ),
		            'logged_in_as'        => '<div class="log__group"><label for="phone">Телефон</label> ' .
		                                     '<input id="phone" class="log__input" name="phone" type="text" value="" size="30" aria-required="true" required /></div>
                                              <div class="log__group log__group_socials"><label for="social">Ссылка на соцсеть</label> ' .
		                                     '<input id="social" class="log__input" name="social" type="text" value="" size="30"/></div>',
		            'comment_field'       => '',
	            );

	            $account_page_url = wc_get_page_permalink( 'myaccount' );
	            if ( $account_page_url ) {
		            /* translators: %s opening and closing link tags respectively */
		            $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
	            }

	            $comment_form['comment_field'] = '<div class="log__group log__group_textarea"><label for="comment">Ваш отзыв</label><textarea id="comment"  name="comment" class="log__input" cols="45" rows="8" required></textarea></div><p class="log__line"><span>*</span>Поля обязательные для заполнения</p>';

	            if ( wc_review_ratings_enabled() ) {
                //if (get_option('woocommerce_enable_review_rating') === 'yes'){
		            $comment_form['comment_field'] .= '
                <div class="log__block">
                    <div class="log__rate rating">
                        <span>Ваша оценка</span>
                        <div class="rating__choice" id="rate-choice">
                            <div class="rating__group">
                                <input type="radio" value="1" name="rating">
                                <label></label>
                            </div>
                            <div class="rating__group">
                                <input type="radio" value="2" name="rating">
                                <label></label>
                            </div>
                            <div class="rating__group">
                                <input type="radio" value="3" name="rating">
                                <label></label>
                            </div>
                            <div class="rating__group">
                                <input type="radio" value="4" name="rating">
                                <label></label>
                            </div>
                            <div class="rating__group">
                                <input type="radio" value="5" name="rating" checked="checked">
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <div class="log__btn">
                        <input id="send" type="submit" value="Отправить" class="btn"/>
                    </div>
                </div>';
	            }
	            comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
	            ?>

	<?php else : ?>
        <p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
	<?php endif; ?>
</div>
