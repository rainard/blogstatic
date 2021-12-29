<?php

function prem_blog_blog_section_setup( $wp_customize ) {

  $wp_customize->add_section( 'prem_blog_options',
   array(
      'title'       => __( 'Homepage Setup', 'prem-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );

  $wp_customize->add_section( 'prem_blog_single_options',
   array(
      'title'       => __( 'Single Page Settings', 'prem-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );

  $wp_customize->add_section( 'prem_blog_footer_options',
   array(
      'title'       => __( 'Footer', 'prem-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );
  /******************************** Big Category *****************************/
  // Credits: https://blog.josemcastaneda.com/2015/05/13/customizer-dropdown-category-selection/
  // create an empty array
  $cats = array();

  // we loop over the categories and set the names and
  // labels we need
  foreach ( get_categories() as $categories => $category ){
    $cats[$category->term_id] = $category->name;
  }

    $wp_customize->add_setting( 'prem_blog_grid_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'prem_blog_grid_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Section One', 'prem-blog' ), //Admin-visible name of the control
        'settings'   => 'prem_blog_grid_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'prem_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

    $wp_customize->add_setting( 'prem_blog_bottom_section3_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'prem_blog_bottom_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Section Two', 'prem-blog' ), //Admin-visible name of the control
        'settings'   => 'prem_blog_bottom_section3_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'prem_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );
    $wp_customize->add_setting( 'prem_blog_scroll_section2_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'prem_blog_scroll_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Section Three', 'prem-blog' ), //Admin-visible name of the control
        'settings'   => 'prem_blog_scroll_section2_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'prem_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

      $wp_customize->add_setting( 'prem_blog_hot_category_name_setting', array(
      'capability' => 'edit_theme_options',
      'default' => 'Hot News',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'prem_blog_hot_category_name_setting', array(
      'type' => 'text',
      'section' => 'prem_blog_options', // Add a default or your own section
      'label' => __( 'Put Category Name', 'prem-blog' ),
    ) );

    $wp_customize->add_setting( 'prem_blog_banner_list_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'prem_blog_banner_list_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Hot Section Category', 'prem-blog' ), //Admin-visible name of the control
        'settings'   => 'prem_blog_banner_list_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'prem_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );


    $wp_customize->add_setting( 'prem_blog_hot2_category_name_setting', array(
      'capability' => 'edit_theme_options',
      'default' => 'Hot News',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'prem_blog_hot2_category_name_setting', array(
      'type' => 'text',
      'section' => 'prem_blog_options', // Add a default or your own section
      'label' => __( 'Put Category Name', 'prem-blog' ),
    ) );

    $wp_customize->add_setting( 'prem_blog_banner_list_right_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'prem_blog_banner_list_right_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Hot Section Category', 'prem-blog' ), //Admin-visible name of the control
        'settings'   => 'prem_blog_banner_list_right_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'prem_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );


    $wp_customize->add_setting( 'prem_blog_single_page_image_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => 'container', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'prem_blog_sanitize_select',
     )
    );

    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'prem_blog_single_page_image_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Single Post Featured Image', 'prem-blog' ), //Admin-visible name of the control
        'settings'   => 'prem_blog_single_page_image_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'prem_blog_single_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => array(
            'container' => 'In container',
            'full-width' => 'Full Width',
        ),
    )
    ) );
}

add_action( 'customize_register', 'prem_blog_blog_section_setup');

function prem_blog_accent_color_setup( $wp_customize ) {

  /******************************** Primary Color *****************************/
    $wp_customize->add_setting( 'prem_blog_primary_color_setting', array(
      'default'   => '#00c4cc',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'prem_blog_primary_color_control', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Primary color', 'prem-blog' ),
      'settings'      =>  'prem_blog_primary_color_setting',
    ) ) );

    // Fancy Underline Color
    $wp_customize->add_setting(
        'fancy_underline_color_setting',
        array(
            'default'     => 'rgba(0, 197, 204,0.7)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'prem_blog_sanitize_alpha_color',
        )
    );

    $wp_customize->add_control(
        new prem_blog_Customizer_Alpha_Color_Control(
            $wp_customize,
            'fancy_underline_color_control',
            array(
                'label'         => __( 'Fancy Underline Color', 'prem-blog' ),
                'section'       => 'colors',
                'settings'      => 'fancy_underline_color_setting',
                'show_opacity'  => true, // Optional.
            )
        )
    );

  // Display bottom bar copyright text
  $wp_customize->add_setting( 'prem_blog_home_copyright_desc_free_setting', array(
    'default' =>  esc_html__( 'Copyright. All Rights Reserved.', 'prem-blog' ),
    'sanitize_callback' => 'prem_blog_sanitize_text',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'prem-blog-copyright-text-control', array(
    'label'   =>  __( 'Bottom bar copyright text', 'prem-blog' ),
    'type'    =>  'textarea',
    'section' =>  'prem_blog_footer_options',
    'settings'  =>  'prem_blog_home_copyright_desc_free_setting',
  ) ) );
}

add_action( 'customize_register', 'prem_blog_accent_color_setup');


