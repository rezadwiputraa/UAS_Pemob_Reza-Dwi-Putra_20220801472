<?php

namespace App\Filament\Admin\Resources\ReportResource\Api\Handlers;

use App\Filament\Admin\Resources\ReportResource;
use App\Filament\Admin\Resources\ReportResource\Api\Transformers\ReportTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = ReportResource::class;

    /**
     * Show Resource
     *
     * @return ReportTransformer
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

        return new ReportTransformer($query);
    }
}