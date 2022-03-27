@extends('layouts.app')

@section('content')
    <div class="container" style="width: 100%">
        <div class="row justify-content-center">
            <div class="col-lg-24">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <!-- Button trigger modal -->
                        <div style="margin-left: 85%">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                Add new system
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add list of systems</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="save_system">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{ old('name') }}" required
                                                       autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="url"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('URL') }}</label>
                                            <div class="col-md-6">
                                                <input id="url" TYPE="url"
                                                       class="form-control @error('url') is-invalid @enderror"
                                                       name="url" value="{{ old('url') }}" required
                                                       autocomplete="url">
                                                @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="developer"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Developer') }}</label>
                                            <div class="col-md-6">
                                                <input id="developer" type="text"
                                                       class="form-control @error('developer') is-invalid @enderror"
                                                       name="developer" required autocomplete="new-developer">

                                                @error('developer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="user"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                                            <div class="col-md-6">
                                                <input id="user" type="text" class="form-control"
                                                       name="user" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="database"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Database') }}</label>
                                            <div class="col-md-6">
                                                <input id="database" TYPE="text"
                                                       class="form-control @error('database') is-invalid @enderror"
                                                       name="database" value="{{ old('database') }}" required
                                                       autocomplete="database">
                                                @error('database')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="status"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                                            <div class="col-md-6">
                                                <input id="status" TYPE="text"
                                                       class="form-control @error('status') is-invalid @enderror"
                                                       name="status" value="{{ old('status') }}" required
                                                       autocomplete="status">
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                {{__('Close')}}</button>
                                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            @include('layouts.system-list')
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
