<x-layouts::app>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.categories.index') }}">
            Categories
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Create
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white dark:bg-zinc-900 
         px-6 py-8 
        shadow-lg dark:shadow-zinc-950/40 
         rounded-lg 
         border border-zinc-200 dark:border-zinc-700">
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf

            
            <flux:input label="Name" name="name" placeholder="category name" value="{{old('name')}}"/>
            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">
                    Save category
                </flux:button>
            </div>
        </form>
    </div>

</x-layouts::app>
