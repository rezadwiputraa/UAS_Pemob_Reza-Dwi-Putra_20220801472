<?php

namespace App\Filament\Admin\Resources\ClientResource\Api\Handlers;

use App\Filament\Admin\Resources\ClientResource;
use App\Filament\Admin\Resources\ClientResource\Api\Requests\UpdateClientRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = ClientResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Client
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateClientRequest $request)
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