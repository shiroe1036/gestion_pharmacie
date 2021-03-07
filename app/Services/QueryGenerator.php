<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class QueryGenerator
{
    public static function generator($table = '', $params = [])
    {
        $query = DB::table($table);

        if(array_key_exists("where", $params)){
            $query->where($params['where']);
        }

        if(array_key_exists('orwhere', $params)){
            $query->orWhere($params['orwhere']);
        }

        return $query;
    } 
}