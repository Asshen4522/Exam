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
            'name' => "Новая"
        ]);
        Status::create([
            'name' => "Принято в работу"
        ]);
        Status::create([
            'name' => "Выполнено"
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
