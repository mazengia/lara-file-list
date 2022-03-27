@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif
@if($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
{{--<input type="text" class="form-controller" id="search" name="search">--}}
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>System</th>
        <th>URL</th>
        <th>User</th>
        <th>Database</th>
        <th>Status</th>
        <th>Developer</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $user->name }}</td>
            <td><a href="{{ $user->url }}" target="_blank">{{ $user->url }}</a></td>
            <td>{{ $user->user }}</td>
            <td>{{ $user->database }}</td>

            <td
                @if($user->status=="running") style="color: green;" @endif
            @if($user->status!="running") style="color: red" @endif>
                <b>{{ $user->status }}</b>
            </td>
            <td>{{ $user->developer }}</td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#id{{$user->id}}">
                    Edit
                </button>
                <!-- Modal -->
                <div class="modal fade" id="id{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="static_BackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="static_BackdropLabel">update list of systems</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form method="POST" action="update_system">
                                @csrf
                                <input hidden="hidden" name="id" value="{{$user->id}}">
                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ $user->name }}" required
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
                                               name="url" value="{{ $user->url }}" required
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
                                               value="{{ $user->developer }}"
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
                                        <input id="user"
                                               value="{{ $user->user }}"
                                               type="text" class="form-control"
                                               name="user" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="database"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Database') }}</label>
                                    <div class="col-md-6">
                                        <input id="database" TYPE="text"
                                               class="form-control @error('database') is-invalid @enderror"
                                               name="database" value="{{ $user->database }}" required
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
                                               name="status" value="{{ $user->status }}" required
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
                                    <button type="submit" class="btn btn-primary">{{ __('SaveChanges') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $users->links()}}

{{--<script type="text/javascript">--}}
{{--    $('#search').on('keyup', function () {--}}
{{--        $value = $(this).val();--}}
{{--        $.ajax({--}}
{{--            type: 'get',--}}
{{--            url: '{{URL::to('home')}}',--}}
{{--            data: {'search': $value},--}}
{{--            success: function (data) {--}}
{{--                $('tbody').html(data);--}}
{{--            }--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
{{--    $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});--}}
{{--</script>--}}


