<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksvalidationRequest extends FormRequest
{
    /**
     * Define the validation rules for the task request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',                   // Title is required
            'description' => 'required|string',     // Description is required and must be a string
            'duedate' => 'required|date',            // Due date is required and must be a valid date
            'status' => 'required|in:to do,in progress,done',  // Status is required and must be one of the specified values
            'assignee_id' => 'nullable|exists:users,id',       // Assignee ID is optional and must exist in the users table
            'priority' => 'nullable|string|in:high,medium,low', // Priority is optional and must be one of the specified values
        ];
    }
}
