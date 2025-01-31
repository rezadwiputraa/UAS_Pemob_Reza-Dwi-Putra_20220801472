<?php
namespace App\Filament\Admin\Resources\CourseResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Course;

/**
 * @property Course $resource
 */
class CourseTransformer extends JsonResource
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
