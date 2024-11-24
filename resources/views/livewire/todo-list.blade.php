<div>
    <h3 class="mb-3"> {{ $name }}</h3>
    <ul class="list-group" drag-root="reorder">
        @foreach($todos as $todo)
            <li wire:key="{{ $todo['id'] }}" draggable="true" drag-item="{{ $todo['id'] }}" class="list-group-item my-1 border border-2 rounded-3" >
                {{ $todo['name'] }}
            </li>
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
