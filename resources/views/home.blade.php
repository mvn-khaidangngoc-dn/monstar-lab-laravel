@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                {{-- @can('create', App\Models\Post::class) --}}
                    <div class="card-header">
                        <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary">Create Post</a>
                    </div>
                {{-- @endcan --}}
                {{-- @can('viewAny', App\Models\Post::class) --}}
                    <div class="card-header">
                        <a href="{{ route('posts.list') }}" type="button" class="btn btn-danger">Index Post</a>
                    </div>
                {{-- @endcan --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
