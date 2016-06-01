<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {

    /* OptionTree is not loaded yet */
    if ( ! function_exists( 'ot_settings_id' ) )
        return false;

    /**
    * Get a copy of the saved settings array.
    */
    $saved_settings = get_option( ot_settings_id(), array() );

    /**
    * Custom settings array that will eventually be
    * passes to the OptionTree Settings API Class.
    */
    $custom_settings = array(
        'sections' => array(
            array(
                'id'        => 'global',
                'title'     => 'Global'
            ),
            array(
                'id'        => 'contact_info',
                'title'     => 'Contact Info'
            ),
            array(
                'id'        => 'social_media',
                'title'     => 'Social Media'
            ),
            array(
                'id'        => 'favicons',
                'title'     => 'Favicons'
            )
        ),
        'settings' => array(
            array(
                'id'            => 'logo',
                'label'         => 'Logo',
                'desc'          => '',
                'std'           => '',
                'type'          => 'upload',
                'section'       => 'global',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'google_analytics',
                'label'         => 'Google Analytics',
                'desc'          => 'Enter the tracking ID (UA-XXXXXXXX-X).',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'global',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'company',
                'label'         => 'Company',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'address_1',
                'label'         => 'Address 1',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'address_2',
                'label'         => 'Address 2',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'city',
                'label'         => 'City',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'state',
                'label'         => 'State',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'zip_code',
                'label'         => 'Zip Code',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'email_address',
                'label'         => 'Email Address',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'phone_number',
                'label'         => 'Phone Number',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'contact_info',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'facebook_url',
                'label'         => 'Facebook URL',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'social_media',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'googleplus_url',
                'label'         => 'Google+ URL',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'social_media',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'linkedin_url',
                'label'         => 'LinkedIn URL',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'social_media',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'twitter_url',
                'label'         => 'Twitter URL',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'social_media',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'youtube_url',
                'label'         => 'YouTube URL',
                'desc'          => '',
                'std'           => '',
                'type'          => 'text',
                'section'       => 'social_media',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'favicon_144x144',
                'label'         => 'Favicon 144x144',
                'desc'          => '',
                'std'           => '',
                'type'          => 'upload',
                'section'       => 'favicons',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'favicon_114x114',
                'label'         => 'Favicon 114x114',
                'desc'          => '',
                'std'           => '',
                'type'          => 'upload',
                'section'       => 'favicons',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'favicon_72x72',
                'label'         => 'Favicon 72x72',
                'desc'          => '',
                'std'           => '',
                'type'          => 'upload',
                'section'       => 'favicons',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'favicon_57x57',
                'label'         => 'Favicon 57x57',
                'desc'          => '',
                'std'           => '',
                'type'          => 'upload',
                'section'       => 'favicons',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            ),
            array(
                'id'            => 'favicon',
                'label'         => 'Favicon',
                'desc'          => '',
                'std'           => '',
                'type'          => 'upload',
                'section'       => 'favicons',
                'rows'          => '',
                'post_type'     => '',
                'taxonomy'      => '',
                'min_max_step'  => '',
                'class'         => '',
                'condition'     => '',
                'operator'      => 'and'
            )
        )
    );

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

    /* settings are not the same update the DB */
    if ( $saved_settings !== $custom_settings ) {
        update_option( ot_settings_id(), $custom_settings );
    }

    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;

    $ot_has_custom_theme_options = true;
}