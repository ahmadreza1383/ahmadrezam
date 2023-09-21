@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('errors'))
            @foreach (session()->get('errors') as $session)
                <p>{{ $session }}</p>
            @endforeach
        @endif

        @if(session()->has('error'))
          <p> {{ session()->get('error') }} </p>
        @endif


        <div class="table-responsive" style="padding-top:20px;">
            <form action="{{ route('panel.articles.store') }}" method="POST">
                @csrf
                <input type="text" name="title"  class="form-control" id="formGroupExampleInput" placeholder="Article title">
                <br>
                <label>category</label>
                <select  name="category_code" id="" class="form-control">
                    <option selected>selected</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->category_code}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary submit-btn" style=" color:white;" >New</button>
            </form>
        </div>
    </div>
</div>

@endsection
