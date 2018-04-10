@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post</div>

                <div class="panel-body">
                <h2> 
<a href="{{ route('booster.index')}}" class="btn btn-primary btn-xs"> <i class="icon-chevron-left" title="Go back"></i> Back </a>

                    <a href="{{route('booster.create')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i><i class="icon-plus" title="Edit"></i> <i class="icon-file" title="Add"></i> Create New Booster </a>
                </h2>

                    <form method="post" action="{{ route('booster.update', ['id' => $booster->id ]) }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ $booster->title }}" id="title" name="title" class="form-control col-md-7 col-xs-12" required autofocus>
                                @if ($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('verse') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="verse">Bible Verse <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea value="{{ Request::old('verse') ?: '' }}" id="summernote" name="verse" class="form-control col-md-7 col-xs-12" required>
                                {!!html_entity_decode($booster->verse)!!}
                                 </textarea>
                                @if ($errors->has('verse'))
                                <span class="help-block">{{ $errors->first('verse') }}</span>
                                @endif
                            </div>
                        </div>


                    <div class="form-group{{ $errors->has('confession') ? ' has-error' : '' }}">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="confession">Confession <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea value="{{ Request::old('confession') ?: '' }}" id="summernoteconfession" name="confession" class="form-control col-md-7 col-xs-12" required>
                                {!!html_entity_decode($booster->confession)!!}
                                 </textarea>
                                @if ($errors->has('confession'))
                            <span class="help-block">{{ $errors->first('confession') }}</span>
                                @endif
                            </div>
                        </div>
                                                                <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">Color <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                        <select name = "color" class="form-control col-md-7 col-xs-12" required>
                        <option value="{{$booster->color}}" selected>{{$booster->color}}</option>
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
                                <button type="submit" class="btn btn-success">Save Booster Changes</button>
                            </div>
                        </div>
                    </form>
	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    
                    
