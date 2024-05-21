
<style>
    .dd-item {
        cursor: pointer;
        margin: 10px 0;
    }
    .dd-menu {
        text-align: center;
        border: none;
        background: rgba(0, 0, 0, 0.5);
    }
    /*.nav-link.dropdown-toggle::after {
        display: none;
    }*/
    .dd-link {
        cursor: pointer;
    }
    .dd-icon {
        font-size: 25px;
    }
</style>

<!-- header -->
<header>
    <div class="header">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="/"><img src="{{asset('assets')}}/images/logo.png" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/authors">Authors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/books">Books</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/categories">Categories</a>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle dd-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user-o dd-icon"></i>
                                        </a>
                                        <div class="dropdown-menu dd-menu">
                                            <a href="/user/profile" class="nav-link dd-item">Profile</a>
                                            <a href="/dashboard" class="nav-link dd-item">Dashboard</a>
                                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                                <a href="/admin" class="nav-link dd-item">AdminPanel</a>
                                            @endif
                                            <div style="border-top: 2px solid rgba(0, 0, 0, 0.4)"></div>
                                            <a id="logout" class="nav-link dd-item">Logout</a>
                                            <form id="logoutForm" action="{{ route('logout') }}" method="post" style="display: none;">
                                                @csrf
                                                <!-- You can include any additional form fields here if needed -->
                                            </form>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login">Login</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
                {{--<div class="col-md-2 d_none">
                    <ul class="email text_align_right">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownAuthors" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Authors
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownAuthors">
                            <a class="dropdown-item" href="/authors">All Authors</a>
                            <a class="dropdown-item" href="/authors/fiction">Fiction Authors</a>
                            <a class="dropdown-item" href="/authors/non-fiction">Non-Fiction Authors</a>
                        </div>
                        --}}{{--@if(\Illuminate\Support\Facades\Auth::check())
                            <li> <a href="/dashboard"> dashboard </a></li>
                        @else
                            <li> <a href="/login"> Login </a></li>
                        @endif--}}{{--
                        --}}{{--<li> <a href="Javascript:void(0)"> <i class="fa fa-search" style="cursor: pointer;" aria-hidden="true"> </i></a> </li>--}}{{--
                    </ul>
                </div>--}}
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#logout').click(function(event) {
            event.preventDefault();
            $('#logoutForm').submit();
        });
    });
</script>



