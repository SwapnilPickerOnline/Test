<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	// public static $rules = [ 
			// 'firstname' => 'required',
			// 'lastname' => 'required',
			// 'email' => 'required|email',
			// 'department' => 'required',
			// 'contact' => 'required',
			// 'status' => 'required'
		// ];

	protected $fillable = ['firstname', 'lastname', 'email', 'department', 'contact', 'status'];
	
	public function up()
	{
		Schema::create('employees', function (Blueprint $table) {
			$table->increments('id');
			$table->string('firstname', 40);
			$table->string('lastname', 40);
			$table->string('email', 80);
			$table->integer('department');
			$table->string('contact', 40);
			$table->enum('status', array('active', 'inactive')); 
			$table->timestamps();
		});
	}
	
	
	// public function validate()
	// {
		// $v = \Validator::make($this->attributes, $this->rules);
		// if($v->passes()){
			// return true;
		// }
		// $this->errors = $v->messages();
		// return false;
		
	// }
	
	// public function toArray($request)
	// {
		// return [
			// 'id' => $this->id,
			// 'firstname' => $this->firstname,
			// 'lastname' => $this->lastname,
			// 'email' => $this->email,
			// 'department' => $this->department,
			// 'contact' => $this->contact,
			// 'status' => $this->status,
			// 'created_at' => $this->created_at,
			// 'updated_at' => $this->updated_at,
		// ];
	// }
} 