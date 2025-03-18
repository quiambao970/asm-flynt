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
        'src' => Asset::requireUrl('assets/images/footer_social/facebook.svg'),
        'alt' => 'facebook'
    ];

    $data['instagram'] = [
        'src' => Asset::requireUrl('assets/images/footer_social/instagram.svg'),
        'alt' => 'instagram'
    ];

    $data['linkedin'] = [
        'src' => Asset::requireUrl('assets/images/footer_social/linkedIn.svg'),
        'alt' => 'linkedin'
    ];

    $data['pinterest'] = [
        'src' => Asset::requireUrl('assets/images/footer_social/pinterest.svg'),
        'alt' => 'pinterest'
    ];

    $data['twitter'] = [
        'src' => Asset::requireUrl('assets/images/footer_social/twitter.svg'),
        'alt' => 'twitter'
    ];

    $data['youtube'] = [
        'src' => Asset::requireUrl('assets/images/footer_social/youtube.svg'),
        'alt' => 'youtube'
    ];

    return $data;
});
