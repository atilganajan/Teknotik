<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // SubCategory::factory(37)->create();

        SubCategory::factory()->create([
            'title' => 'Bilgisayar Bileşenleri',
            "main_category_id"=>1
        ]);
        SubCategory::factory()->create([
            'title' => 'Ağ ve Modem',
            "main_category_id"=>1
        ]);
        SubCategory::factory()->create([
            'title' => 'Monitör Pc',
            "main_category_id"=>1
        ]);
        SubCategory::factory()->create([
            'title' => 'Dizüstü Bilgisayar',
            "main_category_id"=>1
        ]);
        SubCategory::factory()->create([
            'title' => 'Masaüstü Bilgisayar',
            "main_category_id"=>1
        ]);

        SubCategory::factory()->create([
            'title' => 'Cep Telefonu',
            "main_category_id"=>2
        ]);
        SubCategory::factory()->create([
            'title' => 'Cep Telefonu Aksesuar',
            "main_category_id"=>2
        ]);
        SubCategory::factory()->create([
            'title' => 'Cep Telefonu Yedek Parça',
            "main_category_id"=>2
        ]);
        SubCategory::factory()->create([
            'title' => 'Masaüstü Telefon',
            "main_category_id"=>2
        ]);

        SubCategory::factory()->create([
            'title' => 'Tabletler',
            "main_category_id"=>3
        ]);
        SubCategory::factory()->create([
            'title' => 'Tablet Aksesuarları',
            "main_category_id"=>3
        ]);
        SubCategory::factory()->create([
            'title' => 'Tablet Yedek Parça',
            "main_category_id"=>3
        ]);

        SubCategory::factory()->create([
            'title' => 'Televizyon ',
            "main_category_id"=>4
        ]);
        SubCategory::factory()->create([
            'title' => 'Televizyon Aksesuarları',
            "main_category_id"=>4
        ]);

        SubCategory::factory()->create([
            'title' => 'Lazer Yazıcı ',
            "main_category_id"=>5
        ]);
        SubCategory::factory()->create([
            'title' => 'Tarayıcılar',
            "main_category_id"=>5
        ]);

        SubCategory::factory()->create([
            'title' => 'Fotoğraf Makinası ',
            "main_category_id"=>6
        ]);
        SubCategory::factory()->create([
            'title' => 'Video Kamera',
            "main_category_id"=>6
        ]);

        SubCategory::factory()->create([
            'title' => 'Hoparlörler ',
            "main_category_id"=>7
        ]);
        SubCategory::factory()->create([
            'title' => 'Projeksiyon Cihazı',
            "main_category_id"=>7
        ]);
        SubCategory::factory()->create([
            'title' => 'Ses Kayıt',
            "main_category_id"=>7
        ]);

        SubCategory::factory()->create([
            'title' => 'Çamaşır Makinası ',
            "main_category_id"=>8
        ]);
        SubCategory::factory()->create([
            'title' => 'Buzdolabı',
            "main_category_id"=>8
        ]);
        SubCategory::factory()->create([
            'title' => 'Bulaşık Makinası',
            "main_category_id"=>8
        ]);

        SubCategory::factory()->create([
            'title' => 'Ütüler ',
            "main_category_id"=>9
        ]);
        SubCategory::factory()->create([
            'title' => 'Süpürgeler',
            "main_category_id"=>9
        ]);

        SubCategory::factory()->create([
            'title' => 'Klimalar ',
            "main_category_id"=>10
        ]);
        SubCategory::factory()->create([
            'title' => 'Kombiler',
            "main_category_id"=>10
        ]);
        SubCategory::factory()->create([
            'title' => 'Vantilatörler',
            "main_category_id"=>10
        ]);


    }
}
