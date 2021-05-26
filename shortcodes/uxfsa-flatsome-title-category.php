<?php
function uxfsa_title_with_cat_shortcode( $atts, $content = null )
    {
        extract( shortcode_atts( array(
            '_id' => 'title-'.rand(),
            'class' => '',
            'visibility' => '',
            'text' => 'Lorem ipsum dolor sit amet...',
            'tag_name' => 'h3',
            'sub_text' => '',
            'style' => 'normal',
            'size' => '100',
            'link' => '',
            'link_text' => '',
            'target' => '',
            'margin_top' => '',
            'margin_bottom' => '',
            'letter_case' => '',
            'color' => '',
            'width' => '',
            'icon' => '',
        ), $atts ) );
        $classes = array('container', 'section-title-container');
        if ($class) $classes[] = $class;
        if ($visibility) $classes[] = $visibility;
        $classes = implode(' ', $classes);
        $link_output = '';
        if ($link) $link_output = '<a href="'.$link.'" target="'.$target.'">'.$link_text.get_flatsome_icon('icon-angle-right').'</a>';
        $small_text = '';
        if ($sub_text) $small_text = '<small class="sub-title">'.$atts['sub_text'].'</small>';
        if ($icon) $icon = get_flatsome_icon($icon);
        if ($style == 'bold_center') $style = 'bold-center';
        $css_args = array(
            array( 'attribute' => 'margin-top', 'value' => $margin_top),
            array( 'attribute' => 'margin-bottom', 'value' => $margin_bottom),
        );
        if ($width) {
            $css_args[] = array( 'attribute' => 'max-width', 'value' => $width);
        }
        $css_args_title = array();
        if ($size !== '100'){
            $css_args_title[] = array( 'attribute' => 'font-size', 'value' => $size, 'unit' => '%');
        }
        if ($color){
            $css_args_title[] = array( 'attribute' => 'color', 'value' => $color);
        }
        if (isset( $atts[ 'title_cat_ids' ] ) ) {
            $ids = explode( ',', $atts[ 'title_cat_ids' ] );
            $ids = array_map( 'trim', $ids );
            $parent = '';
            $orderby = 'include';
        } else {
            $ids = array();
        }
        $args = array(
            'taxonomy' => 'product_cat',
            'include'    => $ids,
            'pad_counts' => true,
            'child_of'   => 0,
        );
        $product_categories = get_terms( $args );
        $title_html_show_cat = '';
        if ($product_categories ) {
            foreach ( $product_categories as $category ) {
                $term_link = get_term_link( $category );
                $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
                if ($thumbnail_id ) {
                    $image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size);
                    $image = $image[0];
                } else {
                    $image = wc_placeholder_img_src();
                }
                $title_html_show_cat .= '<li class="title_cats"><a href="'.$term_link.'">'.$category->name.'</a></li>';
            }
        }
        return '<div class="'.$classes.'" '.get_shortcode_inline_css($css_args).'><'. $tag_name . ' class="section-title section-title-'.$style.'"><b></b><span class="section-title-main" '.get_shortcode_inline_css($css_args_title).'>'.$icon.$text.$small_text.'</span>
        <span class="title-show-cats">'.$title_html_show_cat.'</span><b></b>'.$link_output.'</' . $tag_name .'></div><!-- .section-title -->';
    }

add_shortcode( 'uxfsa_title_with_cat', 'uxfsa_title_with_cat_shortcode' );
