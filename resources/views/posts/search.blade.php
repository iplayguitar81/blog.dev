@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')


<h1>Showing Results for '{{$search}}'.....</h1>

{{$results2}}



    @foreach($results2 as $result)

        <?

        $variable= strip_tags($result->body);
        $variable =substr($variable,0, 50);
        // $variable = (str_limit($item->body, 100));
        // $variable= htmlentities($variable);
        ?>


        <article>
        <h3><a href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">{{$result->title}}</a></h3>
        <p>Written by:
            @if($result->user_id != null)
                <? $author = App\User::find($result->user_id)->name; ?>

                {{$author}}
            @endif
        </p>
        <span class="text-lowercase">{{$result->created_at->format('M dS, Y')}}</span>
        <p>{{$result->user_id}}</p>
        <p>{{$variable}}</p>

    </article>
        <br/>
        <hr>

    @endforeach

{!! $results2->render() !!}

@endsection