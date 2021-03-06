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
            ->whereDate('starts_at', '=', Carbon::parse($date)->format('Y-m-d'))
            ->where('timezone', '=', self::convertTimezoneName($timezone))
            ->get();
    }

    /**
     * @param $uuid
     * @return Collection|null
     */
    public static function getByUuid($uuid): ?Programme
    {
        return Programme::where('uuid', '=', $uuid)->first();
    }

    /**
     * @param string $name
     * @return string
     */
    public static function convertTimezoneName(string $name): string
    {
        return str_replace('-', '/', $name);
    }
}
