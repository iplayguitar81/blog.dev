@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Bowtiesoft</div>

                <div class="panel-body">
                   Welcome to Bowtiesofty.  This page is under development but should be up and running soon!  Check back soon for updates!
                </div>
            </div>
        </div>
    </div>



</div>



    <div class="uk-width-medium-1-3 uk-row-first">
        <div class="uk-panel"><img src="images/placeholder_400x250.svg" alt="Placeholder"></div>
    </div>
    <div class="uk-width-medium-2-3 uk-flex-middle">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
    <hr>


@foreach($posts as $item)
    {{-- */$x++;/* --}}
    <tr>
        {{--<td>{{ $x }}</td>--}}
        <td><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->body }}</td><td><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></td>
        @can('isAdmin')
            <td>
                <a href="{{ url('/posts/' . $item->id . '/edit') }}" class="uk-button uk-button-primary">Update</a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['/posts', $item->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::submit('Delete', ['class' => 'uk-button uk-button-danger']) !!}
                {!! Form::close() !!}
            </td>
        @endcan
    </tr>

    @endforeach
    </tbody>
    </table>
    <div class="pagination"> {!! $posts->render() !!} </div>




@endsection

