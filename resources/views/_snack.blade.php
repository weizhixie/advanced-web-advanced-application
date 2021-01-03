<div class="flex justify-center">
    <table class="table-auto">
        <thead>
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Popularity</th>
            <th class="px-4 py-2">Image</th>
            <th class="px-4 py-2">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($snack as $s)
            <tr>
                <td class="border px-4 py-2">{{ $s->name }}</td>
                <td class="border px-4 py-2">{{ $s->popularity }}</td>
                <td class="border px-4 py-2">
                    @if(is_null($s->snackImage) )
                        <img src="https://images.squarespace-cdn.com/content/v1/56c7a435f850827f409acdf7/1481844308759-V19M8Y0K8C7W0MMEMEFU/ke17ZwdGBToddI8pDm48kKXCml56unlbyP9EmZUaFWdZw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpwAoL0HpMvt-aUJwb8G9GlCLJEIDcroVSsalC8-PN33UeNTumcscIOppXcINos6j8M/image-asset.jpeg?format=1000w"
                             width="200" height="200">
                    @else
                        <img src="{{ asset('/storage/images/'.$s->snackImage) }}" width="200" height="200">
                    @endif
                </td>
                <td class="border px-4 py-2">

                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="{{ $s->path }}">Show</a>
                    @if(auth()->user()->id == $s->user_id)
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="{{ $s->path . '/edit' }}">Edit</a>
                    <form class="inline" method="post" action="{{ $s->path }}">
                        @method ('DELETE')
                        @csrf
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
