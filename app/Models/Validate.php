<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validate extends Model
{
     /**
     *  Validating Task
     *
     * @return void
     */
    public static function task_validate($this_parent)
    {
        $this_parent->validate([
            'task' => 'required|min:5',
            'due_date' => 'required',
            'due_hours' => 'required|string',
        ]);
     
    }
     /**
     *  Validating History
     *
     * @return void
     */
    public static function history_validate($this_parent)
    {
        $this_parent->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:10',
            'event_date' => 'required|date',
        ]);
     
    }
}
