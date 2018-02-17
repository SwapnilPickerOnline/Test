
@extends('layout.master')

@section('content')
<h2>Department Employees</h2> 
 
<div class="clearfix"></div> <br>

 
<div class="pull-right">
	<div class="btn-group">
		<button type="button" class="btn btn-success btn-filter" data-target="active">Active</button> 
		<button type="button" class="btn btn-default btn-filter" data-target="inactive">Inactive</button>
	</div>
</div>

<div class="clearfix"></div> <br>

<div class="panel panel-default">
		<div class="panel-body">
			<div class="table-container">
				<table class=" table-filter" width="100%">
					<thead class="strong">
							<td>First Name</td>
							<td>Last Name</td>
							<td>Email</td>
							<td>Contact</td>
							<td>Department</td>
							<td>Status</td>
					</thead>
					<tbody class="table">
					 
					@foreach($data as $key => $data_value)
						<tr data-status="{{ ($data_value->status)}}">
						
							<td> {{ ($data_value->firstname)}}</td>
							<td> {{ ($data_value->lastname)}}</td>
							<td> {{ ($data_value->email)}}</td>
							<td> {{ ($data_value->contact)}}</td>
							<td> {{ ($data_value->name)}}</td>
							<td> {{ ($data_value->status)}}</td>
						</tr>
						
					@endforeach
		 
					</tbody>
				</table>
			</div>
		</div>
	</div>

 
@stop
