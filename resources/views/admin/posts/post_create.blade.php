@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
				<h2> <a href="{{route('posts.index')}}" class="btn btn-primary btn-xs"> <i class="icon-chevron-left" title="Edit"></i> Back </a></h2>
				<form method="post" action="{{ route('posts.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('title') ?: '' }}" id="title" name="title" class="form-control col-md-7 col-xs-12" required autofocus>
                                @if ($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Post Category <span class="required" required >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="category" name="category" class="form-control col-md-12 col-xs-12" required>
								<option value="">Select Category</option>
								@if(count($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
								</select>
                                @if ($errors->has('category'))
                                <span class="help-block">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('ddate') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" value="{{ Request::old('ddate') ?: '' }}" id="ddate" name="ddate" class="form-control col-md-7 col-xs-12" required >
                                @if ($errors->has('ddate'))
                                <span class="help-block">{{ $errors->first('ddate') }}</span>
                                @endif
                            </div>
                        </div>
                                                                <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">Color <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                        <select name = "color" class="form-control col-md-7 col-xs-12" required>
                            <option value="" selected>Select Color</option>
                            <option value="caution" >Caution</option>
                            <option value="favour">Favour</option>
                            <option value="health">Health</option>
                            <option value="peace">Peace</option>
                            <option value="protection">Protection</option>
                            <option value="success">Success</option>
                            <option value="wealth">Wealth</option>
    </select>
                                @if ($errors->has('color'))
                            <span class="help-block">{{ $errors->first('color') }}</span>
                                @endif
                            </div>
                        </div>    
<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Post Avatar <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" value="{{ Request::old('avatar') ?: '' }}" id="avatar" name="avatar" class="form-control col-md-7 col-xs-12" required >
                                @if ($errors->has('avatar'))
                                <span class="help-block">{{ $errors->first('avatar') }}</span>
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
                                <button type="submit" class="btn btn-success">Create Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
