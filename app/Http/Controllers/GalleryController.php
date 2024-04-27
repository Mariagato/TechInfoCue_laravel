<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\InfoGalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;

class GalleryController extends Controller
{
    private $image;
    private $info;

    /**
     * GalleryController constructor.
     *
     * @param GalleryImage $image
     * @param InfoGalleryImage $info
     */
    public function __construct(GalleryImage $image, InfoGalleryImage $info)
    {
        $this->image = $image;
        $this->info  = $info;
    }

    /**
     * Guarda una imagen y su información asociada.
     * @return array
     * Created by  <Rhiss.net>
     */
    public function uploadImage($id = 0, Request $request)
    {
        if ($id == 0) {
            $gallery = Gallery::create(['name' => 'Gallery']);
            $id      = $gallery->id;
        }
        $sizes                    = ['b' => [900, 600], 's' => [180, 120]];
        $name                     = $this->image->uploadImage($request->file('file'), $sizes, 70);
        $image                    = $this->image->create(['gallery_id' => $id, 'filename' => $name]);
        $info['gallery_image_id'] = $image->id;
        $this->info->createLang($info);

        return [
            "gallery_id" => $id,
            "data"       => $image,
            "status"     => "success",
            "message"    => ""
        ];
    }

    /**
     * Actualiza la información asociada a una imagen.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by  <Rhiss.net>
     */
    public function editImage(Request $request)
    {
        $info = $request->info;
        $this->info->updateLang($info);

        return response()->json(['msj' => 'Imagen guardada']);
    }


    /**
     * Elimina una imagen y su información asociada.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by <Rhiss.net>
     */
    public function deleteImage($id)
    {
        $image = $this->image->find($id);
        $pathBig = public_path('upload/gallery/b' . $image->filename); // TODO prod_path() para produccion
        $pathSmall = public_path('upload/gallery/s' . $image->filename); // TODO prod_path() para produccion
        File::delete($pathBig,$pathSmall);

        return response()->json($image->delete());
    }

    /**
     * Obtiene una imagen dado su id.
     * Created by  <Rhiss.net>
     */
    public function getImage($id)
    {
        return response()->json($this->image->where('id', $id)->with('info')->first());
    }

    /**
     * Ordena las imágenes por posición.
     *
     * @param Request $request
     * Created by  <Rhiss.net>
     */
    public function orderImages(Request $request)
    {
        $array = $request->data;

        foreach ($array as $key => $item) {
            $this->image->find($item)->update(['position' => $key]);
        }

    }
}
