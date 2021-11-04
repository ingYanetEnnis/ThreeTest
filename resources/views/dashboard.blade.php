@extends('layouts.app')
@section('content')

<body>
    <div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                             alt="Workflow">
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <a href="#" id="logout_facebook" class="group border-l pl-6 border-gray-200 hover:text-teal-600 flex items-center">
                                    Sign Out
                                    <svg aria-hidden="true" width="11" height="10" fill="none" class="flex-none ml-1.5 text-gray-400 group-hover:text-teal-600">
                                        <path d="M5.593 9.638L10.232 5 5.593.36l-.895.89 3.107 3.103H0v1.292h7.805L4.698 8.754l.895.884z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                  <h1 class="text-3xl font-bold text-gray-900">
              Welcome
            </h1>
        </div>
    </header>
    <div id="app">

    </div>
</div>

<script>
    window.user = {!! json_encode($user) !!};
</script>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ mix('/js/index.js') }}"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

@endsection
