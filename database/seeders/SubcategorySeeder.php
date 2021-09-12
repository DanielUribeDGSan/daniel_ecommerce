<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            // Celulares y tablets
            [
                'category_id' => 1,
                'name' => 'Celulares y smartphones',
                'slug' => Str::slug('Celulares y smartphones'),
                'color' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),
            ],

            [
                'category_id' => 1,
                'name' => 'smartwatches',
                'slug' => Str::slug('smartwatches'),
            ],
            // Tv, audio y video
            [
                'category_id' => 2,
                'name' => 'Tv y audio',
                'slug' => Str::slug('Tv y audio'),
            ],

            [
                'category_id' => 2,
                'name' => 'Audios',
                'slug' => Str::slug('Audios'),
            ],

            [
                'category_id' => 2,
                'name' => 'Audio para autos',
                'slug' => Str::slug('Audio para autos'),
            ],

            // Consola y videojuegos

            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),
            ],

            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station'),
            ],

            [
                'category_id' => 3,
                'name' => 'Videojuegos para pc',
                'slug' => Str::slug('Videojuegos para pc'),
            ],

            [
                'category_id' => 3,
                'name' => 'Nitendo',
                'slug' => Str::slug('Nitendo'),
            ],

            // Computación

            [
                'category_id' => 4,
                'name' => 'Portátiles',
                'slug' => Str::slug('Portátiles'),
            ],

            [
                'category_id' => 4,
                'name' => 'Pc escritorio',
                'slug' => Str::slug('Pc escritorio'),
            ],


            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
            ],


            [
                'category_id' => 4,
                'name' => 'Accesorios computadoras',
                'slug' => Str::slug('Accesorios computadoras'),
            ],

            // Moda


            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true,
                'size' => true,

            ],

            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' => true,
                'size' => true,
            ],


            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
            ],


            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
            ],

        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
