<?php

namespace App\Repositories;

use App\Models\Channel;
use App\Models\Programme;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ProgrammeRepository
{
    /**
     * @param Channel $channel
     * @param string $date
     * @param string $timezone
     * @return Collection|null
     */
    public static function getByChannelDateAndTimezone(Channel $channel, string $date, string $timezone): ?Collection
    {
        return Programme::select('uuid', 'name', 'starts_at', 'ends_at', 'duration')
            ->where('channel_id', '=', $channel->id)
            ->whereDate('start', '=', Carbon::parse($date)->format('Y-m-d'))
            ->where('timezone', '=', str_replace('-', '/', $timezone))
            ->get();
    }

    /**
     * @param $uuid
     * @return Collection|null
     */
    public static function getByUuid($uuid): ?Programme
    {
        return Programme::select('uuid', 'name', 'description', 'thumbnail', 'starts_at', 'ends_at', )
            ->where('uuid', '=', $uuid)
            ->first();
    }
}
