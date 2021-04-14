<?php

$args = array(
	'title' => '',
	'link'     => '',
);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract($atts);

?>
<!-- Connect -->
<section class="connect">
	<div class="connect__decor"></div>
	<div class="wrapper">
		<div class="connect__wrap">
			<h3 class="connect__title"><?php echo $title; ?></h3>
			<a href="<?php echo $link; ?>" class="connect__btn btn-white popup-link">Связаться с нами</a>
		</div>
		<div class="connect__img"></div>
	</div>
</section><!-- End connect -->

