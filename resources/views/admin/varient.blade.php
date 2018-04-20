@extends('layouts.app')

@section('content')
    <div class="col-md-10">
        @if (Session::has('flash_message'))
            <div class="alert alert-success">{{session::get('flash_message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3><strong>Generate Product-varient</strong></h3></div>

                    <div class="panel-body">

                        {!! Form::open(['route'=>'add.key']) !!}
                        <div class="form-group">
                            <label class="col-md-8 control-label" for="category">Select Category</label>
                            <div class="col-md-8">
                                <select name="category_id" class="form-control">
                                    <option value=""> -- Select One --</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('name', 'varient name:', ['class' => 'control-label']) !!}
                                {{ Form::text('name',null , ['class' => 'form-control']) }}
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-8" style="margin-top: 25px">
                                {!! Form::submit('Generate product', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>

@endsection()