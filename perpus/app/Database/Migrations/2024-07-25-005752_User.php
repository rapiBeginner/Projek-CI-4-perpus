<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "UserID"=>[
                "type" => "INT",
                "constraint" => 11
            ],
            "Username" =>[
                "type"=>"VARCHAR",
                "constraint" => 255
            ] ,
            "Password" =>[
                "type"=>"VARCHAR",
                "constraint" => 255
            ] ,
            "Email" =>[
                "type"=>"VARCHAR",
                "constraint" => 255
            ] ,
            "NamaLengkap" =>[
                "type"=>"VARCHAR",
                "constraint" => 255
            ] ,
            "Alamat"=>[
                "type"=>"text"
            ]
            ]);
        $this->forge->addPrimaryKey('UserID');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
