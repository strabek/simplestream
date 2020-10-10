<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ChannelRepository;
use App\Repositories\ProgrammeRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProgrammeController extends Controller
{
    /**
     * @param string $channelUuid
     * @param string $programmeUuid
     * @return JsonResponse
     */
    protected function programmeData(string $channelUuid, string $programmeUuid): JsonResponse
    {
        try {
            $channel = ChannelRepository::getByUuid($channelUuid);
        } catch (Exception $e) {
            return new JsonResponse(
                [
                    'status' => 'fail',
                    'message' => $e->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        if (!$channel) {
            return new JsonResponse(
                [
                    'status' => 'fail',
                    'message' => 'Channel ' . $channelUuid . ' not found.'
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        try {
            $programme = ProgrammeRepository::getByUuid($programmeUuid);
        } catch (Exception $e) {
            return new JsonResponse(
                [
                    'status' => 'fail',
                    'message' => $e->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        if (!$programme) {
            return new JsonResponse(
                [
                    'status' => 'fail',
                    'message' => 'Programme ' . $programmeUuid . ' not found.'
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        $data = [
            'uuid' => $programme->uuid,
            'name' => $programme->name,
            'description' => $programme->description,
            'thumbnail' => $programme->thumbnail,
            'starts_at' => $programme->starts_at,
            'ends_at' => $programme->ends_at,
            'duration' => $programme->duration,
            'channel' => $programme->channel
        ];

        return new JsonResponse(
            [
                'status' => 'success',
                'data' => $data
            ],
            Response::HTTP_OK
        );
    }
}
