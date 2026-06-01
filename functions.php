<?php
/**
 * ProfilBoost — functions.php
 * Enqueue styles/scripts, register menus, walkers, ACF field groups.
 * Requiert le plugin ACF (Advanced Custom Fields).
 */

/* ─── THEME SUPPORTS ────────────────────────────────────── */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 72,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('menus');

    register_nav_menus([
        'primary' => 'Menu principal',
        'footer'  => 'Menu pied de page',
    ]);
});

/* ─── ENQUEUE ────────────────────────────────────────────── */
add_action('wp_enqueue_scripts', function () {
    $ver = '1.0.0';
    $uri = get_template_directory_uri();

    wp_enqueue_style('google-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap', [], null);
    wp_enqueue_style('profilboost-main', $uri . '/assets/css/main.css', ['google-poppins'], $ver);
    wp_enqueue_script('profilboost-main', $uri . '/assets/js/main.js', [], $ver, true);
});

/* ─── NAV WALKER (desktop) ──────────────────────────────── */
class ProfilBoost_Walker_Nav extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes   = empty($item->classes) ? [] : (array) $item->classes;
        $is_active = in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes);
        $output   .= '<li>';
        $output   .= '<a href="' . esc_url($item->url) . '"' . ($is_active ? ' class="active"' : '') . '>';
        $output   .= esc_html($item->title);
        $output   .= '</a>';
    }
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}

/* ─── NAV WALKER (mobile) ───────────────────────────────── */
class ProfilBoost_Walker_Mobile extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" onclick="closeMenu()">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
    public function end_el(&$output, $item, $depth = 0, $args = null) {}
}

/* ─── FALLBACK MENUS ────────────────────────────────────── */
function profilboost_fallback_menu() {
    $pages = [
        home_url('/') => 'Accueil',
        home_url('/formules') => 'Formules',
        home_url('/about') => 'Qui sommes-nous',
        home_url('/ressources') => 'Ressources',
    ];
    foreach ($pages as $url => $label) {
        $active = (rtrim($_SERVER['REQUEST_URI'], '/') === parse_url($url, PHP_URL_PATH)) ? ' class="active"' : '';
        echo '<li><a href="' . esc_url($url) . '"' . $active . '>' . esc_html($label) . '</a></li>';
    }
}
function profilboost_fallback_mobile_menu() {
    $pages = [
        home_url('/') => 'Accueil',
        home_url('/formules') => 'Formules',
        home_url('/about') => 'Qui sommes-nous',
        home_url('/ressources') => 'Ressources',
    ];
    foreach ($pages as $url => $label) {
        echo '<a href="' . esc_url($url) . '" onclick="closeMenu()">' . esc_html($label) . '</a>';
    }
}

/* ─── ACF OPTIONS PAGE ──────────────────────────────────── */
add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Réglages du site',
            'menu_title' => 'Réglages ProfilBoost',
            'menu_slug'  => 'profilboost-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ]);
    }
});

/* ─── ACF FIELD GROUPS ──────────────────────────────────── */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    /* ══════════════════════════════════════════════════════
       OPTIONS GLOBALES (Réglages ProfilBoost)
       ══════════════════════════════════════════════════════ */
    acf_add_local_field_group([
        'key'      => 'group_options',
        'title'    => 'Réglages globaux',
        'fields'   => [
            ['key' => 'field_footer_desc',       'label' => 'Description footer',       'name' => 'footer_desc',       'type' => 'textarea', 'rows' => 3],
            ['key' => 'field_footer_copyright',  'label' => 'Texte copyright',          'name' => 'footer_copyright',  'type' => 'text'],
            ['key' => 'field_social_linkedin',   'label' => 'URL LinkedIn',             'name' => 'social_linkedin',   'type' => 'url'],
            ['key' => 'field_social_instagram',  'label' => 'URL Instagram',            'name' => 'social_instagram',  'type' => 'url'],
            ['key' => 'field_social_youtube',    'label' => 'URL YouTube',              'name' => 'social_youtube',    'type' => 'url'],
            ['key' => 'field_contact_email',     'label' => 'Email de contact',         'name' => 'contact_email',     'type' => 'email'],
            ['key' => 'field_contact_phone',     'label' => 'Téléphone',                'name' => 'contact_phone',     'type' => 'text'],
            ['key' => 'field_contact_address',   'label' => 'Adresse / Localisation',   'name' => 'contact_address',   'type' => 'textarea', 'rows' => 2],
            ['key' => 'field_contact_hours',     'label' => 'Horaires',                 'name' => 'contact_hours',     'type' => 'text'],
        ],
        'location' => [
            [['param' => 'options_page', 'operator' => '==', 'value' => 'profilboost-settings']],
        ],
    ]);

    /* ══════════════════════════════════════════════════════
       PAGE D'ACCUEIL (front-page)
       ══════════════════════════════════════════════════════ */
    acf_add_local_field_group([
        'key'   => 'group_homepage',
        'title' => 'Accueil — Contenu',
        'fields' => [

            /* Hero */
            ['key' => 'field_hp_tab_hero', 'label' => '── Héro ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_hp_hero_label',    'label' => 'Étiquette (petit texte)',  'name' => 'hero_label',    'type' => 'text', 'default_value' => 'Experts en optimisation professionnelle'],
            ['key' => 'field_hp_hero_title',    'label' => 'Titre principal',          'name' => 'hero_title',    'type' => 'text', 'default_value' => 'Nous concevons les CV qui captivent les recruteurs'],
            ['key' => 'field_hp_hero_subtitle', 'label' => 'Sous-titre',              'name' => 'hero_subtitle', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Des CV percutants, créés par des experts, qui valorisent votre parcours, passent les filtres ATS et vous ouvrent les portes des entretiens.'],
            ['key' => 'field_hp_hero_cta',      'label' => 'Texte du bouton CTA',     'name' => 'hero_cta_text', 'type' => 'text', 'default_value' => 'Booster mon profil'],
            ['key' => 'field_hp_hero_stat1',    'label' => 'Statistique — Clients',   'name' => 'hero_stat_clients', 'type' => 'text', 'default_value' => '+500 clients accompagnés'],
            ['key' => 'field_hp_hero_stat2',    'label' => 'Statistique — Note',      'name' => 'hero_stat_rating',  'type' => 'text', 'default_value' => '4,9/5 basé sur 200+ avis'],
            ['key' => 'field_hp_cv1',           'label' => 'Image CV 1 (gauche)',     'name' => 'hero_cv_1',     'type' => 'image', 'return_format' => 'url', 'preview_size' => 'thumbnail'],
            ['key' => 'field_hp_cv2',           'label' => 'Image CV 2 (centre)',     'name' => 'hero_cv_2',     'type' => 'image', 'return_format' => 'url', 'preview_size' => 'thumbnail'],
            ['key' => 'field_hp_cv3',           'label' => 'Image CV 3 (droite)',     'name' => 'hero_cv_3',     'type' => 'image', 'return_format' => 'url', 'preview_size' => 'thumbnail'],

            /* Features bar */
            ['key' => 'field_hp_tab_features', 'label' => '── Barre de fonctionnalités ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_hp_features', 'label' => 'Fonctionnalités (3 éléments)', 'name' => 'features_bar', 'type' => 'repeater',
                'min' => 3, 'max' => 3, 'button_label' => 'Ajouter',
                'sub_fields' => [
                    ['key' => 'field_hp_feat_title', 'label' => 'Titre', 'name' => 'title', 'type' => 'text'],
                    ['key' => 'field_hp_feat_desc',  'label' => 'Description', 'name' => 'desc', 'type' => 'text'],
                ],
            ],

            /* Services */
            ['key' => 'field_hp_tab_services', 'label' => '── Services ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_hp_svc_img_cv',       'label' => 'Image service CV & LM',    'name' => 'service_img_cv',       'type' => 'image', 'return_format' => 'url'],
            ['key' => 'field_hp_svc_img_li',       'label' => 'Image service LinkedIn',   'name' => 'service_img_li',       'type' => 'image', 'return_format' => 'url'],
            ['key' => 'field_hp_svc_img_coaching', 'label' => 'Image service Coaching',   'name' => 'service_img_coaching', 'type' => 'image', 'return_format' => 'url'],

            /* How it works */
            ['key' => 'field_hp_tab_hiw', 'label' => '── Comment ça marche ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_hp_hiw_steps', 'label' => 'Étapes (4 max)', 'name' => 'hiw_steps', 'type' => 'repeater',
                'min' => 4, 'max' => 4, 'button_label' => 'Ajouter',
                'sub_fields' => [
                    ['key' => 'field_hp_hiw_title', 'label' => 'Titre', 'name' => 'title', 'type' => 'text'],
                    ['key' => 'field_hp_hiw_desc',  'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
                ],
            ],

            /* Les plus */
            ['key' => 'field_hp_tab_plus', 'label' => '── Les plus ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_hp_plus_img',   'label' => 'Image de fond',  'name' => 'plus_bg_image', 'type' => 'image', 'return_format' => 'url'],
            ['key' => 'field_hp_plus_items', 'label' => 'Avantages (3)', 'name' => 'plus_items', 'type' => 'repeater',
                'min' => 3, 'max' => 3,
                'sub_fields' => [
                    ['key' => 'field_hp_plus_title', 'label' => 'Titre',       'name' => 'title', 'type' => 'text'],
                    ['key' => 'field_hp_plus_desc',  'label' => 'Description', 'name' => 'desc',  'type' => 'text'],
                ],
            ],

            /* Témoignages */
            ['key' => 'field_hp_tab_testi', 'label' => '── Témoignages ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_hp_testimonials', 'label' => 'Témoignages', 'name' => 'testimonials', 'type' => 'repeater',
                'button_label' => 'Ajouter un témoignage',
                'sub_fields' => [
                    ['key' => 'field_hp_testi_name',     'label' => 'Nom',       'name' => 'name',     'type' => 'text'],
                    ['key' => 'field_hp_testi_job',      'label' => 'Poste',     'name' => 'job',      'type' => 'text'],
                    ['key' => 'field_hp_testi_initials', 'label' => 'Initiales', 'name' => 'initials', 'type' => 'text'],
                    ['key' => 'field_hp_testi_quote',    'label' => 'Citation',  'name' => 'quote',    'type' => 'textarea', 'rows' => 3],
                ],
            ],

            /* CTA */
            ['key' => 'field_hp_tab_cta', 'label' => '── Bannière CTA ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_hp_cta_title', 'label' => 'Titre CTA',       'name' => 'cta_title', 'type' => 'text', 'default_value' => 'Prêt à booster votre carrière ?'],
            ['key' => 'field_hp_cta_text',  'label' => 'Texte CTA',       'name' => 'cta_text',  'type' => 'textarea', 'rows' => 2],
            ['key' => 'field_hp_cta_btn',   'label' => 'Texte du bouton', 'name' => 'cta_btn',   'type' => 'text', 'default_value' => 'Nous contacter'],
        ],
        'location' => [
            [['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
        ],
    ]);

    /* ══════════════════════════════════════════════════════
       PAGE À PROPOS (slug: about)
       ══════════════════════════════════════════════════════ */
    acf_add_local_field_group([
        'key'   => 'group_about',
        'title' => 'À propos — Contenu',
        'fields' => [
            ['key' => 'field_ab_hero_label',    'label' => 'Hero — Étiquette',   'name' => 'hero_label',    'type' => 'text', 'default_value' => 'Notre équipe'],
            ['key' => 'field_ab_hero_title',    'label' => 'Hero — Titre',       'name' => 'hero_title',    'type' => 'text', 'default_value' => 'Des experts passionnés à votre service'],
            ['key' => 'field_ab_hero_subtitle', 'label' => 'Hero — Sous-titre',  'name' => 'hero_subtitle', 'type' => 'textarea', 'rows' => 3],

            ['key' => 'field_ab_tab_story', 'label' => '── Notre histoire ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_ab_story_title',  'label' => 'Titre histoire',    'name' => 'story_title',  'type' => 'text'],
            ['key' => 'field_ab_story_body',   'label' => 'Corps du texte',    'name' => 'story_body',   'type' => 'wysiwyg', 'toolbar' => 'basic', 'media_upload' => 0],
            ['key' => 'field_ab_story_quote',  'label' => 'Citation',          'name' => 'story_quote',  'type' => 'textarea', 'rows' => 2],
            ['key' => 'field_ab_story_author', 'label' => 'Auteur de la citation', 'name' => 'story_author', 'type' => 'text'],

            ['key' => 'field_ab_tab_stats', 'label' => '── Statistiques ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_ab_stats', 'label' => 'Blocs statistiques (4)', 'name' => 'stats_blocks', 'type' => 'repeater',
                'min' => 4, 'max' => 4,
                'sub_fields' => [
                    ['key' => 'field_ab_stat_num',   'label' => 'Chiffre',  'name' => 'num',   'type' => 'text'],
                    ['key' => 'field_ab_stat_label', 'label' => 'Libellé', 'name' => 'label', 'type' => 'text'],
                ],
            ],

            ['key' => 'field_ab_tab_values', 'label' => '── Valeurs ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_ab_values', 'label' => 'Valeurs (4)', 'name' => 'values', 'type' => 'repeater',
                'min' => 4, 'max' => 4,
                'sub_fields' => [
                    ['key' => 'field_ab_val_title', 'label' => 'Titre',       'name' => 'title', 'type' => 'text'],
                    ['key' => 'field_ab_val_desc',  'label' => 'Description', 'name' => 'desc',  'type' => 'textarea', 'rows' => 3],
                ],
            ],

            ['key' => 'field_ab_tab_team', 'label' => '── Équipe ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_ab_team', 'label' => 'Membres de l\'équipe', 'name' => 'team_members', 'type' => 'repeater',
                'button_label' => 'Ajouter un membre',
                'sub_fields' => [
                    ['key' => 'field_ab_tm_name',  'label' => 'Nom',        'name' => 'name',  'type' => 'text'],
                    ['key' => 'field_ab_tm_role',  'label' => 'Rôle',       'name' => 'role',  'type' => 'text'],
                    ['key' => 'field_ab_tm_bio',   'label' => 'Bio',        'name' => 'bio',   'type' => 'textarea', 'rows' => 3],
                    ['key' => 'field_ab_tm_photo', 'label' => 'Photo',      'name' => 'photo', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'thumbnail'],
                    ['key' => 'field_ab_tm_tags',  'label' => 'Tags (séparés par virgule)', 'name' => 'tags', 'type' => 'text'],
                ],
            ],

            ['key' => 'field_ab_tab_timeline', 'label' => '── Timeline ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_ab_timeline', 'label' => 'Étapes clés', 'name' => 'timeline_items', 'type' => 'repeater',
                'button_label' => 'Ajouter une étape',
                'sub_fields' => [
                    ['key' => 'field_ab_tl_year',  'label' => 'Année', 'name' => 'year',  'type' => 'text'],
                    ['key' => 'field_ab_tl_title', 'label' => 'Titre', 'name' => 'title', 'type' => 'text'],
                    ['key' => 'field_ab_tl_desc',  'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
                ],
            ],
        ],
        'location' => [
            [['param' => 'page_slug', 'operator' => '==', 'value' => 'about']],
        ],
    ]);

    /* ══════════════════════════════════════════════════════
       PAGE CONTACT (slug: contact)
       ══════════════════════════════════════════════════════ */
    acf_add_local_field_group([
        'key'   => 'group_contact',
        'title' => 'Contact — Contenu',
        'fields' => [
            ['key' => 'field_ct_hero_title',    'label' => 'Titre héro',    'name' => 'hero_title',    'type' => 'text', 'default_value' => 'Parlons de votre projet'],
            ['key' => 'field_ct_hero_subtitle', 'label' => 'Sous-titre',   'name' => 'hero_subtitle', 'type' => 'textarea', 'rows' => 2],
            ['key' => 'field_ct_cta_title',     'label' => 'CTA Titre',    'name' => 'cta_title',     'type' => 'text'],
            ['key' => 'field_ct_cta_text',      'label' => 'CTA Texte',    'name' => 'cta_text',      'type' => 'textarea', 'rows' => 2],
        ],
        'location' => [
            [['param' => 'page_slug', 'operator' => '==', 'value' => 'contact']],
        ],
    ]);

    /* ══════════════════════════════════════════════════════
       PAGE FORMULES (slug: formules)
       ══════════════════════════════════════════════════════ */
    acf_add_local_field_group([
        'key'   => 'group_formules',
        'title' => 'Formules — Contenu',
        'fields' => [
            ['key' => 'field_fm_hero_title',    'label' => 'Titre héro',    'name' => 'hero_title',    'type' => 'text', 'default_value' => 'Choisissez votre formule de succès'],
            ['key' => 'field_fm_hero_subtitle', 'label' => 'Sous-titre',   'name' => 'hero_subtitle', 'type' => 'textarea', 'rows' => 2],

            ['key' => 'field_fm_tab_pricing', 'label' => '── Tarifs ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_fm_price_cv',       'label' => 'Prix CV & LM (€)',   'name' => 'price_cv',       'type' => 'number', 'default_value' => 89],
            ['key' => 'field_fm_price_li',       'label' => 'Prix LinkedIn (€)',  'name' => 'price_li',       'type' => 'number', 'default_value' => 69],
            ['key' => 'field_fm_price_coaching', 'label' => 'Prix Coaching (€)',  'name' => 'price_coaching', 'type' => 'number', 'default_value' => 99],

            ['key' => 'field_fm_tab_faq', 'label' => '── FAQ ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_fm_faq', 'label' => 'Questions fréquentes', 'name' => 'faq_items', 'type' => 'repeater',
                'button_label' => 'Ajouter une question',
                'sub_fields' => [
                    ['key' => 'field_fm_faq_q', 'label' => 'Question', 'name' => 'question', 'type' => 'text'],
                    ['key' => 'field_fm_faq_a', 'label' => 'Réponse',  'name' => 'answer',   'type' => 'wysiwyg', 'toolbar' => 'basic', 'media_upload' => 0],
                ],
            ],

            ['key' => 'field_fm_tab_testi', 'label' => '── Témoignages ──', 'name' => '', 'type' => 'tab'],
            ['key' => 'field_fm_testimonials', 'label' => 'Témoignages', 'name' => 'testimonials', 'type' => 'repeater',
                'button_label' => 'Ajouter un témoignage',
                'sub_fields' => [
                    ['key' => 'field_fm_testi_name',     'label' => 'Nom',       'name' => 'name',     'type' => 'text'],
                    ['key' => 'field_fm_testi_role',     'label' => 'Rôle',      'name' => 'role',     'type' => 'text'],
                    ['key' => 'field_fm_testi_initials', 'label' => 'Initiales', 'name' => 'initials', 'type' => 'text'],
                    ['key' => 'field_fm_testi_quote',    'label' => 'Citation',  'name' => 'quote',    'type' => 'textarea', 'rows' => 3],
                ],
            ],
        ],
        'location' => [
            [['param' => 'page_slug', 'operator' => '==', 'value' => 'formules']],
        ],
    ]);

    /* ══════════════════════════════════════════════════════
       PAGES SERVICES (slugs: service-cv-lm, service-linkedin, service-coaching)
       ══════════════════════════════════════════════════════ */
    acf_add_local_field_group([
        'key'   => 'group_service',
        'title' => 'Page Service — Contenu',
        'fields' => [
            ['key' => 'field_sv_hero_label',    'label' => 'Étiquette héro', 'name' => 'hero_label',    'type' => 'text'],
            ['key' => 'field_sv_hero_title',    'label' => 'Titre héro',     'name' => 'hero_title',    'type' => 'text'],
            ['key' => 'field_sv_hero_subtitle', 'label' => 'Sous-titre',     'name' => 'hero_subtitle', 'type' => 'textarea', 'rows' => 2],
            ['key' => 'field_sv_service_img',   'label' => 'Image du service', 'name' => 'service_img', 'type' => 'image', 'return_format' => 'url'],
            ['key' => 'field_sv_price',         'label' => 'Prix (€)',       'name' => 'service_price', 'type' => 'number'],
            ['key' => 'field_sv_desc',          'label' => 'Description',    'name' => 'service_desc',  'type' => 'wysiwyg', 'toolbar' => 'basic', 'media_upload' => 0],
            ['key' => 'field_sv_features', 'label' => 'Points forts', 'name' => 'service_features', 'type' => 'repeater',
                'button_label' => 'Ajouter un point',
                'sub_fields' => [
                    ['key' => 'field_sv_feat_text', 'label' => 'Point fort', 'name' => 'text', 'type' => 'text'],
                ],
            ],
            ['key' => 'field_sv_faq', 'label' => 'FAQ', 'name' => 'service_faq', 'type' => 'repeater',
                'button_label' => 'Ajouter une question',
                'sub_fields' => [
                    ['key' => 'field_sv_faq_q', 'label' => 'Question', 'name' => 'question', 'type' => 'text'],
                    ['key' => 'field_sv_faq_a', 'label' => 'Réponse',  'name' => 'answer',   'type' => 'textarea', 'rows' => 3],
                ],
            ],
        ],
        'location' => [
            [['param' => 'page_slug', 'operator' => '==', 'value' => 'service-cv-lm']],
            [['param' => 'page_slug', 'operator' => '==', 'value' => 'service-linkedin']],
            [['param' => 'page_slug', 'operator' => '==', 'value' => 'service-coaching']],
        ],
    ]);

});

/* ─── HELPER : récupère un field ACF avec valeur par défaut ── */
function pb_field(string $name, $default = '', $post_id = null): string {
    if (!function_exists('get_field')) return $default;
    $val = get_field($name, $post_id);
    return ($val !== null && $val !== false && $val !== '') ? $val : $default;
}

/* ─── HELPER : image ACF avec fallback theme asset ── */
function pb_img(string $field, string $fallback_filename, $post_id = null): string {
    if (function_exists('get_field')) {
        $val = get_field($field, $post_id);
        if ($val) return esc_url(is_array($val) ? $val['url'] : $val);
    }
    return esc_url(get_template_directory_uri() . '/assets/images/' . $fallback_filename);
}
