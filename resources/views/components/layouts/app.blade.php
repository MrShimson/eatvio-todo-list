<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <style>
            #menu {
                position: absolute;
                overflow-y: scroll;
                top: inherit;
                height: 89.9438%;
            }
            .no-focus:focus {
                outline: none;
            }
            .bg-done {
                background-color: #ADEBB3;
            }
            .bg-cancel {
                background-color: #FFA0A1;
            }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class="p-3 bg-dark text-white">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/" class="nav-link px-2 text-light">Home</a></li>
                        <li><a href="/users" class="nav-link px-2 text-light">Users</a></li>
                        @auth
                            <li><a href="/dashboard" class="nav-link px-2 text-light">Dashboard</a></li>
                        @endauth
                    </ul>
                    <livewire:auth/>
                </div>
            </div>
        </header>


        <main class="container-fluid">
            {{ $slot }}
        </main>

        @livewireScripts
        @stack('livewire-scripts')
    </body>
</html>
