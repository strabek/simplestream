<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ChannelRepository;
use App\Repositories\ProgrammeRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChannelController extends Controller
{
    /**
     * @return JsonResponse
     */
    protected function list(): JsonResponse
    {
        try {
            $channels = ChannelRepository::getAll();
        } catch (Exception $e) {
            return new JsonResponse(
                [
                    'status' => 'fail',
                    'message' => $e->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return new JsonResponse(
            [
                'status' => 'success',
                'data' => $channels
            ],
            Response::HTTP_OK
        );
    }

    /**
     * @param Request $request
     * @param string $channelUuid
     * @param string $date
     * @param string $timezone
     * @return JsonResponse
     */
    protected function channelTimetable(Request $request, string $channelUuid, string $date, string $timezone): JsonResponse
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
            $programmes = ProgrammeRepository::getByChannelDateAndTimezone($channel, $date, $timezone);
        } catch (Exception $e) {
            return new JsonResponse(
                [
                    'status' => 'fail',
                    'message' => $e->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return new JsonResponse(
            [
                'status' => 'success',
                'data' => $programmes
            ],
            Response::HTTP_OK
        );
    }

    protected function programmeTimetable(): JsonResponse
    {
        return new JsonResponse(
            [
                'status' => 'success',
                'data' => $data
            ],
            Response::HTTP_OK
        );
    }
}
