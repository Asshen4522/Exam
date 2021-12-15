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
            'name' => '«3D-дизайн»',
            'description' => 'Разработка 3D модели помещения'
        ]);
        Category::create([
            'name' => '«2D-дизайн»',
            'description' => 'Разработка 2D изображения помещения'
        ]);
        Category::create([
            'name' => '«Эскиз»',
            'description' => 'Построение эскиза помещения'
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
