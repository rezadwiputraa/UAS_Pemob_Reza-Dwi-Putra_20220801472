<?php
namespace App\Filament\Admin\Resources\CourseResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Admin\Resources\CourseResource;
use Illuminate\Routing\Router;


class CourseApiService extends ApiService
{
    protected static string | null $resource = CourseResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
