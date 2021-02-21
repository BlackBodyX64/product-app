<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function tableProduct(Request $request)
    {
        $columns = $request->input('columns');
        $length = $request->input('length');
        $order = $request->input('order');
        $search = $request->input('search');
        $start = $request->input('start');
        $page = $start / $length + 1;

        $col = array('id', 'name', 'description', 'price', 'qty', 'exp');

        $d = Product::select($col)
            ->orderby($col[$order[0]['column']], $order[0]['dir']);

        if ($search['value'] != '' && $search['value'] != null) {
            foreach ($col as &$c) {
                $d->orWhere($c, 'LIKE', '%' . $search['value'] . '%');
            }
        }

        $table = $d->paginate($length, ['*'], 'page', $page);

        return response()->json($table);
    }
}
