@extends('layouts.app')

@section('main')
<div class="container-fluid p-0">
    <!-- About-->
    <section >
        <ul class="list-group" style="border-radius: 0px">
            <li class="list-group-item active">Panel Sections</li>
            <li class="list-group-item">
                <a href="panel/about-me">About me</a>
            </li>
            <li class="list-group-item">
                <a href="panel/articles">Articles</a> /
                <a href="panel/article-categories"> Categories</a>
            </li>
            <li class="list-group-item">Projects</li>
            <li class="list-group-item">Funs</li>
            <li class="list-group-item">Galleries</li>
            <li class="list-group-item">Notes</li>
            <li class="list-group-item" style="padding: 0px">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                   <input class="btn btn-link" value="logout" type="submit">
                </form>
            </li>
          </ul>
    </section>
</div>

@endsection


