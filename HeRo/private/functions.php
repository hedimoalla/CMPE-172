<?php
    function url_for($script_path) {
        // add the leading '/' if its not present
        if ($script_path[0] != '/') {
            $script_path = '/' . $script_path;
        }
        return WWW_ROOT . $script_path;
    }
    // Shortcut fucntion for urlencode()
    function u($string="") {
        return urlencode($string);
    }
    // Shortcut function for rawurlencode()
    function raw_u($string="") {
        return rawurlencode($string);
    }
    // Shortcut function for htmlspecialcharacters()
    function h($string="") {
        return htmlspecialchars($string);
    }

    function error_404() {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        exit();
    }

    function error_500() {
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
        exit();
    }
    // Function for redirecting correct pages
    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }
?>