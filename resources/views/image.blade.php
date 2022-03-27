@if ($message = Session::get('success'))
    <div class="success">
        <strong>{{ $message }}</strong>
    </div>
@endif

<form action="{{ url('store') }}" method="post" enctype="multipart/form-data">
    <p>
        <input type="file" name="profile_image" />
    </p>
    <button type="submit" name="submit">Submit</button>
    @csrf
</form>
