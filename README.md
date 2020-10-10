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

