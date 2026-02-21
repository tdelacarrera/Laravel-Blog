<x-layouts::app>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.posts.index') }}">
            Posts
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Edit
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <img id="imgPreview" src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://www.google.com/imgres?q=no%20image&imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2Fa%2Fac%2FNo_image_available.svg%2F330px-No_image_available.svg.png&imgrefurl=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3ANo_image_available.svg&docid=fdpOxr8npfcozM&tbnid=qb3Zl7NBki5QRM&vet=12ahUKEwjQxI7UseiSAxUdkZUCHXlTKDIQnPAOegQIGBAB..i&w=330&h=330&hcb=2&ved=2ahUKEwjQxI7UseiSAxUdkZUCHXlTKDIQnPAOegQIGBAB'}}" alt="image">

            <input type="file" name="image" accept="image/*">
            
            <flux:input label="Title" name="title" placeholder="Title" value="{{old('title', $post->title)}}"/>
            <flux:input label="Slug" name="slug" placeholder="Slug" value="{{old('slug', $post->slug)}}"/>

            <flux:select name="category_id" label="category" placeholder="Choose category...">
                @foreach($categories as $category)
                <flux:select.option value="{{$category->id}}" :selected="$category->id == old('category_id', $post->category_id)">{{$category->name}}</flux:select.option>
                @endforeach
            </flux:select>

            <ul>
                @foreach($tags as $tag)
                    <li>
                        <label>
                            <input type="checkbox" name="tags[]" value= "{{$tag->id}}" @checked(old('tags',$post->tags->pluck('id')->contains($tag->id)))>{{$tag->name}}
                        </label>
                    </li>
                @endforeach
            </ul>
            

            <flux:textarea label="Resume" name="excerpt">{{old('excerpt', $post->excerpt)}}</flux:textarea>

            <flux:textarea label="Content" name="content" rows="16">{{old('content', $post->content)}}</flux:textarea>



            <flux:radio.group label="Status" name="is_published">
                <flux:radio 
                    value="1" 
                    label="Published"
                    :checked="old('is_published', $post->is_published) == 1"
                />

                <flux:radio 
                    value="0" 
                    label="Not Published"
                    :checked="old('is_published', $post->is_published) == 0"
                />
            </flux:radio.group>



            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">
                    Save Post
                </flux:button>
            </div>
        </form>
    </div>

</x-layouts::app>
