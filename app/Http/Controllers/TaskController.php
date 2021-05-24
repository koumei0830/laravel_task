<?php
namespace App\Http\Controllers;
use App\Service\TaskService;


class TaskController {

    protected $taskService; 

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }

    public function getList(){
        $keyword = request()->get("keyword");
        $tasks = $this->taskService->getList($keyword);
        return view('task.list',[
            "tasks" => $tasks
        ]);
    }

    // public function getList(){
    //     $keyword = request()->get("keyword");
    //     $tasks = \DB::table("tasks")->where("name","like","%$keyword%")->get();
    //     return view('task.list',[
    //         "tasks" => $tasks
    //     ]);
    // }

    

    public function getNewList(){
        return view('task.new');
    }

    public function postNewList(){
        $payload = [
            "name" => request()->get("name"),
            "date_on" => request()->get("date_on"),
            "body" => request()->get("body"),
        ];
        $rules = [
            "name" => ["required"],
            "date_on" => ["required"],
            "body" => ["required"],
        ];
    
        $val = validator($payload,$rules);
        if($val->fails()){
            session()->flash("old_form",$payload);
            session()->flash("errors",$val->errors()->toArray());
            return redirect("/tasks/new");
        }
        // \DB::table("tasks")->insert($payload);

        $this->insert($payload);
        return redirect("/tasks");
    }

    // public function getTaskId($id){
    //     $task = \DB::table("tasks")->where("id",$id)->first();
    //     return view('task.detail',[
    //         "task" => $task
    //     ]);
    // }

    public function getTaskId($id){
        $task = $this->taskService->getTaskId($id);
        return view('task.detail',[
            "task" => $task
        ]);
    }

    public function getEditId($id){
        $task = $this->taskService->getEditId($id);
        if(!session()->has("old_form")){
            session()->flash("old_form",[
                "name" => $task->name,
                "date_on" => substr($task->date_on,0,10),
                "body" => $task->body,
            ]);
        }
        return view('task.edit',[
            "task" => $task
        ]);
    }

    public function postEditId($id){
        $task = $this->taskService->getEditId($id);
        $payload = [
            "name" => request()->get("name"),
            "date_on" => request()->get("date_on"),
            "body" => request()->get("body"),
        ];
        $rules = [
            "name" => ["required"],
            "date_on" => ["required"],
            "body" => ["required"],
        ];
    
        $val = validator($payload,$rules);
        if($val->fails()){
            session()->flash("old_form",$payload);
            session()->flash("errors",$val->errors()->toArray());
            return redirect("/task/$id/edit");
        }
        // \DB::table("tasks")->where("id",$id)->update($payload);
       $this->taskService->update($payload);
        return redirect("/tasks");
    }

    public function getDoneId($id){
        $task = $this->taskService->getDoneId($id);
        return view('task.done',[
            "task" => $task
        ]);
    }

    // public function getDoneId($id){
    //     $task = \DB::table("tasks")->where("id",$id)->first();
    //     return view('task.done',[
    //         "task" => $task
    //     ]);
    // }

    public function postDoneId($id){
        $this->taskService->postDoneId($id);
        return redirect("/tasks");
    }

    // public function postDoneId($id){
    //     \DB::table("tasks")->where("id",$id)->delete();
    //     return redirect("/tasks");
    // }
};