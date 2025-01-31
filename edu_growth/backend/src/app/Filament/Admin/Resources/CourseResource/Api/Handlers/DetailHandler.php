<?php

namespace App\Filament\Admin\Resources\CourseResource\Api\Handlers;

use App\Filament\Admin\Resources\CourseResource;
use App\Filament\Admin\Resources\CourseResource\Api\Transformers\CourseTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = CourseResource::class;

    /**
     * Show Course
     *
     * @return CourseTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');

        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (! $query) {
            return static::sendNotFoundResponse();
        }

        return new CourseTransformer($query);
    }
}