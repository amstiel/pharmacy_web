<?php

use Illuminate\Database\Seeder;

class DrugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const DRUGS = [
        1 => ['title' => 'Амоксициллин', 'provider_id' => 1, 'category_id' => 3, 'measure' => '16 капсул по 250мг', 'price' => 53.00],
        2 => ['title' => 'Макропен', 'provider_id' => 2, 'category_id' => 3, 'measure' => '16 таблеток по 400мг', 'price' => 328.00],
        3 => ['title' => 'Гентамицин', 'provider_id' => 3, 'category_id' => 3, 'measure' => '10 ампул по 2мл', 'price' => 40.00],
        4 => ['title' => 'Спазмалгон', 'provider_id' => 4, 'category_id' => 1, 'measure' => '10 ампул по 2мл', 'price' => 319.00],
        5 => ['title' => 'Темпалгин', 'provider_id' => 2, 'category_id' => 1, 'measure' => '100 таблеток по 250мг', 'price' => 416.00],
        6 => ['title' => 'Нурофен Форте', 'provider_id' => 5, 'category_id' => 1, 'measure' => '12 таблеток по 400мг', 'price' => 106.00],
        7 => ['title' => 'Пиковит', 'provider_id' => 2, 'category_id' => 2, 'measure' => '30 таблеток по 200мг', 'price' => 200.00],
        8 => ['title' => 'Ревит', 'provider_id' => 1, 'category_id' => 2, 'measure' => '100 драже по 25мг', 'price' => 71.00],
        9 => ['title' => 'Дуовит', 'provider_id' => 3, 'category_id' => 2, 'measure' => '40 драже по 200мг', 'price' => 179.00],
        10 => ['title' => 'Уголь активированный', 'provider_id' => 1, 'category_id' => 4, 'measure' => '10 таблеток по 200мг', 'price' => 4.00],
        11 => ['title' => 'Линекс', 'provider_id' => 5, 'category_id' => 4, 'measure' => '16 капсул по 500мг', 'price' => 285.00],
        12 => ['title' => 'Омез', 'provider_id' => 2, 'category_id' => 4, 'measure' => '30 капсул по 20мг', 'price' => 170.00],
    ];

    public function run()
    {
        foreach (self::DRUGS as $DRUG){
            DB::table('drugs')->insert([
                'title' => $DRUG['title'],
                'provider_id' => $DRUG['provider_id'],
                'category_id' => $DRUG['category_id'],
                'measure' => $DRUG['measure'],
                'price' => $DRUG['price'],
            ]);
        }
    }
}
