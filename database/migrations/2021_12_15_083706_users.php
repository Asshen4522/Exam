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
            'name' => 'Администратор',
            'surname' => 'Админ',
            'last_name' => 'ВСРович',
            'email' => 'admin@WSR.ru',
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
