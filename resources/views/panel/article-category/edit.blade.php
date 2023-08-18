@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div style="padding-top: 10px">
            <h3>Edit category</h3>
            <div class="table-responsive" style="padding-top:20px;">
                {{-- <form id="form-request" action="{{ route('panel.article-categories.update', $articleCategory->id) }}">
                    @csrf
                    @method('put')
                    <div class="d-flex justify-content-end">
                        <input type="text" name="name" value="{{$articleCategory->name}}"  class="form-control" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;" id="formGroupExampleInput" placeholder="Category name">
                        <button type="button" class="btn btn-primary submit-btn" style=" color:white; border-top-left-radius: 0px; border-bottom-left-radius: 0px;" >New</button>
                    </div>
                </form> --}}

                <form id="form-request" action="{{ route('panel.article-categories.update', $category->id) }}">
                    @csrf
                    @method('put')
                    <input type="text" name="name" value="{{$category->name}}"  class="form-control" id="formGroupExampleInput" placeholder="Category name">
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
</div>

@endsection

@section('script')
<script type="text/javascript">
    let success = "The create category succesfully";
</script>

<script type="text/javascript">
    $('.submit-btn').click(function() {
    var form = $('#form-request');
    var formData = form.serialize();
    var url = form.attr('action');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(response, status) {
            if(response.success == true){
                if (response.message !== "") {
                    toastr.success(response.message);
                } else if (typeof success !== "undefined" && success !== "") {
                    toastr.success(success);
                } else {
                    toastr.success("The operation successfully");
                }
            } else {
                var decodedResponse = response.message;
                for (var key in decodedResponse) {
                    if (decodedResponse.hasOwnProperty(key)) {
                        toastr.error(decodedResponse[key]);
                    }
                }
            }
        },
        error: function(response, status) {
            if(response.success == false){
                console.log(response.message);
                var decodedResponse = response.message;
                for (var key in decodedResponse) {
                    if (decodedResponse.hasOwnProperty(key)) {
                        toastr.error(decodedResponse[key]);
                    }
                }
            } else {
                toastr.error('There is a Problem');
            }
        }
    });
    });
</script>
@endsection


