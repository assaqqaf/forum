@extends('layouts.app')

@section('title', 'Update a Thread')

@section('content')
<div class="flex items-center">
    <div class="md:w-1/2 md:mx-auto">
        <div class="rounded shadow">
            <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                Update a Thread
            </div>
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
            <form class="w-full" method="post" action="{{ url('/threads/'.$thread->slug) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="bg-white p-3 rounded-b">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide {{ $errors->has('title') ? 'text-red-dark' : 'text-grey-darker' }} text-xs font-bold mb-2" for="input-title">
                        Title
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border  rounded py-3 px-4 mb-3 {{ $errors->has('title') ? 'border-red-dark' : 'border-grey-lighter' }}" id="input-title" name="title" type="text" value="{{ $thread->title }}" />
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide {{ $errors->has('title') ? 'text-red-dark' : 'text-grey-darker' }} text-xs font-bold mb-2" for="input-title">
                        Slug
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border  rounded py-3 px-4 mb-3" id="input-title" name="title" type="text" value="{{ $thread->slug }}" disabled/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide {{ $errors->has('body') ? 'text-red-dark' : 'text-grey-darker' }} text-xs font-bold mb-2" for="input-body">
                        Body
                    </label>
                    <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border {{ $errors->has('body') ? 'border-red-dark' : 'border-grey-lighter' }} rounded py-3 px-4 mb-3 h-24" name="body" id="input-body">{{ $thread->body }}</textarea>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded float-right">
                        Update
                    </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
