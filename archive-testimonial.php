<?php
get_header();

global $wayup_options;
?>
    <section class="inner clients">
        <div class="wrapper">
            <h2 class="clients__title secondary-title"><span><?php echo $wayup_options['testilabel1']; ?></span><br><?php echo $wayup_options['testilabel2']; ?></h2>
            <?php
            $paged = (get_query_var('paged') ) ? get_query_var('paged') : 1 ;

            $testimonials = new WP_Query(array(
                    'post_type'  => 'testimonial',
                    'paged'     => $paged
            ));
            if ( $testimonials -> have_posts() ) :
                while ( $testimonials->have_posts() ) : $testimonials->the_post();?>
                    <div class="clients__box">
                        <div class="clients__photo">
                            <div class="clients__img">
                                <?php echo get_the_post_thumbnail(get_the_ID(),'testimonial-thumb'); ?>
                            </div>

                            <?php  $fb = get_metadata('post', get_the_ID(),'wayup_social_link', true); ?>
                            <?php //$fb =  get_field('social_link_new'); ?>

                            <?php  if ($fb) { ?>

                                <a href="<?php echo esc_url($fb); // the_field('social_link_new');?>" class="clients__link">
                                    <svg  width="14" height="17">
                                        <use xlink:href="#facebook"/>
                                    </svg>
                                </a>

                            <?php  } ?>
                                </div>
                                <div class="clients__say">
                                    <p class="clients__name"><?php the_title(); ?></p>
                                    <div class="clients__text">
                                       <?php the_content(); ?>
                                    </div>
                                </div>
                            <?php  $date = get_metadata('post', get_the_ID(),'wayup_testi_date', true);  ?>
                            <?php  if ($date){ ?>
                            <?php  //$date = get_field('date_new');  ?>
                            <?php  //if ($date){ ?>
                                <div class="add-time">
                                    <svg width="13" height="13">
                                        <use xlink:href="#time"/>
                                    </svg>
                                    <p class="add-time__date"><?php echo $date; //the_field('date_new');   ?></p>
                                </div>

                            <?php  } ?>
                    </div>

                <?php endwhile;

                wp_reset_postdata();

            else : echo "<div>Нет отзывов</div>";

            endif; ?>

            <?php if ($testimonials->max_num_pages > 1) { ?>
                <nav class="pagination">
                    <div class="nav-links">
                        <?php
                        
                        if (get_query_var('paged') == 0){ ?>
                             <span href="#" class="prev page-numbers"></span>
                        <?php } ?>

                        <?php
                        
                        $big = 999999999; 

                        echo paginate_links(array(
                            'base'    => str_replace( $big, '%#%', esc_url(get_pagenum_link( $big ) ) ),
                            'format'  => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'prev_text'    => '',
                            'next_text'    => '',
                            //'total'   => $testimonials->max_num_pages,
                            ));
                        ?>

                        <?php
                       
                        if (get_query_var('paged') == $testimonials->max_num_pages){ ?>
                            <span href="#" class="next page-numbers"></span>
                        <?php } ?>
                    </div>
                </nav>
            <?php } ?>

            <?php echo do_shortcode($wayup_options['testimonial_form_shortcode']); ?>

        </div>
    </section>
<?php

get_footer();

