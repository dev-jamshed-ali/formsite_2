<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class incomeRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $income_ranges = [
            '0 to USD 30,000' =>  '0_30000',
            '30,001 USD to 75,000 USD' =>  '30000_75000',
            '75,001 USD to 125,000 USD' =>  '75000_125000',
            '125,001 USD to 200,000 USD' =>  '125000_200000',
            '200,001 USD to 250,000 USD' => '200000_250000',
            '250,001 USD to 500,000 USD' =>  '250000_500000',
            '500,001 USD to 1,000,000 USD' =>  '500000_1000000',
            '1,000,000 USD ++' =>  '1000000_plus'
        ];
        
        $data = array_map(function ($range, $limits) {
            return [
                'income_range' => $range,
                'income_value' => $limits,
                'score' => rand(350, 850)
            ];
        }, array_keys($income_ranges), array_values($income_ranges));
        
        DB::table('income_rules')->insert($data);
        
    }
}
