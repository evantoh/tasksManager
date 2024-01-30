<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required|string',
            'duedate' => 'required|date',
            'status' => 'required|in:to do,in progress,done',
            'assignee_id' => 'nullable|exists:users,id',
            'priority' => 'nullable|string|in:high,medium,low',
        ];
    }
}
