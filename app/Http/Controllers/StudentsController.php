<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentsController extends Controller
{
    public function get(Request $request, $id){
      return Students::findOrFail($id);
    }
    
    public function list(Request $request){
      // dd();
      $keyword = $request->search;
      if($keyword){
        $data = Students::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->get();
        return response()->json(['data' => $data]);
      }
      return Students::latest()->paginate(10);
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'title' => 'required |max:200 ',
      ],[
        'title.required' => 'title is a required field.',
        'title.max' => 'title can only be 200 characters.',
      ]);

        $students = Students::create($request->all());    
        return $students;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'title' => 'required |max:200 ',
      ],[
        'title.required' => 'title is a required field.',
        'title.max' => 'title can only be 200 characters.',
      ]);

        $students = Students::findOrFail($id);
        $input = $request->all();
        $students->fill($input)->save();
        return $students;
    }
    
    public function delete(Request $request, $id){
        $students = Students::findOrFail($id);
        $students->delete();
    }
}
 ?>