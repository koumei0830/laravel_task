<?php
namespace App\Service;

class TaskService {

    public function getList($keyword){
        $tasks = \DB::table("tasks")->where("name","like","%$keyword%")->get();
        return $tasks;
    }

    public function getTaskId($id){
        $task = \DB::table("tasks")->where("id",$id)->first();
        return $task;
    }

    public function getEditId($id){
        $task = \DB::table("tasks")->where("id",$id)->first();
        return $task;
    }

    public function postEditId($id){
        $task = \DB::table("tasks")->where("id",$id)->first();
        return $task;
        
    }

    public function getDoneId($id){
        $task = \DB::table("tasks")->where("id",$id)->first();
        return $task;
    
    }

    public function postDoneId($id){
        \DB::table("tasks")->where("id",$id)->delete();
        return redirect("/tasks");
    }

    
}