<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class BlogController extends Controller
{
    public function index(){
        $todo = Todo::paginate(10);
        $c= null;
        $url= url('/set-data');
        $data= compact('todo', 'c', 'url');
        
        return view('welcome')->with($data);
    }
    public function about(){
        $todo= Todo::onlyTrashed()->get();
        $data= compact('todo');
        return view('about')->with($data);
    }
    public function submitBlog(Request $data){
        $data->validate(
            [
                'Header'  => 'required',
                'body'    => 'required|min:10'
            ]
        );
        $todo= new Todo;
        $todo->header= $data['Header'];
        $todo->body= $data['body'];
        $todo->save();
        return redirect('/');
    }

    public function delete($id){
        $c= Todo::find($id);
        if (!is_null($c)) {
            $c->delete();
        }

        return redirect()->back();
    }
    public function getDataById($id){
        $c= Todo::find($id);
        // if (!is_null($c)) {
        //     $c->delete();
        // }
        // print_r($c);die;
        $url= url('/update-data')."/".$id;
        $todo = Todo::paginate(10);
        $data= compact('todo', 'c', 'url');
        return view('welcome')->with($data);
    }
    public function update($id, Request $data){
        $c= Todo::find($id);
        $c->header= $data['Header'];
        $c->body= $data['body'];
        $c->save();
        return redirect()->back();
    }
    public function pdelete($id){
        // echo $id;die;
        $c= Todo::withTrashed()->find($id);
        if (!is_null($c)) {
            $c->forceDelete();
        }

        return redirect()->back();
    }
    public function restore($id){
        $c= Todo::withTrashed()->find($id);
        if (!is_null($c)) {
            $c->restore();
        }

        return redirect()->back();
    }

}
