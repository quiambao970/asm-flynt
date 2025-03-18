<?php

namespace Flynt\Components\SiteFooter;

use Flynt\Utils\Asset;
use Timber\Timber;

add_action('init', function (): void {
    register_nav_menus([
        'navigation_footer_1' => __('Navigation Footer 1', 'flynt'),
        'navigation_footer_2' => __('Navigation Footer 2', 'flynt'),
        'navigation_footer_3' => __('Navigation Footer 3', 'flynt'),
    ]);
});

add_filter('Flynt/addComponentData?name=SiteFooter', function (array $data): array {
    $data['menu_1'] = Timber::get_menu('navigation_footer_1') ?? Timber::get_pages_menu();
    $data['menu_2'] = Timber::get_menu('navigation_footer_2') ?? Timber::get_pages_menu();
    $data['menu_3'] = Timber::get_menu('navigation_footer_3') ?? Timber::get_pages_menu();

    $data['facebook'] = [
        'src' => Asset::requireUrl('assets/images/footer/facebook.svg'),
        'alt' => 'facebook'
    ];

    $data['instagram'] = [
        'src' => Asset::requireUrl('assets/images/footer/instagram.svg'),
        'alt' => 'instagram'
    ];

    $data['linkedin'] = [
        'src' => Asset::requireUrl('assets/images/footer/linkedIn.svg'),
        'alt' => 'linkedin'
    ];

    $data['pinterest'] = [
        'src' => Asset::requireUrl('assets/images/footer/pinterest.svg'),
        'alt' => 'pinterest'
    ];

    $data['twitter'] = [
        'src' => Asset::requireUrl('assets/images/footer/twitter.svg'),
        'alt' => 'twitter'
    ];

    $data['youtube'] = [
        'src' => Asset::requireUrl('assets/images/footer/youtube.svg'),
        'alt' => 'youtube'
    ];

    $data['address'] = [
        'src' => Asset::requireUrl('assets/images/footer/blue-address.svg'),
        'alt' => 'address'
    ];

    $data['mail'] = [
        'src' => Asset::requireUrl('assets/images/footer/blue-mail.svg'),
        'alt' => 'mail'
    ];

    $data['phone'] = [
        'src' => Asset::requireUrl('assets/images/footer/blue-phone.svg'),
        'alt' => 'phone'
    ];

    $data['bbb'] = [
        'src' => Asset::requireUrl('assets/images/footer/bbb.svg'),
        'alt' => 'BBB logo'
    ];

    return $data;
});
