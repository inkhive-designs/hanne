<?php
//upgrade
function hanne_customize_register_misc( $wp_customize ) {
$wp_customize->add_section(
    'hanne_sec_upgrade',
    array(
        'title'     => __('Hanne - Help & Support','hanne'),
        'priority'  => 45,
    )
);

$wp_customize->add_setting(
    'hanne_upgrade',
    array( 'sanitize_callback' => 'esc_textarea' )
);

$wp_customize->add_control(
    new Hanne_WP_Customize_Upgrade_Control(
        $wp_customize,
        'hanne_upgrade',
        array(
            'label' => __('Free Email Support','hanne'),
            'description' => __('Currently We are Offering Free Email Support with our theme. If you have any queries or require help please <a href="https://inkhive.com/product/hanne/">Read our FAQs</a> and if your problem is still not solved then contact us. <br><br> If you are looking for more features in your site like Unlimited Colors, More Layouts, Better Pages, More Social Icons, More Skins, More Widgets then please consider upgrading to <a href="https://inkhive.com/product/hanne-plus/" target="_blank">Hanne Plus</a>.','hanne'),
            'section' => 'hanne_sec_upgrade',
            'settings' => 'hanne_upgrade',
        )
    )
);
}
add_action( 'customize_register', 'hanne_customize_register_misc' );