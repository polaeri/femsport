<?php

class Session {

    function __construct() {
        if ($this->is_session_started() === FALSE) {
            session_start();
        }
    }

    function getSession($index) {
        return $_SESSION[$index];
    }

    function setSession($index, $value) {
        $_SESSION[$index] = $value;
    }

    function destroy() {
        session_destroy();
        unset($_SESSION);
    }

    private function is_session_started() {
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }

}
