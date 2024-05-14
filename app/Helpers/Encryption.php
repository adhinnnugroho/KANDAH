<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Encryption {
    /**
     * Encrypt value
     * @param string $value
     * @return string
     */
    public static function encryptId($value) {
        $encrypt = Str::random(2) . date('His') . '|' . $value . '|' . Str::random(5);
        $encrypt = base64_encode($encrypt);

        return $encrypt;
    }

    /**
     * Decrypt value
     * @param string $value
     * @return string
     */
    public static function decryptId($value) {
        $decrypt = base64_decode($value);
        $explode_decrypt = explode('|', $decrypt);
        
        return $explode_decrypt[1];
    }
}