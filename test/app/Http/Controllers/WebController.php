<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use Illuminate\Support\Facades\View;
 
use App\Department; 
use App\Employee;

class WebController extends Controller
{
 
	public function all_employee(){
		
		$result = Employee::where('status', 'active')->get(); 
		
		return view('all_employee')->with('data',$result );
		
		
	}
	public function employees_with_department (){
		 
		$result = Employee::join('departments', 'employees.department', '=', 'departments.id')->get();
		
		// $result = DB::table('employees')
			// ->select('employees.*', 'departments.name as department')
			// ->join('departments', 'departments.id', '=', 'employees.department') 
			// ->get();
			
		return view('employees_with_department')->with('data',$result );
		
	}
	public function employees_list(){
		
		$result = Employee::all();
		return view('employees_list')->with('data',$result );
		
	}
}
