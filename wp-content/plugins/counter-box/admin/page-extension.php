<?php
/**
 * Extansion version
 *
 * @package     Wow_Plugin
 * @subpackage
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$pro_url  = 'https://wow-estore.com/item/counter-box-pro/';
$demo_url = 'https://wow-company.com/preview/wordpress-plugins/counter-box-pro/';
?>

<section class="section has-background-light is-medium" id="features">
    <div class="container">
        <div class="block has-text-centered ds-title">
            <p class="subtitle is-5 is-uppercase has-text-danger">what you get</p>
            <h3 class="title is-2">Awesome Features </h3>
            <div class="button-group">
                <a href="<?php echo esc_url( $pro_url ); ?>" class="like-button pro-button" target="_blank">Get More with Pro</a>
                <a href="<?php echo esc_url( $demo_url ); ?>" class="like-button demo-button" target="_blank">Demo</a>
            </div>
        </div>
        <div class="columns is-multiline is-variable is-3 feature-boxes">


            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/triggers.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5">Targets</p>
                        <p>6 targets that can be triggered after the counter ends:
                            Hide Block, Show Block, Redirect, Hide the counter box, Show the message, Call any function.
                            Make your counters more functional.</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/slash-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5 ">Delimiter of number</p>
                        <p>Divide the digits of the counter into digits..</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/calendar-alt-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5">Scheduling</p>
                        <p>Add scheduling options to your popups. With multiple schedule types, you can precisely schedule your popups in just a few minutes.</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/users-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5">User dependence</p>
                        <p>Show menu depending on user (for all users, only for logged-in users, only for not logged-in
                            users).</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/language-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5">Language dependence</p>
                        <p>Show menu depending on language.</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/palette-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5">Custome Style</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/globe-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5">Cross-Browser</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/code-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5 ">W3C Valid Code</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/sync-alt-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5">Lifetime Free Updates</p>
                        <p>Never pay for an update.</p>
                    </div>
                </div>
            </div>

            <div class="column is-full-mobile is-one-quarter-desktop is-half-tablet ">
                <div class="box has-text-centered has-text-grey feature-box is-radiusless">
                    <div class="icon">
                        <img src="<?php echo plugin_dir_url(__FILE__);?>assets/img/headset-solid.svg">
                    </div>
                    <div class="content">
                        <p class="title is-5 ">Fast Support</p>
                        <p>We work closely with the user community and listen to your opinion. We provide free technical
                            and
                            information support for customers.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
