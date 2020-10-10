Project setup:
1. Clone repository: https://github.com/strabek/simplestream
2. Run composer install
3. Set files/folders permissions if required

API endpoints:
1. /api/channels
2. /api/channels/{channelUuid}/{date}/timezone/{timezone} - timezone format e.g. Europe-London - `-` will be converted to `/`
3. /api/channels/{channelUuid}/programmes/{programmeUuid}

Postman file: Simplestream.postman_collection.json

Database diagram file: db_diagram.mwb

DB seeders:
1. ChannelsSeeder
2. ProgrammesSeeder

Notes
I have set Channel Programme one-to-many relation as the test brief did not specify otherwise. However, many-to-many relation would be more benficial and we could reuse the same programme in other channels. Doing so would require database structure update so we do not assign start and end date in programmes table, but instead in the pivot table. 

I used autoincrement id primary keys for Channels and Programmes. This might be safer as they will not be duplicated within the tables. Although UUID should be unique across the whole database it would always be good to check them before saving into the database.
However, using UUID as primary key would give a benefit in functionality, i.e. we would not have to manually check if a channel exists (ChannelControlled line 49), but instead we could pass Channel object into channelTimetable method like so:
```php
protected function channelTimetable(\App\Models\Channel $channel, string $date, string $timezone): JsonResponse
{
    ...
}
```
and the framework would resolve wheather a Channel exists - if not 404 would be returned. The same would apply to programmeData method (ProgrammeController line 19) like so:
```php
protected function programmeData(\App\Models\Channel $channel, \App\Models\Programme $programme): JsonResponse
{
   ...
}
```
