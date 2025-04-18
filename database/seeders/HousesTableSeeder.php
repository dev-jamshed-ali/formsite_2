<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class HousesTableSeeder extends Seeder
{
       /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $centerValues = ['w', 'p'];
            $leftRightFrontBackValues = ['w', 'p', 'n', 's', 'e'];
    
            $combinations = [];
            
            foreach ($centerValues as $center) {
                foreach ($leftRightFrontBackValues as $left) {
                    foreach ($leftRightFrontBackValues as $right) {
                        foreach ($leftRightFrontBackValues as $front) {
                            foreach ($leftRightFrontBackValues as $back) {
                                $combinations[] = [
                                    'center' => $center,
                                    'left' => $left,
                                    'right' => $right,
                                    'front' => $front,
                                    'back' => $back,
                                    'score' => rand(350, 850)
                                ];
                            }
                        }
                    }
                }
            }
        DB::table('houses')->insert($combinations);
    }
}
