@extends('layout')
@section('title', 'Post CSV Upload')
@section('content')


    @if ($errors->any())
        <ul class="uk-alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
  <h1>File Upload...... Coming soon.....</h1>

  {!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}
      <div class="">
          <input type="file" name="csv-file" id="csv-file"/>
      </div>
  </div>

  {{csrf_field()}}
    <br/>
    <br/>

  {!! Form::submit('Upload CSV', ['class' => 'btn btn-success form-control']) !!}

  {!! Form::close() !!}


@endsection