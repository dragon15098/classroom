<?php

if ($config = parse_ini_file("config.ini")) {
    define('FB_APP_ID', $config["fb_app_id"]);
    define('FB_APP_SECRET', $config["fb_app_secret"]);
    define('FB_REDIRECT_URI', $config["fb_redirect_uri"]);
    define('FB_GRAPH_VERSION', $config["fb_graph_verison"]);
    define('FB_GRAPH_DOMAIN', $config["fb_graph_domain"]);
    define('FB_APP_STATE', $config["fb_app_state"]);
}
?>
