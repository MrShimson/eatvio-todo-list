<div>
    <ul class="list-group" drag-root="reorderTodos">
        @foreach($todos as $todo)
            <livewire:todo :todo="$todo" :key="$todo['id']" />
            <a wire:click.prevent="deleteTodo($todo['id'])" href="#" class="d-inline text-decoration-none">
                <img style="width: 32px; height: 32px;" src="https://img.icons8.com/?size=100&id=G3ke6AwujrRv&format=png&color=000000" alt="Delete icon">
            </a>
        @endforeach
    </ul>
</div>
@push('livewire-scripts')
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
@endpush
