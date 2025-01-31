<?php

namespace App\Filament\Admin\Resources\ReportResource\Api\Handlers;

use App\Filament\Admin\Resources\ReportResource;
use App\Filament\Admin\Resources\ReportResource\Api\Requests\UpdateReportRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = ReportResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Report
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateReportRequest $request)
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