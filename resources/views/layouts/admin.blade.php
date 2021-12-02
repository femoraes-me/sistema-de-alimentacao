<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
</head>

<body id="page-top" class="fundo2 sidebar-toggled">
    <div id="app">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav fundo-barra sidebar sidebar-dark accordion toggled" id="accordionSidebar">

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block" />

                <!-- Nav Item - Home -->

                @if (Auth::user()->role == 'secretaria')
                    <li class="nav-item">
                        <a class="nav-link icon-white" href="{{ route('alimentos') }}">
                            <i class="fas fa-fw fa-home fa-2x"></i>
                            <span>Home</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link icon-white" href="{{ route('alimentos') }}">
                            <i class="fas fa-fw fa-home fa-2x"></i>
                            <span>Estoque de Alimentos</span>
                        </a>
                    </li>
                @endif


                <!-- Nav Item - Cadastrar alimentos / Consumo Diário -->
                @if (Auth::user()->role != 'secretaria')
                    <li class="nav-item">
                        <a class="nav-link icon-white" href="{{ route('escola.consumo.create') }}">
                            <i class="fas fa-fw fa-calendar-check fa-2x"></i>
                            <span>Consumo diário</span>
                        </a>
                    </li>
                @endif

                <!-- Nav Item - Cadastrar cardapio do dia -->
                @if (Auth::user()->role != 'secretaria')
                    <li class="nav-item">
                        <a class="nav-link icon-white" href="{{ route('escola.cardapio.create') }}">
                            <i class="fas fa-fw fa-coffee fa-2x"></i>
                            <span>Cardápio do dia</span>
                        </a>
                    </li>
                @endif

                <!-- Nav Item - escola -->

                @if (Auth::user()->role == 'secretaria')
                    <li class="nav-item">
                        <a class="nav-link icon-white" href="{{ route('secretaria.escolas.index') }}">
                            <i class="fas fa-fw fa-school fa-2x"></i>
                            <span>Escolas</span>
                        </a>
                    </li>
                @endif


                <!-- Nav Item - Sair -->

                <li class="nav-item">
                    <a class="nav-link icon-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-fw fa-door-closed fa-2x"></i>
                        <span>Sair</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block" />

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Page Heading -->
                @yield('pageHeading')
                @yield('content')
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/secretaria/escolas/index.js') }}"></script>
    @yield('scripts')
</body>

</html>
