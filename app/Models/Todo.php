<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    private static  $todo;

    public static function newTodo($request)
    {
        self::saveBasicInfo(new Todo(), $request);
    }

    public static function deleteTodo($id)
    {
        self::$todo = Todo::find($id);
        self::$todo->delete();
    }
    public static function updateStatus($request)
    {
        self::$todo               = Todo::find($request->id);
        self::$todo ->status           = $request->status;
        self::$todo ->save();
    }
    public static function updateTodo($request, $id)
    {
        self::$todo= Todo::find($id);
        self::saveBasicInfo(self::$todo, $request);
    }
    private static function saveBasicInfo($todo, $request)
    {
        $todo->todo           = $request->todo;

        if ($request->status)
        {
            $todo->status           = $request->status;
        }

        $todo->save();
    }
}
