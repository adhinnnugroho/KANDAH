<?php

namespace App\Helpers;

use Image;
use Illuminate\Support\Facades\Storage;

class Upload
{
    public static function toUpload($file, $type = 'payment')
    {
        // $file_ext = strtolower($file->getClientOriginalExtension());

        switch ($type) {
            case 'profile_user':
                $image_parts = explode(';base64,', $file);
                // $image_type_aux = explode('image/', $image_parts[0]);
                // $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $filename = 'FILE_PROFILE_' . date('Ymd') . '_' . time() . '.png';
                $filelocation_db = 'images/user-profile/' . date("Y/m/");
                $filelocation = $filelocation_db .  $filename;

                Storage::disk('public')->put($filelocation_db . $filename, $image_base64);
                break;



            default:
                $filename = $file;
                $filelocation = 'images/payments/' . date('Y') . '/' . date('m') . '/' . $filename;

                Storage::disk('Media')->put($filelocation, $file, 'public');
                break;
        }

        return [
            'is_upload' => true,
            'filename' => $filename,
            'filelocation' => $filelocation,
        ];
    }
}
