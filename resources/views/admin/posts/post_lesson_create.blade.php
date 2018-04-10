@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-10 col-md-offset-1">
            <div style = "padding:10px;"> @include('admin.partials.alerts')</div>
			<div class="panel panel-default">
			
                <div class="panel-heading">Post / Lesson View</div>

                <div class="panel-body">
				<h2> <a href="{{ route('posts.index')}}" class="btn btn-primary btn-xs"> <i class="icon-chevron-left" title="Go back"></i> Back </a> <a href="#datatable-buttons" class="btn btn-info btn-xs pull-right">  View Lessons Unders this Post <i class="icon-eye-open" title="View"></i></a></h2>
				<form method="post" action="{{ route('lesson.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('title') ?: '' }}" id="title" name="title" class="form-control col-md-7 col-xs-12" required autofocus>
								<input type="hidden" value="{{$post_id}}"  name="post_id" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('post_id'))
                                <span class="help-block">{{ $errors->first('post_id') }}</span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="body">Post Body <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea value="{{ Request::old('body') ?: '' }}" id="summernote" name="body" class="form-control col-md-7 col-xs-12" required> </textarea>
                                @if ($errors->has('body'))
                                <span class="help-block">{{ $errors->first('body') }}</span>
                                @endif
                            </div>
                        </div>
                                     <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Add Lesson</button>
                            </div>
                        </div>
                    </form>
					<div class = "pager"></div>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
								<th>Date Created</th>
								<th style = "width:1%; text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($post->lessons))
                            @foreach ($post->lessons as $row)
                            <tr>
                             <td>{{$row->title}}</td>
                                <td>{!!html_entity_decode($row->body)!!}</td>    
								<td>{{$row->created_at}}</td>    
								
								<td>
									<a href="#modal-edit-lesson{{$row->id}}" class="btn btn-info btn-xs" data-hover="tooltip" data-placement = "top" data-target = "#modal-edit-lesson{{$row->id}}" data-toggle = "modal"><i class="icon-pencil" title="Edit"></i> </a>
                                    <form style="display: inline;" method="POST" action="{{ route('lesson.destroy', ['id' => $row->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs"><i class="icon-trash" title="Delete"></i></button>
                    </form>
									
                                </td>
							<div id = "modal-edit-lesson{{$row->id}}" class="modal panel panel-default col-md-7" >
                            <div class="panel-heading">
                                Edit Lesson : {{$row->title}}
                            </div>
							<div class="panel-body">
                                <form method="post" action="{{ route('lesson.update', ['id' => $row->id ]) }}" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" value="{{$row->title}}" id="title" name="title" class="form-control col-md-7 col-xs-12" required >
								<input type="hidden" value="{{$row->id}}" id="lesson_id" name="lesson_id" class="form-control col-md-7 col-xs-12" required >
								                              
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="body">Post Body <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea value="{{ Request::old('body') ?: '' }}" id="summernotemodal" name="body" class="form-control col-md-7 col-xs-12" required> {!!html_entity_decode($row->body)!!}</textarea>
                                @if ($errors->has('body'))
                                <span class="help-block">{{ $errors->first('body') }}</span>
                                @endif
                            </div>
                        </div>
                    
                            </div>
                            <div class="panel-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
								<button type="submit" class="btn btn-success"><i class="icon-check icon-large"></i>&nbsp; Edit Lesson</button>
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
