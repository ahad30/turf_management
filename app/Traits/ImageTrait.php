<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Str;

trait ImageTrait
{
    /*
    | upload image
    |
    | Request $request
    | input field name = "image"        // "Input field name"
    | path = "/uploads/categories"      // public/uploads/categories
    |
    |*/
    public function imageUpload($request, string $inputField, string $path)
    {
        if ($request->file($inputField)) {
            $file = $request->file($inputField);
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . "-" . Str::random(8) . '.' . $extension;
            $file->move(public_path($path), $filename);

            $file_path = $path . "/" . $filename;
            return $file_path;
        }
        return null;
    }

    // upload multiple image
    public function multipleImageUpload($request, string $inputField, string $path)
    {
        try {
            $imagePaths = [];
            $allowedFileExtension = ['jpg', 'png', 'jpeg'];
            if ($request->hasFile($inputField)) {
                foreach ($request->file($inputField) as $image) {
                    $extension = $image->getClientOriginalExtension();
                    $check = in_array($extension, $allowedFileExtension);
                    if ($check) {
                        $imageName = time() . rand(1, 99) . '.' . $extension;
                        $image->move(public_path($path), $imageName);

                        $file_path = $path . "/" . $imageName;
                        $imagePaths[] = $file_path;
                    }
                }
            }
            return $imagePaths;
        } catch (\Exception $th) {
            session()->flash("warning", "Image format is not valid");
            throw new Exception('Image format is not valid');
        }
    }
}
