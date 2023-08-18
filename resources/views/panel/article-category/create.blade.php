@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive" style="padding-top:20px;">
            <form id="form-request" action="{{ route('panel.article-categories.store') }}">
                @csrf
                <input type="text" name="name"  class="form-control" id="formGroupExampleInput" placeholder="Category name">
                <br>
                <label>parent category (optional)</label>
                <select  name="parent_id" id="" class="form-control">
                    <option selected>selected</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="button" class="btn btn-primary submit-btn" style=" color:white;" >New</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('sendForm')
<script type="text/javascript">
    let success = "The create category succesfully";

    $('.submit-btn').click(function() {
        var form = $('#form-request');
        var formData = form.serialize();
        var url = form.attr('action');
        sendForm(form, formData, url);
    });
</script>
@endsection


