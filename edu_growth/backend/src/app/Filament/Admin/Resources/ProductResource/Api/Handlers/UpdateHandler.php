<?php

namespace App\Filament\Admin\Resources\ProductResource\Api\Handlers;

use App\Filament\Admin\Resources\ProductResource;
use App\Filament\Admin\Resources\ProductResource\Api\Requests\UpdateProductRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = ProductResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Product
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateProductRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (! $model) {
            return static::sendNotFoundResponse();
        }

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Update Resource');
    }
}
