<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ProgrammesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programmes')->insert([
            [
                'uuid' => Uuid::uuid4()->toString(),
                'channel_id' => 1,
                'name' => 'Programme #1',
                'description' => 'Sample programme description',
                'thumbnail' => null,
                'start' => Carbon::parse('2020-01-01 15:45:00'),
                'end' => Carbon::parse('2020-01-01 15:45:00')->addSeconds(3600),
                'timezone' => 'Europe/London',
                'duration' => 3600,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'channel_id' => 1,
                'name' => 'Programme #2',
                'description' => 'Sample programme description',
                'thumbnail' => null,
                'start' => Carbon::parse('2020-01-01 16:45:00'),
                'end' => Carbon::parse('2020-01-01 16:45:00')->addSeconds(3600),
                'timezone' => 'Europe/London',
                'duration' => 3600,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'channel_id' => 2,
                'name' => 'Programme #3',
                'description' => 'Sample programme description',
                'thumbnail' => null,
                'start' => Carbon::parse('2020-01-01 10:45:00'),
                'end' => Carbon::parse('2020-01-01 10:45:00')->addSeconds(3600),
                'timezone' => 'Europe/London',
                'duration' => 3600,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]
        ]);
    }
}
