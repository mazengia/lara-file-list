<?php

namespace App\Http\Controllers;

use App\Models\systems_list;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use ZipArchive;

class system extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function saveSystem(Request $request): RedirectResponse
    {
        $systems_list = new systems_list;
        $systems_list->name = $request->name;
        $systems_list->url = $request->url;
        $systems_list->developer = $request->developer;
        $systems_list->user = $request->user;
        $systems_list->database = $request->database;
        $systems_list->status = $request->status;
        $result = $systems_list->save();
        if ($result) {
            return back()->with('success', 'Data Inserted successfully.');
        } else {
            return back()->with('error', 'Data is not Inserted.');
        }
    }

    function updateSystem(Request $request): RedirectResponse
    {
        $result = DB::table('system_management.systems_lists')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'url' => $request->url,
                'developer' => $request->developer,
                'user' => $request->user,
                'database' => $request->database,
                'status' => $request->status
            ]);
        if ($result) {
            return back()->with('success', 'Data Updated successfully.');
        } else {
            return back()->with('error', "  No changes on your data please try again");
        }

    }

    public function index(): Factory|View|Application
    {
        $users = DB::table('systems_lists')->orderBy('developer')->paginate(10);

        return view('home', ['msg' => "", 'users' => $users]);
    }

    public function downloadDBFile(): Factory|View|Application
    {  $file = File::files(public_path('files/110'));
        $files = File::files(public_path('files/75'));
        return View('file')->with(array('files' =>$files,'file' =>$file));
    }

    public function zipDownloadDb(Request $request): ?BinaryFileResponse
    {
        if ($request->has('download-110')) {
            $zip = new ZipArchive;
            $fileName = '110dbBackup.zip';
            if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
                $files = File::files(storage_path('files/110'));
                foreach ($files as $value) {
                    $relativeName = basename($value);
                    $zip->addFile($value, $relativeName);
                }
                $zip->close();
            }
            return response()->download(public_path($fileName));
        }
        if ($request->has('download-75')) {
            $zip = new ZipArchive;
            $fileName = '75dbBackup.zip';
            if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
                $files = File::files(public_path('files/75'));
                foreach ($files as $value) {
                    $relativeName = basename($value);
                    $zip->addFile($value, $relativeName);
                }
                $zip->close();
            }
            return response()->download(public_path($fileName));
        }
        return null;
    }


    function saveTo75(Request $request)
    {
        request()->validate([
            'file' => 'required'
        ]);

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path() . '/files/75/', $filename);
            }
        }

        return Redirect::to("file")
            ->withSuccess('Great! files has been successfully uploaded.');

    }

    public function in()
    {
        return view('image');
    }

    public function st(Request $request)
    {
        if($request->hasFile('profile_image')) {

            //get filename with extension
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;

            //Upload File to external server
//            Storage::disk('ftp')->put($filenametostore, fopen($request->file('profile_image'), 'r+'));
            Storage::disk('sftp')->download($filename);
            //Store $filenametostore in the database
        }

        return redirect('image')->with('success', "Image uploaded successfully.");
    }
}
