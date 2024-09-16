<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "KategoriID"=>[
                "type" => "INT",
                "constraint" => 11
            ],
            "NamaKategori" =>[
                "type"=>"VARCHAR",
                "constraint" => 255
            ] ,
            ]);
        $this->forge->addKey('KategoriID', TRUE);
        $this->forge->createTable('kategoribuku');
    }

    public function down()
    {
        $this->forge->dropTable('kategoribuku');
        
    }
}
