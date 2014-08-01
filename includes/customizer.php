<?php
/**
 * Ethic Theme Customizer support
 *
 * @package WordPress
 * @subpackage Ethic
 * @since Ethic 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Ethic 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ethic_customize_register($wp_customize) {

    $wp_customize->get_section('header_image')->priority = 29;
    $wp_customize->get_section('static_front_page')->priority = 31;
    $wp_customize->get_section('nav')->priority = 31;

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class ethic_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'ethic') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }

    // Add new section for theme layout and color schemes
    $wp_customize->add_section('ethic_theme_layout_settings', array(
        'title' => __('Color Scheme', 'ethic'),
        'priority' => 32,
    ));


    // Add color scheme options

    $wp_customize->add_setting('ethic_color_scheme', array(
        'default' => 'blue',
        'sanitize_callback' => 'ethic_sanitize_color_scheme_option',
    ));

    $wp_customize->add_control('ethic_color_scheme', array(
        'label' => 'Color Schemes',
        'section' => 'ethic_theme_layout_settings',
        'default' => 'red',
        'type' => 'radio',
        'choices' => array(
            'blue' => __('Blue', 'ethic'),
            'red' => __('Red', 'ethic'),
            'green' => __('Green', 'ethic'),
            'yellow' => __('Yellow', 'ethic'),
            'purple' => __('Purple', 'ethic'),
            'orange' => __('Orange', 'ethic'),
            'brown' => __('Brown', 'ethic'),
            'pink' => __('Pink', 'ethic'),
        ),
    ));


    // Add new section for custom favicon settings
    $wp_customize->add_section('ethic_custom_favicon_setting', array(
        'title' => __('Custom Favicon', 'ethic'),
        'priority' => 63,
    ));


    $wp_customize->add_setting('custom_favicon');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'custom_favicon', array(
        'label' => 'Custom Favicon',
        'section' => 'ethic_custom_favicon_setting',
        'settings' => 'custom_favicon',
        'priority' => 1,
            )
            )
    );

    // Add new section for custom favicon settings
    $wp_customize->add_section('ethic_tracking_code_setting', array(
        'title' => __('Tracking Code', 'ethic'),
        'priority' => 64,
    ));

    $wp_customize->add_setting('tracking_code', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'tracking_code', array(
        'label' => __('Tracking Code', 'ethic'),
        'section' => 'ethic_tracking_code_setting',
        'settings' => 'tracking_code',
        'priority' => 2,
    )));


  
    // Add new section for slider settings
    $wp_customize->add_section('home_slider_setting', array(
        'title' => __('Home Slider', 'ethic'),
        'priority' => 37,
    ));
    
    $wp_customize->add_setting('ethic_home_slider_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_home_slider_color', array(
        'label' => 'Section Background color',
        'section' => 'home_slider_setting',
        'settings' => 'ethic_home_slider_color',
        'priority' => 1,
            )
    ));
    
    $wp_customize->add_setting('slider_background_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_background_image', array(
        'label' => 'Slider Background Image',
        'section' => 'home_slider_setting',
        'settings' => 'slider_background_image',
        'priority' => 2,
            )
            )
    );

    $wp_customize->add_setting('slider_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_one', array(
        'label' => 'Slider 1',
        'section' => 'home_slider_setting',
        'settings' => 'slider_one',
        'priority' => 3,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_one', array(
        'label' => __('Slider One Title', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_one',
        'priority' => 4,
    ));

    $wp_customize->add_setting('slider_one_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'slider_one_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_description',
        'priority' => 5,
    )));
    
    // link text
    $wp_customize->add_setting('slider_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_text', array(
        'label' => __('Slider One Link Text', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_text',
        'priority' => 6,
    ));

    // link url
    $wp_customize->add_setting('slider_one_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_url', array(
        'label' => __('Slider One Link URL', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_url',
        'priority' => 7,
    ));

   
    $wp_customize->add_setting('slider_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_two', array(
        'label' => 'Slider 2',
        'section' => 'home_slider_setting',
        'settings' => 'slider_two',
        'priority' => 8,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_two', array(
        'label' => __('Slider Two Title', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_two',
        'priority' => 9,
    ));

    $wp_customize->add_setting('slider_two_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'slider_two_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_description',
        'priority' => 10,
    )));
    
     // link text
    $wp_customize->add_setting('slider_two_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_text', array(
        'label' => __('Slider Two Link Text', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_text',
        'priority' => 11,
    ));

    // link url
    $wp_customize->add_setting('slider_two_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_url', array(
        'label' => __('Slider Two Link URL', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_url',
        'priority' => 12,
    ));

   
    $wp_customize->add_setting('slider_three', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_three', array(
        'label' => 'Slider 3',
        'section' => 'home_slider_setting',
        'settings' => 'slider_three',
        'priority' => 13,
            )
            )
    );


    // slider Title
    $wp_customize->add_setting('slider_title_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_three', array(
        'label' => __('Slider Three Title', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_three',
        'priority' => 14,
    ));

    $wp_customize->add_setting('slider_three_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'slider_three_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_description',
        'priority' => 15,
    )));
    
     // link text
    $wp_customize->add_setting('slider_three_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_link_text', array(
        'label' => __('Slider Three Link Text', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_link_text',
        'priority' => 16,
    ));

    // link url
    $wp_customize->add_setting('slider_three_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_link_url', array(
        'label' => __('Slider Three Link URL', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_link_url',
        'priority' => 17,
    ));

   
    $wp_customize->add_setting('slider_four', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_four', array(
        'label' => 'Slider 4',
        'section' => 'home_slider_setting',
        'settings' => 'slider_four',
        'priority' => 18,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_four', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_four', array(
        'label' => __('Slider Four Title', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_four',
        'priority' => 19,
    ));

    $wp_customize->add_setting('slider_four_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'slider_four_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_description',
        'priority' => 20,
    )));
    
    $wp_customize->add_setting('slider_four_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_link_text', array(
        'label' => __('Slider Four Link Text', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_link_text',
        'priority' => 21,
    ));

    // link url
    $wp_customize->add_setting('slider_four_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_link_url', array(
        'label' => __('Slider Four Link URL', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_link_url',
        'priority' => 22,
    ));


    $wp_customize->add_setting('slider_five', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_five', array(
        'label' => 'Slider 5',
        'section' => 'home_slider_setting',
        'settings' => 'slider_five',
        'priority' => 23,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_five', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_five', array(
        'label' => __('Slider Five Title', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_five',
        'priority' => 24,
    ));

    $wp_customize->add_setting('slider_five_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'slider_five_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_description',
        'priority' => 25,
    )));
    
    // link text
    $wp_customize->add_setting('slider_five_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_link_text', array(
        'label' => __('Slider Five Link Text', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_link_text',
        'priority' => 26,
    ));

    // link url
    $wp_customize->add_setting('slider_five_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_link_url', array(
        'label' => __('Slider Five Link URL', 'ethic'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_link_url',
        'priority' => 27,
    ));
    

   // Add new section for Home Tagline settings
    $wp_customize->add_section('tagline_setting', array(
        'title' => __('Home Tagline', 'ethic'),
        'priority' => 38,
    ));
   
    // Tagline Title
    $wp_customize->add_setting('tagline_title', array(
        'sanitize_callback' => 'ethic_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tagline_title', array(
        'label' => __('Tagline', 'ethic'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('tagline_description', array('default' => '',
        'sanitize_callback' => 'ethic_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'tagline_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_description',
        'priority' => 20,
    )));
    
    
    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_one_setting', array(
        'title' => __('Home Featured #1', 'ethic'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('home_featured_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_one', array(
        'label' => __('Icon', 'ethic'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_featured_one',
        'priority' => 1,
    ));
    
    // home Title
    $wp_customize->add_setting('home_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_one', array(
        'label' => __('Title', 'ethic'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_one', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'home_description_one', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_description_one',
        'priority' => 3,
    )));

   
    // Add new section for Home Featured Two settings
    $wp_customize->add_section('home_featured_two_setting', array(
        'title' => __('Home Featured #2', 'ethic'),
        'priority' => 42,
    ));


     $wp_customize->add_setting('home_featured_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_two', array(
        'label' => __('Icon', 'ethic'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_featured_two',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_two', array(
        'label' => __('Title', 'ethic'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_title_two',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_two', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'home_description_two', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_description_two',
        'priority' => 3,
    )));

  
    // Add new section for Home Featured Three settings
    $wp_customize->add_section('home_featured_three_setting', array(
        'title' => __('Home Featured #3', 'ethic'),
        'priority' => 45,
    ));


     $wp_customize->add_setting('home_featured_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_three', array(
        'label' => __('Icon', 'ethic'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_featured_three',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_three', array(
        'label' => __('Title', 'ethic'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_title_three',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_three', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'home_description_three', array(
        'label' => __('Description', 'ethic'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_description_three',
        'priority' => 3,
    )));
    
    // Add new section for Home Video settings
    $wp_customize->add_section('video_setting', array(
        'title' => __('Home Video Settings', 'ethic'),
        'priority' => 47,
    ));
    
    $wp_customize->add_setting('ethic_video_section_check', array(
        'default' => 0,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_video_section_check', array(
        'label' => __('Show Video section on Front Page', 'ethic'),
        'section' => 'video_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ethic_video_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_video_color', array(
        'label' => 'Section Background color',
        'section' => 'video_setting',
        'settings' => 'ethic_video_color',
        'priority' => 2,
            )
    ));
    
    // video Title
    $wp_customize->add_setting('video_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('video_title', array(
        'label' => __('Title', 'ethic'),
        'section' => 'video_setting',
        'settings' => 'video_title',
        'priority' => 3,
    ));
    
    $wp_customize->add_setting('video_description', array('default' => '',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'video_description', array(
        'label' => __('Video Description', 'ethic'),
        'section' => 'video_setting',
        'settings' => 'video_description',
        'priority' => 4,
        )));
    
    $wp_customize->add_setting('video_code_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('video_code_title', array(
        'label' => __('Video Title', 'ethic'),
        'section' => 'video_setting',
        'settings' => 'video_code_title',
        'priority' => 5,
    ));

    $wp_customize->add_setting('home_video', array('default' => '',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'home_video', array(
        'label' => __('Video Short Code', 'ethic'),
        'section' => 'video_setting',
        'settings' => 'home_video',
        'priority' => 6,
    )));
    
    // Add new section team setting
    $wp_customize->add_section('ethic_team_settings', array(
        'title' => __('Team Settings', 'ethic'),
        'description' => __('Settings for team', 'ethic'),
        'priority' => 48,
    ));

    // enable team member on front page?
    $wp_customize->add_setting('ethic_front_team_members_check', array(
        'default' => 0,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_front_team_members_check', array(
        'label' => __('Show Team Members on Front Page', 'ethic'),
        'section' => 'ethic_team_settings',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ethic_team_background_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_team_background_color', array(
        'label' => 'Section Background color',
        'section' => 'ethic_team_settings',
        'settings' => 'ethic_team_background_color',
        'priority' => 2,
            )
    ));

    $wp_customize->add_setting('ethic_team_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('ethic_team_title', array(
        'label' => __('Section Title', 'ethic'),
        'section' => 'ethic_team_settings',
        'settings' => 'ethic_team_title',
        'priority' => 3,
    ));

    $wp_customize->add_setting('team_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'team_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'ethic_team_settings',
        'settings' => 'team_description',
        'priority' => 4,
    )));

    $wp_customize->add_setting(
            'ethic_team_members_count', array(
                'default' => '3',
        'sanitize_callback' => 'ethic_sanitize_team_member_count_option',
            )
    );

    $wp_customize->add_control(
            'ethic_team_members_count', array(
        'type' => 'select',
        'label' => 'Number of columns',
        'section' => 'ethic_team_settings',
        'priority' => 10,
        'choices' => array(
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
        ),
            )
    );

    // select number of posts for featured posts on front page
    $wp_customize->add_setting('ethic_front_team_members_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('ethic_front_team_members_count', array(
        'label' => __('Number of Team Members to display', 'ethic'),
        'section' => 'ethic_team_settings',
        'settings' => 'ethic_front_team_members_count',
        'priority' => 20,
    ));
    
    /* Gellery Settings */
     $wp_customize->add_section('ethic_gallery_setting', array(
        'title' => __('Gallery Settings', 'ethic'),
        'priority' => 49,
    ));
     
     $wp_customize->add_setting('ethic_gallery_check', array(
        'default' => 0,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_gallery_check', array(
        'label' => __('Show Gallery on Front Page', 'ethic'),
        'section' => 'ethic_gallery_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));
     
     $wp_customize->add_setting('ethic_gallery_color', array(
        'default' => '#eeeeee',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_gallery_color', array(
        'label' => 'Section Background color',
        'section' => 'ethic_gallery_setting',
        'settings' => 'ethic_gallery_color',
        'priority' => 2,
            )
    ));
     
     $wp_customize->add_setting('galley_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('galley_title', array(
        'label' => __('Title', 'ethic'),
        'section' => 'ethic_gallery_setting',
        'settings' => 'galley_title',
        'priority' => 3,
    ));
    
    $wp_customize->add_setting('ethic_gallery', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('ethic_gallery', array(
        'label' => __('Gallery Short Code', 'ethic'),
        'section' => 'ethic_gallery_setting',
        'settings' => 'ethic_gallery',
        'priority' => 4,
    ));
     
    
    
    // Add new section for Testimonial slider settings
    $wp_customize->add_section('testimonial_slider_setting', array(
        'title' => __('Testimonial Settings', 'ethic'),
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('ethic_testimonial_slider_check', array(
        'default' => 0,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_testimonial_slider_check', array(
        'label' => __('Show Testimonial Slider Front Page', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ethic_testimonial_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_testimonial_color', array(
        'label' => 'Section Background color',
        'section' => 'testimonial_slider_setting',
        'settings' => 'ethic_testimonial_color',
        'priority' => 2,
            )
    ));
    
    $wp_customize->add_setting('testimonial_background_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'testimonial_background_image', array(
        'label' => 'Testimonial Background Image',
        'section' => 'testimonial_slider_setting',
        'settings' => 'testimonial_background_image',
        'priority' => 3,
            )
            )
    );

    $wp_customize->add_setting('tslider_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_one', array(
        'label' => 'Image 1',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_one',
        'priority' => 5,
            )
            )
    );


    $wp_customize->add_setting('tslider_one_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'tslider_one_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_one_description',
        'priority' => 6,
    )));

    $wp_customize->add_setting('client_name_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_one', array(
        'label' => __('Client Name', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_one',
        'priority' => 7,
    ));

    $wp_customize->add_setting('client_name_url_one', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_one', array(
        'label' => __('URL', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_one',
        'priority' => 8,
    ));

    $wp_customize->add_setting('tslider_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_two', array(
        'label' => 'Image 2',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_two',
        'priority' => 9,
            )
            )
    );

    $wp_customize->add_setting('tslider_two_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'tslider_two_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_two_description',
        'priority' => 10,
    )));

    $wp_customize->add_setting('client_name_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_two', array(
        'label' => __('Client Name', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_two',
        'priority' => 11,
    ));

    $wp_customize->add_setting('client_name_url_two', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_two', array(
        'label' => __('URL', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_two',
        'priority' => 12,
    ));

    $wp_customize->add_setting('tslider_three', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_three', array(
        'label' => 'Image 3',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_three',
        'priority' => 13,
            )
            )
    );

    $wp_customize->add_setting('tslider_three_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'tslider_three_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_three_description',
        'priority' => 14,
    )));

    $wp_customize->add_setting('client_name_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_three', array(
        'label' => __('Client Name', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_three',
        'priority' => 15,
    ));

    $wp_customize->add_setting('client_name_url_three', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_three', array(
        'label' => __('URL', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_three',
        'priority' => 16,
    ));

    $wp_customize->add_setting('tslider_four', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_four', array(
        'label' => 'Image 4',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_four',
        'priority' => 17,
            )
            )
    );

    $wp_customize->add_setting('tslider_four_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'tslider_four_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_four_description',
        'priority' => 18,
    )));

    $wp_customize->add_setting('client_name_four', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_four', array(
        'label' => __('Client Name', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_four',
        'priority' => 19,
    ));

    $wp_customize->add_setting('client_name_url_four', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_four', array(
        'label' => __('URL', 'ethic'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_four',
        'priority' => 20,
    ));

  
    // Add new section for displaying Featured portfolio on Front Page
    $wp_customize->add_section('ethic_front_page_portfolio_options', array(
        'title' => __('Portfolio Settings', 'ethic'),
        'description' => __('Settings for displaying featured portfolio on Front Page', 'ethic'),
        'priority' => 51,
    ));

    // enable featured portfolio on front page?
    $wp_customize->add_setting('ethic_front_featured_portfolio_check', array(
        'default' => 0,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_front_featured_portfolio_check', array(
        'label' => __('Show featured portfolio on Front Page', 'ethic'),
        'section' => 'ethic_front_page_portfolio_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('ethic_hide_sample_portfolio', array(
        'default' => 1,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_hide_sample_portfolio', array(
        'label' => __('Hide sample portfolio on Front Page', 'ethic'),
        'section' => 'ethic_front_page_portfolio_options',
        'priority' => 2,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ethic_portfolio_background_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_portfolio_background_color', array(
        'label' => 'Section Background color',
        'section' => 'ethic_front_page_portfolio_options',
        'settings' => 'ethic_portfolio_background_color',
        'priority' => 3,
            )
    ));
    
    // post Title
    $wp_customize->add_setting('ethic_portfolio_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('ethic_portfolio_title', array(
        'label' => __('Section Title', 'ethic'),
        'section' => 'ethic_front_page_portfolio_options',
        'settings' => 'ethic_portfolio_title',
        'priority' => 4,
    ));

    $wp_customize->add_setting('portfolio_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'portfolio_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'ethic_front_page_portfolio_options',
        'settings' => 'portfolio_description',
        'priority' => 5,
    )));



    // select number of posts for featured posts on front page
    $wp_customize->add_setting('ethic_front_featured_portfolio_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('ethic_front_featured_portfolio_count', array(
        'label' => __('Number of portfolio to display', 'ethic'),
        'section' => 'ethic_front_page_portfolio_options',
        'settings' => 'ethic_front_featured_portfolio_count',
        'priority' => 20,
    ));


    $wp_customize->add_setting('ethic_portfolio_front_count', array(
        'default' => 9,
        'sanitize_callback' => 'ethic_sanitize_integer',
    ));
    $wp_customize->add_control('ethic_portfolio_front_count', array(
        'label' => __('portfolio Item Count', 'ethic'),
        'section' => 'ethic_front_page_portfolio_options',
        'settings' => 'ethic_portfolio_front_count',
        'priority' => 40,
    ));
    
    
    /* Front Products */
    $wp_customize->add_section('ethic_front_product_options', array(
        'title' => __('Product Settings', 'ethic'),
        'description' => __('Settings for displaying featured product on Front Page', 'ethic'),
        'priority' => 52,
    ));
    
    $wp_customize->add_setting('ethic_product_section_check', array(
        'default' => 0,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_product_section_check', array(
        'label' => __('Show Products Front Page', 'ethic'),
        'section' => 'ethic_front_product_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ethic_product_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_product_color', array(
        'label' => 'Section Background color',
        'section' => 'ethic_front_product_options',
        'settings' => 'ethic_product_color',
        'priority' => 2,
            )
    ));
    
    $wp_customize->add_setting('product_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('product_title', array(
        'label' => __('Title', 'ethic'),
        'section' => 'ethic_front_product_options',
        'settings' => 'product_title',
        'priority' => 4,
    ));
      
     $wp_customize->add_setting('ethic_products', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'ethic_products', array(
        'label' => __('Products', 'ethic'),
        'section' => 'ethic_front_product_options',
        'settings' => 'ethic_products',
        'priority' => 6,
    )));


    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('ethic_front_page_post_options', array(
        'title' => __('Featured Posts', 'ethic'),
        'description' => __('Settings for displaying featured posts on Front Page', 'ethic'),
        'priority' => 54,
    ));

    // enable featured posts on front page?
    $wp_customize->add_setting('ethic_front_featured_posts_check', array(
        'default' => 1,
        'sanitize_callback' => 'ethic_sanitize_checkbox',
    ));
    $wp_customize->add_control('ethic_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'ethic'),
        'section' => 'ethic_front_page_post_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ethic_blog_background_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_blog_background_color', array(
        'label' => 'Section Background color',
        'section' => 'ethic_front_page_post_options',
        'settings' => 'ethic_blog_background_color',
        'priority' => 2,
            )
    ));
    
    // post Title
    $wp_customize->add_setting('ethic_post_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('ethic_post_title', array(
        'label' => __('Section Title', 'ethic'),
        'section' => 'ethic_front_page_post_options',
        'settings' => 'ethic_post_title',
        'priority' => 3,
    ));
    
    $wp_customize->add_setting('ethic_post_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'ethic_post_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'ethic_front_page_post_options',
        'settings' => 'ethic_post_description',
        'priority' => 5,
    )));

    // select number of posts for featured posts on front page
    $wp_customize->add_setting('ethic_front_featured_posts_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('ethic_front_featured_posts_count', array(
        'label' => __('Number of posts to display', 'ethic'),
        'section' => 'ethic_front_page_post_options',
        'settings' => 'ethic_front_featured_posts_count',
        'priority' => 20,
    ));
    // select category for featured posts 
    $wp_customize->add_setting('ethic_front_featured_posts_cat', array('default' => 0,));
    $wp_customize->add_control(new WP_Customize_Dropdown_Categories_Control($wp_customize, 'ethic_front_featured_posts_cat', array(
        'label' => __('Post Category', 'ethic'),
        'section' => 'ethic_front_page_post_options',
        'type' => 'dropdown-categories',
        'settings' => 'ethic_front_featured_posts_cat',
        'priority' => 30,
    )));

    
    // Add new section for Home Contact settings
    $wp_customize->add_section('ethic_contact_form_setting', array(
        'title' => __('Contact Form', 'ethic'),
        'priority' => 59,
    ));
    
    $wp_customize->add_setting('ethic_contact_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'ethic_sanitize_hex_color',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ethic_contact_color', array(
        'label' => 'Section Background color',
        'section' => 'ethic_contact_form_setting',
        'settings' => 'ethic_contact_color',
        'priority' => 1,
            )
    ));
    
    $wp_customize->add_setting('contact_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_title', array(
        'label' => __('Section Title', 'ethic'),
        'section' => 'ethic_contact_form_setting',
        'settings' => 'contact_title',
        'priority' => 2,
    ));
    
    $wp_customize->add_setting('contact_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'contact_description', array(
        'label' => __('Description', 'ethic'),
        'section' => 'ethic_contact_form_setting',
        'settings' => 'contact_description',
        'priority' => 3,
    )));
    
    $wp_customize->add_setting('ethic_contact_form', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('ethic_contact_form', array(
        'label' => __('Contact Form Short Code', 'ethic'),
        'section' => 'ethic_contact_form_setting',
        'settings' => 'ethic_contact_form',
        'priority' => 4,
    ));
    
    // Add new section for Home Contact settings
    $wp_customize->add_section('ethic_contact_map_setting', array(
        'title' => __('Contact Map', 'ethic'),
        'priority' => 60,
    ));
    
    $wp_customize->add_setting('map_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('map_title', array(
        'label' => __('Section Title', 'ethic'),
        'section' => 'ethic_contact_map_setting',
        'settings' => 'map_title',
        'priority' => 1,
    ));
    
    $wp_customize->add_setting('home_map', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'home_map', array(
        'label' => __('Map Code', 'ethic'),
        'section' => 'ethic_contact_map_setting',
        'settings' => 'home_map',
        'priority' => 2,
    )));
    
     // Add new section for Social Icons
    $wp_customize->add_section('social_icon_setting', array(
        'title' => __('Social Icons', 'ethic'),
        'priority' => 62,
    ));

    // link url
    $wp_customize->add_setting('facebook_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('facebook_link_url', array(
        'label' => __('Facebook URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'facebook_link_url',
        'priority' => 1,
    ));

    // link url
    $wp_customize->add_setting('twitter_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('twitter_link_url', array(
        'label' => __('Twitter URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'twitter_link_url',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('googleplus_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('googleplus_link_url', array(
        'label' => __('Google Plus URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'googleplus_link_url',
        'priority' => 3,
    ));

    // link url
    $wp_customize->add_setting('pinterest_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pinterest_link_url', array(
        'label' => __('Pinterest URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'pinterest_link_url',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('github_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('github_link_url', array(
        'label' => __('Github URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'github_link_url',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('youtube_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('youtube_link_url', array(
        'label' => __('Youtube URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'youtube_link_url',
        'priority' => 6,
    ));
    
    $wp_customize->add_setting('dribbble_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('dribbble_link_url', array(
        'label' => __('Dribble URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'dribbble_link_url',
        'priority' => 7,
    ));
    
    $wp_customize->add_setting('tumblr_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tumblr_link_url', array(
        'label' => __('Tumblr URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'tumblr_link_url',
        'priority' => 8,
    ));
    
    $wp_customize->add_setting('flickr_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('flickr_link_url', array(
        'label' => __('Flickr URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'flickr_link_url',
        'priority' => 9,
    ));
    
    $wp_customize->add_setting('vimeo_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('vimeo_link_url', array(
        'label' => __('Vimeo URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'vimeo_link_url',
        'priority' => 10,
    ));
    
    $wp_customize->add_setting('linkedin_link_url', array('default' => __('', 'ethic'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('linkedin_link_url', array(
        'label' => __('Linkedin URL', 'ethic'),
        'section' => 'social_icon_setting',
        'settings' => 'linkedin_link_url',
        'priority' => 11,
    ));
    
    // Add footer text section
    $wp_customize->add_section('ethic_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 65,
    ));

    $wp_customize->add_setting('ethic_footer_footer_text', array(
        'default' => null,
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'ethic_footer_footer_text', array(
        'section' => 'ethic_footer', // id of section to which the setting belongs
        'settings' => 'ethic_footer_footer_text',
    )));


    // Add custom CSS section
    $wp_customize->add_section('ethic_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));

    $wp_customize->add_setting('ethic_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'ethic_sanitize_custom_css',
        'sanitize_js_callback' => 'ethic_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ethic_customize_textarea_control($wp_customize, 'ethic_custom_css', array(
        'section' => 'ethic_custom_css', // id of section to which the setting belongs
        'settings' => 'ethic_custom_css',
    )));



    //remove default customizer sections
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');

    // add post message for various customizer settings 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}

add_action('customize_register', 'ethic_customize_register');



/*
 * 
 * sanitize Text field
 * 
 * @since Ethic 1.0
 * 
 */

function ethic_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}


/*
 * Sanitize numeric values 
 * 
 * @since Ethic 1.0
 */

function ethic_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

/*
 * Escaping for input values
 * 
 * @since Ethic 1.0
 */

function ethic_sanitize_escaping($input) {
    $input = esc_attr($input);
    return $input;
}

/*
 * Sanitize Custom CSS 
 * 
 * @since Ethic 1.0
 */

function ethic_sanitize_custom_css($input) {
    $input = wp_kses_stripslashes($input);
    return $input;
}

/*
 * Sanitize Checkbox input values
 * 
 * @since Ethic 1.0
 */

function ethic_sanitize_checkbox($input) {
    if ($input) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/*
 * Sanitize color scheme options 
 * 
 * @since Ethic 1.0
 */

function ethic_sanitize_color_scheme_option($colorscheme_option) {
    if (!in_array($colorscheme_option, array('blue', 'red', 'green', 'yellow', 'purple', 'orange', 'brown', 'pink'))) {
        $colorscheme_option = 'blue';
    }

    return $colorscheme_option;
}

/*
 * Sanitize Team Member Count options 
 * 
 * @since Ethic 1.0
 */

function ethic_sanitize_team_member_count_option($grid_count) {
    if (!in_array($grid_count, array('1', '2', '3', '4'))) {
        $grid_count = '3';
    }

    return $grid_count;
}

/*
 * Sanitize Hex Color for 
 * Background Color options
 * 
 * @since Ethic 1.0
 */

function ethic_sanitize_hex_color($color) {
    if ($unhashed = sanitize_hex_color_no_hash($color)) {
        return '#' . $unhashed;
    }
    return $color;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Ethic 1.0
 */
function ethic_customize_preview_js() {
    wp_enqueue_script('ethic_customizer', get_template_directory_uri() . '/includes/js/customizer.js', array('customize-preview'), '20131205', true);
}

add_action('customize_preview_init', 'ethic_customize_preview_js');

function ethic_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('ethic_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'ethic_header_output');

function ethic_footer_tracking_code() {
    echo get_theme_mod('tracking_code');
}

add_action('wp_footer', 'ethic_footer_tracking_code');

/**
 * Change theme colors based on theme options from customizer.
 *
 * @since Ethic 1.0
 */
function ethic_background_image() {
    
    $background_slider = get_theme_mod('slider_background_image');
    $background_testimonial = get_theme_mod('testimonial_background_image');

    // If we get this far, we have custom styles.
    ?>
    <style type="text/css" id="ethic-background-image-css">
        
    <?php if (get_theme_mod('slider_background_image')) { ?>
            .slider-wrapper{
                background-image:url('<?php echo $background_slider ?>');
            }
    <?php } ?>
            
    <?php if (get_theme_mod('testimonial_background_image')) { ?>
            .testimonial-area{
                background-image:url('<?php echo $background_testimonial ?>');
            }
    <?php } ?>
    
    </style>

    <?php
}

add_action('wp_head', 'ethic_background_image');

/**
 * Change theme background colors based on theme options from customizer.
 *
 * @since Ethic 1.0
 */
function ethic_background_color() {

    $background_slider = get_theme_mod('ethic_home_slider_color');
    $background_portfolio = get_theme_mod('ethic_portfolio_background_color');
    $background_blog = get_theme_mod('ethic_blog_background_color');
    $background_team = get_theme_mod('ethic_team_background_color');
    $background_video = get_theme_mod('ethic_video_color');
    $background_gallery = get_theme_mod('ethic_gallery_color');
    $background_testimonial = get_theme_mod('ethic_testimonial_color');
    $background_product = get_theme_mod('ethic_product_color');
    $background_contact = get_theme_mod('ethic_contact_color');

    // If we get this far, we have custom styles.
    ?>

    <style type="text/css" id="passion-background-color-css">
    <?php if (get_theme_mod('ethic_home_slider_color')) { ?>
            .slider-wrapper{
                background:<?php echo $background_slider ?>;
            }
    <?php } ?>
                    
    <?php if (get_theme_mod('ethic_portfolio_background_color')) { ?>
            .portfolio-area{
                background:<?php echo $background_portfolio ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('ethic_blog_background_color')) { ?>
            .blog-area{
                background:<?php echo $background_blog ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('ethic_team_background_color')) { ?>
            .team-member-area{
                background:<?php echo $background_team ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('ethic_video_color')) { ?>
        .home-video-area{
            background:<?php echo $background_video ?>;
        }
    <?php } ?>
        
    <?php if (get_theme_mod('ethic_gallery_color')) { ?>
            .gallery-area{
                background:<?php echo $background_gallery ?>;
            }
    <?php } ?>
            
    <?php if (get_theme_mod('ethic_testimonial_color')) { ?>
            .testimonial-area{
                background:<?php echo $background_testimonial ?>;
            }
    <?php } ?>
            
    <?php if (get_theme_mod('ethic_product_color')) { ?>
            .product-area{
                background:<?php echo $background_product ?>;
            }
    <?php } ?>
            
     <?php if (get_theme_mod('ethic_contact_color')) { ?>
            .contact-area{
                background:<?php echo $background_contact ?>;
            }
    <?php } ?>
            
    </style>

    <?php
}

add_action('wp_head', 'ethic_background_color');
