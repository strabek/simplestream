<?php

namespace App\Repositories;

use App\Models\Channel;

class ChannelRepository
{
    public static function getAll()
    {
        return Channel::select('uuid', 'name', 'icon')->get();
    }
}
