@extends('layouts.app')

@section('content')
<div class="container">
    <div class="blankdivider30"></div>

    <div class="row">
        <div class="span12">
		<div class = "pager"></div>
            
                
                    <h2>Confirm Delete Record <a href="{{route('drugs.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="pager"></div>
                
                <div class="x_content">
                    <p>Are you sure you want to delete <strong>{{$drug->name}}</strong></p>

                    <form method="POST" action="{{ route('drugs.destroy', ['id' => $drug->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Yes I'm sure. Delete</button>
                    </form>
                </div>
            
        </div>
    </div>
</div>
@stop


