<?php
add_ux_builder_shortcode( 'uxfsa_counter_number', array(
    'type' => 'container',
    'name' => __( 'UX Counter Number' ),
    'category' => __( 'UX-Addons.com' ),
    'thumbnail' => UXFSA_Flatsome_Addons_URL.'thumbnails/uxfsa_counter_number.jpg',
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
    'options'   => array(
      'img'         => array(
        'type'    => 'image',
        'heading' => 'Icon',
        'value'   => '',
      ),
      'inline_svg'  => array(
        'type'    => 'checkbox',
        'heading' => 'Inline SVG',
        'default' => 'true',
      ),
      'img_width'   => array(
        'type'      => 'slider',
        'heading'   => 'Icon Width',
        'unit'      => 'px',
        'default'   => 60,
        'max'       => 600,
        'min'       => 20,
        'on_change' => array(
          'selector' => '.icon-box-img',
          'style'    => 'width: {{ value }}px',
        ),
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
       'style'         => array(
        'type'      => 'select',
        'heading'   => 'Select Style',
        'default'   => 'center',
        'options'   => array(
          'top'    => 'Style 1',
          'center' => 'Style 2',
          'left'   => 'Style 3',
          'right'  => 'Style 4',
        ),
      ),
      'title'       => array(
        'type'      => 'textfield',
        'heading'   => 'Title',
        'value'     => '',
        'on_change' => array(
          'selector' => '.icon-box-text h5',
          'content'  => '{{ value }}',
        ),
      ),
      'title_small' => array(
        'type'      => 'textfield',
        'heading'   => 'Title Small',
        'value'     => '',
        'on_change' => array(
          'selector' => '.icon-box-text h6',
          'content'  => '{{ value }}',
        ),
      ),
      'tooltip'     => array(
        'type'    => 'textfield',
        'heading' => 'Tooltip',
        'value'   => '',
      ),
      'font_size'   => array(
        'type'      => 'radio-buttons',
        'heading'   => __( 'Text Size' ),
        'default'   => 'medium',
        'options'   => require( __DIR__ . '/values/text-sizes.php' ),
        'on_change' => array(
          'recompile' => false,
          'class'     => 'is-{{ value }}',
        ),
      ),
      'margin'      => array(
        'type'      => 'margins',
        'heading'   => __( 'Margin' ),
        'value'     => '',
        'default'   => '',
        'min'       => -100,
        'max'       => 100,
        'step'      => 1,
        'on_change' => array(
          'selector' => '.icon-box',
          'style'    => 'margin: {{ value }}',
        ),
      ),
      'icon_border' => array(
        'type'      => 'slider',
        'heading'   => 'Icon Border',
        'unit'      => 'px',
        'default'   => 0,
        'max'       => 10,
        'min'       => 0,
        'on_change' => array(
          'selector' => '.has-icon-bg .icon-inner',
          'style'    => 'border-width: {{ value }}px',
        ),
      ),
      'icon_color'  => array(
        'type'        => 'colorpicker',
        'heading'     => __( 'Icon Color' ),
        'description' => __( 'Only works for simple SVG icons' ),
        'format'      => 'rgb',
        'position'    => 'bottom right',
        'on_change'   => array(
          'selector' => '.icon-inner',
          'style'    => 'color: {{ value }}',
       ),
      ),
      'link_group'  => require( __DIR__ . '/commons/links.php' ),
    ),
  )
);
