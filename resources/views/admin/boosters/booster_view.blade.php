@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Booster View</div>

                <div class="panel-body">
				<h2> 
<a href="{{ route('booster.index')}}" class="btn btn-primary btn-xs"> <i class="icon-chevron-left" title="Go back"></i> Back </a>

					<a href="{{route('booster.create')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i><i class="icon-plus" title="Edit"></i> <i class="icon-file" title="Add"></i> Create New Booster </a>
				</h2>
                <table class="table table-striped table-bordered">
                        <thead>
                            @if(count($booster))
                            <tr>
								<th style = "width:1%; text-align:center;">Action</th>
								<th> 								
							<a href="{{ route('booster.edit', ['id' => $booster->id]) }}" class="btn btn-info btn-xs"><i class="icon-pencil" title="Edit"></i> </a>
                    <form style="display: inline;" method="POST" action="{{ route('booster.destroy', ['id' => $booster->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs"><i class="icon-trash" title="Delete"></i></button>
                    </form>
									

								</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                <table  class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>

							
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                             <td>{!!html_entity_decode($booster->title)!!}</td>      
                            </tr>
                        </tbody>
                                                <thead>
                            <tr>
                                <th>Verse</th>

                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                             <td>{!!html_entity_decode($booster->verse)!!}</td>      
                            </tr>
                        </tbody>
                                                <thead>
                            <tr>
                                <th>Confession</th>

                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                             <td>{!!html_entity_decode($booster->confession)!!}</td>      
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    
                    
