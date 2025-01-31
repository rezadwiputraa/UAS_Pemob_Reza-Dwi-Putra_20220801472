<?php

namespace App\Filament\Admin\Resources\ReportResource\Api\Handlers;

use App\Filament\Admin\Resources\ReportResource;
use App\Filament\Admin\Resources\ReportResource\Api\Requests\CreateReportRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = ReportResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Report
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateReportRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}