@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- lista de questões --}}
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                {{--
                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Questions
                </div>

                <div class="w-full p-6">
                    @foreach ($questions as $question)
                        <a href="#" class="flex justify-between mb-4 p-6 text-gray-900 border border-gray-100 rounded">
                            <div class="flex">
                                @if ($question->image)
                                    <!--
                                    <img src="{{ asset('storage/'.$question->image) }}" alt="{{ $question->title }}" width="75" class="pr-6">
                                    -->
                                @endif

                                <span class="font-bold">{{ ucfirst($question->title) }}</span>
                            </div>

                            <div class="text-center">
                                <span class="text-gray-500 text-xs">{{ $question->user->name }}</span>

                                <!--
                                <form action="/questions/{{ $question->id }}" method="post" class="pt-4">
                                    @csrf
                                    @method('delete')

                                    @if (auth()->user()->id == $question->user_id)
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs p-0">excluir pergunta</button>
                                    @endif
                                </form>
                                -->
                            </div>
                        </a>
                    @endforeach
                </div> --}}
            </div><!-- /flex -->

        </div>
    </div>
@endsection
