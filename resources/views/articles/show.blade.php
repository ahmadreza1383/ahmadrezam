@extends('layouts.app')
@section('head')
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
                                            <a href="category" target="_self">{{$category->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr style="border-top: hidden">
                                <td>OTHER CATEGORIES<br>
                                    <ul>
                                        <li>
                                            <a href="http://127.0.0.1:82/panel/articles/9440714/Category1" target="_self">&nbsp;Category 1</a>
                                        </li>
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
