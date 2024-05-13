<?php

namespace App\Traits;

use App\Models\UserDetails;
use Illuminate\Support\Facades\Storage;

trait UserDetailsConnections
{
    public function UserDetailConnection()
    {
        return $this->hasOne(UserDetails::class, 'id', 'id_user_details');
    }
}
