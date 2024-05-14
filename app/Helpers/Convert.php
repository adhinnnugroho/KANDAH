<?php

namespace App\Helpers;

use Image;
use App\Models\ticket as ticketModel;

class Convert
{
    public static function toFileName($code, $extension)
    {
        return $code . "-" . time() . '.' . $extension;
    }
}
