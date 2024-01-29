<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Config;

class AsanaController extends Controller
{
    /**
     * Fetch tasks from Asana.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchAsanaTasks()
    {
        // Get Asana access token from config
        $accessToken = Config::get('asana.access_token');

        // dd($accessToken);

        // Make a GET request to Asana API to fetch tasks
        $response = Http::withHeaders([
            'Authorization' => $accessToken,
        ])->get('https://app.asana.com/api/1.0/user_task_lists/1206441959768782/tasks');

        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response and pass tasks to the view
            $tasks = $response->json()['data'];
            return view('tasks', ['tasks' => $tasks]);
        } else {
            // Handle the error by returning a JSON response with error details
            return response()->json(['error' => $response->json()], $response->status());
        }
    }

    /**
     * Get details for a specific task from Asana.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function detailsFromAsana($id)
    {
        // Get Asana access token from config
        $accessToken = Config::get('asana.access_token');

        // Make a GET request to Asana API to fetch details for a specific task
        $response = Http::withHeaders([
            'Authorization' => $accessToken,
        ])->get('https://app.asana.com/api/1.0/tasks/' . $id);

        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response and pass task details to the view
            $task = $response->json()['data'];
            return view('tasks.detailsFromAsana', ['task' => $task]);
        } else {
            // Abort the request and provide an error response
            abort($response->status(), 'Failed to retrieve task details');
        }
    }
}
