@extends('layouts.app')

@section('main')
<div class="container-fluid p-0">
    <!-- About-->
    <section >
        <ul class="list-group" style="border-radius: 0px">
            @if (isset($articles) && (count($articles) > 0))
                <li class="list-group-item active">Articles</li>

                @foreach ($articles as $article)
                    <li class="list-group-item"><a href="{{ route('articles.show', $article->article_code) }}">{{$article->title}}</a></li>
                @endforeach
            @endif

            <li class="list-group-item active">Sub article categories</li>
            @forelse ($nameArticleCategories as $category)
                <li class="list-group-item"><a href="{{ route('articles.index') }}?name={{ $category }}">{{$category}}</a></li>
            @empty
            <li class="list-group-item">There are currently no articles to display</li>
            @endforelse
          </ul>
    </section>
</div>

@endsection
