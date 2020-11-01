<div class="flex justify-center">
    <table class="table-auto">
        <thead>
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Popularity</th>
            <th class="px-4 py-2">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($snack as $s)
            <tr>

                <td class="border px-4 py-2">{{ $s->name }}</td>
                <td class="border px-4 py-2">{{ $s->popularity }}</td>
                <td class="border px-4 py-2">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                       href="{{ $s->path }}">Show</a>

                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                       href="{{ $s->path . '/edit' }}">Edit</a>

                    <form class="inline" method="post" action="{{ $s->path }}">
                        @method ('DELETE')
                        @csrf
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                                type="submit">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
