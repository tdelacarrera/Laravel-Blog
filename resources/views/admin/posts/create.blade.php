<x-layouts::app>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.posts.index') }}">
            Posts
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Create
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{route('admin.posts.store')}}" method="POST" class="space-y-4">
            @csrf

            
            <flux:input label="Title" name="title" placeholder="Title" value="{{old('title')}}"/>
            <flux:input label="Slug" name="slug" placeholder="Slug" value="{{old('slug')}}"/>

            <flux:select name="category_id" label="category" placeholder="Choose category...">
                @foreach($categories as $category)
                <flux:select.option value="{{$category->id}}" :selected="$category->id == old('category_id')">{{$category->name}}</flux:select.option>
                @endforeach
            </flux:select>

            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">
                    Save Post
                </flux:button>
            </div>
        </form>
    </div>

</x-layouts::app>
