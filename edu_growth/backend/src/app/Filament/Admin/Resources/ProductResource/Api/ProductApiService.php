<?php
namespace App\Filament\Admin\Resources\ProductResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Admin\Resources\ProductResource;
use Illuminate\Routing\Router;


class ProductApiService extends ApiService
{
    protected static string | null $resource = ProductResource::class;

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
