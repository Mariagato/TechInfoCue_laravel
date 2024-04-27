<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InfoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    private $category;
    private $info;

    /**
     * CategoryController constructor.
     *
     * @param Category $category
     * @param InfoCategory $info
     */
    public function __construct(Category $category, InfoCategory $info)
    {
        $this->category = $category;
        $this->info     = $info;

    }

    /**
     * Muestra una categoría en formato JSON.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by  <Rhiss.net>
     */
    public function get($id = 0)
    {
        return response()->json($this->category->where('id', $id)->with('info')->first());
    }

    /**
     * Muestra el formulario para editar o agregar una categoría.
     *
     * @param int $id
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by  <Rhiss.net>
     */
    public function edit($id = 0, Request $request)
    {
        $data = $request->dat;
        $info = $request->info;
        if ($id > 0) {
            $category  = $this->category->find($id);
            $parent_id = $category->parent;
            $category->update($data);
            $info['category_id'] = $category->id;
            $this->info->updateLang($info);
        } else {
            $dat['position']     = $this->category->where('parent', $data['parent'])->count();
            $category            = $this->category->create($data);
            $parent_id           = $category->parent;
            $info['category_id'] = $category->id;
            $this->info->createLang($info);
        }

        $parent = $this->category->find($parent_id);

        return $parent != null ? response()->json($parent) : response()->json(['id' => 0, 'level' => -1]);
    }

    /**
     * Muestra las categorías dado un tipo en formato JSON.
     *
     * @param int $id
     * @param string $type
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by  <Rhiss.net>
     */
    public function index($id = 0, $type = '')
    {
        $categories = $this->category->where(['parent' => $id, 'type' => $type, 'hide' => 0])->orderBy('position',
            'asc')->with('info')->get();
        $total      = $this->category->where(['parent' => $id, 'type' => $type, 'hide' => 0])->count();
        $parent     = $this->category->where('id', $id)->with('info')->first();

        return response()->json(['data' => $categories, 'total' => $total, 'parent' => $parent]);
    }

    /**
     * Elimina la información de una categoría de la bd.
     *
     * @param $id
     *
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function delete($id,Request $request)
    {
        $type   = $request->type;
        $used   = Category::checkCategory($type, $id);
        $status = 'error';
        if ($used == '') {
            Category::where('id', $id)->delete();
            $status = 'success';
        }

        return response()->json(['status' => $status, 'html' => $used]);
    }

    /**
     * Ordena las categorías.
     *
     * @param Request $request
     * Created by  <Rhiss.net>
     */
    public function order(Request $request)
    {
        $array = $request->get('data');

        foreach ($array as $key => $item) {
            $this->category->find($item)->update(['position' => $key]);
        }
    }

    /**
     * Almacena una imagen del modal de categoría.
     * @return \Illuminate\Http\JsonResponse
     * Created by <Rhiss.net>
     */
    public function uploadImage(Request $request)
    {
        $type  = $request->get('type');
        $sizes = ['b' => [100, 100], 's' => [50, 50]];
        $name  = $this->category->uploadImage($request->file('file'), $sizes, 70);

        return response()->json(['name' => $name, 'file' => asset('upload/category/s' . $name)]);
    }
}
