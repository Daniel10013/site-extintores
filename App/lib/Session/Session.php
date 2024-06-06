<?php

namespace App\Lib\Session;

class Session{

    public static function start(): void{
        if (session_status() == PHP_SESSION_NONE ) {
            session_start();
        }
    }

    public static function destroy():void {
        self::start();
        session_destroy();
    }

    public static function set(string $key, string $item): void{
        self::start();
        $_SESSION[$key] = $item;
    }

    public static function get(string $key): string{
        self::start();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : "";
    }

    public static function exists($key): bool{
        self::start();
        return isset($_SESSION[$key]);
    }
}