<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title . " | Luthfi's Portofolio" ?? "Luthfi's Portofolio" }}</title>

    {{-- Include Bootstrap CSS --}}
    <link rel="stylesheet" href="/css/bootstrap.css">
    {{-- Include My Style CSS --}}
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @include('layouts.partials.navbar')

    {{-- Content --}}
    <div class="content-container">
        <div class="container">
            @yield('content')
        </div>
    </div>
    {{-- End Content --}}

    {{-- Include Bootstrap JavaScript --}}
    <script src="/js/bootstrap.bundle.js"></script>
</body>
</html>