<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{

    public function getAll()
    {
        $cities = DB::table('cities')
            ->select('cities.id', 'cities.name')
            ->orderBy('cities.name')
            ->get();
        return response()->json(compact('cities'));
    }

    public function getById($id)
    {
        $city = DB::table('cities')
            ->select('cities.id', 'cities.name')
            ->where('id', $id)
            ->first();
        return response()->json(compact('city'));
    }

    public function update(Request $request)
    {
        $city = DB::table('cities')
            ->where('cities.id', $request->get('id'))
            ->update([
                'updated_at' => Carbon::now(),
                'name' => $request->get('name')
            ]);
        return response()->json(compact('city'));
    }

    public function save(Request $request)
    {
        DB::table('cities')
            ->insert([
                [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'name' => $request->get('name')
                ]
            ]);
    }

    public function delete($id)
    {
        DB::table('cities')->where('id', $id)->delete();
    }

}
