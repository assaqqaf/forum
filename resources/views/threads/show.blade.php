@extends('layouts.app')

@section('title', 'View: '.$thread->title)

@section('content')
<div class="flex items-center mb-6">
    <div class="md:w-1/2 md:mx-auto">
        <div class="rounded overflow-hidden shadow-lg bg-white">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ title_case($thread->title) }}</div>
            <p class="text-sm text-grey-dark flex items-center">
                <svg class="fill-current text-grey w-3 h-3 mr-2" viewBox="0 0 20 20">
                    <path d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"/>
                </svg>

                {{ $thread->created_at->diffForHumans() }}

                <svg class="fill-current text-grey w-3 h-3 mr-2 ml-3" viewBox="0 0 20 20">
                    <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z"/>
                </svg>

                {{ $thread->author->name }}
            </p>
            <p class="text-grey-darker text-base mt-4">
            {!! nl2br($thread->body) !!}
            </p>
        </div>
        <div class="px-6 py-4">
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#first-tag</span>
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#second-tag</span>
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#last-tag</span>
            @if($thread->isAuthor(auth()->user()))
            <a href="{{ url('threads/'.$thread->slug.'/edit') }}" class="bg-transparent hover:bg-grey text-grey-darkest text-sm font-bold py-2 px-4 rounded inline-flex items-center float-right">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
                <span>Update</span>
            </a>
            @endif
        </div>
        </div>
    </div>
</div>

<div class="flex items-center mb-6">
    <div class="md:w-1/2 md:mx-auto">
        <h3 class="text-grey-dark">Answers (<span class="text-grey-darker">{{ $thread->answers->count() }}</span>)</h3>
    </div>
</div>

@foreach($thread->answers as $post)
<div class="flex items-center mb-6">
    <div class="md:w-1/2 md:mx-auto">
        <div class="rounded overflow-hidden shadow-lg bg-white">
            <div class="px-6 py-4">
                <p class="text-grey-darker text-base mt-4">
                {!! $post->body !!}
                </p>
                <p class="text-sm text-grey-dark flex items-center mt-4">
                    <svg class="fill-current text-grey w-3 h-3 mr-2" viewBox="0 0 20 20">
                        <path d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"/>
                    </svg>

                    {{ $post->created_at->diffForHumans() }}
                    <svg class="fill-current text-grey w-3 h-3 mr-2 ml-3" viewBox="0 0 20 20">
                        <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z"/>
                    </svg>

                    {{ $post->author->name }}
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="flex items-center mb-6">
    <div class="md:w-1/2 md:mx-auto">
        <h3 class="text-grey-dark">Add Answers</h3>
    </div>
</div>

@if(Auth::check())
<div class="flex items-center mt-6">
    <div class="md:w-1/2 md:mx-auto">
        @if ($errors->any())
            <div class="bg-red-lightest border-l-4 border-red text-red-dark p-4" role="alert">
                <p class="font-bold">Something went wrong!</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form class="w-full" method="post" action="{{ url('threads/'.$thread->slug.'/post') }}">
            {{ csrf_field() }}
            <div class="flex items-center border-b border-b-2 border-teal py-2">
                <textarea class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2" type="text" placeholder="Write here..." name="body"></textarea>
                <button class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                Post
                </button>
            </div>
        </form>
    </div>
</div>
@else
<div class="flex items-center mt-6">
    <div class="md:w-1/2 md:mx-auto">
    <div class="flex items-center bg-blue text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>Please <a href="{{ url('login') }}">sign in</a> or <a href="{{ url('register') }}">create an account</a> to participate in this conversation.</p>
        </div>
    </div>
</div>
@endif
@endsection
