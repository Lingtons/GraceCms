@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
				<h2> <a href="{{route('posts.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i><i class="icon-plus" title="Edit"></i> <i class="icon-file" title="Add"></i> Create New Post </a></h2>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
								<th>Event Date</th>
								<th>Date Created</th>
								<th style = "width:1%; text-align:center;">Avatar</th>
								<th style = "width:1%; text-align:center;">Lessons</th>
								<th style = "width:1%; text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($posts))
                            @foreach ($posts as $row)
                            <tr>
                             <td>{{$row->title}}</td>
                                <td>{{$row->category->name}}</td>    
								<td>{{$row->ddate}}</td>    
								<td>{{$row->created_at}}</td>
<td style = "width:1%; text-align:center;"> <a href="#modal-view-avatar{{$row->id}}" class="btn btn-info btn-xs" data-hover="tooltip" data-placement = "top" data-target = "#modal-view-avatar{{$row->id}}" data-toggle = "modal"><i class="icon-camera" title="view image"></i> </a></td>								
								<td>
									<a href="{{ url('admin/add_lesson', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="icon-plus" title="Edit"></i> </a>
                                    <a href="{{ route('posts.show', ['id' => $row->id]) }}" class="btn btn-success btn-xs"><i>{{count($row->lessons)}}</i> </a>
									
                                </td>
								<td>
									<a href="{{ route('posts.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="icon-pencil" title="Edit"></i> </a>
   <form style="display: inline;" method="POST" action="{{ route('posts.destroy', ['id' => $row->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs"><i class="icon-trash" title="Delete"></i></button>
                    </form>
									
                                </td>
								<div id = "modal-view-avatar{{$row->id}}" class="modal panel panel-default col-md-4" >
                            <div class="panel-heading">
                                Post Avatar
                            </div>
							<div class="panel-body">
							<img style = "align:center;" src = "{{ asset('images/' . $row->avatar)}}">

							<form method="post" action = "{{ url('admin/update_avatar', ['id' => $row->id]) }}" data-parsley-validate class="form-horizontal form-label-left" enctype = "multipart/form-data">
                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="name">Change Picture <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="file"  id="avatar" name="avatar" class="form-control col-md-7 col-xs-12" required >
																                              
                            </div>
                        </div>
						                   
                            </div>
                            <div class="panel-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
								<button type="submit" class="btn btn-success"><i class="icon-check icon-large"></i>&nbsp; Change Picture</button>
                            </div>
							</form>
                        </div>
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

                    
                    
