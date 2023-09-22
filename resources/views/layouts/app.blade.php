<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/profile.jpg') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href={{ asset('assets/css/styles.css') }} rel="stylesheet" />
        <!-- -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src={{asset("assets/js/editor-src/jquery.richtext.js")}}></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @yield('head')
        <title> Ahmadreza Bashari </title>
    </head>
    <body id="page-top">
        <!-- Navigation-->
            @include('layouts.navbar')
        <!-- Page Content-->
        <div class="container-fluid p-0">
            @yield('main')
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src={{asset("assets/js/scripts.js")}}></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @yield('script')
        @hasSection('sendForm')
            <script type="text/javascript">
                function sendForm(form, formData, url, method='POST'){
                    $.ajax({
                        url: url,
                        type: method,
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
                }
            </script>
        @endif
        @yield('sendForm')
    </body>
</html>

