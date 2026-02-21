<x-layouts::app>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Categories
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="mt-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold text-heading dark:text-white">Categories</h1>
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-blue-500 text-white  dark:bg-blue-500  rounded-md shadow  hover:bg-blue-700  dark:hover:bg-blue-400 transition">
                Add Category
            </a>
        </div>

        <div class="overflow-x-auto bg-neutral-primary-soft dark:bg-neutral-800">
            <table class="w-full text-sm text-left text-body dark:text-neutral-100">
                <thead class="bg-neutral-secondary-soft dark:bg-neutral-700 border-b border-default dark:border-neutral-600">
                    <tr>
                        <th class="px-6 py-3 font-medium">ID</th>
                        <th class="px-6 py-3 font-medium">Name</th>
                        <th class="px-6 py-3 font-medium text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="bg-white dark:bg-neutral-900 border-b border-default dark:border-neutral-700 hover:bg-neutral-primary-soft dark:hover:bg-neutral-800 transition">
                            <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $category->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 flex justify-center gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form class="delete-form" action="{{ route('admin.categories.destroy', $category) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($categories->isEmpty())
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No categories found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class='mt-4'>
        {{ $categories->links() }}
    </div>

    @push('js')
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const forms = document.querySelectorAll('.delete-form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                });
            });
        });

    });
    </script>
    @endpush

</x-layouts::app>
