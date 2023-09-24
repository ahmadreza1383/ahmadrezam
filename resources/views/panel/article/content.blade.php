@extends('layouts.app')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <textarea class="content" name="example"></textarea>
</div>

@endsection

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.16.0/themes/prism.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href={{asset("assets/css/site.css")}} >
    <link rel="stylesheet" href={{asset("assets/js/editor-src/richtext.min.css")}}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.16.0/prism.min.js"></script>

<script>
    $(document).ready(function() {
        var content = {!! json_encode($row->content) !!};
        $('.content').richText();
        $('.richText-editor').html(content)
    });

    function saveEditor() {

        var contact = $('.richText-editor').html();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var request = $.ajax({
            url: '{{route("panel.articles.update.content", $row->article_code)}}',
            method: 'PUT',
            data:
            {
                "content": contact,
            },
            success: function(data){
                // toastr.options.positionClass = 'toast-bottom-left';
                toastr.success('Your article has been successfully updated');
            }
        });
    }
</script>
@endsection
