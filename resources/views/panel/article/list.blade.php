@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach ($list as $item)
                        <li class="list-group-item"></li>
                        <li class="list-group-item">
                            <a href={{route("panel.article.edit", $item->article_code)}}>
                                {{ $item->title }}
                            </a>
                            <form action={{route("panel.article.update", $item->article_code)}} method="POST">
                                @csrf
                                @method("put")
                                <input type="name" name="title" value="title">
                                <input type="submit" value="update">
                            </form>
                            <form action={{route("panel.article.destroy", $item->article_code)}} method="POST">
                                @csrf
                                @method("delete")
                                <input type="submit" value="delete">
                            </form>
                        </li>
                    @endforeach
                  </ul>      
            </div>

           <!-- Modal HTML embedded directly into document -->
            <div id="ex1" class="modal">
                <p>Thanks for clicking. That felt good.</p>
                <a href="#" rel="modal:close">Close</a>
            </div>
            
            <form action={{route("panel.article.create")}} method="POST">
                @csrf
                <p>title please</p>
                <input type="text" name="title" >
                <input type="submit" value="submit create article" >
            </form>
    </div>
</div>

@endsection


