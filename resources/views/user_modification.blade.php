@can('modify-users')
    <div class="bg-gray-400 p-4 rounded-lg mt-4">
        <div class="bg-gray-800 p-4 rounded-lg mt-8">
            <h1 class="text-white">User Management</h1>
            <table class="min-w-full bg-white">
                <thead>
                <!-- add option to sort user table alphabetically to view content easier -->
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
                        <!-- Adds a unicode arrow to show which direction the data is sorted in the table -->
                        <a href="{{ route('admin.index', ['sort' => 'name', 'direction' => request('direction', 'asc') == 'asc' ? 'desc' : 'asc']) }}">
                             {{'Name'}}
                            @if(request('sort') == 'name')
                                {!! request('direction') == 'asc' ? '&#9650;' : '&#9660;' !!}
                            @endif
                        </a>
                    </th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
                        <a href="{{ route('admin.index', ['sort' => 'email', 'direction' => request('direction', 'asc') == 'asc' ? 'desc' : 'asc']) }}">
                            {{'Email'}}
                            @if(request('sort') == 'email')
                                {!! request('direction') == 'asc' ? '&#9650;' : '&#9660;' !!}
                            @endif
                        </a>
                    </th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
                        <a href="{{ route('admin.index', ['sort' => 'role', 'direction' => request('direction', 'asc') == 'asc' ? 'desc' : 'asc']) }}">
                            {{'Role'}}
                            @if(request('sort') == 'role')
                                {!! request('direction') == 'asc' ? '&#9650;' : '&#9660;' !!}
                            @endif
                        </a>
                    </th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="py-3 px-4">{{ $user->name }}</td>
                        <td class="py-3 px-4">{{ $user->email }}</td>
                        <td class="py-3 px-4">{{ $user->role->name }}</td>
                        <td class="py-3 px-4">
                            <!-- Edit user button -->
                            <a href="{{ route('admin.editUser', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <!-- Delete user button -->
                            <form action="{{ route('admin.destroyUser', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Pagination Links -->
            {{ $users->links() }}
        </div>
    </div>
    @endcan

    </div>
    </div>
