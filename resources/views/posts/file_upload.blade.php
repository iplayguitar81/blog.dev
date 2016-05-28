@extends('layout')
@section('title', 'Post CSV Upload')
@section('content')

  <h1>File Upload...... Coming soon.....</h1>

  <div class="form-group">
      <div class="">
          <input type="csv-file" name="csv-file" id="file" onchange="readURL(this);"/>
      </div>
  </div>


@endsection