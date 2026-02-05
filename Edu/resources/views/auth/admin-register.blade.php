<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register - EduTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-center text-purple-600 mb-6">Admin Registration</h2>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    @foreach ($errors->all() as $error) <div>{{ $error }}</div> @endforeach
                </div>
            @endif
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <button type="submit"
                    class="w-full bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700">Register</button>
                <p class="mt-4 text-center text-sm text-gray-600">
                    Already have an account? <a href="{{ route('admin.login') }}"
                        class="text-purple-600 hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>