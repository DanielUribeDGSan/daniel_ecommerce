<?php

namespace Database\Seeders;

use Faker\Core\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        FacadesFile::deleteDirectory(public_path('assets/images/categories'));
        FacadesFile::deleteDirectory(public_path('assets/images/subcategories'));
        FacadesFile::deleteDirectory(public_path('assets/images/products'));

        FacadesFile::makeDirectory(public_path('assets/images/categories'));
        FacadesFile::makeDirectory(public_path('assets/images/subcategories'));
        FacadesFile::makeDirectory(public_path('assets/images/products'));


        $this->call(UserSeeder::class);

        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ColorSizeSeeder::class);
    }
}
