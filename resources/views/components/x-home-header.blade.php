<!-- resources/views/components/x-home-header.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liberu Genealogy - Home</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid" style="background-image: url('build/assets/images/hero-main-mobile.png');">
                <a class="navbar-brand" href="#">Liberu Genealogy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <!-- Add more navigation items as needed -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Add the rest of the component's HTML markup and logic here -->

    @livewireScripts
</body>
</html>
