<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('addres');
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories')
            $table->integer('max_cost');
            $table->string('photo_start');
            $table->string('photo_end')->nullable();
            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
