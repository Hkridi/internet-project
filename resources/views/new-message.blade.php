<style>
    h2 a {
        font-family: Cambria;
        margin-right: 20px;
        text-decoration: none;
        color: darkblue;
    }
    h2 a:hover {
        color: darkblue;
        text-decoration: none;
    }
</style>

<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a href="{{route('messages')}}">{{ __('Messages') }}</a>

        </h2>
    </x-slot>--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-new-message />
            </div>
        </div>
    </div>
</x-app-layout>
