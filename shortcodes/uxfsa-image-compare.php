<?php
function uxfsa_addons_compare($atts, $content=null) {

    extract( shortcode_atts( array(
        '_id' => 'uxaddons-'.rand(),
        'timer' => '6000',
        'bullets' => 'true',
        'visibility' => '',
        'type' => 'slide',
        'thumbnail' => false,
        'bullet_style' => '',
        'auto_slide' => 'true',
        'auto_height' => 'true',
        'bg_color' => '#fff',
        'text_color' => '#333',
        'caption_height' => '45px',
        'slide_align' => 'center',
        'style' => 'normal',
        'slide_width' => '',
        'arrows' => 'true',
        'pause_hover' => 'true',
        'hide_nav' => '',
        'nav_style' => 'circle',
        'nav_color' => 'light',
        'nav_size' => 'large',
        'nav_pos' => '',
        'infinitive' => 'true',
        'freescroll' => 'false',
        'parallax' => '0',
        'margin' => '',
        'columns' => '1',
        'height' => '',
        'rtl' => 'false',
        'draggable' => 'true',
        'friction' => '0.6',
        'selectedattraction' => '0.1',
        'threshold' => '5',

        // Derpicated
        'mobile' => 'true',

    ), $atts ) );

    // Stop if visibility is hidden
    if($visibility == 'hidden') return;

    ob_start();

    $classes = array('slider');

    if ($type == 'fade') $classes[] = 'slider-type-'.$type;

    // Hide if mobile is set to false
    if($mobile !==  'true' && !$visibility) {$visibility = 'hide-for-small';}

    // Bullet style
	if($bullet_style) $classes[] = 'slider-nav-dots-'.$bullet_style;

    // Nav style
    if($nav_style) $classes[] = 'slider-nav-'.$nav_style;

    // Nav size
    if($nav_size) $classes[] = 'slider-nav-'.$nav_size;

    // Nav Color
    if($nav_color) $classes[] = 'slider-nav-'.$nav_color;

    // Nav Position
    if($nav_pos) $classes[] = 'slider-nav-'.$nav_pos;

    // Add timer
    if($auto_slide == 'true') $auto_slide = $timer;

    // Add Slider style
    if($style) $classes[] = 'slider-style-'.$style;

    // Always show Nav if set
    if($hide_nav ==  'true') {$classes[] = 'slider-show-nav';}

    // Slider Nav visebility
    $is_arrows = 'true';
    $is_bullets = 'true';

    if($arrows == 'false') $is_arrows = 'false';
    if($bullets == 'false') $is_bullets = 'false';

    if(is_rtl()) $rtl = 'true';

    $classes = implode(" ", $classes);

    // Inline CSS
    $css_args = array(
        'bg_color' => array(
          'attribute' => 'background-color',
          'value' => $bg_color,
        ),
        'margin' => array(
          'attribute' => 'margin-bottom',
          'value' => $margin,
        )
    );
?>



<div class="twentytwenty-container">
<?php echo flatsome_contentfix( $content ); ?>
</div>


<style media="screen">
.twentytwenty-container .img .img-inner {
    overflow: inherit !important;
}
</style>
<!-- .ux-slider-wrapper -->


<?php

    $content = ob_get_contents();
    ob_end_clean();
    return $content;

}
add_shortcode("uxfsa_addons_image_compare", "uxfsa_addons_compare");


function custom_script_style_adding_function() {
wp_enqueue_style( 'ux-style', UXFSA_Flatsome_Addons_URL . 'css/twentytwenty.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'custom_script_style_adding_function' ); 

function uxfsa_addons_scripts() {
  wp_enqueue_script( 'main-js', UXFSA_Flatsome_Addons_URL . 'js/jquery.event.move.js', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'main-js-ux', UXFSA_Flatsome_Addons_URL . 'js/jquery.twentytwenty.js', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'uxfsa_addons_scripts' );

