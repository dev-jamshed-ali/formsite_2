<?php

namespace App\Console\Commands;

use App\Models\Admin\Consumer\EthnicityInformation;
use App\Models\Admin\Consumer\GenderIdentityInformation;
use App\Models\Admin\Consumer\MyNeighborhoodInformation;
use App\Models\gender;
use App\Models\houses;
use App\Models\scores;
use Illuminate\Console\Command;
use App\Models\Admin\Admin;

class calculateScore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'score:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $consumers = Admin::where('role_id', 4)->get();
        foreach ($consumers as $consumersData) {
            $this->gender($consumersData->id);
            $this->income($consumersData->id);
            $this->housing($consumersData->id);
        }
        return Command::SUCCESS;
    }
    public function housing($id)
    {
        $consumer_ethnicity = EthnicityInformation::where('consumer_id', $id)->first();
        $neighborhood_info = MyNeighborhoodInformation::where('consumer_id', $id)->first();
        if ($consumer_ethnicity && $neighborhood_info) {
            $admin = Admin::find($neighborhood_info->consumer_id);
            $neighborhood_race_back = $neighborhood_info->neighborhood_race_back;
            $neighborhood_race_right = $neighborhood_info->neighborhood_race_right;
            $neighborhood_race_front = $neighborhood_info->neighborhood_race_front;
            $neighborhood_race_left = $neighborhood_info->neighborhood_race_left;
            $center_race = $consumer_ethnicity->Ethnicity;
            if ($neighborhood_info->provide_neigborhood_address_right == 1) {
                if ($neighborhood_race_right == 'nosignup') {
                    $neighborhood_race_right = 'nosignup';
                } elseif ($neighborhood_race_right == 'nohouse') {
                    $neighborhood_race_right = 'nohouse';
                } elseif ($neighborhood_race_right == 'white') {
                    $neighborhood_race_right = 'white';
                } else {
                    $neighborhood_race_right = 'p52';
                }
            } else {
                $neighborhood_race_right = 'empty';
            }

            if ($neighborhood_info->provide_neigborhood_address_left == 1) {
                if ($neighborhood_race_left == 'nosignup') {
                    $neighborhood_race_left = 'nosignup';
                } elseif ($neighborhood_race_left == 'nohouse') {
                    $neighborhood_race_left = 'nohouse';
                } elseif ($neighborhood_race_left == 'white') {
                    $neighborhood_race_left = 'white';
                } else {
                    $neighborhood_race_left = 'p52';
                }
            } else {
                $neighborhood_race_left = 'empty';
            }

            if ($neighborhood_info->provide_neigborhood_address_front == 1) {
                if ($neighborhood_race_front == 'nosignup') {
                    $neighborhood_race_front = 'nosignup';
                } elseif ($neighborhood_race_front == 'nohouse') {
                    $neighborhood_race_front = 'nohouse';
                } elseif ($neighborhood_race_front == 'white') {
                    $neighborhood_race_front = 'white';
                } else {
                    $neighborhood_race_front = 'p52';
                }
            } else {
                $neighborhood_race_front = 'empty';
            }

            if ($neighborhood_info->provide_neigborhood_address_back == 1) {
                if ($neighborhood_race_back == 'nosignup') {
                    $neighborhood_race_back = 'nosignup';
                } elseif ($neighborhood_race_back == 'nohouse') {
                    $neighborhood_race_back = 'nohouse';
                } elseif ($neighborhood_race_back == 'white') {
                    $neighborhood_race_back = 'white';
                } else {
                    $neighborhood_race_back = 'p52';
                }
            } else {
                $neighborhood_race_back = 'empty';
            }

            if ($center_race == 'nosignup') {
                $center_race = 'nosignup';
            } elseif ($center_race == 'nohouse') {
                $center_race = 'nohouse';
            } elseif ($center_race == 'white') {
                $center_race = 'white';
            } else {
                $center_race = 'p52';
            }
            $scores = [
                'empty' => 1000,
                'nohouse' => 1000,
                'nosignup' => -1000,
                'p52' => 5668,
                'white' => 2834
            ];
            $total_score = $scores[$neighborhood_race_back] +
                $scores[$neighborhood_race_right] +
                $scores[$neighborhood_race_front] +
                $scores[$neighborhood_race_left] +
                $scores[$center_race];
            $empty_count = array_count_values([$neighborhood_race_back, $neighborhood_race_right, $neighborhood_race_front, $neighborhood_race_left, $center_race])['empty'] ?? 0;
            $nohouse_count = array_count_values([$neighborhood_race_back, $neighborhood_race_right, $neighborhood_race_front, $neighborhood_race_left, $center_race])['nohouse'] ?? 0;

            if ($empty_count >= 3 || $nohouse_count >= 3) {
                $total_score /= 0.2568;
            } elseif (in_array('nosignup', [$neighborhood_race_back, $neighborhood_race_right, $neighborhood_race_front, $neighborhood_race_left, $center_race])) {
                $total_score *= 0.1568;
            } else {
                $total_score /= 0.1568;
            }
            $total_score = (int) substr($total_score, 0, 3);
            $total_score = max(350, min(850, $total_score));
            $score_of_housing = ($total_score * 55) / 100;
            $latest_housing_score = scores::where('admin_id', $admin->id)
                ->where('change_due_to', 'housing')
                ->orderBy('created_at', 'desc')
                ->first();
            $old_value = $admin->total_score;
            $change_type = 'increment';
            if ($latest_housing_score) {
                $difference = $score_of_housing - $latest_housing_score->score_value;
                if ($difference == 0) {
                    return;
                }
                if ($difference < 0) {
                    $change_type = 'decrement';
                    $difference = abs($difference);
                }
                $new_value = $old_value + ($change_type === 'increment' ? $difference : -$difference);
            } else {
                $difference = $score_of_housing;
                $new_value = $old_value + $difference;
            }
            $data = [
                'admin_id' => $admin->id,
                'old_value' => $old_value || 0,
                'score_value' => $difference,
                'new_value' => $new_value,
                'change_type' => $change_type,
                'change_due_to' => 'housing',
                'change_reason' => 'Housing score calculation based on neighborhood information'
            ];
            scores::create($data);
            $admin->total_score = $new_value;
            $admin->save();
        }
    }
    public function gender($id)
    {
        $gender_identity = GenderIdentityInformation::where('consumer_id', $id)->first();
        $gender_rule = gender::where('value', $gender_identity->self_identify_sex)->first();
        $admin = Admin::find($id);
        if ($gender_identity) {
            $score_of_housing = ($gender_rule->score * 55) / 100;
            $latest_housing_score = scores::where('admin_id', $admin->id)
                ->where('change_due_to', 'gender')
                ->orderBy('created_at', 'desc')
                ->first();
            $old_value = $admin->total_score;
            $change_type = 'increment';
            if ($latest_housing_score) {
                $difference = $score_of_housing - $latest_housing_score->score_value;
                if ($difference == 0) {
                    return;
                }
                if ($difference < 0) {
                    $change_type = 'decrement';
                    $difference = abs($difference);
                }
                $new_value = $old_value + ($change_type === 'increment' ? $difference : -$difference);
            } else {
                $difference = $score_of_housing;
                $new_value = $old_value + $difference;
            }
            $data = [
                'admin_id' => $admin->id,
                'old_value' => $old_value,
                'score_value' => $difference,
                'new_value' => $new_value,
                'change_type' => $change_type,
                'change_due_to' => 'housing',
                'change_reason' => 'Housing score calculation based on neighborhood information'
            ];
            scores::create($data);
            $admin->total_score = $new_value;
            $admin->save();
        }
    }
    public function income($id)
    {

    }
}
