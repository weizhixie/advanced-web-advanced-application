<div class="bg-blue-100 mb-4 px-4 py-4 border rounded border-gray-500">

    <div class="flex">

        <div class="w-1/2 my-auto">
            <h2 class="text-xl font-bold mb-2">
                {{ $s->name }}
            </h2>
            <p>
                Popularity: {{ $s->popularity }}
            </p>
        </div>

        <div class="w-1/4 my-auto">
            <div class="float-right" >
                <p class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <a href="{{ $s->path }}">Show</a>
                </p>

                <p class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <a href="{{ $s->path('edit') }}">Edit</a>
                </p>

                <form class="inline" method="post" action="{{ $s->path }}">
                    @method ('DELETE')
                    @csrf
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                            type="submit">Delete</button>
                </form>

            </div>
        </div>


    </div>
</div>
