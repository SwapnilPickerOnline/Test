<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
 use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;
 
use Validator; 

class DepartmentController extends Controller
{
	
	public $successStatus = 200;
 
	public function index(){
		
		$users = Department::all();
		return response()->json(['success'=> $users], $this->successStatus);
		
	}
 
	public function create (Request $request){
 
		$validatedData = [ 
			'name' => 'required|unique:departments',
			'description' => 'required'
		];
		
		$errors = Validator::make($request->all(), $validatedData); 
		if(!$errors->passes()){
			return response()->json(['error' => $errors->messages()], 401);
		} 
 
		$input = $request->all();
		$department = Department::create($input);
		$success = 'Hi Department '.$department->name. ' Registered Successfully';
	 
		return response()->json(['success'=> $success], $this->successStatus);

	}
	

	public function update (Request $request, $id){

		$department = Department::find($id); 
		
		if ($department === null) { 
			return response()->json(['error' => 'Record not exist'], 401);
		} 
		
		
		$validatedData = [ 
			'name' => 'required|unique:departments',
			'description' => 'required' 
		];
		
		$errors = Validator::make($request->all(), $validatedData); 
		if(!$errors->passes()){
			return response()->json(['error' => $errors->messages()], 401);
		} 
  
		
		$department->name = $request->name;
		$department->description = $request->description; 

		$department->update();
		
		//$user->save(); 

		$success = 'Hi Department '.$request->name. ' Updated Successfully';
		
		return response()->json(['success'=> $success], $this->successStatus);

	}
	
	
	public function remove (Request $request, $id){
  
		$department = Department::where('id', $id)->first(); 
		
		if ($department === null) { 
			return response()->json(['error' => 'Record not exist'], 401);
		} 
 
		//$department->delete();
		Department::destroy($id);
	 
		$success = 'Hi Department ' . $department->name . ' Deleted Successfully';
		
		return response()->json(['success'=> $success], $this->successStatus);

	}
	
}
