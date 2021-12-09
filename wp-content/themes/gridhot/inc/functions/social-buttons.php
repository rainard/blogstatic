<?php
/**
* Social buttons
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_social_buttons() { ?>

<div class='gridhot-header-social-icons'>
    <?php if ( gridhot_get_option('twitterlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('twitterlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-twitter" aria-label="<?php esc_attr_e('Twitter Button','gridhot'); ?>"><i class="fab fa-twitter" aria-hidden="true" title="<?php esc_attr_e('Twitter','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('facebooklink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('facebooklink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-facebook" aria-label="<?php esc_attr_e('Facebook Button','gridhot'); ?>"><i class="fab fa-facebook-f" aria-hidden="true" title="<?php esc_attr_e('Facebook','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('googlelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('googlelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-google-plus" aria-label="<?php esc_attr_e('Google Plus Button','gridhot'); ?>"><i class="fab fa-google-plus-g" aria-hidden="true" title="<?php esc_attr_e('Google Plus','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('pinterestlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('pinterestlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-pinterest" aria-label="<?php esc_attr_e('Pinterest Button','gridhot'); ?>"><i class="fab fa-pinterest" aria-hidden="true" title="<?php esc_attr_e('Pinterest','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('linkedinlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('linkedinlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-linkedin" aria-label="<?php esc_attr_e('Linkedin Button','gridhot'); ?>"><i class="fab fa-linkedin-in" aria-hidden="true" title="<?php esc_attr_e('Linkedin','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('instagramlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('instagramlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-instagram" aria-label="<?php esc_attr_e('Instagram Button','gridhot'); ?>"><i class="fab fa-instagram" aria-hidden="true" title="<?php esc_attr_e('Instagram','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('flickrlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('flickrlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-flickr" aria-label="<?php esc_attr_e('Flickr Button','gridhot'); ?>"><i class="fab fa-flickr" aria-hidden="true" title="<?php esc_attr_e('Flickr','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('youtubelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('youtubelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-youtube" aria-label="<?php esc_attr_e('Youtube Button','gridhot'); ?>"><i class="fab fa-youtube" aria-hidden="true" title="<?php esc_attr_e('Youtube','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('vimeolink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('vimeolink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-vimeo" aria-label="<?php esc_attr_e('Vimeo Button','gridhot'); ?>"><i class="fab fa-vimeo-v" aria-hidden="true" title="<?php esc_attr_e('Vimeo','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('soundcloudlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('soundcloudlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-soundcloud" aria-label="<?php esc_attr_e('SoundCloud Button','gridhot'); ?>"><i class="fab fa-soundcloud" aria-hidden="true" title="<?php esc_attr_e('SoundCloud','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('messengerlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('messengerlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-messenger" aria-label="<?php esc_attr_e('Messenger Button','gridhot'); ?>"><i class="fab fa-facebook-messenger" aria-hidden="true" title="<?php esc_attr_e('Messenger','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('whatsapplink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('whatsapplink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-whatsapp" aria-label="<?php esc_attr_e('WhatsApp Button','gridhot'); ?>"><i class="fab fa-whatsapp" aria-hidden="true" title="<?php esc_attr_e('WhatsApp','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('lastfmlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('lastfmlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-lastfm" aria-label="<?php esc_attr_e('Lastfm Button','gridhot'); ?>"><i class="fab fa-lastfm" aria-hidden="true" title="<?php esc_attr_e('Lastfm','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('mediumlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('mediumlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-medium" aria-label="<?php esc_attr_e('Medium Button','gridhot'); ?>"><i class="fab fa-medium-m" aria-hidden="true" title="<?php esc_attr_e('Medium','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('githublink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('githublink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-github" aria-label="<?php esc_attr_e('Github Button','gridhot'); ?>"><i class="fab fa-github" aria-hidden="true" title="<?php esc_attr_e('Github','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('bitbucketlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('bitbucketlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-bitbucket" aria-label="<?php esc_attr_e('Bitbucket Button','gridhot'); ?>"><i class="fab fa-bitbucket" aria-hidden="true" title="<?php esc_attr_e('Bitbucket','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('tumblrlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('tumblrlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-tumblr" aria-label="<?php esc_attr_e('Tumblr Button','gridhot'); ?>"><i class="fab fa-tumblr" aria-hidden="true" title="<?php esc_attr_e('Tumblr','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('digglink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('digglink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-digg" aria-label="<?php esc_attr_e('Digg Button','gridhot'); ?>"><i class="fab fa-digg" aria-hidden="true" title="<?php esc_attr_e('Digg','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('deliciouslink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('deliciouslink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-delicious" aria-label="<?php esc_attr_e('Delicious Button','gridhot'); ?>"><i class="fab fa-delicious" aria-hidden="true" title="<?php esc_attr_e('Delicious','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('stumblelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('stumblelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-stumbleupon" aria-label="<?php esc_attr_e('Stumbleupon Button','gridhot'); ?>"><i class="fab fa-stumbleupon" aria-hidden="true" title="<?php esc_attr_e('Stumbleupon','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('mixlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('mixlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-mix" aria-label="<?php esc_attr_e('Mix Button','gridhot'); ?>"><i class="fab fa-mix" aria-hidden="true" title="<?php esc_attr_e('Mix','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('redditlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('redditlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-reddit" aria-label="<?php esc_attr_e('Reddit Button','gridhot'); ?>"><i class="fab fa-reddit" aria-hidden="true" title="<?php esc_attr_e('Reddit','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('dribbblelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('dribbblelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-dribbble" aria-label="<?php esc_attr_e('Dribbble Button','gridhot'); ?>"><i class="fab fa-dribbble" aria-hidden="true" title="<?php esc_attr_e('Dribbble','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('flipboardlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('flipboardlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-flipboard" aria-label="<?php esc_attr_e('Flipboard Button','gridhot'); ?>"><i class="fab fa-flipboard" aria-hidden="true" title="<?php esc_attr_e('Flipboard','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('bloggerlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('bloggerlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-blogger" aria-label="<?php esc_attr_e('Blogger Button','gridhot'); ?>"><i class="fab fa-blogger" aria-hidden="true" title="<?php esc_attr_e('Blogger','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('etsylink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('etsylink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-etsy" aria-label="<?php esc_attr_e('Etsy Button','gridhot'); ?>"><i class="fab fa-etsy" aria-hidden="true" title="<?php esc_attr_e('Etsy','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('behancelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('behancelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-behance" aria-label="<?php esc_attr_e('Behance Button','gridhot'); ?>"><i class="fab fa-behance" aria-hidden="true" title="<?php esc_attr_e('Behance','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('amazonlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('amazonlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-amazon" aria-label="<?php esc_attr_e('Amazon Button','gridhot'); ?>"><i class="fab fa-amazon" aria-hidden="true" title="<?php esc_attr_e('Amazon','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('meetuplink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('meetuplink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-meetup" aria-label="<?php esc_attr_e('Meetup Button','gridhot'); ?>"><i class="fab fa-meetup" aria-hidden="true" title="<?php esc_attr_e('Meetup','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('mixcloudlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('mixcloudlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-mixcloud" aria-label="<?php esc_attr_e('Mixcloud Button','gridhot'); ?>"><i class="fab fa-mixcloud" aria-hidden="true" title="<?php esc_attr_e('Mixcloud','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('slacklink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('slacklink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-slack" aria-label="<?php esc_attr_e('Slack Button','gridhot'); ?>"><i class="fab fa-slack" aria-hidden="true" title="<?php esc_attr_e('Slack','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('snapchatlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('snapchatlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-snapchat" aria-label="<?php esc_attr_e('Snapchat Button','gridhot'); ?>"><i class="fab fa-snapchat" aria-hidden="true" title="<?php esc_attr_e('Snapchat','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('spotifylink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('spotifylink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-spotify" aria-label="<?php esc_attr_e('Spotify Button','gridhot'); ?>"><i class="fab fa-spotify" aria-hidden="true" title="<?php esc_attr_e('Spotify','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('yelplink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('yelplink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-yelp" aria-label="<?php esc_attr_e('Yelp Button','gridhot'); ?>"><i class="fab fa-yelp" aria-hidden="true" title="<?php esc_attr_e('Yelp','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('wordpresslink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('wordpresslink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-wordpress" aria-label="<?php esc_attr_e('WordPress Button','gridhot'); ?>"><i class="fab fa-wordpress" aria-hidden="true" title="<?php esc_attr_e('WordPress','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('twitchlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('twitchlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-twitch" aria-label="<?php esc_attr_e('Twitch Button','gridhot'); ?>"><i class="fab fa-twitch" aria-hidden="true" title="<?php esc_attr_e('Twitch','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('telegramlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('telegramlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-telegram" aria-label="<?php esc_attr_e('Telegram Button','gridhot'); ?>"><i class="fab fa-telegram" aria-hidden="true" title="<?php esc_attr_e('Telegram','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('bandcamplink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('bandcamplink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-bandcamp" aria-label="<?php esc_attr_e('Bandcamp Button','gridhot'); ?>"><i class="fab fa-bandcamp" aria-hidden="true" title="<?php esc_attr_e('Bandcamp','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('quoralink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('quoralink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-quora" aria-label="<?php esc_attr_e('Quora Button','gridhot'); ?>"><i class="fab fa-quora" aria-hidden="true" title="<?php esc_attr_e('Quora','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('foursquarelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('foursquarelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-foursquare" aria-label="<?php esc_attr_e('Foursquare Button','gridhot'); ?>"><i class="fab fa-foursquare" aria-hidden="true" title="<?php esc_attr_e('Foursquare','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('deviantartlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('deviantartlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-deviantart" aria-label="<?php esc_attr_e('DeviantArt Button','gridhot'); ?>"><i class="fab fa-deviantart" aria-hidden="true" title="<?php esc_attr_e('DeviantArt','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('imdblink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('imdblink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-imdb" aria-label="<?php esc_attr_e('IMDB Button','gridhot'); ?>"><i class="fab fa-imdb" aria-hidden="true" title="<?php esc_attr_e('IMDB','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('vklink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('vklink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-vk" aria-label="<?php esc_attr_e('VK Button','gridhot'); ?>"><i class="fab fa-vk" aria-hidden="true" title="<?php esc_attr_e('VK','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('codepenlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('codepenlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-codepen" aria-label="<?php esc_attr_e('Codepen Button','gridhot'); ?>"><i class="fab fa-codepen" aria-hidden="true" title="<?php esc_attr_e('Codepen','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('jsfiddlelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('jsfiddlelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-jsfiddle" aria-label="<?php esc_attr_e('JSFiddle Button','gridhot'); ?>"><i class="fab fa-jsfiddle" aria-hidden="true" title="<?php esc_attr_e('JSFiddle','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('stackoverflowlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('stackoverflowlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-stackoverflow" aria-label="<?php esc_attr_e('Stack Overflow Button','gridhot'); ?>"><i class="fab fa-stack-overflow" aria-hidden="true" title="<?php esc_attr_e('Stack Overflow','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('stackexchangelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('stackexchangelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-stackexchange" aria-label="<?php esc_attr_e('Stack Exchange Button','gridhot'); ?>"><i class="fab fa-stack-exchange" aria-hidden="true" title="<?php esc_attr_e('Stack Exchange','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('bsalink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('bsalink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-buysellads" aria-label="<?php esc_attr_e('BuySellAds Button','gridhot'); ?>"><i class="fab fa-buysellads" aria-hidden="true" title="<?php esc_attr_e('BuySellAds','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('web500pxlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('web500pxlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-web500px" aria-label="<?php esc_attr_e('500px Button','gridhot'); ?>"><i class="fab fa-500px" aria-hidden="true" title="<?php esc_attr_e('500px','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('ellolink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('ellolink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-ello" aria-label="<?php esc_attr_e('Ello Button','gridhot'); ?>"><i class="fab fa-ello" aria-hidden="true" title="<?php esc_attr_e('Ello','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('discordlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('discordlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-discord" aria-label="<?php esc_attr_e('Discord Button','gridhot'); ?>"><i class="fab fa-discord" aria-hidden="true" title="<?php esc_attr_e('Discord','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('goodreadslink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('goodreadslink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-goodreads" aria-label="<?php esc_attr_e('Goodreads Button','gridhot'); ?>"><i class="fab fa-goodreads" aria-hidden="true" title="<?php esc_attr_e('Goodreads','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('odnoklassnikilink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('odnoklassnikilink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-odnoklassniki" aria-label="<?php esc_attr_e('Odnoklassniki Button','gridhot'); ?>"><i class="fab fa-odnoklassniki" aria-hidden="true" title="<?php esc_attr_e('Odnoklassniki','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('houzzlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('houzzlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-houzz" aria-label="<?php esc_attr_e('Houzz Button','gridhot'); ?>"><i class="fab fa-houzz" aria-hidden="true" title="<?php esc_attr_e('Houzz','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('pocketlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('pocketlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-pocket" aria-label="<?php esc_attr_e('Pocket Button','gridhot'); ?>"><i class="fab fa-get-pocket" aria-hidden="true" title="<?php esc_attr_e('Pocket','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('xinglink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('xinglink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-xing" aria-label="<?php esc_attr_e('XING Button','gridhot'); ?>"><i class="fab fa-xing" aria-hidden="true" title="<?php esc_attr_e('XING','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('googleplaylink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('googleplaylink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-googleplay" aria-label="<?php esc_attr_e('Google Play Button','gridhot'); ?>"><i class="fab fa-google-play" aria-hidden="true" title="<?php esc_attr_e('Google Play','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('slidesharelink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('slidesharelink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-slideshare" aria-label="<?php esc_attr_e('SlideShare Button','gridhot'); ?>"><i class="fab fa-slideshare" aria-hidden="true" title="<?php esc_attr_e('SlideShare','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('dropboxlink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('dropboxlink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-dropbox" aria-label="<?php esc_attr_e('Dropbox Button','gridhot'); ?>"><i class="fab fa-dropbox" aria-hidden="true" title="<?php esc_attr_e('Dropbox','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('paypallink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('paypallink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-paypal" aria-label="<?php esc_attr_e('PayPal Button','gridhot'); ?>"><i class="fab fa-paypal" aria-hidden="true" title="<?php esc_attr_e('PayPal','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('viadeolink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('viadeolink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-viadeo" aria-label="<?php esc_attr_e('Viadeo Button','gridhot'); ?>"><i class="fab fa-viadeo" aria-hidden="true" title="<?php esc_attr_e('Viadeo','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('wikipedialink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('wikipedialink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-wikipedia" aria-label="<?php esc_attr_e('Wikipedia Button','gridhot'); ?>"><i class="fab fa-wikipedia-w" aria-hidden="true" title="<?php esc_attr_e('Wikipedia','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('skypeusername') ) : ?>
            <a href="skype:<?php echo esc_html( gridhot_get_option('skypeusername') ); ?>?chat" class="gridhot-header-social-icon-skype" aria-label="<?php esc_attr_e('Skype Button','gridhot'); ?>"><i class="fab fa-skype" aria-hidden="true" title="<?php esc_attr_e('Skype','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('emailaddress') ) : ?>
            <a href="mailto:<?php echo esc_html( gridhot_get_option('emailaddress') ); ?>" class="gridhot-header-social-icon-email" aria-label="<?php esc_attr_e('Email Us Button','gridhot'); ?>"><i class="far fa-envelope" aria-hidden="true" title="<?php esc_attr_e('Email Us','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('rsslink') ) : ?>
            <a href="<?php echo esc_url( gridhot_get_option('rsslink') ); ?>" target="_blank" rel="nofollow" class="gridhot-header-social-icon-rss" aria-label="<?php esc_attr_e('RSS Button','gridhot'); ?>"><i class="fas fa-rss" aria-hidden="true" title="<?php esc_attr_e('RSS','gridhot'); ?>"></i></a><?php endif; ?>
    <?php if ( gridhot_get_option('show_login_button') ) { ?><?php if (is_user_logged_in()) : ?><a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" aria-label="<?php esc_attr_e( 'Logout Button', 'gridhot' ); ?>" class="gridhot-header-social-icon-login"><i class="fas fa-sign-out-alt" aria-hidden="true" title="<?php esc_attr_e('Logout','gridhot'); ?>"></i></a><?php else : ?><a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" aria-label="<?php esc_attr_e( 'Login / Register Button', 'gridhot' ); ?>" class="gridhot-header-social-icon-login"><i class="fas fa-sign-in-alt" aria-hidden="true" title="<?php esc_attr_e('Login / Register','gridhot'); ?>"></i></a><?php endif;?><?php } ?>
    <?php if ( !(gridhot_get_option('hide_search_button')) ) { ?><a href="<?php echo esc_url( '#' ); ?>" class="gridhot-header-social-icon-search" aria-label="<?php esc_attr_e('Search Button','gridhot'); ?>"><i class="fas fa-search" aria-hidden="true" title="<?php esc_attr_e('Search','gridhot'); ?>"></i></a><?php } ?>
</div>

<?php }