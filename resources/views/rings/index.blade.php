

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">Ring de {{ auth()->user()->name }}</h2>
{{--                        @dump($errors->get('mensaje'))--}}
{{--                    Captura los mensajes de error del campo mensaje. También podría escribir all() y capturaría los mensajes de todos los campos de haber más.--}}

                    <form action="{{route('rings.store')}}" method="POST">
                        @csrf
                        <textarea name="mensaje" id="mensaje" class="block w-full rounded-md mb-5 " placeholder="Intruduce tu  &quot;ring &quot;">{{old('mensaje')}}</textarea>
                        <x-input-error :messages="$errors->get('mensaje')"/>
{{--                       <span class="text-lg text-red-600">@error('mensaje'){{$message}}  @enderror</span><br>--}}
                        <x-primary-button class="mt-4">{{__('Ring')}}</x-primary-button>

                    </form>
                </div>
            </div>
            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                @foreach($rings as $ring)
                    <div class="p-6 flex space-x-2">
                        <svg class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"></path>
                        </svg>

                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800 dark:text-gray-200">
                                        {{ $ring->user->name }}

                                    </span>
                                    <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $ring->created_at->format('j M Y, g:i a') }}</small>
                                    @unless($ring->created_at->eq($ring->updated_at))
                                        <small class="text-sm text-gray-600 dark:text-gray-400"> &middot; {{ __('edited') }}</small>
                                    @endunless

                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $ring->mensaje }}</p>
                        </div>
                        @can('update', $ring)
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('rings.edit', $ring)">
                                       {{ __('Edit Ring') }}

                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('rings.destroy', $ring) }}">
                                        @csrf @method('DELETE')
                                        <x-dropdown-link :href="route('rings.destroy', $ring)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete Ring') }}
                                        </x-dropdown-link>
                                    </form>

                                </x-slot>
                            </x-dropdown>
                        @endcan

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

