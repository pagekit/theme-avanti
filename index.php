<?php

return [

    'name' => 'theme-avanti',

    /**
     * Menu positions
     */
    'menus' => [

        'main' => 'Main',
        'offcanvas' => 'Offcanvas',
        'footer' => 'Footer'

    ],

    /**
     * Widget positions
     */
    'positions' => [

        'navbar' => 'Navbar',
        'header_social' => 'Header Social',
        'header_info' => 'Header Info',
        'hero' => 'Hero',
        'top' => 'Top A',
        'top_b' => 'Top B',
        'top_c' => 'Top C',
        'top_d' => 'Top D',
        'sidebar' => 'Sidebar',
        'bottom' => 'Bottom A',
        'bottom_b' => 'Bottom B',
        'bottom_c' => 'Bottom C',
        'bottom_d' => 'Bottom D',
        'footer_left' => 'Footer Left',
        'footer_right' => 'Footer Right',
        'offcanvas' => 'Offcanvas'

    ],

    /**
     * Node defaults
     */
    'node' => [

        'title_hide' => false,
        'title_large' => false,
        'alignment' => '',
        'html_class' => '',
        'sidebar_first' => false,
        'hero_image' => '',
        'hero_style' => 'uk-block-default',
        'hero_blend' => '',
        'hero_width' => false,
        'hero_viewport' => '',
        'hero_contrast' => '',
        'hero_parallax' => '',
        'header_layout' => 'default',
        'header_sticky' => 'animated',
        'footer_layout' => 'default',
        'footer_fixed' => false,
        'totop_scroller' => true,
        'top_style' => 'uk-block-muted',
        'top_b_style' => 'uk-block-default',
        'top_c_style' => 'uk-block-muted',
        'top_d_style' => 'uk-block-default',
        'main_style' => 'uk-block-default',
        'bottom_style' => 'uk-block-muted',
        'bottom_b_style' => 'uk-block-default',
        'bottom_c_style' => 'uk-block-secondary uk-contrast',
        'bottom_d_style' => 'uk-block-primary uk-contrast',
        'footer_style' => 'uk-block-secondary uk-contrast'

    ],

    /**
     * Widget defaults
     */
    'widget' => [

        'title_hide' => false,
        'title_size' => 'uk-panel-title',
        'alignment' => '',
        'html_class' => '',
        'panel' => ''

    ],

    /**
     * Settings url
     */
    'settings' => '@site/settings#site-theme',

    /**
     * Configuration defaults
     */
    'config' => [

        'style' => '',
        'logo_offcanvas' => ''

    ],

    /**
     * Events
     */
    'events' => [

        'view.system/site/admin/settings' => function ($event, $view) use ($app) {
            $view->script('site-theme', 'theme:app/bundle/site-theme.js', 'site-settings');
            $view->data('$theme', $this);
        },

        'view.system/site/admin/edit' => function ($event, $view) {
            $view->script('node-theme', 'theme:app/bundle/node-theme.js', 'site-edit');
        },

        'view.system/widget/edit' => function ($event, $view) {
            $view->script('widget-theme', 'theme:app/bundle/widget-theme.js', 'widget-edit');
        },

        /**
         * Custom markup calculations based on theme settings
         */
        'view.layout' => function ($event, $view) use ($app) {

            if ($app->isAdmin()) {
                return;
            }

            $params = $view->params;

            $classes = [
                'hero' => '',
                'parallax' => ''
            ];

            // Sticky from warp
            $sticky = [];
            if ($params['header_sticky'] == 'sticky') {
                $sticky['media'] = 767;
            }

            if ($params['header_sticky'] == 'animated') {
                $classes['header'] = 'tm-navbar-wrapper-animate';
                $sticky['media'] = 767;
                $sticky['top'] = -250;
                $sticky['clsinactive'] = 'tm-navbar-wrapper';
            }

            if (count($sticky)) {
                $classes['sticky'] = 'data-uk-sticky=\''.json_encode($sticky).'\'';
            }

            if ($params['hero_viewport']) {
                $classes['hero'] = 'tm-hero-height';
            }

            if ($params['hero_parallax'] && $view->position()->exists('hero') && $params['hero_image']) {
                $classes['parallax'] = 'data-uk-parallax="{bg: \'-400\'}"';
            }

            if ($params['hero_contrast'] && $params['hero_image']) {
                $classes['hero'] .= ' uk-contrast';
            }

            if ($params['hero_style']) {
                $classes['hero'] .= ' '.$params['hero_style'];
            }

            if ($params['hero_blend'] && $params['hero_image']) {
                $classes['hero'] .= ' tm-background-blend-'.$params['hero_blend'];
            }

            // body classes
            if ($params['header_layout'] == 'centered') {
                $classes['body'][] = 'tm-navbar-centered-true';
            }

            if ($params['header_sticky']) {
                $classes['body'][] = 'tm-navbar-sticky';
            }

            if ($params['footer_fixed']) {
                $classes['body'][] = 'tm-footer-fixed';
            }

            if (!$view->position()->exists('hero')) {
                $classes['body'][] = 'tm-header-offset';
            }

            if (key_exists('body', $classes)) {
                $classes['body'] = sprintf('class="%s"', trim(implode(' ', $classes['body'])));
            }

            $params['classes'] = $classes;
        },

        'view.system/site/widget-menu' => function ($event, $view) {

            if ($event['widget']->position == 'navbar') {
                $event->setTemplate('menu-navbar.php');
            }

        }

    ]

];
