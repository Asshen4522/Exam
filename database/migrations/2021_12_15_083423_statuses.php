<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Status;


class Statuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Status::create([
            'name' => "Новый"
        ]);
        Status::create([
            'name' => "В пути"
        ]);
        Status::create([
            'name' => "Отменен"
        ]);
        Status::create([
            'name' => "Выполнен"
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
