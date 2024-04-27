<?php

namespace App\Http\Controllers;

use App\Models\InfoSlideImage;
use App\Models\Slide;
use App\Models\SlideImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;

class SlideController extends Controller
{
    private $image;
    private $info;


    /**
     * SlideController constructor.
     *
     * @param SlideImage $image
     * @param InfoSlideImage $info
     */
    public function __construct(SlideImage $image, InfoSlideImage $info)
    {
        $this->image = $image;
        $this->info  = $info;
    }

    /**
     * Muestra la vista para editar las imagenes de un slide.
     *
     * @param $id
     *
     * @return array
     * Created by  <Rhiss.net>
     */
    public function edit($id)
    {
        $reg['images']   = $this->image->where('slide_id', $id)->orderBy('position', 'asc')->get();
        $reg['message']  = session('message');
        $reg['slide_id'] = $id;

        switch ($id) {
            default:
                $tam       = '1920px ancho x 647px';
                $title     = 'Slide principal';
                $sub_title = 'Escritorio';
        }
        $reg['tam_gallery'] = $tam;
        $reg['title']       = $title;
        $reg['sub_title']   = $sub_title;

        return view('admin.slide', $reg);
    }

    /**
     * Muestra el mensaje de actualización de un slide.
     *
     * @param Request $request
     *
     * @return mixed
     * Created by <Rhiss.net>
     */
    public function update($id)
    {
        switch ($id) {
            default:
                $message = 'Slide guardado.';

        }
        session()->flash('message', $message);

        return redirect()->route('slides.edit_slide', ['id' => $id]);
    }

    /**
     * Guarda una imagen y su información asociada.
     * @return array
     * Created by  <Rhiss.net>
     */
    public function uploadImage($id = 0, Request $request)
    {
        if ($id == 0) {
            $slide = Slide::create(['name' => 'Slide']);
            $id    = $slide->id;
        }
        $sizes                  = ['b' => [900, 600], 's' => [180, 120]];
        $name                   = $this->image->uploadImage($request->file('file'), $sizes, 70);
        $image                  = $this->image->create(['slide_id' => $id, 'filename' => $name]);
        $info['slide_image_id'] = $image->id;
        $this->info->createLang($info);

        return [
            "slide_id" => $id,
            "data"     => $image,
            "status"   => "success",
            "message"  => ""
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
        if ($request->has('link')) {
            $this->image->where(['id' => $info['slide_image_id']])->update(['link' => $request->link]);
        }
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
        $image     = $this->image->find($id);
        $pathBig   = public_path('upload/slide/b' . $image->filename); // TODO prod_path() para produccion
        $pathSmall = public_path('upload/slide/s' . $image->filename); // TODO prod_path() para produccion
        File::delete($pathBig, $pathSmall);

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
