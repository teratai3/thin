<?php

namespace app\core;

// use BadMethodCallException;
// use RuntimeException;

class Validator_csr
{

    const HASH_ALGO = 'sha256';

    public static function generate()
    {
        // if (session_status() === PHP_SESSION_NONE) {
        //     throw new BadMethodCallException('Session is not active.');
        // }
        return hash(self::HASH_ALGO, session_id());
    }

    public static function validate($token)
    {
        $success = "";
        if (isset($token) && self::generate() === $token) {
            $success = true;
        } else {
            $success = false;
        }
        //$success = self::generate() === $token;
        // if (!$success && $throw) {
        //     throw new RuntimeException('CSRF validation failed.', 400);
        // }
        return $success;
    }
}