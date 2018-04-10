@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add a Booster</div>

                <div class="panel-body">
				<h2> <a href="{{route('booster.index')}}" class="btn btn-primary btn-xs"> <i class="icon-chevron-left" title="Edit"></i> Back </a></h2>
				<form method="post" action="{{ route('booster.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
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


						<div class="form-group{{ $errors->has('verse') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="verse">Bible Verse <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea value="{{ Request::old('verse') ?: '' }}" id="summernote" name="verse" class="form-control col-md-7 col-xs-12" required> </textarea>
                                @if ($errors->has('verse'))
                                <span class="help-block">{{ $errors->first('verse') }}</span>
                                @endif
                            </div>
                        </div>


                    <div class="form-group{{ $errors->has('confession') ? ' has-error' : '' }}">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="confession">Confession <span class="required" required >*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea value="{{ Request::old('confession') ?: '' }}" id="summernoteconfession" name="confession" class="form-control col-md-7 col-xs-12" required> </textarea>
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
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Create Booster</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
