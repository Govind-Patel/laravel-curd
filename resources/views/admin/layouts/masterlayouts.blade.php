
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    @include('admin.common.head')
   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    

        <!-- Sidebar -->
            @include('admin.common.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        
                <!-- Topbar -->
                @include('admin.common.topsidebar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
               @yield('page')
                <!-- /.container-fluid -->

             @include('admin.common.footer')

            @include('admin.common.footer_js')

</body>

</html>