<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            'Androgyn' => 'androgyn',
            'Bi-Sexual Accept Me A Female' => 'bisexual_as_female',
            'Bi-Sexual Accept Me A Male' => 'bisexual_as_male',
            'Boi' => 'boi',
            'Butch' => 'butch',
            'Cisgender' => 'cisgender',
            'Cross-Dresser' => 'cross_dresser',
            'Female' => 'female',
            'Gay Female' => 'gay_female',
            'Gay Male' => 'gay_male',
            'Gender Bender' => 'gender_bender',
            'Gender Neutrality' => 'gender_neutrality',
            'Gender Non-Conforming' => 'gender_non_conforming',
            'Gender Queer' => 'gender_queer',
            'Gender Variance' => 'gender_variance',
            'Lesbian' => 'lesbian',
            'Male' => 'male',
            'Man' => 'man',
            'Non-Binary' => 'non_binary',
            'Other' => 'other',
            'Post Genderism' => 'post_genderism',
            'Something Else' => 'something_else',
            'Trans Man' => 'trans_man',
            'Trans Woman' => 'trans_woman',
            'Transgender Male to Female' => 'transgender_male_to_female',
            'Transgender Female to Male' => 'transgender_female_to_male',
            'Transsexual' => 'transsexual',
            'Woman' => 'woman',
        ];

        $data = [];
        foreach ($genders as $gender => $value) {
            $data[] = [
                'name' => $gender,
                'value' => $value,
                'score' => rand(350, 850)
            ];
        }

        DB::table('genders')->insert($data);
    }
}
