<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search() {

        $query = strtolower(request()->query('q'));

        if(strlen($query === 0)) {
            return response()->json([
                'suggestions' => []
            ]);
        }

        $suggestions = User::whereAny([DB::raw('lower(name)'), DB::raw('lower(email)')], 'like', '%'.$query.'%')
                        ->limit(7)
                        ->get();

        return response()->json([
            'suggestions' => $suggestions
        ]);
    }
}
