<?php
    //namespace App;
    //use App\Mail\ConsumerThisIsMeMail;
    use App\Models\Admin\Admin; 
    use App\Models\Admin\Consumer\FindMeHere;
    use App\Models\Admin\Consumer\EthnicityInformation;
    use Illuminate\Support\Str;
    
    function get_h_operate_user_guid($userId='0'){
        if($userId >0){
            $row1 = Admin::where('id', $userId)->first();
            if($row1->guid == '') {
                $id = Str::random(11);
                Admin::where('id', $userId)->update(['guid' => $id]);
            }
            // else{
            //     $cond1 = $cond2 = 0;
            //     $role_abbr = get_h_role_abbr($row1->role_id);
            //     $new_guid = $role_abbr.'USA';  
            //     $row2 = FindMeHere::where('consumer_id', $userId)->first();
            //     if($row2) {
            //         $state_name = $row2->state;
            //         $zipcode_val = $row2->zipcode; 
            //         $state_val = $state_name; 
            //         $new_guid .= $state_val.$zipcode_val;
            //         $cond1 = 1;
            //     }
    
            //     $row3 = EthnicityInformation::where('consumer_id', $userId)->first();
            //     if($row3) {
            //         $race_val = $row3->race; 
            //         $race_code_val = get_h_race_code($race_val = '');
            //         if($race_code_val != ''){
            //             $new_guid .= $race_val;
            //             $cond2 = 1;
            //         } 
            //     }
    
            //     if($cond1==1 && $cond2==1){
            //         $new_guid .= mt_rand(100000, 999999); 
            //         $upate_record = Admin::where('id', $userId)->update(['guid' => $new_guid]);
            //     }  
    
            // }   
        }
    }
    
    function get_h_state_abbrv($state_name='AL'){
        $states_arr = array(
            'Alabama' => 'AL',
            'Alaska' => 'AK',
            'Arizona' => 'AZ',
            'Arkansas' => 'AR',
            'California' => 'CA',
            'Colorado' => 'CO',
            'Connecticut' => 'CT',
            'Delaware' => 'DE',
            'Florida' => 'FL',
            'Georgia' => 'GA',
            'Hawaii' => 'HI',
            'Idaho' => 'ID',
            'Illinois' => 'IL',
            'Indiana' => 'IN',
            'Iowa' => 'IA',
            'Kansas' => 'KS',
            'Kentucky' => 'KY',
            'Louisiana' => 'LA',
            'Maine' => 'ME',
            'Maryland' => 'MD',
            'Massachusetts' => 'MA',
            'Michigan' => 'MI',
            'Minnesota' => 'MN',
            'Mississippi' => 'MS',
            'Missouri' => 'MO',
            'Montana' => 'MT',
            'Nebraska' => 'NE',
            'Nevada' => 'NV',
            'New Hampshire' => 'NH',
            'New Jersey' => 'NJ',
            'New Mexico' => 'NM',
            'New York' => 'NY',
            'North Carolina' => 'NC',
            'North Dakota' => 'ND',
            'Ohio' => 'OH',
            'Oklahoma' => 'OK',
            'Oregon' => 'OR',
            'Pennsylvania' => 'PA',
            'Rhode Island' => 'RI',
            'South Carolina' => 'SC',
            'South Dakota' => 'SD',
            'Tennessee' => 'TN',
            'Texas' => 'TX',
            'Utah' => 'UT',
            'Vermont' => 'VT',
            'Virginia' => 'VA',
            'Washington' => 'WA',
            'West Virginia' => 'WV',
            'Wisconsin' => 'WI',
            'Wyoming' => 'WY',
        );

        return $states_arr["{$state_name}"];
    }
    
    
    function get_h_role_abbr($role_id_val=''){
        $ret_txt = '';
        switch ($role_id_val) {
            case '1': 
                $ret_txt = 'A'; // admin
                break;
            case '4': 
                $ret_txt = 'C'; // consumer
                break;
            case '7':
                $ret_txt = 'M'; //Merchant
                break;
            case '8':
                $ret_txt = 'G'; // Govt
                break;
            case '9':
                $ret_txt = 'B'; // Bank
                break;
            case '10':
                $ret_txt = 'E'; // Education
                break;
            case '11':
                $ret_txt = 'H'; //Healthcare
                break;
            default:
                $ret_txt = '';
                break;
        } 
    
        return $ret_txt;
    } 

    function get_h_race_code($race_val = ''){
        $ret_txt = '';  
        if($race_val != ''){
            $arrs_p52 = array(
                "pacific_islander_americans", 
                "lgbtq", 
                "african_americans", 
                "asian", 
                "asian_indians", 
                "alaska_natives", 
                "alaska_native_corporations", 
                "hasidic_jews", 
                "hispanic_americans",
                "native_americans", 
                "ex_offenders",
                "tribal_entities",
                "15_cfr",
            );
    
            $arrs_25p = array(
                "decline", 
                "other_combination_not_described", 
                "white",
            );
            
            if (in_array($race_val, $arrs_p52)){
                $ret_txt = 'P52';
            }else if (in_array($race_val, $arrs_25p)){
                $ret_txt = '25P';
            }  
            
            
            // if ($request->race == 'white') {
            //return 'W';
            //} 
        }  
        
        return $ret_txt;
    } 


    function get_h_states_list(){
        $states_arr = array(
            'Alabama' => 'AL',
            'Alaska' => 'AK',
            'Arizona' => 'AZ',
            'Arkansas' => 'AR',
            'California' => 'CA',
            'Colorado' => 'CO',
            'Connecticut' => 'CT',
            'Delaware' => 'DE',
            'Florida' => 'FL',
            'Georgia' => 'GA',
            'Hawaii' => 'HI',
            'Idaho' => 'ID',
            'Illinois' => 'IL',
            'Indiana' => 'IN',
            'Iowa' => 'IA',
            'Kansas' => 'KS',
            'Kentucky' => 'KY',
            'Louisiana' => 'LA',
            'Maine' => 'ME',
            'Maryland' => 'MD',
            'Massachusetts' => 'MA',
            'Michigan' => 'MI',
            'Minnesota' => 'MN',
            'Mississippi' => 'MS',
            'Missouri' => 'MO',
            'Montana' => 'MT',
            'Nebraska' => 'NE',
            'Nevada' => 'NV',
            'New Hampshire' => 'NH',
            'New Jersey' => 'NJ',
            'New Mexico' => 'NM',
            'New York' => 'NY',
            'North Carolina' => 'NC',
            'North Dakota' => 'ND',
            'Ohio' => 'OH',
            'Oklahoma' => 'OK',
            'Oregon' => 'OR',
            'Pennsylvania' => 'PA',
            'Rhode Island' => 'RI',
            'South Carolina' => 'SC',
            'South Dakota' => 'SD',
            'Tennessee' => 'TN',
            'Texas' => 'TX',
            'Utah' => 'UT',
            'Vermont' => 'VT',
            'Virginia' => 'VA',
            'Washington' => 'WA',
            'West Virginia' => 'WV',
            'Wisconsin' => 'WI',
            'Wyoming' => 'WY',
        );

        return $states_arr;
    }
    
    
    ?>