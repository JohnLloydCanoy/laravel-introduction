<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StayNet - Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

</head>
<body class="antialiased bg-gray-50 font-[Instrument_Sans] text-gray-900">

    @guest
        <div class="min-h-screen flex flex-col items-center justify-center p-6">
            <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-10 text-center border border-gray-100">
                <h1 class="text-3xl font-semibold mb-4">Welcome to StayNet</h1>
                <p class="text-gray-500 mb-8">Please log in to access your property dashboard.</p>
                
                <div class="flex flex-col gap-3">
                    <a href="#{{ route('login') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-3 bg-gray-50 hover:bg-gray-100 text-gray-700 font-medium rounded-lg border border-gray-200 transition">
                            Create an Account
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endguest

    @auth
        <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shadow-sm">
            <div class="text-xl font-semibold text-blue-600">StayNet Admin</div>
            
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">Welcome back, <span class="font-semibold">{{ Auth::user()->name }}</span></span>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm px-4 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-md transition">
                        Log Out
                    </button>
                </form>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto p-6 mt-6">
            <h2 class="text-2xl font-semibold mb-6">Overview</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <div class="text-sm text-gray-500 mb-1">Total Boarding Houses</div>
                    <div class="text-3xl font-semibold">12</div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <div class="text-sm text-gray-500 mb-1">Active Tenants</div>
                    <div class="text-3xl font-semibold">48</div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <div class="text-sm text-gray-500 mb-1">Available Rooms</div>
                    <div class="text-3xl font-semibold text-green-600">7</div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-medium">Recent Inquiries</h3>
                </div>
                <div class="p-6 text-sm text-gray-600">
                    <p class="mb-2 flex justify-between border-b border-gray-50 pb-2">
                        <span>New message regarding Room 204</span> <span class="text-gray-400">2 mins ago</span>
                    </p>
                    <p class="mb-2 flex justify-between border-b border-gray-50 pb-2">
                        <span>Payment received from Tenant #892</span> <span class="text-gray-400">1 hour ago</span>
                    </p>
                    <p class="flex justify-between">
                        <span>Maintenance request: Leaky faucet</span> <span class="text-gray-400">3 hours ago</span>
                    </p>
                </div>
            </div>
        </main>
    @endauth

</body>
</html>
