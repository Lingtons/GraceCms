@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Boosters</div>

                <div class="panel-body">
				<h2> <a href="{{route('booster.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i><i class="icon-plus" title="Edit"></i> <i class="icon-file" title="Add"></i> Create New Booster </a></h2>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date Created</th>
                                   <th>Action</th>
								
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($boosters))
                            @foreach ($boosters as $booster)
                            <tr>
                             <td>{{$booster->title}}</td>
                                <td>{{$booster->created_at}}</td>

								<td>
									<a href="{{ route('booster.edit', ['id' => $booster->id]) }}" class="btn btn-info btn-xs"><i class="icon-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('booster.show', ['id' => $booster->id]) }}" class="btn btn-success btn-xs"><i class="icon-eye-open" title="Show"></i> </a>
   <form style="display: inline;" method="POST" action="{{ route('booster.destroy', ['id' => $booster->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs"><i class="icon-trash" title="Delete"></i></button>
                    </form>
									
                                </td>
			            
                            </tr>
							@endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    
                    
