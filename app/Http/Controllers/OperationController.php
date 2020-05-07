<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{

    public function getAll()
    {
        $operations = DB::table('operations')
            ->join('cities', 'cities.id', '=', 'operations.city_id')
            ->select('operations.id', 'operations.operation_date', 'operations.operation_time', 'operations.keyword', 'operations.keyword_description', 'operations.address', 'operations.address_addition', 'operations.message', 'operations.comment', 'cities.id AS city_id', 'cities.name')
            ->orderBy('operations.operation_date', 'DESC')
            ->orderBy('operations.operation_time', 'DESC')
            ->get();
        return response()->json(compact('operations'));
    }

    public function getById($id)
    {
        $operation = DB::table('operations')
            ->select('operations.id', 'operations.operation_date', 'operations.operation_time', 'operations.keyword', 'operations.keyword_description', 'operations.address', 'operations.address_addition', 'operations.message', 'operations.comment')
            ->where('operations.id', $id)
            ->first();
        return response()->json(compact('operation'));
    }

    public function update(Request $request)
    {
        $operation = DB::table('operations')
            ->where('operations.id', $request->get('id'))
            ->update([
                'updated_at' => Carbon::now(),
                'operation_date' => $request->get('operation_date'),
                'operation_time' => $request->get('operation_time'),
                'keyword' => $request->get('keyword'),
                'keyword_description' => $request->get('keyword_description'),
                'address' => $request->get('address'),
                'address_addition' => $request->get('address_addition'),
                'message' => $request->get('message'),
                'comment' => $request->get('comment'),
            ]);
        return response()->json(compact('operation'));
    }

    public function save(Request $request)
    {
        DB::table('operations')
            ->insert([
                [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'operation_date' => $request->get('operation_date'),
                    'operation_time' => $request->get('operation_time'),
                    'keyword' => $request->get('keyword'),
                    'keyword_description' => $request->get('keyword_description'),
                    'address' => $request->get('address'),
                    'address_addition' => $request->get('address_addition'),
                    'message' => $request->get('message'),
                    'comment' => $request->get('comment'),
                ]
            ]);
    }

    public function delete($id)
    {
        DB::table('operations')->where('operations.id', $id)->delete();
    }

}
