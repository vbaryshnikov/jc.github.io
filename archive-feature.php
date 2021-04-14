<?php
get_header();

if ( have_posts() ) :

    while ( have_posts() ) :the_post();
        the_title();
    endwhile;
else :
    echo "Нет кейсов";
endif;

get_footer();
