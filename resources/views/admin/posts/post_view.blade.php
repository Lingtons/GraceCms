@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Post View</div>

                <div class="panel-body">
				<h2> 
<a href="{{ route('posts.index')}}" class="btn btn-primary btn-xs"> <i class="icon-chevron-left" title="Go back"></i> Back </a>

					<a href="{{route('posts.create')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i><i class="icon-plus" title="Edit"></i> <i class="icon-file" title="Add"></i> Create New Post </a>
				</h2>
                <table class="table table-striped table-bordered">
                        <thead>
                            @if(count($post))
                            <tr>
								<th style = "width:1%; text-align:center;">Action</th>
								<th> 
  
<a href="#modal-view-avatar{{$post->id}}" class="btn btn-info btn-xs" data-hover="tooltip" data-placement = "top" data-target = "#modal-view-avatar{{$post->id}}" data-toggle = "modal"><i class="icon-camera" title="view image"></i> </a>
								
									<a href="{{ url('admin/add_lesson', ['id' => $post->id]) }}" class="btn btn-info btn-xs"><i class="icon-plus" title="Edit"></i> Add Lesson ({{count($post->lessons)}})</a>
                                    
									
                                
									<a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-info btn-xs"><i class="icon-pencil" title="Edit"></i> </a>
                                  <form style="display: inline;" method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs"><i class="icon-trash" title="Delete"></i></button>
                    </form>
									
                                
								<div id = "modal-view-avatar{{$post->id}}" class="modal panel panel-default col-md-4" >
                            <div class="panel-heading">
                                Post Avatar
                            </div>
							<div class="panel-body">
							<img style = "align:center;" src = "{{ asset('images/' . $post->avatar)}}">

							<form method="post" action = "{{ url('admin/update_avatar', ['id' => $post->id]) }}" data-parsley-validate class="form-horizontal form-label-left" enctype = "multipart/form-data">
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
								</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                <table  class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Body</th>

							
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($post))
                            
                            <tr>
                             <td>{!!html_entity_decode($post->body)!!}</td>    
                                
                            </tr>
							
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    
                    
