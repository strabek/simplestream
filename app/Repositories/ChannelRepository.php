<?php

namespace App\Repositories;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Collection;

class ChannelRepository
{
    /**
     * @return Collection|null
     */
    public static function getAll(): ?Collection
    {
        return Channel::select('uuid', 'name', 'icon')->get();
    }

    /**
     * @param string $uuid
     * @return Channel|null
     */
    public static function getByUuid(string $uuid): ?Channel
    {
        return Channel::where('uuid', '=', $uuid)->first();
    }
}
