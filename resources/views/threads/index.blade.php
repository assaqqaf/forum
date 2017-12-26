@extends('layouts.app')

@section('title', 'Recent posts')

@section('content')
<div class="flex items-center mb-8">
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
    </div>
</div>

<div class="flex items-center mb-8">
    <div class="md:w-1/2 md:mx-auto">
    <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
            <p class="font-bold">Welecome to our Forum Platoform</p>
            <p class="text-sm">You can ask any question in your mind. Our community is very hlepfull, and you will findh the fast response.</p>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="flex items-center mb-6">
    <div class="md:w-1/2 md:mx-auto">
        <div class="rounded shadow">
            <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded">
                Recnet Posts
            </div>
        </div>
        <a href="{{ url('threads/create' )}}" class="bg-white hover:bg-grey-lightest no-underline text-blue font-semibold py-2 px-4 border border-grey-light rounded shadow float-right mt-2">
                <svg class="fill-current text-blue inline-block h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
                </svg>
                New Post
        </a>
    </div>
</div>

@foreach($threads as $thread)

<div class="flex items-center mb-6">
    <div class="md:w-1/2 md:mx-auto">
        <div class="rounded overflow-hidden shadow-lg bg-white">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"><a href="{{ url('threads/'.$thread->slug) }}">{{ $thread->title }}</a></div>
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
            {!! str_limit(nl2br($thread->body), 180, ' (...)') !!}
            </p>
        </div>
        <div class="px-6 py-4">
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#first-tag</span>
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#second-tag</span>
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#last-tag</span>
        </div>
        </div>
    </div>
</div>
@endforeach
@endsection
