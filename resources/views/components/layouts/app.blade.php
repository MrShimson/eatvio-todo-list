<!DOCTYPE html>
<html class="vw-100 vh-100 overflow-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

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
                            <li><a href="{{-- TODO: add link to My Todo Lists --}}" class="nav-link px-2 text-light">My Todo Lists</a></li>
                        @endauth
                    </ul>
                    <livewire:auth/>
                </div>
            </div>
        </header>

        <main class="my-3">
            <div class="row justify-content-start mb-3">
                <div class="col-5 px-5 w-25">
                    <h1 class="mb-0">{{ $title ?? 'Page Header'}}</h1>
                </div>
            </div>

            <hr>

            <div class="row justify-content-center mt-3">
                <div class="col-4 border border-2 rounded-3 m-5 p-5">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- SignIn Modal -->
        <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="signInModalBody" class="modal-body"></div>
                </div>
            </div>
        </div>

        <!-- SignUp Modal -->
        <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signUpModalLabel">Sign Up</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="signUpModalBody" class="modal-body"></div>
                </div>
            </div>
        </div>
    </body>

    @livewireScripts
    <script>
        let root = document.querySelector('[drag-root]')
        root.querySelectorAll('[drag-item]').forEach(el => {
            el.addEventListener('dragstart', e => {
                e.target.setAttribute('dragging', true)
            })

            el.addEventListener('dragenter', e => {
                e.target.classList.add('bg-secondary')

                e.preventDefault()
            })

            el.addEventListener('dragover', e => {
                e.preventDefault()
            })

            el.addEventListener('dragleave', e => {
                e.target.classList.remove('bg-secondary')
            })

            el.addEventListener('dragend', e => {
                e.target.removeAttribute('dragging')
            })

            el.addEventListener('drop', e => {
                e.target.classList.remove('bg-secondary')

                let draggingEl = root.querySelector('[dragging]')
                e.target.before(draggingEl)

                let component = Livewire.find(
                    e.target.closest('[wire\\:id]').getAttribute('wire:id')
                )

                let method = root.getAttribute('drag-root')
                let orderIds = Array.from(root.querySelectorAll('[drag-item]')).map(itemEl => itemEl.getAttribute('drag-item'))

                component.call(method, orderIds)
            })
        })
    </script>
</html>
