<?php

namespace App\Filament\Admin\Resources\ReportResource\Api\Handlers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Admin\Resources\ReportResource;
use App\Filament\Admin\Resources\ReportResource\Api\Transformers\ReportTransformer;

class PaginationHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = ReportResource::class;

    /**
     * List of Report
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function handler()
    {
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for($query)
            ->whereHas('client.user', function ($query) {
                $query->where('id', Auth::id());
            })
            ->with(['client', 'employee'])
            ->allowedFields($this->getAllowedFields() ?? [])
            ->allowedSorts($this->getAllowedSorts() ?? [])
            ->allowedFilters($this->getAllowedFilters() ?? [])
            ->allowedIncludes($this->getAllowedIncludes() ?? [])
            ->paginate(request()->query('per_page'))
            ->appends(request()->query());

        return ReportTransformer::collection($query);
    }
}