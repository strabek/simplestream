<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ChannelController extends Controller
{
    protected function list(): JsonResponse
    {
        return new JsonResponse(
            [
                'status' => 'success',
                'data' => $data
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
