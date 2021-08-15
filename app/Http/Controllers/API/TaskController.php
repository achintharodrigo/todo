<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $tasks = Auth::user()->tasks;

        return $this->sendResponse(collect($tasks), 'Tasks retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $newTask = new Task;
        $newTask->user_id = $user->id;
        $newTask->title = $request->task['title'];
        $newTask->due_on = Carbon::parse($request->task['due_on'])->format("Y-m-d H:i:s");
        $newTask->save();

        return $this->sendResponse($newTask, 'Task saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $task = Task::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        $task->completed = (bool)$request->task['completed'];
        $task->completed_on = $request->task['completed'] ? Carbon::now() : null;
        $task->save();

        return $this->sendResponse($task, 'Task completed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $task = Task::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        $task->delete();
        return $this->sendResponse([], 'Task removed successfully.');

    }
}
