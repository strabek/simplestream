<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            [
                'uuid' => Uuid::uuid4()->toString(),
                'name' => 'Channel #1',
                'icon' => 'Sample icon URL',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'name' => 'Channel #2',
                'icon' => 'Sample icon URL',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]
        ]);
    }
}
