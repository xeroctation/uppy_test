<?php

/**
 * Author:  Xeroctation
 */

namespace Xeroctation\Uppy\Http\Controllers;

use App\Models\Uppy;

class UppyController
{
    public function uploadImage(Request $request,Uppy $uppy)
    {
        $file_basis = json_decode($uppy->file_basis);
        $file_tech_spec = json_decode($uppy->file_tech_spec);
        $other_files = json_decode($uppy->other_files);
        $performer_file = json_decode($uppy->performer_file);
        $upload_to = config('uppy.upload_file');
        if ($request->hasFile('file_basis')) {
            $fileName = time() . '_' . $request->file_basis->getClientOriginalName();
            $filePath = $request->file('file_basis')
                ->move(public_path($upload_to), $fileName);

            $file_basis[] = $fileName;
        }
        if ($request->hasFile('file_tech_spec')) {
            $fileName = time() . '_' . $request->file_tech_spec->getClientOriginalName();
            $filePath = $request->file('file_tech_spec')
                ->move(public_path($upload_to), $fileName);

            $file_tech_spec[] = $fileName;
        }
        if ($request->hasFile('other_files')) {
            $fileName = time() . '_' . $request->other_files->getClientOriginalName();
            $filePath = $request->file('other_files')
                ->move(public_path($upload_to), $fileName);

            $other_files[] = $fileName;
        }
        if ($request->hasFile('performer_file')) {
            $fileName = time() . '_' . $request->performer_file->getClientOriginalName();
            $filePath = $request->file('performer_file')
                ->move(public_path($upload_to), $fileName);

            $performer_file[] = $fileName;
        }

        $uppy->file_basis = json_encode($file_basis);
        $uppy->performer_file = json_encode($performer_file);
        $uppy->file_tech_spec = json_encode($file_tech_spec);
        $uppy->other_files = json_encode($other_files);
        $uppy->update();
    }
}
