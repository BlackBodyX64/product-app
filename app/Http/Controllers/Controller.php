<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataTable($request, $model, $col)
    {
        $columns = $request->input('columns');
        $length = $request->input('length');
        $order = $request->input('order');
        $search = $request->input('search');
        $start = $request->input('start');
        $page = $start / $length + 1;

        // $col = array('id', 'username', 'fname', 'lname', 'tel');

        // $d = Member::select($col)
        //     ->orderby($col[$order[0]['column']], $order[0]['dir']);

        $d = $model->orderby($col[$order[0]['column']], $order[0]['dir']);

        if ($search['value'] != '' && $search['value'] != null) {
            foreach ($col as &$c) {
                $d->orWhere($c, 'LIKE', '%' . $search['value'] . '%');
            }
        }

        $table = $d->paginate($length, ['*'], 'page', $page);

        return response()->json($table);
    }
}
