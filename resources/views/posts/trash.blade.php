<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trash Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<div class="container mx-auto py-10 px-4">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            🗑 Trash Posts
        </h1>

        <a href="{{ route('posts.index') }}"
           class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded shadow">
            ← Back
        </a>
    </div>

    <!-- ✅ Success Message -->
    @if(session('success'))
        <div id="msg" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5 shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full">

            <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($posts as $post)
                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="py-3 px-4">{{ $post->id }}</td>

                    <td class="py-3 px-4 font-semibold">
                        {{ $post->title }}
                    </td>

                    <td class="py-3 px-4 flex justify-center gap-3">

                        <!-- Restore -->
                        <a href="{{ route('posts.restore', $post->id) }}"
                           class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded shadow transition">
                            Restore
                        </a>

                        <!-- Permanent Delete -->
                        <a href="{{ route('posts.forceDelete', $post->id) }}"
                           onclick="return confirm('Are you sure to delete permanently?')"
                           class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded shadow transition">
                            Delete
                        </a>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="3" class="text-center py-8 text-gray-500 text-lg">
                        🧹 Trash is empty
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

</div>

<!-- ✅ Auto Hide Success Message -->
<script>
    setTimeout(() => {
        let msg = document.getElementById('msg');
        if (msg) {
            msg.style.display = 'none';
        }
    }, 3000);
</script>

</body>
</html>