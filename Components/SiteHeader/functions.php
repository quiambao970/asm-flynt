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

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'site-header-script',
        get_template_directory_uri() . '/Components/SiteHeader/script.js',
        [],
        null,
        true
    );
});

add_filter('Flynt/addComponentData?name=SiteHeader', function (array $data): array {
    $data['menu'] = Timber::get_menu('navigation_main') ?? Timber::get_pages_menu();
    $data['pre_header_menu'] = Timber::get_menu('pre_header_menu') ?? Timber::get_pages_menu();
    $data['facebook_url'] = Options::getGlobal('Website Settings', 'facebook_url');
    $data['pinterest_url'] = Options::getGlobal('Website Settings', 'pinterest_url');
    $data['instagram_url'] = Options::getGlobal('Website Settings', 'instagram_url');
    $data['youtube_url'] = Options::getGlobal('Website Settings', 'youtube_url');
    $data['logo'] = [
        'src' => Asset::requireUrl('assets/images/asm-logo.webp'),
        'alt' => get_bloginfo('name')
    ];
    $data['bbb'] = [
        'src' => Asset::requireUrl('assets/images/footer/bbb.svg'),
        'alt' => 'Better Business bureau'
    ];
    $data['down_arrow'] = [
        'src' => Asset::requireUrl('assets/images/header/down-arrow.svg'),
        'alt' => 'down-arrow'
    ];
    $data['facebook'] = [
        'src' => Asset::requireUrl('assets/images/header/facebook.svg'),
        'alt' => 'facebook'
    ];
    $data['instagram'] = [
        'src' => Asset::requireUrl('assets/images/header/instagram.svg'),
        'alt' => 'instagram'
    ];
    $data['phone'] = [
        'src' => Asset::requireUrl('assets/images/header/phone.svg'),
        'alt' => 'phone'
    ];
    $data['pinterest'] = [
        'src' => Asset::requireUrl('assets/images/header/pinterest.svg'),
        'alt' => 'pinterest'
    ];
    $data['right_arrow'] = [
        'src' => Asset::requireUrl('assets/images/header/right-arrow.svg'),
        'alt' => 'right-arrow'
    ];
    $data['youtube'] = [
        'src' => Asset::requireUrl('assets/images/header/youtube.svg'),
        'alt' => 'youtube'
    ];
    return $data;
});
