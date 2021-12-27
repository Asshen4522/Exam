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
            'name' => '«Косметический ремонт»',
            'description' => 'Ремонт с целью улучшения внешнего вида здания'
        ]);
        Category::create([
            'name' => '«Капитальный ремонт»',
            'description' => 'Полный ремонт здания'
        ]);
        Category::create([
            'name' => '«Ремонт электрики»',
            'description' => 'Ремонт электросети здания'
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
