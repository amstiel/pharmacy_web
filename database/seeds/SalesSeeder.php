<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const SALES = [
        1 => ['created_at' => '2019-01-14', 'drugs' => [1, 3, 4]],
        2 => ['created_at' => '2019-01-18', 'drugs' => [8, 4, 5, 1]],
        3 => ['created_at' => '2019-01-21', 'drugs' => [1, 2, 3, 4]],
        4 => ['created_at' => '2019-01-22', 'drugs' => [4, 6]],
        5 => ['created_at' => '2019-02-11', 'drugs' => [3, 9]],
        6 => ['created_at' => '2019-02-15', 'drugs' => [4, 8, 11]],
        7 => ['created_at' => '2019-02-25', 'drugs' => [3, 7, 10]],
        8 => ['created_at' => '2019-03-01', 'drugs' => [2, 6]],
        9 => ['created_at' => '2019-03-02', 'drugs' => [1, 5, 8, 9]],
        10 => ['created_at' => '2019-03-03', 'drugs' => [7, 8, 10]],
    ];

    public function run()
    {
        foreach (self::SALES as $id => $SALE) {
            DB::table('sales')->insert([
                'created_at' => Carbon::parse($SALE['created_at']),
            ]);
            foreach ($SALE['drugs'] as $drugId) {
                DB::table('sales_drugs')->insert([
                    'sale_id' => $id,
                    'drug_id' => $drugId,
                    'amount' => random_int(1, 10),
                ]);
            }
        }
    }
}
