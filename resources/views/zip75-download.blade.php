
@if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Error!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="save_75" style="margin-bottom: 20px" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" class="form-control-file" name="file[]" id="file" multiple="">

    <button type="submit" class="btn btn-primary">Upload Selected Files</button>
</form>
<table class="table table-bordered table-hover table-responsive">
    <thead>
    <tr>
        <th>File Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($files as $file_list)
        <tr>
            <td>{{$file_list->getFilename()}}</td>
            <td>
                <a href="files/75/{{$file_list->getFilename()}}" download
                   class="btn btn-large pull-right">
                    <i class="icon-download-alt"> </i> Download
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div style="margin-left: 80%">
    <a href="{{ route('zip-download',['download-75'=>'zip']) }}" class="btn buttons-zip">Download all 75 db as Zip<i class="fas fa-file-download"></i></a>
</div>
