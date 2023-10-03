@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive" style="padding-top:20px;">
            <a href="{{ route('panel.articles.create') }}" class="btn btn-primary" style=" color:white; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">New article</a>


            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                        <th scope="row"><a href="{{ route('panel.articles.edit', $article->article_code) }}">{{ $article->article_code }}</a></th>
                        <th scope="row">
                            @if (isset($article->category->name))
                                {{ $article->category->name }}
                            @else
                                {{__('Unknown')}}
                            @endif
                        </th>
                        <td>
                            <form id="form-request" action={{route("panel.articles.update", $article->article_code)}} method="POST">
                                <select class="form-control" name="status">
                                    @foreach (articleState() as $key => $state)
                                        <option value={{$key}}>{{ $state }}</option>
                                    @endforeach
                                </select>
                                @csrf
                                @method("put")
                                <div class="d-flex justify-content-end">
                                    <input class="form-control" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;" type="name" name="title" value="{{$article->title}}">
                                    <input class="btn btn-success submit-btn" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;" type="button" value="update">
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action={{route("panel.articles.destroy", $article->article_code)}} method="POST">
                                @csrf
                                @method("delete")
                                <input class="btn btn-danger" type="submit" value="delete">
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('sendForm')
<script type="text/javascript">
    $(".submit-btn").click(function() {
        var form = $(this).closest('form');
        var formData = form.serialize();
        var url = form.attr('action');
        sendForm(form, formData, url);
    });
</script>
@endsection


