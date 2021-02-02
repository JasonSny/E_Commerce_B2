<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="theme-color" content="#7952b3">

    @yield('extra_meta')

    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('extra_script')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="{{ route('cart.index') }}"> Panier <span
                            class="badge badge-pill badge-dark"> {{ Cart::count() }} </span></a>
                    @include('partials.search')
                </div>
                <div class="col-4 text-center">
                    <img class="logo_Kingween" src=" {{ asset('images/kingween.png') }} ">
                    <a href="{{ route('products.index') }}" class="blog-header-logo text-dark"> Kingween </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @include('partials.auth')
                </div>
            </div>
        </header>
    </div>
    <main class="container">
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach (App\Category::all() as $category)
                    <a class="p-2 text-muted"
                        href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a>
                @endforeach
                <a class="p-2 text-muted" href="{{ route('products.index') }}">TOUS</a>
            </nav>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('watchOut'))
            <div class="alert alert-danger">
                {{ session('watchOut') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="mb-0 mt-0">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if (request()->input('q'))
            <h6> {{ $products->total() }} Résultat(s) de la recherche " {{ request()->q }}"</h6>
        @endif
        <div class="row mb-2">
            @yield('content')
        </div>
    </main><!-- /.container -->

    <footer class="blog-footer">
    </footer>

    @yield('extra_js')

</body>

</html>
