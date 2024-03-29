<?php

namespace Core;

class Error {
    public static function pageNotFound() {
        http_response_code(404);
        view('error');
    }
}