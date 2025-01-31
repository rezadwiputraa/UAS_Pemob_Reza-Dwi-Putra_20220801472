<?php
namespace App\Filament\Admin\Resources\ReportResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Report;

/**
 * @property Report $resource
 */
class ReportTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
