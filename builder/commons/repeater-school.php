<?php

if ( ! isset( $repeater_posts ) ) $repeater_posts = 'posts';
if ( ! isset( $repeater_post_type ) ) $repeater_post_type = 'property';


return array(
    'type' => 'group',
    'heading' => __( 'Posts' ),
    'options' => array(

     'ids' => array(
        'type' => 'select',
        'heading' => 'Custom Posts',
        'param_name' => 'ids',
        'config' => array(
            'multiple' => true,
            'placeholder' => 'Select..',
            'postSelect' => array(
                'post_type' => array($repeater_post_type)
            ),
        )
    ),

  

    $repeater_posts => array(
        'type' => 'textfield',
        'heading' => 'Total Posts',
        'conditions' => 'ids === ""',
        'default' => '8',
    ),

    'offset' => array(
        'type' => 'textfield',
        'heading' => 'Offset',
        'conditions' => 'ids === ""',
        'default' => '',
    ),
  )
);
