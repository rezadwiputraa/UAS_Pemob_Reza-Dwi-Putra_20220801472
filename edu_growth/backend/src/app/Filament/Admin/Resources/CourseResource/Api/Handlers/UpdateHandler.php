<?php

namespace App\Filament\Admin\Resources\CourseResource\Api\Handlers;

use App\Filament\Admin\Resources\CourseResource;
use App\Filament\Admin\Resources\CourseResource\Api\Requests\UpdateCourseRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = CourseResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Course
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateCourseRequest $request)
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