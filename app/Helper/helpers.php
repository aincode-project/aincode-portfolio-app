<?php

use Illuminate\Support\Facades\File;

/** Upload File */
function handleUpload($inputName, $fileLocation, $model=null)
{
    try {
        if (request()->hasFile($inputName)) {
            if ($model && File::exists(public_path($model->{$inputName}))) {
                File::delete(public_path($model->{$inputName}));
            }

            $file = request()->file($inputName);
            $fileName = rand().$file->getClientOriginalName();

            $fileLocation = trim($fileLocation, '/') . '/';
            $file->move(public_path("/uploads/{$fileLocation}"), $fileName);

            $filePath = "/uploads/{$fileLocation}{$fileName}";

            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

/** Delete File */
function handelDelete(string $filePath)
{
    if (File::exists(public_path($filePath))) {
        File::delete(public_path($filePath));
    }
}

/** Get Dynamic Colors */
function getColor($index) {
    $colors = ['#558bff', '#fecc90', '#ff885e', '#282828', '#190844', '#9dd3ff'];

    return $colors[$index % count($colors)];
}
