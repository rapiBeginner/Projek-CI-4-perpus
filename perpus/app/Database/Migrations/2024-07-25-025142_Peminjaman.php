<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "PeminjamanID"=>[
                "type" => "INT",
                "constraint" => 11
            ],
            "UserID" =>[
                "type"=>"INT",
                "constraint" => 11
            ] ,
            "BukuID" =>[
                "type"=>"INT",
                "constraint" => 11
            ] ,
            "TanggalPeminjaman" =>[
                "type"=>"DATE",
            ] ,
            "TanggalPengembalian" =>[
                "type"=>"DATE",
            ] ,
            "StatusPeminjaman"=>[
                "type"=>"varchar",
                "constraint"=>50
            ]
            ]);
        $this->forge->addKey('PeminjamanID', TRUE);
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman');
    }
}
