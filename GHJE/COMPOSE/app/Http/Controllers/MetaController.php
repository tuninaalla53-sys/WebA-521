<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MetaController extends Controller
{
    public function tables()
    {
        $tables = ['actor', 'film', 'film_actor'];
        $result = [];

        foreach ($tables as $table) {
            $rowCount = DB::table($table)->count();
            $lastUpdate = DB::table($table)->max('last_update');

            $result[] = [
                'table' => $table,
                'rows' => $rowCount,
                'last_update_max' => $lastUpdate,
            ];
        }

        return response()->json($result);
    }

    public function schema($table)
    {
        $allowedTables = ['actor', 'film', 'film_actor'];
        
        if (!in_array($table, $allowedTables)) {
            return response()->json(['error' => 'Table not found'], 404);
        }

        $columns = Schema::getColumns($table);
        $indexes = Schema::getIndexes($table);

        $columnsData = [];
        foreach ($columns as $column) {
            $columnsData[] = [
                'name' => $column['name'],
                'type' => $column['type'],
                'nullable' => $column['nullable'],
                'default' => $column['default'],
                'key' => $this->getKeyType($column['name'], $indexes),
            ];
        }

        return response()->json(['columns' => $columnsData]);
    }

    private function getKeyType($columnName, $indexes)
    {
        foreach ($indexes as $index) {
            if (in_array($columnName, $index['columns'])) {
                if ($index['primary']) {
                    return 'PRI';
                } elseif ($index['unique']) {
                    return 'UNI';
                } else {
                    return 'MUL';
                }
            }
        }
        return null;
    }
}