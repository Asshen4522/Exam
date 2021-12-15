<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Role;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::create([
            'name' => "user"
        ]);
        Role::create([
            'name' => "admin"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
