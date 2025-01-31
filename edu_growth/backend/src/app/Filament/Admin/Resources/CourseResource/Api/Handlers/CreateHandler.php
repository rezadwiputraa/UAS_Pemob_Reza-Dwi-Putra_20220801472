<?php

namespace App\Filament\Admin\Resources\CourseResource\Api\Handlers;

use App\Filament\Admin\Resources\CourseResource;
use App\Filament\Admin\Resources\CourseResource\Api\Requests\CreateCourseRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = CourseResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Course
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateCourseRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}