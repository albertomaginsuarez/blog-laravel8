@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')


<div id="wrapper">
	<div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>	
        <form method="POST" action="/articles/{{$article->id}}">
            @csrf
            @method("PUT")
            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="{{$article->title}}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="title">Exerpt</label>
                <div class="control">
                    <textarea class="textarea" name="exerpt" id="exerpt">{{$article->exerpt}}</textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="title">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body">{{$article->body}}</textarea>
                </div>
            </div>
            <div class="field is-grouped">                
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-text" type="submit">Cancel</button>
                </div>
            </div>
        </form>
	</div>
</div>


@endsection