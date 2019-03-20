<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const TRANSACTIONS = [
        1 => ['drug_id' => 1, 'created_at' => '2019-1-14', 'revenue' => 0, 'expense' => 14],
        2 => ['drug_id' => 6, 'created_at' => '2019-1-15', 'revenue' => 19, 'expense' => 14],
        3 => ['drug_id' => 10, 'created_at' => '2019-1-16', 'revenue' => 1, 'expense' => 0],
        4 => ['drug_id' => 2, 'created_at' => '2019-1-16', 'revenue' => 10, 'expense' => 20],
        5 => ['drug_id' => 4, 'created_at' => '2019-2-3', 'revenue' => 16, 'expense' => 1],
        6 => ['drug_id' => 1, 'created_at' => '2019-3-14', 'revenue' => 7, 'expense' => 14],
        7 => ['drug_id' => 2, 'created_at' => '2019-3-1', 'revenue' => 2, 'expense' => 0],
    ];

    public function run()
    {
        foreach (self::TRANSACTIONS as $TRANSACTION) {
            DB::table('transactions')->insert([
                'drug_id' => $TRANSACTION['drug_id'],
                'created_at' => Carbon::parse($TRANSACTION['created_at']),
                'revenue' => $TRANSACTION['revenue'],
                'expense' => $TRANSACTION['expense'],
            ]);
        }
    }
}
