<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
 use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
 
use Validator; 

class EmployeeController extends Controller
{
    //
	
	public $successStatus = 200;
 
	public function index(){
		
		$users = Employee::all();
		return response()->json(['success'=> $users], $this->successStatus);
		
	}
 
	public function active_employee(){
		
		$users = Employee::where('status', 'active' )->get();
		return response()->json(['success'=> $users], $this->successStatus);
		
	}
 

	public function create (Request $request){
 
		$validatedData = [ 
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|email|unique:employees',
			'department' => 'required',
			'contact' => 'required',
			'status' => 'required'
		];
		
		$errors = Validator::make($request->all(), $validatedData); 
		if(!$errors->passes()){
			return response()->json(['error' => $errors->messages()], 401);
		} 
 
		$input = $request->all();
		$user = Employee::create($input);
		$success = 'Hi user '.$user->firstname. ' ' . $user->lastname . ' Registered Successfully';
		
 		// $validator = $this->validate($request,[
			// 'firstname' => 'required',
			// 'lastname' => 'required',
			// 'email' => 'required|email',
			// 'department' => 'required',
			// 'contact' => 'required',
			// 'status' => 'required'
		// ]);
		
		// $input = $request->all();
		// $user = Employee::create($input);
		// $success = 'Hi user '.$user->firstname. ' ' . $user->firstname . ' Registered Successfully';
		
		return response()->json(['success'=> $success], $this->successStatus);
	 
		
	}
	

	public function update (Request $request, $id){
 
 
		$user = Employee::find($id); 
		
		if ($user === null) { 
			return response()->json(['error' => 'Record not exist'], 401);
		} 
		
		$validatedData = [ 
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|email|unique:employees',
			'department' => 'required',
			'contact' => 'required',
			'status' => 'required'
		];
		
		$errors = Validator::make($request->all(), $validatedData); 
		if(!$errors->passes()){
			return response()->json(['error' => $errors->messages()], 401);
		} 
   
		
		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;
		$user->email = $request->email;
		$user->department = $request->department;
		$user->contact = $request->contact;
		$user->status = $request->status; 

		$user->update();
		
		//$user->save(); 

		$success = 'Hi user '.$request->firstname. ' ' . $request->lastname . ' Updated Successfully';
		
		return response()->json(['success'=> $success], $this->successStatus);
	 
		
	}
	
	public function remove (Request $request, $id){
  
		$user = Employee::where('id', $id)->first(); 
		
		if ($user === null) { 
			return response()->json(['error' => 'Record not exist'], 401);
		} 
 
		//$user->delete();
		Employee::destroy($id);
	 
		$success = 'Hi user '.$user->firstname. ' ' . $user->lastname . ' Deleted Successfully';
		
		return response()->json(['success'=> $success], $this->successStatus);
	 
		
	}
	
}
