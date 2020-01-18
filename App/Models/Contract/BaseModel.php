<?php

namespace App\Models\Contract;

use Illuminate\Database\Capsule\Manager as DB;

abstract class BaseModel implements CRUD
{
    public static $table;
    public static $record_per_page = 15;

    public function get($column)
    {
        return DB::table(static::$table)->select($column)->get();
    }

    public function distinct($column)
    {
        return DB::table(static::$table)->select($column)->distinct()->get();
    }

    public function getAll()
    {
        return DB::table(static::$table)->get();
    }

    public function create($data)
    {
        return DB::table(static::$table)->insertGetId($data);
    }

    public function read($columns, $where)
    {
        return DB::table(static::$table)->select($columns)->where($where)->get();
    }

    public function readWithPaginate($columns, $where)
    {

        $record_per_page = $_GET['records_per_page'] ?? static::$record_per_page;
        $results = new \stdClass;
        $results->total_records = $this->count($where);
        $results->page_count = ceil($results->total_records / $record_per_page);
        $page = (isset($_GET['page']) and is_numeric($_GET['page'])
            and $_GET['page'] > 0) ? $_GET['page'] : 1;
        $start = ($page - 1) * $record_per_page;
        $results->start = $start + 1;
        $records = DB::table(static::$table)->select($columns)->where($where)
            ->skip($start)->take($record_per_page)->get();
        $results->records = $records;
        return $results;
    }
    public function readIn($columns, $whereColumn, $whereValue)
    {
        return DB::table(static::$table)->select($columns)->whereIn($whereColumn, $whereValue)->get();
    }

    public function update($data, $where)
    {
        return DB::table(static::$table)->where($where)->update($data);
    }

    public function delete($where)
    {
        return DB::table(static::$table)->where($where)->delete();
    }

    public function join($table2, $field1, $field2, $data, $numRows)
    {
        $table1 = static::$table;
        return DB::table($table1)->join("$table2", "$field1", '=', "$field2")
            ->select($data)->take($numRows)->get();
    }

    public function joinWithPaginate($table2, $field1, $field2, $data, $where)
    {
        $table1 = static::$table;
        $record_per_page = $_GET['records_per_page'] ?? static::$record_per_page;
        $results = new \stdClass;
        $results->total_records = $this->count($where);
        $results->page_count = ceil($results->total_records / $record_per_page);
        $page = (isset($_GET['page']) and is_numeric($_GET['page'])
            and $_GET['page'] > 0) ? $_GET['page'] : 1;
        $start = ($page - 1) * $record_per_page;
        $results->start = $start + 1;
        $records = DB::table($table1)->join("$table2", "$field1", '=', "$field2")
            ->select($data)->where($where)->skip($start)->take($record_per_page)->get();
        $results->records = $records;
        return $results;
    }

    public function contains($key, $value)
    {
        return DB::table(static::$table)->contains($key, $value);
    }
    public function count($where)
    {
        return DB::table(static::$table)->where($where)->count();
    }
}
