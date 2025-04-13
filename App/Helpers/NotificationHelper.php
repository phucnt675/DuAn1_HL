<?php
namespace App\Helpers;

class NotificationHelper {
    // Store success message in session
    public static function success($key, $message) {
        $_SESSION['success'][$key] = $message;
    }

    // Store error message in session
    public static function error($key, $message) {
        $_SESSION['error'][$key] = $message;
    }

    // Unset specific success or error messages
    public static function unset($key = null) {
        if ($key) {
            unset($_SESSION['success'][$key]);
            unset($_SESSION['error'][$key]);
        } else {
            unset($_SESSION['success']);
            unset($_SESSION['error']);
        }
    }
}
