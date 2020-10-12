<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tests;

class TestsController extends Controller
{
    public function get(Request $request, $id){
      return Tests::findOrFail($id);
    }
    
    public function list(Request $request){
      return Tests::get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'title' => 'required |max:200 ',
      ],[
        'title.required' => 'title is a required field.',
        'title.max' => 'title can only be 200 characters.',
      ]);

        $tests = Tests::create($request->all());    
        return $tests;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'title' => 'required |max:200 ',
      ],[
        'title.required' => 'title is a required field.',
        'title.max' => 'title can only be 200 characters.',
      ]);

        $tests = Tests::findOrFail($id);
        $input = $request->all();
        $tests->fill($input)->save();
        return $tests;
    }
    
    public function delete(Request $request, $id){
        $tests = Tests::findOrFail($id);
        $tests->delete();
    }
}
 ?>