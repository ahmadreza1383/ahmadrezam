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
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href={{asset("assets/css/site.css")}} >
    <link rel="stylesheet" href={{asset("assets/js/editor-src/richtext.min.css")}}>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src={{asset("assets/js/editor-src/jquery.richtext.js")}}></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('script')
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
            url: '{{route("panel.article.update.content", $row->article_code)}}',
            method: 'PUT',
            data: 
            {
                "content": contact,
            },
            success: function(data){
                alert(data);
            }
        });
    }
</script>
@endsection