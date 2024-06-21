<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Upload
{
    public static function toUpload($file, $type = 'payment')
    {
        switch ($type) {
            case 'profile_user':
                $image_parts = explode(';base64,', $file);
                $image_base64 = base64_decode($image_parts[1]);
                $filename = 'FILE_PROFILE_' . date('Ymd') . '_' . time() . '.png';
                $filelocation_db = 'images/user-profile/' . date("Y/m/");
                $filelocation = $filelocation_db .  $filename;

                Storage::disk('public')->put($filelocation_db . $filename, $image_base64);
                break;

            default:
                $filename = $file;
                $filelocation = 'images/notfound/' . date('Y/M') . $filename;

                Storage::disk('public')->put($filelocation, $file, 'public');
                break;
        }

        return [
            'is_upload' => true,
            'filename' => $filename,
            'filelocation' => $filelocation,
        ];
    }
}
