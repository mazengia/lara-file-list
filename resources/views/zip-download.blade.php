<table class="table table-bordered table-hover table-responsive">
    <thead>
    <tr>
        <th>File Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($file as $file_list)
        <tr>
            <td>{{$file_list->getFilename()}}</td>
            <td>
                <a href="files/110/{{$file_list->getFilename()}}" download
                   class="btn btn-large pull-right">
                    <i class="icon-download-alt"> </i> Download
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div style="margin-left: 80%">
<a href="{{ route('zip-download',['download-110'=>'zip']) }}" class="btn buttons-zip">Download all 110 db as Zip<i class="fas fa-file-download"></i></a>
</div>
