<?php
function uxfsa_counter_number( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title'       => '',
		'title_small' => '',
		'font_size'   => '',
		'class'				=> '',
		'visibility'	=> '',
		'img'         => '',
		'inline_svg'  => 'true',
		'img_width'   => '60',
		'pos'         => 'top',
		'link'        => '',
		'target'      => '_self',
		'rel'         => '',
		'tooltip'     => '',
		'margin'      => '',
		'icon_border' => '',
		'icon_color'  => '',
		), $atts )
	);

	if($visibility == 'hidden') return;

	$classes     = array( 'featured-box' );
	$classes_img = array( 'icon-box-img' );
	
	if( $class ) $classes[] = $class;
	if( $visibility ) $classes[] = $visibility;

	$classes[] = 'icon-box-' . $pos;

	if ( $tooltip ) $classes[] = 'tooltip';
	if ( $pos == 'center' ) $classes[] = 'text-center';
	if ( $pos == 'left' || $pos == 'top' ) $classes[] = 'text-left';
	if ( $pos == 'right' ) $classes[] = 'text-right';
	if ( $font_size ) $classes[] = 'is-' . $font_size;
	if ( $img_width ) $img_width = 'width: ' . intval( $img_width ) . 'px';
	if ( $icon_border ) $classes_img[] = 'has-icon-bg';

	$css_args_out = array(
		'margin' => array(
			'attribute' => 'margin',
			'value'     => $margin,
		),
	);

	$css_args = array(
		'icon_border' => array(
			'attribute' => 'border-width',
			'unit'      => 'px',
			'value'     => $icon_border,
		),
		'icon_color'  => array(
			'attribute' => 'color',
			'value'     => $icon_color,
		),
	);

	$classes     = implode( ' ', $classes );
	$classes_img = implode( ' ', $classes_img );
	$link_atts   = array(
		'target' => $target,
		'rel'    => array( $rel ),
	);

	ob_start();
	?>

	<?php if ( $link ) echo '<a class="plain" href="' . $link . '"' . flatsome_parse_target_rel( $link_atts ) . '>'; ?>
	<div class="icon-box counter-box <?php echo $classes; ?>" <?php if ( $tooltip )
		echo 'title="' . $tooltip . '"' ?> <?php echo get_shortcode_inline_css( $css_args_out ); ?>>
		<?php if ( $img ) { ?>
			<div class="<?php echo $classes_img; ?>" style="<?php if ( $img_width ) {
				echo $img_width;
			} ?>">
				<div class="icon">
					<div class="icon-inner" <?php echo get_shortcode_inline_css( $css_args ); ?>>
						<?php echo flatsome_get_image( $img, $size = 'medium', $alt = $title, $inline_svg ); ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="icon-box-text last-reset">
			<?php if ( $title ) { ?><h5 class="count" data-count="<?php echo $title; ?>">0</h5><?php } ?>
			<?php if ( $title_small ) { ?><h6><?php echo $title_small; ?></h6><?php } ?>
			<?php echo flatsome_contentfix( $content ); ?>
		</div>
	</div>
	<?php if ( $link ) echo '</a>'; ?>

	<?php
	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}

add_shortcode( 'uxfsa_counter_number', 'uxfsa_counter_number' );

add_action( 'wp_footer', 'uxfsa_counter_number_scripts' );
function uxfsa_counter_number_scripts(){
?>
<script>
var counted = 0;
jQuery(window).scroll(function() {
  var oTop = jQuery('.counter-box').offset().top - window.innerHeight;
  if (counted == 0 && jQuery(window).scrollTop() > oTop) {
    jQuery('.count').each(function() {
      var $this = jQuery(this),
        countTo = $this.attr('data-count');
      jQuery({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },
        {
          duration: 4000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }
        });
    });
    counted = 1;
  }
});
</script>

<?php
}