<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const CATEGORIES = [
        1 => ['title' => 'Анальгетики', 'description' => 'Лекарственное средство природного, полусинтетического и синтетического происхождения, предназначенное для снятия болевых ощущений'],
        2 => ['title' => 'Витамины', 'description' => 'лекарственные препараты, содержащие витамины'],
        3 => ['title' => 'Антибиотики', 'description' => 'Вещества, подавляющие рост живых клеток, чаще всего прокариотических или простейших'],
        4 => ['title' => 'Гастроэнтерология', 'description' => 'Препараты, действие которых направлено на лечение органов ЖКТ'],
    ];

    public function run()
    {
        foreach(self::CATEGORIES as $CATEGORY) {
            DB::table('categories')->insert([
                'title' => $CATEGORY['title'],
                'description' => $CATEGORY['description'],
            ]);
        }
    }
}
