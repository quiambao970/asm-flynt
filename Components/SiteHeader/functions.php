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

add_action('wp_footer', function() {
    ?>
    <script>
    (function() {
        // Media query for mobile devices
        var mobileQuery = window.matchMedia("(max-width: 959px)");

        function handleMobileChange(e) {
            if (e.matches) {
                // Only load the script if we're on mobile and it hasn't been loaded yet
                if (!document.getElementById("mobile-menu-script")) {
                    // Pass phone numbers data to the script
                    window.mobileMenuData = {
                        phoneNumbers: <?= json_encode(Timber::get_context()['siteHeader']['phoneNumbers'] ?? []); ?>
                    };

                    var script = document.createElement("script");
                    script.id = "mobile-menu-script";
                    script.src = "<?= Asset::requireUrl('Components/SiteHeader/mobileMenu.js') ?>";
                    script.async = false;
                    document.body.appendChild(script);
                }
            }
        }

        // Check on initial page load
        handleMobileChange(mobileQuery);

        // Re-check when screen size changes
        mobileQuery.addEventListener('change', handleMobileChange);
    })();
    </script>
    <?php
}, 20);

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

    $data['phoneNumbers'] = [
        [
            'label' => 'Main Office',
            'number' => '(832)834-0661',
            'url' => 'tel:8328340661'
        ],
        [
            'label' => 'Sales',
            'number' => '(713)737-5529',
            'url' => 'tel:7137375529'
        ]
    ];

    $data['bbb'] = [
        'src' => Asset::requireUrl('assets/images/bbb.webp'),
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
