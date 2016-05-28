@extends('layout')
@section('title', 'Post CSV Upload')
@section('content')

  <h1>File Upload...... Coming soon.....</h1>

  {!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}
      <div class="">
          <input type="file" name="csv-file" id="csv-file"/>
      </div>
  </div>

  {{csrf_field()}}

  {!! Form::submit('Upload CSV', ['class' => 'btn btn-success form-control']) !!}

  {!! Form::close() !!}


@endsection