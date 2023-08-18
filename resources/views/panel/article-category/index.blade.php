@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive" style="padding-top:20px;">
            <a href="{{ route('panel.article-categories.create') }}" class="btn btn-primary" style=" color:white; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">New article category </a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
                </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                        <th scope="row">{{ $category->category_code }}</th>
                        <th scope="row">{{ $category->name }}</th>
                        <th scope="row">{{ $category->status }}</th>
                        <th>
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Options
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">View</a></li>
                                  <li><a class="dropdown-item" href="{{ route('panel.article-categories.edit', $category->id) }}">Update</a></li>
                                  <li>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </li>
                                </ul>
                              </div>
                        </th>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


