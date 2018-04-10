@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post</div>

                <div class="panel-body">
                <h2> 
<a href="{{ route('posts.index')}}" class="btn btn-primary btn-xs"> <i class="icon-chevron-left" title="Go back"></i> Back </a>

                    <a href="{{route('posts.create')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i><i class="icon-plus" title="Edit"></i> <i class="icon-file" title="Add"></i> Create New Post </a>
                </h2>

                    <form method="post" action="{{ route('posts.update', ['id' => $post->id ]) }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$post->title}}" id="title" name="title"  class="form-control col-md-7 col-xs-12" required>
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
                        <option value="{{$post->category->id}}">{{$post->category->name}}</option>
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
						                      <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="body">Post Body <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea value="{{ Request::old('body') ?: '' }}" id="summernote" name="body" class="form-control col-md-7 col-xs-12" required> 
                                {!!html_entity_decode($post->body)!!}
                                </textarea>
                                @if ($errors->has('body'))
                                <span class="help-block">{{ $errors->first('body') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ddate') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" value="{!!html_entity_decode($post->ddate)!!}" id="ddate" name="ddate" class="form-control col-md-7 col-xs-12" required >
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
                        <option value="{{$post->color}}" selected>{{$post->color}}</option>
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

                        
                        <div class="pager"></div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Save Post Changes</button>
                            </div>
                        </div>
                    </form>
	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    
                    
