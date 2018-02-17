
@extends('layout.master')

@section('content')
<h2>Active Employees</h2> 
 
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
							<td>Status</td>
					</thead>
					<tbody class="table">
					 
					@foreach($data as $key => $data_value)
						<tr >
						
							<td> {{ ($data_value->firstname)}}</td>
							<td> {{ ($data_value->lastname)}}</td>
							<td> {{ ($data_value->email)}}</td>
							<td> {{ ($data_value->contact)}}</td>
							<td> {{ ($data_value->status)}}</td>
						</tr>
						
					@endforeach
		 
					</tbody>
				</table>
			</div>
		</div>
	</div>

 
@stop
