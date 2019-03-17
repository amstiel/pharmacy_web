<?php

use Illuminate\Database\Seeder;

class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const PROVIDERS = [
        1 => ['title' => 'СФ Медикал Продактс', 'manager' => 'Комаров Виктор', 'city' => 'Москва', 'address' => 'Ленина ул., 27', 'phone' => '+7 (223) 123-33-11'],
        2 => ['title' => 'Фармстандарт-Лексредства ОАО', 'manager' => 'Комиссаренко Вячеслав', 'city' => 'Москва', 'address' => 'Кирова ул., 44', 'phone' => '+7 (511) 312-33-22'],
        3 => ['title' => 'Вертекс АО', 'manager' => 'Бухаров Владимир', 'city' => 'Владивосток', 'address' => 'Гоголя ул., 41', 'phone' => '+7 (112) 341-11-44'],
        4 => ['title' => 'Нижфарм ОАО', 'manager' => 'Истомина Юлия', 'city' => 'Владивосток', 'address' => 'Русская ул., 59', 'phone' => '+7 (611) 753-98-34'],
        5 => ['title' => 'Камелия ООО', 'manager' => 'Майоров Вячеслав', 'city' => 'Нижний Новгород', 'address' => 'Зеленодольская ул., 79', 'phone' => '+7 (981) 091-21-48'],
    ];

    public function run()
    {
        foreach (self::PROVIDERS as $provider) {
            DB::table('providers')->insert([
                'title' => $provider['title'],
                'manager' => $provider['manager'],
                'city' => $provider['city'],
                'address' => $provider['address'],
                'phone' => $provider['phone'],
            ]);
        }
    }
}
