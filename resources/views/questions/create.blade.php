@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xl">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Cadastrar Pergunta') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="/questions" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Pergunta') }}:
                            </label>

                            <input id="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('title') ? ' border-red-500' : '' }}" name="title" value="{{ old('title') }}" autofocus>

                            @if ($errors->has('title'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Descreva com detalhes sua pergunta') }}:
                            </label>

                            <textarea
                                id="body" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('body') ? ' border-red-500' : '' }}"
                                name="body" value="{{ old('body') }}">
                            </textarea>

                            @if ($errors->has('body'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('body') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Imagem') }}:
                            </label>

                            <input id="image" type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('image') ? ' border-red-500' : '' }}" name="image" value="{{ old('image') }}" autofocus>

                            @if ($errors->has('image'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('image') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Enviar Pergunta') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
