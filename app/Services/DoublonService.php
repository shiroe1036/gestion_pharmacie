<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DoublonService {

    /**
     * Find duplicate
     * @param string $table
     * @param array $constraint
     * @return object
     */
    public static function findDuplicate($table = '', $constraint = [])
    {
        $data = DB::table($table)
                    ->where($constraint)
                    ->first();
        
        return $data;
    }
}