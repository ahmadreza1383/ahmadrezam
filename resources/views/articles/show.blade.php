@extends('layouts.app')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.16.0/themes/prism.min.css" rel="stylesheet"/>

<title>{{$article->title}}</title>
@endsection

@section('main')
<div class="container-fluid p-0">
    <li class="list-group-item active"></li>

    <!-- About-->
    <section style="padding: 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    {!! $article->content !!}
                </div>
                <div class="col-xl-4">
                    <table class="table-1">
                        <tbody>
                            <tr>
                                <td>OTHER CATEGORIES<br>
                                    <ul>
                                        @foreach ($articleCategories as $category)
                                        <li>
                                            <a href="{{ route('articles.index') }}?name={{ $category->name }}" target="_self">{{$category->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr style="border-top: hidden">
                                <td>OTHER ARTICLES<br>
                                    <ul>
                                        @foreach ($articles as $article)
                                        <li>
                                            <a href="{{ route('articles.show', $article->article_code) }}" target="_self">{{ $article->title }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.16.0/prism.min.js"></script>

@endsection
