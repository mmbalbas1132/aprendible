

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
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
        </div>
    </div>
</x-app-layout>

