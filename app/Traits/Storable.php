<?php namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait Storable
{

    /**
     * @param $file
     * @param $sizes
     * @param int $quality
     *
     * @return string
     * Created by <Rhiss.net>
     */
    public function uploadImage($file, $sizes, $quality = 100)
    {
        $img  = Image::make($file);
        $name = date('Ymdhis') . rand(0, 9) . '.png';
        foreach ($sizes as $key => $size) {
            $img->fit($size[0], $size[1], function ($constraint) {
                $constraint->upsize();
            });
            $img->save('upload/' . $this->path . '/' . $key . $name, $quality);
        }

        return $name;
    }

    /**
     * Created by <Rhiss.net>
     */
    public function deleteImage($name, $sizes)
    {
        foreach ($sizes as $size) {
            $path = public_path('upload/' . $this->path . '/' . $size . $name); // TODO prod_path() para produccion
            File::delete($path);
        }

        return '';
    }
}