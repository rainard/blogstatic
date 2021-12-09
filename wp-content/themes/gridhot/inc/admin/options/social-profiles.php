<?php
/**
* Social profiles options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_social_profiles($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_social', array( 'title' => esc_html__( 'Social Links Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 240, ));

    $wp_customize->add_setting( 'gridhot_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Social Area', 'gridhot' ), 'description' => esc_html__('If you checked this option, all buttons will disappear. There is no any effect from these options: "Hide Search Button", "Show Login/Logout Button".', 'gridhot'), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_search_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_search_button_control', array( 'label' => esc_html__( 'Hide Search Button', 'gridhot' ), 'description' => esc_html__('This option has no effect if you have checked the option: "Hide Social Area".', 'gridhot'), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[hide_search_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[show_login_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_show_login_button_control', array( 'label' => esc_html__( 'Show Login/Logout Button', 'gridhot' ), 'description' => esc_html__('This option has no effect if you have checked the option: "Hide Social Area".', 'gridhot'), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[show_login_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'gridhot_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'gridhot_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_vklink_control', array( 'label' => esc_html__( 'VK Link', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[messengerlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_messengerlink_control', array( 'label' => esc_html__( 'Messenger URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[messengerlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[whatsapplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_whatsapplink_control', array( 'label' => esc_html__( 'WhatsApp URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[whatsapplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[mediumlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_mediumlink_control', array( 'label' => esc_html__( 'Medium URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[mediumlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_githublink_control', array( 'label' => esc_html__( 'Github URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[mixlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_mixlink_control', array( 'label' => esc_html__( 'Mix URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[mixlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_redditlink_control', array( 'label' => esc_html__( 'Reddit URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[flipboardlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_flipboardlink_control', array( 'label' => esc_html__( 'Flipboard URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[flipboardlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[bloggerlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_bloggerlink_control', array( 'label' => esc_html__( 'Blogger URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[bloggerlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[etsylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_etsylink_control', array( 'label' => esc_html__( 'Etsy URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[etsylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_behancelink_control', array( 'label' => esc_html__( 'Behance URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[amazonlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_amazonlink_control', array( 'label' => esc_html__( 'Amazon URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[amazonlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[meetuplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_meetuplink_control', array( 'label' => esc_html__( 'Meetup URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[meetuplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[mixcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_mixcloudlink_control', array( 'label' => esc_html__( 'Mixcloud URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[mixcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[slacklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_slacklink_control', array( 'label' => esc_html__( 'Slack URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[slacklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[snapchatlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_snapchatlink_control', array( 'label' => esc_html__( 'Snapchat URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[snapchatlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[spotifylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_spotifylink_control', array( 'label' => esc_html__( 'Spotify URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[spotifylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[yelplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_yelplink_control', array( 'label' => esc_html__( 'Yelp URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[yelplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[wordpresslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_wordpresslink_control', array( 'label' => esc_html__( 'WordPress URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[wordpresslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[twitchlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_twitchlink_control', array( 'label' => esc_html__( 'Twitch URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[twitchlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[telegramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_telegramlink_control', array( 'label' => esc_html__( 'Telegram URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[telegramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[bandcamplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_bandcamplink_control', array( 'label' => esc_html__( 'Bandcamp URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[bandcamplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[quoralink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_quoralink_control', array( 'label' => esc_html__( 'Quora URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[quoralink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[foursquarelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_foursquarelink_control', array( 'label' => esc_html__( 'Foursquare URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[foursquarelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[deviantartlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_deviantartlink_control', array( 'label' => esc_html__( 'DeviantArt URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[deviantartlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[imdblink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_imdblink_control', array( 'label' => esc_html__( 'IMDB URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[imdblink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_codepenlink_control', array( 'label' => esc_html__( 'Codepen URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_bsalink_control', array( 'label' => esc_html__( 'BuySellAds URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[web500pxlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_web500pxlink_control', array( 'label' => esc_html__( '500px URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[web500pxlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[ellolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_ellolink_control', array( 'label' => esc_html__( 'Ello URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[ellolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[discordlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_discordlink_control', array( 'label' => esc_html__( 'Discord URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[discordlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[goodreadslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_goodreadslink_control', array( 'label' => esc_html__( 'Goodreads URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[goodreadslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[odnoklassnikilink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_odnoklassnikilink_control', array( 'label' => esc_html__( 'Odnoklassniki URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[odnoklassnikilink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[houzzlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_houzzlink_control', array( 'label' => esc_html__( 'Houzz URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[houzzlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[pocketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_pocketlink_control', array( 'label' => esc_html__( 'Pocket URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[pocketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[xinglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_xinglink_control', array( 'label' => esc_html__( 'XING URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[xinglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[googleplaylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_googleplaylink_control', array( 'label' => esc_html__( 'Google Play URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[googleplaylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[dropboxlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_dropboxlink_control', array( 'label' => esc_html__( 'Dropbox URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[dropboxlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[paypallink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_paypallink_control', array( 'label' => esc_html__( 'PayPal URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[paypallink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[viadeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_viadeolink_control', array( 'label' => esc_html__( 'Viadeo URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[viadeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[wikipedialink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_wikipedialink_control', array( 'label' => esc_html__( 'Wikipedia URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[wikipedialink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'gridhot_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_email' ) );

    $wp_customize->add_control( 'gridhot_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'gridhot' ), 'section' => 'gridhot_section_social', 'settings' => 'gridhot_options[rsslink]', 'type' => 'text' ) );

}