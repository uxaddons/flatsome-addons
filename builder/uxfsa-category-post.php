<?php 
add_ux_builder_shortcode('uxfsa_title_with_cat_posts', array(
    'type' => 'container',
    'name' => __( 'UX Title Cat Posts' ),
    'category' => __( 'UX-Addons.com' ),
    'thumbnail' => UXFSA_Flatsome_Addons_URL.'thumbnails/uxfsa_title_with_cat_posts.jpg',
    'wrap'   => false,
    'info' => '{{ label }}',
    'priority' => -1,
            'options' => array(
                'title_cat_ids' => array(
                    'type' => 'select',
                    'heading' => 'Categories',
                    'param_name' => 'ids',
                    'config' => array(
                        'multiple' => false,
                        'placeholder' => 'Select...',
                        'termSelect' => array(
                            'post_type' => 'post',
                            'taxonomies' => 'category'
                        )
                    )
                ),
              'img'         => array(
                'type'    => 'image',
                'heading' => 'Icon',
                'value'   => '',
            ),
            'width' => array(
            'type'    => 'scrubfield',
            'heading' => __( 'Width' ),
            'default' => '',
            'min'     => 0,
            'max'     => 1200,
            'step'    => 5,
        ),
        'pos'         => array(
                'type'      => 'select',
                'heading'   => 'Icon Position',
                'default'   => 'top',
                'options'   => array(
                    'top'    => 'Top',
                    'center' => 'Center',
                    'left'   => 'Left',
                    'right'  => 'Right',
                ),
            ),
            'icon' => array(
            'type'    => 'select',
            'heading' => 'Icon',
            'options' => require( __DIR__ . '/values/icons.php' ),
        ),
                'text' => array(
                    'type'       => 'textfield',
                    'heading'    => 'Title',
                    'default'    => 'Lorem ipsum dolor sit amet...',
                    'auto_focus' => true,
                ),
                'tag_name' => array(
                    'type'    => 'select',
                    'heading' => 'Tag',
                    'default' => 'h3',
                    'options' => array(
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                    ),
                ),
                'color' => array(
                    'type'     => 'colorpicker',
                    'heading'  => __( 'Color' ),
                    'alpha'    => true,
                    'format'   => 'rgb',
                    'position' => 'bottom right',
                ),
                'width' => array(
                    'type'    => 'scrubfield',
                    'heading' => __( 'Width' ),
                    'default' => '',
                    'min'     => 0,
                    'max'     => 1200,
                    'step'    => 5,
                ),
                'margin_top' => array(
                    'type'        => 'scrubfield',
                    'heading'     => __( 'Margin Top' ),
                    'default'     => '',
                    'placeholder' => __( '0px' ),
                    'min'         => - 100,
                    'max'         => 300,
                    'step'        => 1,
                ),
                'margin_bottom' => array(
                    'type'        => 'scrubfield',
                    'heading'     => __( 'Margin Bottom' ),
                    'default'     => '',
                    'placeholder' => __( '0px' ),
                    'min'         => - 100,
                    'max'         => 300,
                    'step'        => 1,
                ),
                'size' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Size' ),
                    'default' => 100,
                    'unit'    => '%',
                    'min'     => 20,
                    'max'     => 300,
                    'step'    => 1,
                ),
                'link_text' => array(
                    'type'    => 'textfield',
                    'heading' => 'Link Text',
                    'default' => '',
                ),
                'link' => array(
                    'type'    => 'textfield',
                    'heading' => 'Link',
                    'default' => '',
                )
            )
));