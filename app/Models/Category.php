<?php

namespace App\Models;

use App\Traits\Storable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use Storable;

    protected $guarded = ['id'];
    protected $path = 'category';

    /**
     * Info de la categoría.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoCategory::class)->where('lang', \Lang::locale())->select(['category_id', 'name']);
    }

    /**
     * Comprueba si una categoría tiene atado un contenido, servicio o artículo.
     *
     * @param $type
     * @param $parent
     *
     * @return string
     * Created by <Rhiss.net>
     */
    public static function checkCategory($type, $parent)
    {
        $html = '';
        $list = self::where(['parent' => $parent, 'type' => $type])->orWhere(function ($query) use ($type, $parent) {
            return $query->where(['id' => $parent, 'type' => $type]);
        })->get();

        foreach ($list as $item) {
            switch ($type) {
                case 'content':
                    $list  = Content::where('category_id', $item->id)->pluck('id');
                    $route = 'contents.edit';
                    break;
                case 'article':
                    $list  = Article::where('category_id', $item->id)->pluck('id');
                    $route = 'articles.edit';
                    break;
                case 'service':
                    $list  = Service::where('category_id', $item->id)->pluck('id');
                    $route = 'services.edit';
                    break;
            }
            $html .= count($list) > 0 ? generate_list($list, $route) : '';

            if ($parent != $item->id && self::where(['parent' => $item->id, 'type' => $type])->count() > 0) {
                $html .= self::checkCategory($type, $item->id);
            }
        }

        return $html;
    }

    /**
     * Genera un menú completo de categorías según el tipo.
     *
     * @param $type
     * @param $parent
     *
     * @return string
     * Created by  <Rhiss.net>
     */
    public static function menu($type, $parent)
    {
        $html = '';
        $list = self::where(['parent' => $parent, 'type' => $type, 'hide' => 0])->orderBy('position',
            'asc')->with('info')->get();

        foreach ($list as $item) {
            switch ($type) {
                case 'content':
                    $content = Content::where('category_id', $item->id)->with('info')->first();
                    $route   = ($content != null) ? route('Content',
                        ['id' => $content->id, 'title' => chstr($content->info->title)]) : '#';
                    break;
                case 'article':
                    $route = route('blog', ['id' => $item->id, 'title' => chstr($item->info->name)]);
                    break;
                default:
                    break;
            }
            $html .= ($route != '#' or $parent == 0) ? '<li><a class="a-' . $parent . '" href="' . $route . '">' . $item->info->name . '</a>' : '<li>';

            if (self::where(['parent' => $item->id, 'type' => $type])->count() > 0) {
                $html .= '<ul class="ul-' . $parent . ' drop-down one-column hover-fade">' . self::menu($type,
                        $item->id) . '</ul>';
            }

            $html .= '</li>';

        }

        return $html;
    }

    /**
     * Genera un menú de nivel 1.
     *
     * @param $type
     * @param $parent
     *
     * @return string
     * Created by <Rhiss.net>
     */
    public static function menuIndividual($type, $parent, $is_active = 0)
    {
        $html     = '';
        $category = self::find($parent);
        $list     = self::where(['parent' => $parent, 'type' => $type])->orderBy('position',
            'asc')->with('info')->get();

        switch ($type) {
            case 'content':
                $content = Content::where('category_id', $parent)->with('info')->first();
                $route   = ($content != null) ? route('Content',
                    ['id' => $content->id, 'title' => chstr($content->info->title)]) : '#';
                $html    .= '<li><a href="' . $route . '" ' . ($is_active ? 'class="current"' : '') . '>' . $category->info->name . '</a>' . (count($list) > 0 ? '<ul class="drop-down one-column hover-fade">' : '');
                break;
            case 'article':
                $html .= '<li><a href="' . route('blog') . '"  ' . ($is_active ? 'class="current"' : '') . '>Noticias</a><ul class="drop-down one-column hover-fade">';
                break;
            default:
                break;
        }
        foreach ($list as $item) {
            switch ($type) {
                case 'content':
                    $content = Content::where('category_id', $item->id)->with('info')->first();
                    $route   = ($content != null) ? route('Content',
                        ['id' => $content->id, 'title' => chstr($content->info->title)]) : '#';
                    break;
                case 'article':
                    $route = route('blog', ['id' => $item->id, 'title' => chstr($item->info->name)]);
                    break;
                default:
                    break;
            }

            $html .= '<li><a href="' . $route . '">' . $item->info->name . '</a></li>';

        }
        $html .= (count($list) > 0 ? '</ul>' : '') . '</li>';

        return $html;
    }

    /**
     * Genera un menú de servicios.
     * @return string
     * Created by <Rhiss.net>
     */
    public static function menuServices($is_active = 0)
    {
        $html     = '';
        $html     .= '<ul class="drop-down one-column hover-fade">';
        $services = Service::orderBy('position')->get();
        foreach ($services as $service) {
            $html .= '<li><a href="' . route('Service', [
                    'id'    => $service->id,
                    'title' => chstr($service->info->title)
                ]) . '">' . $service->info->title . '</a></li>';
        }
        $html .= '</ul>';

        return $html;
    }

    /**
     * List a array with categories to print on select html element
     *
     * @param int $parent
     * @param $response
     * @param $type
     *
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public static function selectArray($parent = 0, $response, $type, $content_id = 0)
    {
        self::where([
            'parent' => $parent,
            'type'   => $type,
            'hide'   => 0
        ])->with('info')->orderBy('position')->get()->map(function (
            $item
        ) use (
            $response,
            $parent,
            $type,
            $content_id
        ) {

            if ($type == 'content') {
                $contents = Content::where('category_id', $item->id)->get();
                if ( ! empty($contents->first()) && $contents->first()->id == $content_id) {
                    $response->put($item->id, str_repeat(' · ', $item->level) . $item->info->name . ' (actual)');
                }
                if (count($contents) == 0) {
                    $response->put($item->id, str_repeat(' · ', $item->level) . $item->info->name);
                }
            } else {
                $response->put($item->id, str_repeat(' · ', $item->level) . $item->info->name);
            }


            // $response->put($item->id, str_repeat(' · ', $item->level) . $item->info->name);
            // $response->put($item->id, str_repeat(' · ', $item->level) . $item->info->name);
            self::selectArray($item->id, $response, $type, $content_id);
        });

        return $response->all();
    }

    /**
     * @param int $parent
     * @param $services
     * @param $type
     *
     * @return string
     * Created by <Rhiss.net>
     */
    public static function selectArrayMulti($parent = 0, $services, $type)
    {
        $current = [];

        foreach ($services as $service) {
            array_push($current, $service->id);
        }

        $html = '';
        $list = self::where(['parent' => $parent, 'type' => $type, 'hide' => 0])->with('info')->get();

        foreach ($list as $item) {
            $html .= '<option ' . (in_array($item->id,
                    $current) ? 'selected=""' : '') . ' value="' . $item->id . '">' . $item->info->name . '</option>';
        }

        return $html;
    }

    /**
     * @param int $parent
     * @param $services
     * @param $type
     *
     * @return string
     * Created by <Rhiss.net>
     */
    public static function selectArrayAccommodations($parent = 0, $services, $type, $default = '')
    {
        $current = [];

        foreach ($services as $service) {
            array_push($current, $service->id);
        }

        $html = '';
        $list = self::where(['parent' => $parent, 'type' => $type, 'hide' => 0])->with('info')->get();

        foreach ($list as $item) {
            $html           .= '<optgroup label="' . $item->info->name . '">';
            $accommodations = Accommodation::where('category_id', $item->id)->with('info')->select('id')->get();
            foreach ($accommodations as $key => $accommodation) {
                $html .= '<option value="' . $accommodation->id . '" ' . ($default == $accommodation->id ? 'selected' : '') . '>' . $accommodation->info->title . '</option>';
            }
            $html .= '</optgroup>';
        }

        return $html;
    }

}
