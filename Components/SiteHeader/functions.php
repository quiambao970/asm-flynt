<?php

namespace Flynt\Components\SiteHeader;

use Flynt\Utils\Asset;
use Timber\Timber;
use Flynt\Utils\Options;

add_action('init', function (): void {
    register_nav_menus([
        'navigation_main' => __('Navigation Main', 'flynt'),
        'pre_header_menu' => __('Pre Header Menu', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=SiteHeader', function (array $data): array {
    $data['menu'] = Timber::get_menu('navigation_main') ?? Timber::get_pages_menu();
    $data['pre_header_menu'] = Timber::get_menu('pre_header_menu') ?? Timber::get_pages_menu();
    $data['facebook_url'] = Options::getGlobal('Website Settings', 'facebook_url');
    $data['pinterest_url'] = Options::getGlobal('Website Settings', 'pinterest_url');
    $data['instagram_url'] = Options::getGlobal('Website Settings', 'instagram_url');
    $data['youtube_url'] = Options::getGlobal('Website Settings', 'youtube_url');

    return $data;
});
