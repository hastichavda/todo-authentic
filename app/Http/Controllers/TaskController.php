<?php
namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
  
    public function index()
   {
    //    $user_id = auth()->user()->id;
       $user = User::find(\Auth::$id);
       return view('home')
       ->with(['tasks' => $user->tasks])
       ->with(['user_id' => $user->id]);
       return Task::latest()->get();
   }
   
    public function create()
    {
        //
    }
  
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500',
            'user_id' => 'required'
        ]);
        $task= new Task;
        $task->user_id = $request->user_id;
        $task->body = $request->body;
        $task->save();
        return response()->json([
            'task' => $task
        ]);
    }
   
    public function show(Task $task)
    {
        //
    }
    
    public function edit(Task $task)
    {
        //
    }
    
    public function update(Request $request, Task $task)
    {
        //
    }
 
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json([
            'status' => 'Deleted'
        ]);
        return 204;
    }
}
