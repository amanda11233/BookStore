<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
<li class = "nav-item">
<a class = "nav-link" href = "{{route('users.index')}}">Users</a>
</li>
<li class = "nav-item">
        <a class = "nav-link" href = "{{route('books.index')}}">Books</a>
        </li>
<li class = "nav-item">
    <a class = "nav-link" href = "{{route('authors.index')}}">Authors</a>
    </li>
    <li class = "nav-item">
        <a class = "nav-link" href = "{{route('languages.index')}}">Languages</a>
        </li>
        <li class = "nav-item">
            <a class = "nav-link" href = "{{route('categories.index')}}">Category</a>
            </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if(Auth::guard('admin')->user())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
         @endif
            </ul>
        </div>
    </div>
</nav>
