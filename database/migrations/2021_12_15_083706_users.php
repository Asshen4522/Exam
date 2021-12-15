<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::create([
            'name' =>NULL,
            'surname' => NULL,
            'last_name' => NULL,
            'email' => NULL,
            'login' => 'admin',
            'password' => Hash::make('WSR'),
            'role_id' => 2
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
