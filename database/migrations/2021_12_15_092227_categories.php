<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Category;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Category::create([
            'name' => '«Струйный принтер»',
            'description' => 'N/A'
        ]);
        Category::create([
            'name' => '«Лазерный принтер»',
            'description' => 'N/A'
        ]);
        Category::create([
            'name' => '«Картридж»',
            'description' => 'N/A'
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
