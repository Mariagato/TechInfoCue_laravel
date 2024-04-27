<?php

namespace App\Http\Controllers;

use App\Models\FileGallery;
use App\Models\File;
use App\Models\InfoFile;
use App\Models\InfoGalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as Filef;

class FileController extends Controller
{
    private $file;
    private $info;

    /**
     * FileController constructor.
     *
     * @param File $file
     * @param InfoGalleryImage $info
     */
    public function __construct(File $file, InfoFile $info)
    {
        $this->file = $file;
        $this->info = $info;
    }

    /**
     * Guarda un archivo y su información asociada.
     * @return array
     * Created by  <Rhiss.net>
     */
    public function uploadFile($id = 0, Request $request)
    {
        if ($id == 0) {
            $gallery = FileGallery::create(['name' => 'Gallery']);
            $id      = $gallery->id;
        }
        if ( ! $request->file('file')->isValid()) {
            return ["status" => "error", "message" => "Archivo inválido"];
        }
        $inputFile = $request->file('file');
        $ext       = $inputFile->getClientOriginalExtension();
        $name      = date('Ymdhis') . rand(0, 9) . '.' . $ext;
        $inputFile->storePubliclyAs('file/', $name, 'upload');

        $file            = $this->file->create(['gallery_id' => $id, 'filename' => $name]);
        $info['file_id'] = $file->id;
        $this->info->createLang($info);

        return [
            "gallery_id" => $id,
            "data"       => $file,
            "status"     => "success",
            "message"    => ""
        ];
    }

    /**
     * Actualiza la información asociada a un archivo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by  <Rhiss.net>
     */
    public function editFile(Request $request)
    {
        $info = $request->info;
        $this->info->updateLang($info);

        return response()->json(['msj' => 'Archivo guardado']);
    }


    /**
     * Elimina un archivo y su información asociada.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by <Rhiss.net>
     */
    public function deleteFile($id)
    {
        $file = $this->file->find($id);
        $path = public_path('upload/file/' . $file->filename); // TODO prod_path() para produccion
        Filef::delete($path);
        return response()->json($file->delete());
    }

    /**
     * Obtiene un archivo dado su id.
     * Created by  <Rhiss.net>
     */
    public function getFile($id)
    {
        return response()->json($this->file->where('id', $id)->with('info')->first());
    }

    /**
     * Ordena los archivos por posición.
     *
     * @param Request $request
     * Created by  <Rhiss.net>
     */
    public function orderFiles(Request $request)
    {
        $array = $request->data;

        foreach ($array as $key => $item) {
            $this->file->find($item)->update(['position' => $key]);
        }

    }
}
