<?php
/**
 * Template name: Шаблон :Главная
 * */
get_header(); ?>

<?php
// if(is_user_logged_in()) {
//	echo 'Привет, вы вошли! . <a href="' . wp_login_form(get_permalink()) . '">Выйти</a>';
// } else {
//	wp_login_form();
// }
?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>