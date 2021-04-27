<?php

if(!$repeater_col_spacing) $repeater_col_spacing = 'normal';
if(!$repeater_columns) $repeater_columns = '4';
if(!$repeater_type) $repeater_type = 'slider';

return array(
    'type' => 'group',
    'heading' => __( 'Title' ),
    'options' => array(
        'title' => array(
            'type' => 'textfield',
            'heading' => __( 'Text Title' ),
            'default' => '',
          ),
          'background' => array(
            'type' => 'image',
            'heading' => __( 'Background' )
          ),
          'box' => array(
              'type' => 'select',
              'heading' => 'Box Layout',
              'conditions' => 'type === "slider"',
              'default' => '1',
              'options' => array(
                'half' => 'Half box',
                'full' => 'Full box',
              )
          ),
          'title_color' => array(
              'type' => 'colorpicker',
              'heading' => __( 'Color' ),
              'default' => '',
              'alpha' => true,
              'format' => 'rgb',
              'position' => 'bottom right',
              'on_change' => array(
                'selector' => '.text-title',
                'style' => 'color: {{ value }}',
              ),
           ),

  ),
);
