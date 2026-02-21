<x-layouts::app>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.tags.index') }}">
            Tags
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Edit
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{route('admin.tags.update', $tag)}}" method="POST">
            @csrf
            @method('PUT')

            
            <flux:input label="Nombre" name="name" placeholder="tag name" value="{{old('name', $tag->name)}}"/>
            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">
                    Edit tag
                </flux:button>
            </div>
        </form>
    </div>

</x-layouts::app>
