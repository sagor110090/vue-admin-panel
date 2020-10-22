<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
    public function get(Request $request, $id){
      return Posts::findOrFail($id);
    }
    
    public function list(Request $request){
      return Posts::latest()->get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'title' => 'required |max:200 ',
      ],[
        'title.required' => 'title is a required field.',
        'title.max' => 'title can only be 200 characters.',
      ]);

        $posts = Posts::create($request->all());    
        return $posts;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'title' => 'required |max:200 ',
      ],[
        'title.required' => 'title is a required field.',
        'title.max' => 'title can only be 200 characters.',
      ]);

        $posts = Posts::findOrFail($id);
        $input = $request->all();
        $posts->fill($input)->save();
        return $posts;
    }
    
    public function delete(Request $request, $id){
        $posts = Posts::findOrFail($id);
        $posts->delete();
    }
}
 ?>