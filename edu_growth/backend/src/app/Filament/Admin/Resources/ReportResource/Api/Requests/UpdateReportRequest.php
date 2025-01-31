<?php

namespace App\Filament\Admin\Resources\ReportResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'category' => 'required|string',
			'name' => 'required|string',
			'client_id' => 'required|integer',
			'course_id' => 'required|integer',
			'description' => 'required|string',
			'nilai' => 'required|integer',
			'progres' => 'required',
			'tanggal_jam' => 'required'
		];
    }
}
