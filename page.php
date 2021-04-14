<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wayup
 */

get_header();
?>
    <section class="inner contacts">
        <div class="wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile; 
                ?>
                </main>
            </div>
        </div>
    </section>
<?php
get_footer();
