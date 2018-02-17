<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	
	protected $fillable = ['name', 'description'];
	
	public function up()
	{
		Schema::create('departments', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 40);
			$table->text('description'); 
			$table->timestamps();
		});
	}
	
	// public function toArray($request)
	// {
		// return [
			// 'id' => $this->id,
			// 'name' => $this->name,
			// 'description' => $this->description,
			// 'created_at' => $this->created_at,
			// 'updated_at' => $this->updated_at,
		// ];
	// }
	
}
