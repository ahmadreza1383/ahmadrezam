@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive" style="padding-top:20px;">
            <form action={{route("panel.article.create")}} method="POST">
                @csrf
                <div class="d-flex justify-content-end">
                    <input class="form-control" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;" type="name" name="title" value="title">
                    <input class="btn btn-primary" style=" color:white; border-top-left-radius: 0px; border-bottom-left-radius: 0px;" type="submit" value="New article">
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Create at</th>
                    <th scope="col">Title</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                        <th scope="row">3</th>
                        <th scope="row">{{ $item->create_at }}</th>
                        <td>
                                <form action={{route("panel.article.update", $item->article_code)}} method="POST">
                                    @csrf
                                    @method("put")
                                    <div class="d-flex justify-content-end">
                                        <input class="form-control" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;" type="name" name="title" value="title">
                                        <input class="btn btn-success" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;" type="submit" value="update">
                                    </div>
                                </form>
                        </td>
                        <td>
                            <form action={{route("panel.article.destroy", $item->article_code)}} method="POST">
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


