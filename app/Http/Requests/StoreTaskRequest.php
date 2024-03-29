<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ], 
            'start_date' => [
                'nullable',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date' => [
                'nullable',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
