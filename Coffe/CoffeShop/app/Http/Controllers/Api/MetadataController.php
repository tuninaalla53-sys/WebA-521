<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MetadataController extends Controller
{
    public function tables()
    {
        $tables = DB::select('SHOW TABLES');
        
        $result = [];
        foreach ($tables as $table) {
            // Получаем первое свойство объекта (независимо от его имени)
            $tableProperties = get_object_vars($table);
            $tableName = reset($tableProperties); // Берем первое значение
            
            $rowCount = DB::table($tableName)->count();
            $maxUpdatedAt = DB::table($tableName)->max('updated_at');

            $result[] = [
                'table_name' => $tableName,
                'rows_count' => $rowCount,
                'max_updated_at' => $maxUpdatedAt,
            ];
        }

        return response()->json($result);
    }

    public function tableStructure($table)
    {
        $columns = DB::select('DESCRIBE ' . $table);
        $structure = [];
        foreach ($columns as $column) {
            $structure[] = [
                'column_name' => $column->Field,
                'type' => $column->Type,
                'nullable' => $column->Null === 'YES',
                'default' => $column->Default,
                'key' => $column->Key,
            ];
        }
        return response()->json($structure);
    }
}