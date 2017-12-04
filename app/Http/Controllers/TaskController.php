<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class TaskController extends Controller
{

    public function index()
    {
        $pic = Task::all();
        
        return view('task')->with('data', $pic);
    }

    public function store(Request $request)
    {
        $customer       = new Task;
        $customer->name =$request->name;
        if ($customer->save()) {
            return json_encode([ 'status' => true , 'message' => 'Task added successfully']);
        } else {
            return json_encode([ 'status' => false , 'message' => 'Task add failed']);
        }
        
    }

   
    public function destroy($id)
    {
        $customer = Task::find($id);
        
        if ($customer->delete()) {
            return json_encode([ 'status' => true , 'message' => 'Task deleted successfully']);
        } else {
            return json_encode([ 'status' => false , 'message' => 'Task delete failed']);
        }
    }
}
