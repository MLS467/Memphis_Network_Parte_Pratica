<?php

namespace App\Http\Service;

use Exception;
use Illuminate\Support\Facades\Crypt;

class Service
{

    public static function decrypt_service(string $value): string | int
    {
        try {
            $value_decrypted = Crypt::decrypt($value);
        } catch (Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e->getMessage());
            }

            redirect()
                ->back()
                ->withInput()
                ->withErrors('Error ' . $e->getMessage());
        }

        return $value_decrypted;
    }
}