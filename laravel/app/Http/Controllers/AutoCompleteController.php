<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Jadwal;

class AutoCompleteController extends Controller
{
    public function autocompleteNama(Request $request)
    {
        if($request->get('query'))
            {
                $query = $request->get('query');
                $data = DB::table('jadwals')->select('id','nama')->where('nama', 'LIKE', "%{$query}%")->get();
                return response()->json($data);
            }
    }
}
