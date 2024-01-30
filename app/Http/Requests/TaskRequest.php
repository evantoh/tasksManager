<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',  // 'title' field is required
            'description' => 'required|string',  // 'description' field is required and must be a string
            'duedate' => 'required|date',  // 'duedate' field is required and must be a valid date
            'status' => 'required|in:to do,in progress,done',  // 'status' field is required and must be one of the specified values
            'assignee_id' => 'nullable|exists:users,id',  // 'assignee_id' field is optional and, if provided, must exist as a user ID in the 'users' table
            'priority' => 'nullable|string|in:high,medium,low',  // 'priority' field is optional and, if provided, must be a string and one of the specified values
        ];
    }
}
