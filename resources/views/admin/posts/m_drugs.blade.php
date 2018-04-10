@extends('layouts.app')

@section('content')
<section class="pricing" id="pricing">

    <div class="container">
        <div class="row">
		
            <div class="span12 pricing-intro">
			<div class = "pager"></div>
                <h2 class="page-headline large text-center">Manufacturer Drugs</h2>

                <p class="text-center">List of manufacturers specific drugs</p>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">

		<div class="span12">
		 
            
                
                    <h2> <a href="{{route('drugs.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i><i class="icon-plus" title="Edit"></i> <i class="icon-truck" title="Add"></i> Add New Drug </a></h2>
                    
                
				
                <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
								<th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($drugs))
                            @foreach ($drugs as $row)
                            <tr>
                             <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>    
								
								<td>
                                    <a href="{{ route('drugs.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="icon-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('drugs.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="icon-trash" title="Delete"></i> </a>
                                </td>
								
                            </tr>
							@endforeach
                            @endif
                        </tbody>
                    </table>

            </div>
            
			
        </div>
    </div>


</section>
@endsection
