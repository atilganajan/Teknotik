<?php

namespace Database\Seeders;

use App\Models\MainCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainCategory::factory()->create([
            'title' => 'Bilgisayar ve Aksesuarları',
        ]);
        MainCategory::factory()->create([
            'title' => 'Telefon ve Aksesuarları',
        ]);
        MainCategory::factory()->create([
            'title' => 'Tablet ve Aksesuarları',
        ]);
        MainCategory::factory()->create([
            'title' => 'Televizyon ve Aksesuarları',
        ]);
        MainCategory::factory()->create([
            'title' => 'Yazıcılar ve Tarayıcılar',
        ]);
        MainCategory::factory()->create([
            'title' => 'Fotoğraf ve Kamera',
        ]);
        MainCategory::factory()->create([
            'title' => 'Ses ve Görüntü Sistemleri',
        ]);
        MainCategory::factory()->create([
            'title' => 'Beyaz Eşya',
        ]);
        MainCategory::factory()->create([
            'title' => 'Elektrikli Ev Aletleri',
        ]);
        MainCategory::factory()->create([
            'title' => 'Isıtma ve Soğutma Sistemleri',
        ]);

       // MainCategory::factory(10)->create();
    }
}
