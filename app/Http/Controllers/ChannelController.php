<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ChannelRepository;
use Exception;
use Illuminate\Http\JsonResponse;
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
                    'status' => 'fail'
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

    protected function channelTimetable(): JsonResponse
    {
        return new JsonResponse(
            [
                'status' => 'success',
                'data' => $data
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
