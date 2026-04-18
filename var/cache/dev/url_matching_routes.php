<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/forgot-password' => [[['_route' => 'app_forgot_password', '_controller' => 'App\\Controller\\AuthController::forgotPassword'], null, null, null, false, false, null]],
        '/connect/google' => [[['_route' => 'connect_google_start', 'service' => 'google', '_controller' => 'hwi_oauth.controller.connect::connectAction'], null, null, null, false, false, null]],
        '/connect/google/check' => [[['_route' => 'connect_google_check', 'service' => 'google', '_controller' => 'hwi_oauth.controller.connect::checkAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/users/list' => [[['_route' => 'app_admin_users_list', '_controller' => 'App\\Controller\\AdminController::getUsersList'], null, ['GET' => 0], null, false, false, null]],
        '/admin/history/list' => [[['_route' => 'app_admin_history_list', '_controller' => 'App\\Controller\\AdminController::getHistoryList'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\AuthController::home'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\AuthController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\AuthController::logout'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\AuthController::register'], null, null, null, false, false, null]],
        '/reset-password' => [[['_route' => 'app_reset_password', '_controller' => 'App\\Controller\\AuthController::resetPassword'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\AuthController::dashboard'], null, null, null, false, false, null]],
        '/patient/dashboard' => [[['_route' => 'app_patient_dashboard', '_controller' => 'App\\Controller\\AuthController::patientDashboard'], null, null, null, false, false, null]],
        '/psychologue/dashboard' => [[['_route' => 'app_psychologue_dashboard', '_controller' => 'App\\Controller\\AuthController::psychologueDashboard'], null, null, null, false, false, null]],
        '/psychologue/statistiques' => [[['_route' => 'app_psychologue_statistiques', '_controller' => 'App\\Controller\\AuthController::psychologueStatistiques'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\AuthController::adminDashboard'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\AuthController::profile'], null, null, null, false, false, null]],
        '/dashboard/reclamation' => [[['_route' => 'app_reclamation', '_controller' => 'App\\Controller\\AuthController::indexAll'], null, null, null, false, false, null]],
        '/admin/history' => [[['_route' => 'app_history_index', '_controller' => 'App\\Controller\\HistoryController::index'], null, null, null, true, false, null]],
        '/admin/history/clear' => [[['_route' => 'app_history_clear', '_controller' => 'App\\Controller\\HistoryController::clear'], null, ['POST' => 0], null, false, false, null]],
        '/notejour' => [[['_route' => 'app_notejour_index', '_controller' => 'App\\Controller\\NotejourController::index'], null, ['GET' => 0], null, false, false, null]],
        '/notejour/new' => [[['_route' => 'app_notejour_new', '_controller' => 'App\\Controller\\NotejourController::new'], null, ['POST' => 0], null, false, false, null]],
        '/objectif' => [[['_route' => 'app_objectif_index', '_controller' => 'App\\Controller\\ObjectifController::index'], null, ['GET' => 0], null, false, false, null]],
        '/objectif/status-actifs' => [[['_route' => 'app_objectif_status_actifs', '_controller' => 'App\\Controller\\ObjectifController::statusActifs'], null, ['GET' => 0], null, false, false, null]],
        '/objectif/new-modal' => [[['_route' => 'app_objectif_new_modal', '_controller' => 'App\\Controller\\ObjectifController::newModal'], null, ['GET' => 0], null, false, false, null]],
        '/objectif/new' => [[['_route' => 'app_objectif_new', '_controller' => 'App\\Controller\\ObjectifController::new'], null, ['POST' => 0], null, false, false, null]],
        '/reclamation' => [[['_route' => 'app_reclamation_index', '_controller' => 'App\\Controller\\ReclamationController::index'], null, ['GET' => 0], null, false, false, null]],
        '/reclamation/admin/all' => [[['_route' => 'app_reclamation_admin_all', '_controller' => 'App\\Controller\\ReclamationController::indexAll'], null, ['GET' => 0], null, false, false, null]],
        '/reclamation/new-modal' => [[['_route' => 'app_reclamation_new_modal', '_controller' => 'App\\Controller\\ReclamationController::newModal'], null, ['GET' => 0], null, false, false, null]],
        '/reclamation/new' => [[['_route' => 'app_reclamation_new', '_controller' => 'App\\Controller\\ReclamationController::new'], null, ['POST' => 0], null, false, false, null]],
        '/reclamation/admin/search-ajax' => [[['_route' => 'app_reclamation_search_ajax', '_controller' => 'App\\Controller\\ReclamationController::searchAjax'], null, ['GET' => 0], null, false, false, null]],
        '/reponse' => [[['_route' => 'app_reponse_index', '_controller' => 'App\\Controller\\ReponseController::index'], null, ['GET' => 0], null, false, false, null]],
        '/reponse/new' => [[['_route' => 'app_reponse_new', '_controller' => 'App\\Controller\\ReponseController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|dmin/user/([^/]++)(?'
                        .'|/(?'
                            .'|edit(?'
                                .'|(*:239)'
                            .')'
                            .'|delete(*:254)'
                        .')'
                        .'|(*:263)'
                    .')'
                    .'|pi/objectifs/([^/]++)/(?'
                        .'|notes(*:302)'
                        .'|evaluate(*:318)'
                    .')'
                .')'
                .'|/notejour/(?'
                    .'|objectif/([^/]++)(*:358)'
                    .'|new\\-modal/([^/]++)(*:385)'
                    .'|([^/]++)(?'
                        .'|/edit(*:409)'
                        .'|(*:417)'
                    .')'
                    .'|psy(*:429)'
                .')'
                .'|/objectif/([^/]++)(?'
                    .'|(*:459)'
                    .'|/edit(*:472)'
                    .'|(*:480)'
                .')'
                .'|/re(?'
                    .'|clamation/([^/]++)(?'
                        .'|(*:516)'
                        .'|/(?'
                            .'|edit(*:532)'
                            .'|repondre(?'
                                .'|\\-modal(*:558)'
                                .'|(*:566)'
                            .')'
                        .')'
                        .'|(*:576)'
                    .')'
                    .'|ponse/([^/]++)(?'
                        .'|(*:602)'
                        .'|/edit(*:615)'
                        .'|(*:623)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        239 => [
            [['_route' => 'app_admin_user_edit', '_controller' => 'App\\Controller\\AdminController::editUser'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null],
            [['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null],
        ],
        254 => [[['_route' => 'app_admin_user_delete', '_controller' => 'App\\Controller\\AdminController::deleteUser'], ['id'], ['POST' => 0], null, false, false, null]],
        263 => [
            [['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null],
        ],
        302 => [[['_route' => 'api_objectif_notes', '_controller' => 'App\\Controller\\Api\\ObjectifApiController::notes'], ['id'], ['GET' => 0], null, false, false, null]],
        318 => [[['_route' => 'api_objectif_evaluate', '_controller' => 'App\\Controller\\Api\\ObjectifApiController::evaluate'], ['id'], ['GET' => 0], null, false, false, null]],
        358 => [[['_route' => 'app_notejour_by_objectif', '_controller' => 'App\\Controller\\NotejourController::indexByObjectif'], ['objectif_id'], ['GET' => 0], null, false, true, null]],
        385 => [[['_route' => 'app_notejour_new_modal', '_controller' => 'App\\Controller\\NotejourController::newModal'], ['objectif_id'], ['GET' => 0], null, false, true, null]],
        409 => [[['_route' => 'app_notejour_edit', '_controller' => 'App\\Controller\\NotejourController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        417 => [[['_route' => 'app_notejour_delete', '_controller' => 'App\\Controller\\NotejourController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        429 => [[['_route' => 'app_note_psy', '_controller' => 'App\\Controller\\NotejourController::index_psy'], [], ['GET' => 0], null, false, false, null]],
        459 => [[['_route' => 'app_objectif_show', '_controller' => 'App\\Controller\\ObjectifController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        472 => [[['_route' => 'app_objectif_edit', '_controller' => 'App\\Controller\\ObjectifController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        480 => [[['_route' => 'app_objectif_delete', '_controller' => 'App\\Controller\\ObjectifController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        516 => [[['_route' => 'app_reclamation_show', '_controller' => 'App\\Controller\\ReclamationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        532 => [[['_route' => 'app_reclamation_edit', '_controller' => 'App\\Controller\\ReclamationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        558 => [[['_route' => 'app_reclamation_repondre_modal', '_controller' => 'App\\Controller\\ReclamationController::repondreModal'], ['id'], ['GET' => 0], null, false, false, null]],
        566 => [[['_route' => 'app_reclamation_repondre', '_controller' => 'App\\Controller\\ReclamationController::repondre'], ['id'], ['POST' => 0], null, false, false, null]],
        576 => [[['_route' => 'app_reclamation_delete', '_controller' => 'App\\Controller\\ReclamationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        602 => [[['_route' => 'app_reponse_show', '_controller' => 'App\\Controller\\ReponseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        615 => [[['_route' => 'app_reponse_edit', '_controller' => 'App\\Controller\\ReponseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        623 => [
            [['_route' => 'app_reponse_delete', '_controller' => 'App\\Controller\\ReponseController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
