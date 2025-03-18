<?php

namespace Flynt\Components\SiteFooter;

use Flynt\Utils\Asset;
use Timber\Timber;

add_action('init', function (): void {
    register_nav_menus([
        'navigation_footer' => __('Navigation Footer', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=SiteFooter', function (array $data): array {
    $data['menu'] = Timber::get_menu('navigation_footer') ?? Timber::get_pages_menu();

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

    return $data;
});
