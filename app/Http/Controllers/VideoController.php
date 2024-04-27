<?php

namespace App\Http\Controllers;

use App\Models\InfoVideo;
use App\Models\Video;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VideoController extends Controller
{
    private $video;
    private $info;

    public function __construct(Video $video, InfoVideo $info)
    {
        $this->video = $video;
        $this->info  = $info;
    }

    /**
     * Guarda un vídeo y su información asociada.
     * Created by  <Rhiss.net>
     */
    public function upload($id = 0, Request $request)
    {
        $url  = $request->url;
        $type = 'none';
        if ((strpos($url, 'youtu'))) {
            if ((strpos($url, 'youtu.be/'))) {
                $base_url  = explode('youtu.be/', $url);
                $base_code = $base_url[1];
                $url       = 'https://www.youtube.com/watch?v=' . $base_code;
            }

            $base_url = explode('&feature', $url);
            $url      = $base_url[0];
            parse_str(parse_url($url, PHP_URL_QUERY), $response);
            $code  = $response['v'];
            $type  = 'youtube';
            $image = "http://img.youtube.com/vi/" . $code . "/0.jpg";

        } elseif (strpos($url, 'vimeo')) {
            $code = (int)substr(parse_url($url, PHP_URL_PATH), 1);
            $hash = @file_get_contents("http://vimeo.com/api/v2/video/$code.php");
            if ($hash !== false) {
                $hash  = unserialize($hash);
                $image = $hash[0]['thumbnail_large'];
                $type  = 'vimeo';
            }
        }

        if ($type != 'none') {
            if ($id == 0) {
                $videoGallery = VideoGallery::create(['name' => 'Video Gallery']);
                $id           = $videoGallery->id;
            }
            $video = $this->video->create([
                'gallery_id' => $id,
                'image'      => $image,
                'code'       => $code,
                'type'       => $type,
                'url'        => $url,
            ]);

            $info['video_id'] = $video->id;
            $this->info->createLang($info);

            $status  = 'success';
            $message = '';
        } else {
            $video   = null;
            $status  = 'error';
            $message = "La URL que ingresaste es inválida, por favor ingresa únicamente URLS de Youtube";
        }

        return [
            "video_id" => $id,
            "data"     => $video,
            "status"   => $status,
            "message"  => $message
        ];
    }

    /**
     * Elimina un vídeo y su información asociada.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by <Rhiss.net>
     */
    public function delete($id)
    {
        return response()->json($this->video->find($id)->delete());
    }

    /**
     * Actualiza la información asociada a un vídeo.
     *
     * @param Request $request
     *
     * @return array
     * Created by  <Rhiss.net>
     */
    public function edit(Request $request)
    {
        $info = $request->info;
        $this->info->updateLang($info);

        return response()->json(['msj' => 'Video guardado']);
    }

    /**
     * Obtiene un vídeo dado su id.
     * Created by  <Rhiss.net>
     */
    public function get($id)
    {
        return response()->json($this->video->where('id', $id)->with('info')->first());
    }

    /**
     * Ordenas los vídeos por posición.
     *
     * @param Request $request
     * Created by  <Rhiss.net>
     */
    public function order(Request $request)
    {
        $array = $request->get('data');

        foreach ($array as $key => $item) {
            $this->video->find($item)->update(['position' => $key]);
        }
    }
}
