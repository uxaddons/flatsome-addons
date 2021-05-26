<?php
add_ux_builder_shortcode( 'uxfsa_addons_slider_flatsome', array(
    'type' => 'container',
    'name' => __( 'UX Addons Slider' ),
    'category' => __( 'UX-Addons.com' ),
    'message' => __( 'Add slides here' ),
    'directives' => array( 'uxaddons-slider' ),
    'allow' => array( 'uxfsa_addons_image'),
    'thumbnail' => UXFSA_Flatsome_Addons_URL.'thumbnails/uxfsa_slider.jpg',
    'wrap'   => false,
    'info' => '{{ label }}',
    'priority' => -1,

    'toolbar' => array(
        'show_children_selector' => true,
        'show_on_child_active' => true,
    ),

    'children' => array(
        'inline' => true,
        'addable_spots' => array( 'left', 'right' )
    ),


    'options' => array(
        'label' => array(
            'type' => 'textfield',
            'heading' => 'Admin label',
            'placeholder' => 'Enter admin label...'
        ),
        'type' => array(
          'type' => 'select',
          'heading' => 'Type',
          'default' => 'slide',
          'options' => array(
            'slide' => 'Slide',
            'fade' => 'Fade',
          ),
        ),
        'layout_options' => array(
          'type' => 'group',
          'heading' => __( 'Layout' ),
          'options' => array(
            'visibility'  => require( __DIR__ . '/commons/visibility.php' ),
            'style' => array(
              'type' => 'select',
              'heading' => 'Style',
              'default' => 'normal',
              'options' => array(
                  'normal' => 'Default',
                  'container' => 'Container',
                  'focus' => 'Focus',
                  'shadow' => 'Shadow',
              ),
              'conditions' => 'type !== "fade"',
            ),
            'slide_width' => array(
              'type' => 'scrubfield',
              'heading' => 'Slide Width',
              'placeholder' => 'Width in Px',
              'default' => '',
              'min' => '0',
              'conditions' => 'type !== "fade"',
            ),

            'slide_align' => array(
              'type' => 'select',
              'heading' => 'Slide Align',
              'default' => 'center',
              'options' => array(
                  'center' => 'Center',
                  'left' => 'Left',
                  'right' => 'Right',
              ),
              'conditions' => 'type !== "fade"',
            ),
            'bg_color' => array(
              'type' => 'colorpicker',
              'heading' => __('Bg Color'),
              'format' => 'rgb',
              'position' => 'bottom right',
              'helpers' => require( __DIR__ . '/helpers/colors.php' ),
            ),
            'text_color' => array(
              'type' => 'colorpicker',
              'heading' => __('Text Color'),
              'format' => 'rgb',
              'position' => 'bottom right',
              'helpers' => require( __DIR__ . '/helpers/colors.php' ),
            ),

            'caption_height' => array(
                  'type' => 'scrubfield',
                  'heading' => __('Text Height'),
                  'default' => '',
                  'placeholder' => __('Auto'),
                  'min' => 0,
                  'max' => 1000,
                  'step' => 1,
                  'helpers' => require( __DIR__ . '/helpers/image-heights.php' ),
                   'on_change' => array(
                        'selector' => '.image-cover',
                        'style' => 'padding-top: {{ value }}'
                    )
            ),

            'margin' => array(
              'type' => 'scrubfield',
              'responsive' => true,
              'heading' => __('Margin'),
              'default' => '0px',
              'min' => 0,
              'max' => 100,
              'step' => 1
            ),
            'infinitive' => array(
                'type' => 'radio-buttons',
                'heading' => __('Infinitive'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'freescroll' => array(
                'type' => 'radio-buttons',
                'heading' => __('Free Scroll'),
                'default' => 'false',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'draggable' => array(
                'type' => 'radio-buttons',
                'heading' => __('Draggable'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'parallax' => array(
                'type' => 'slider',
                'heading' => 'Parallax',
                'unit' => '+',
                'default' => 0,
                'max' => 10,
                'min' => 0,
            ),
            'mobile' => array(
                'type' => 'radio-buttons',
                'heading' => __('Show for Mobile'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
          ),
        ),

        'nav_options' => array(
          'type' => 'group',
          'heading' => __( 'Navigation' ),
          'options' => array(
            'hide_nav' => array(
                'type' => 'radio-buttons',
                'heading' => __('Always Visible'),
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'nav_pos' => array(
              'type' => 'select',
              'heading' => 'Position',
              'default' => '',
              'options' => array(
                  '' => 'Inside',
                  'outside' => 'Outside',
              )
            ),
           'nav_size' => array(
              'type' => 'select',
              'heading' => 'Size',
              'default' => 'large',
              'options' => array(
                  'large' => 'Large',
                  'normal' => 'Normal',
              )
            ),
            'arrows' => array(
              'type' => 'radio-buttons',
              'heading' => __('Arrows'),
              'default' => 'true',
              'options' => array(
                'false'  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
                ),
            ),
            'nav_style' => array(
              'type' => 'select',
              'heading' => __('Arrow Style'),
              'default' => 'circle',
              'options' => array(
                  'circle' => 'Circle',
                  'simple' => 'Simple',
                  'reveal' => 'Reveal',
              )
            ),
            'nav_color' => array(
                'type' => 'radio-buttons',
                'heading' => __('Arrow Color'),
                'default' => 'light',
                'options' => array(
                    'dark'  => array( 'title' => 'Dark'),
                    'light'  => array( 'title' => 'Light'),
                ),
            ),

            'thumbnail' => array(
              'type' => 'radio-buttons',
              'heading' => __('Thumbnail'),
              'default' => 'true',
              'options' => array(
                  'false'  => array( 'title' => 'Off'),
                  'true'  => array( 'title' => 'On'),
              ),
            ),
            'bullets' => array(
              'type' => 'radio-buttons',
              'heading' => __('Bullets'),
              'default' => 'true',
              'options' => array(
                  'false'  => array( 'title' => 'Off'),
                  'true'  => array( 'title' => 'On'),
              ),
            ),
            'bullet_style' => array(
              'type' => 'select',
              'heading' => 'Bullet Style',
              'default' => 'circle',
              'options' => array(
                'circle' => 'Circle',
                'dashes' => 'Dashes',
                'dashes-spaced' => 'Dashes (Spaced)',
                'simple' => 'Simple',
                'square' => 'Square',
            )
           ),
          ),
        ),
        'slide_options' => array(
          'type' => 'group',
          'heading' => __( 'Auto Slide' ),
          'options' => array(
            'auto_slide' => array(
                'type' => 'radio-buttons',
                'heading' => __('Auto slide'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'timer' => array(
                'type' => 'textfield',
                'heading' => 'Timer (ms)',
                'default' => 6000,
            ),
            'pause_hover' => array(
                'type' => 'radio-buttons',
                'heading' => __('Pause on Hover'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
          ),
        ),
    ),
) );

$position_options = require( __DIR__ . '/commons/position.php' );
$position_options['options']['position_x']['on_change'] = array(
  'recompile' => false,
  'class' => 'x{{ value }} md-x{{ value }} lg-x{{ value }}'
);
$position_options['options']['position_y']['on_change'] = array(
  'recompile' => false,
  'class' => 'y{{ value }} md-y{{ value }} lg-y{{ value }}'
);

add_ux_builder_shortcode( 'uxfsa_addons_image', array(
    'name' => __( 'UX Image', 'ux-builder'),
    'category' => __( 'UX-Addons.com' ),
    'toolbar_thumbnail' => 'id',
    'thumbnail' =>  UXFSA_Flatsome_Addons_URL.'thumbnails/uxfsa_image.jpg',
    'wrap' => false,

    'presets' => array(
        array(
            'name' => __( 'Blank' ),
            'content' => '[uxfsa_addons_image][/uxfsa_addons_image]',
        ),
    ),

    'options' => array(

        'id' => array(
            'type' => 'image',
            'heading' => __('Image'),
            'default' => ''
        ),
        'image_size' => array(
            'type' => 'select',
            'heading' => 'Image Size',
            'param_name' => 'image_size',
            'default' => '',
            'options' => array(
                '' => 'Normal',
                'large' => 'Large',
                'medium' => 'Medium',
                'thumbnail' => 'Thumbnail',
                'original' => 'Original',
            )
        ),

        'text' => array(
              'type' => 'textfield',
              'heading' => __('Text'),
              'default' => '',
        ),


        'width' => array(
          'type' => 'slider',
          'heading' => 'Width',
          'responsive' => true,
          'default' => '100',
          'unit' => '%',
          'max' => '100',
          'min' => '0',
          'on_change' => array(
            'style' => 'width: {{ value }}%'
          ),
        ),
        'height' => array(
              'type' => 'scrubfield',
              'heading' => __('Height'),
              'default' => '',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( __DIR__ . '/helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.image-cover',
                    'style' => 'padding-top: {{ value }}'
                )
        ),
        'margin' => array(
          'type' => 'margins',
          'heading' => __( 'Margin' ),
          'value' => '',
          'full_width' => true,
          'min' => -100,
          'max' => 100,
          'step' => 1,
        ),
        'lightbox' => array(
            'type' => 'radio-buttons',
            'heading' => __('Lightbox'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),
        'caption' => array(
            'type' => 'radio-buttons',
            'heading' => __('Caption'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),
        'image_overlay' => array(
            'type' => 'colorpicker',
            'heading' => __( 'Image Overlay' ),
            'default' => '',
            'alpha' => true,
            'format' => 'rgb',
            'position' => 'bottom right',
            'on_change' => array(
              'selector' => '.overlay',
              'style' => 'background-color: {{ value }}',
            ),
         ),

        'image_hover' => array(
            'type' => 'select',
            'heading' => 'Image Hover',
            'default' => '',
            'options' => require( __DIR__ . '/values/image-hover.php' ),
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'image-{{ value }}'
            )
        ),

        'image_hover_alt' => array(
            'type' => 'select',
            'heading' => 'Image Hover Alt',
            'default' => '',
            'options' => require( __DIR__ . '/values/image-hover.php' ),
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'image-{{ value }}'
            )
        ),

        'depth' => array(
            'type' => 'slider',
            'heading' => 'Depth',
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'box-shadow-{{ value }}'
            )
        ),

        'depth_hover' => array(
            'type' => 'slider',
            'heading' => 'Depth :Hover',
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'box-shadow-{{ value }}-hover'
            )
        ),
        'parallax' => array(
            'type' => 'slider',
            'heading' => 'Parallax',
            'default' => '0',
            'max' => '10',
            'min' => '-10',
        ),
        'animate' => array(
            'type' => 'select',
            'heading' => 'Animate',
            'default' => 'none',
            'options' => require( __DIR__ . '/values/animate.php' ),
        ),
        'link_options' => require( __DIR__ . '/commons/links.php' ),
        'position_options' => $position_options,
    ),
) );
