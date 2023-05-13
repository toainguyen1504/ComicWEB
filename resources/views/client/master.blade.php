<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <!-- Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <!-- Favicons -->
    @stack('bootstrap')


    <link rel="stylesheet" href="{{ asset('viewAssets/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/main.css') }}">

    @stack('css')

    <link rel="icon" type="image/png" href="{{ asset('viewAssets/icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('viewAssets/icon/favicon-32x32.png') }}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Toai Nguyen">
    <title>SIEUPHAMTRUYEN</title>
</head>

<body class="body">

    @if (Session::has('success'))
        <div id="hide" class="overlay alert-overlay js_alert-overlay">
            <div class="close" onclick="HideAlert()">Close</div>
            <div class="alert alert-success"> 
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <!-- header -->
    @include('client.blocks.header')
    <!-- end header -->

    <!-- end section -->
    @yield('content_client')
    <!-- footer -->
    @include('client.blocks.footer')
    <!-- end footer -->

    <!-- JS -->


    <script src="https://kit.fontawesome.com/cee51eb4a2.js" crossorigin="anonymous"></script>

    <script src="{{ asset('viewAssets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/wNumb.js') }}"></script>
    <script src="{{ asset('viewAssets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/plyr.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/photoswipe.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/main.js') }}"></script>
    {{-- @stack('endbootstrap') --}}
    @stack('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var search = $(this).val();
                if (search.length >= 2) {
                    $.ajax({
                        url: "{{ route('ajax.search') }}",
                        type: "GET",
                        data: {
                            search: search
                        },
                        success: function(data) {
                            $('#search-results').html(data);
                        }
                    });
                } else {
                    $('#search-results').html('');
                }
            });
        });

        const myInput = document.getElementById("search");
        const btnSearch = document.getElementById("btn-search");
        const hrefSearch = document.getElementById("href-search");

        btnSearch.addEventListener("click", (event) => {
            // history.pushState({}, '', window.location.pathname);
            const userInput = myInput.value;
            var myLink = document.getElementById("href-search");
            myLink.href = myLink.href + "?key=" + userInput;
        });


        $(document).ready(function() {
            $('form').on('submit', function(event) {
                event.preventDefault(); // ngăn chặn hành vi mặc định của trình duyệt
                // Thực hiện các xử lý tìm kiếm ở đây
            });
        });

        window.onpopstate = function(event) {
            location.reload();
        };
    </script>

</body>

</html>
