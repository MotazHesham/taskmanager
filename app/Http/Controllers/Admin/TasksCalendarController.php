<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TasksCalendarController extends Controller
{
    public function index()
    {
        $events = Task::whereNotNull('start_date')->whereNotNull('end_date')->get();

        return view('admin.tasksCalendars.index', compact('events'));
    }
}