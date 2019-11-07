<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class Service
{
    public function saveImg($request, $object)
    {
        $url = 'https://' . env('AWS_BUCKET') . '.s3-' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/';
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $object->update([
            "image" => $url . $filePath,
        ]);
    }
}
