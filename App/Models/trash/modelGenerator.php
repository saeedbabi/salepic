<?php

namespace App\Models;

class ModelGenerator
{
    private $table_names;

    public function __construct()
    {
        global $medoo;
        $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.`TABLES` WHERE TABLE_SCHEMA ='filemarket.exp'";
        $this->table_names = $medoo->query($sql)->fetchAll();
    }

    public function makeModels()
    {
        $modelTpl = '<?php

namespace App\Models;

use App\Models\Contract\BaseModel;

class #MODEL# extends BaseModel
{
    public static $table = "#TABLE#";
}
        ';
        foreach ($this->table_names as $key => $table) {
            $content = str_replace(
                ["#MODEL#", "#TABLE#"],
                [ucfirst($table), $table],
                $modelTpl
            );
            file_put_contents("M-" . $table . ".php", $content);
        }
    }
}
