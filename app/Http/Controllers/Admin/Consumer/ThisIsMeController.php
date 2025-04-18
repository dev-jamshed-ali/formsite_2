<?php

namespace App\Http\Controllers\Admin\Consumer;

use App\Http\Controllers\Controller;
use App\Mail\ConsumerThisIsMeMail;
use App\Mail\ConsumerThisIsMeRejectionMail;
use App\Models\Admin\Admin;
use App\Models\Admin\Consumer\AttestationInformation;
use App\Models\Admin\Consumer\ChargeCardInformation;
use App\Models\Admin\Consumer\DistinguishIdentifierInformation;
use App\Models\Admin\Consumer\EmploymentInformation;
use App\Models\Admin\Consumer\EthnicityInformation;
use App\Models\Admin\Consumer\FacialImageUpload;
use App\Models\Admin\Consumer\FamilyAndMedicalHistoryInformation;
use App\Models\Admin\Consumer\FindMeHere;
use App\Models\Admin\Consumer\GenderIdentityInformation;
use App\Models\Admin\Consumer\HairInformation;
use App\Models\Admin\Consumer\HeadAndFaceInformation;
use App\Models\Admin\Consumer\MedicalInformation;
use App\Models\Admin\Consumer\MyNeighborhoodInformation;
use App\Models\Admin\Consumer\MyPidegreeInformation;
use App\Models\Admin\Consumer\TravelInformation;
use App\Models\Admin\Consumer\TwinIdentifierInformation;
use App\Models\Admin\FieldsetReturnBackData;
use App\Models\Admin\LaborsCategories;
use App\Models\houses;
use App\Models\children;
use App\Models\Jobtitles;
use Exception;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use PHPUnit\Framework\Constraint\IsEmpty;
use SplFileObject;
use Illuminate\Support\Facades\Log;
// use Log;


class ThisIsMeController extends Controller
{
    public function this_is_me()
    {
        $labor_cate_rows = LaborsCategories::where("parent_id", '0')->where("status", '1')->get();

        $consumer = Admin::with([
            'my_pidegree_info',
            'find_me_here',
            'gender_identity_info',
            'my_neighborhood_info',
            'employment_info',
            'charge_card_info',
            'family_and_medical_info',
            'this_is_me_return_back_data',
            'facial_image',
            'children'
        ])->where('id', session('id'))->first();

        $my_pidegree_info = [
            "id" => null,
            "consumer_id" => null,
            "fname" => null,
            "lname" => null,
            "middle_initial" => null,
            "suffix" => null,
            "nick_name" => null,
            "date_of_birth" => null,
            "social_security_no" => null,
            "cpn_no" => null,
            "us_vetran" => null,
            "consumer_presently_incarcerated" => null,
            "created_at" => null,
            "updated_at" => null,
            "guid" => null,
            "eligibility_protection" => null
        ];
        
        $my_pidegree_info = $consumer->my_pidegree_info;
        $find_me_here = $consumer->find_me_here;
        $gender_identity_info = $consumer->gender_identity_info;
        $ethnicity_info = $consumer->ethnicity_info;
        $my_neighborhood_info = $consumer->my_neighborhood_info;
        $employment_info = $consumer->employment_info;
        $charge_card_info = $consumer->charge_card_info;
        $head_and_face_info = $consumer->head_and_face_info;
        $hair_info = $consumer->hair_info;
        $distinguish_identifier_info = $consumer->distinguish_identifier_info;
        $twin_identifier_info = $consumer->twin_identifier_info;
        $medical_info = $consumer->medical_info;
        $family_and_medical_info = $consumer->family_and_medical_info;
        $travel_info = $consumer->travel_info;
        $attestation_info = $consumer->attestation_info;
        $facial_image = $consumer->facial_image;
        $children = $consumer->children;
        $app_url = env('APP_URL');

        $this_is_me_return_back_data = $consumer->this_is_me_return_back_data;
      

      
        return view(
            'admin.consumer.this_is_me',
            compact(
                'my_pidegree_info',
                'find_me_here',
                'gender_identity_info',
                'ethnicity_info',
                'my_neighborhood_info',
                'employment_info',
                'charge_card_info',
                'hair_info',
                'head_and_face_info',
                'distinguish_identifier_info',
                'twin_identifier_info',
                'medical_info',
                'family_and_medical_info',
                'travel_info',
                'attestation_info',
                'this_is_me_return_back_data',
                'facial_image',
                'labor_cate_rows',
                'consumer',
                'children',
                'app_url'
            )
        );
    }

    public function this_is_me_store(Request $request)
    {
        // dd($request->all());
        $consumerId = $request->consumer_id ?? session('id');
        $request['consumer_id'] = $consumerId;

        try {
            $adminId = intval($consumerId);
            $module = 'consumer_this_is_me';
            $fieldset_id = '';
            // dd($request->form_section);
            
            switch ($request->form_section) {
                case 'my_pidegree_info':
                    $this->store_my_pidegree_info($request);
                    $fieldset_id = 'fieldset_two';
                    break;
                case 'find_me_here':
                    $this->store_find_me_here($request);
                    $fieldset_id = 'fieldset_three';
                    break;
                case 'gender_identity_info':
                    $this->store_gender_identity_info($request);
                    $fieldset_id = 'fieldset_four';
                    break;
                case 'ethnicity_information':
                    $this->store_ethnicity_info($request);
                    $fieldset_id = 'fieldset_five';
                    break;
                case 'my_neighborhood_information':
                    $this->store_my_neighborhood_info($request);
                    $fieldset_id = 'fieldset_six';
                    break;
                case 'employment_information':
                    $this->store_employement_info($request);
                    $fieldset_id = 'fieldset_seven';
                    break;
                case 'charge_card_information':
                    $this->store_charge_card_info($request);
                    $fieldset_id = 'fieldset_eight';
                    break;
                case 'head_and_face_information':
                    $this->store_head_and_face_info($request);
                    $fieldset_id = 'fieldset_ten';
                    break;
                case 'hair_information':
                    $this->store_hair_info($request);
                    $fieldset_id = 'fieldset_eleven';
                    break;
                case 'distinguish_identifier_information':
                    $this->distinguish_identifier_info($request);
                    $fieldset_id = 'fieldset_twelve';
                    break;
                case 'twin_identifier_information':
                    $this->twin_identifier_info($request);
                    $fieldset_id = 'fieldset_three';
                    break;
                case 'facial_image_upload':
                    $fieldset_id = 'fieldset_nine';
                    return response()->json(['success' => true, 'data' => $this->store_facial_image_upload($request)]);
                case 'medical_information':
                    $this->store_medical_info($request);
                    $fieldset_id = 'fieldset_fifteen';
                    break;
                case 'family_and_medical_information':
                    $this->store_family_and_medical_info($request);
                    $fieldset_id = 'fieldset_sixteen';
                    break;
                case 'travel_information':
                    $this->store_travel_info($request);
                    $fieldset_id = 'fieldset_seventeen';
                    break;
                case 'attestation_information':
                    $fieldset_id = 'fieldset_seventeen';
                    $this->store_attestation_info($request);
                    break;

                default:
            }

            get_h_operate_user_guid($consumerId);
            $this->storeFieldSetData($adminId, $module, $fieldset_id);
            return response()->json(['success' => true, 'message' => 'form submitted successfully']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function store_facial_image_upload($request)
    {
        if (!empty($request->file)) {
            if (in_array($request->file->extension(), ['png', 'jpg', 'jpeg'])) {
                // Store the uploaded file in the public/uploads directory
                $imageName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('facial_uploads'), $imageName);
                return FacialImageUpload::updateOrCreate(
                    ['consumer_id' => $request->consumer_id],
                    $request->only(
                        'consumer_id',
                        'privacy',
                        'to_see_global_look_alike',
                        'like_to_have_global_look_alike'
                    ) + ['facial_image' => asset('public/facial_uploads/' . $imageName)]
                );
            }
        } else {

            return FacialImageUpload::updateOrCreate(
                ['consumer_id' => $request->consumer_id],
                $request->only(
                    'consumer_id',
                    'to_see_global_look_alike',
                    'like_to_have_global_look_alike'
                )
            );
        }
    }
    public function store_attestation_info($request)
    {
        try {
            $attestation_info = AttestationInformation::updateOrCreate(
                ['consumer_id' => $request->consumer_id],
                $request->only(
                    'consumer_id',
                    'how_you_heared_about_us',
                    'i_confirm_data_is_accurate',
                    'volunteer_trekker',
                )
            );

            Admin::updateOrCreate(
                ['id' => $request->consumer_id],
                ['form_completion' => 1],
            );

            $userEmail = session('email');
            // Send welcome email without state restriction check
            Mail::to($userEmail)->send(new ConsumerThisIsMeMail('Thank you for signing up to become a Ginicoe Member', ''));

            return $attestation_info;
        } catch (Exception $e) {
            Log::info($e);
            return;
        }
    }
    
    public function autocomplete(Request $request)
    {
        $search = $request->input('query');
        $jobTitles = Jobtitles::where('title', 'LIKE', "%{$search}%")
                             ->get(['id', 'title']);

        return response()->json($jobTitles);
    }

    public function store_travel_info($request)
    {
        if(!empty($request->old_first_name)){
            $childrenData = [];
            for ($i = 0; $i < count($request->old_first_name); $i++) {
                $childrenData[] = [
                    'old_first_name' => $request->old_first_name[$i],
                    'old_last_name' => $request->old_last_name[$i],
                    'old_dob' => $request->old_dob[$i],
                    'old_spouse_first_name' => $request->old_spouse_first_name[$i] ?? null,
                    'old_spouse_last_name' => $request->old_spouse_last_name[$i] ?? null,
                    'old_spouse_dob' => $request->old_spouse_dob[$i] ?? null,
                    'consumer_id' => $request->consumer_id,
                ];
            }
    
            foreach ($childrenData as $childData) {
                $data = children::updateOrCreate(['consumer_id' => $request->consumer_id, 'old_first_name' => $childData['old_first_name'], 'old_last_name' => $childData['old_last_name']], $childData);
            }
        }
        return TravelInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                "consumer_id",
                "are_you_us_citizen",
                "passport_number",
                "alien_id_number",
                "are_you_on_visa",
                "dual_citizen_ship",
                "visa_number",
                "us_visa_expiration_date",
                "state_driver_license_no",
                "state_id_no",
                "state_hunting_no",
                "state_fishing_no",
                "state_pilot_license_no",
                "state_handgun_firearm_no",
                "state_medicaid_no",
                "state_medicare_no",
                "us_military_branch_no",
                "bureau_of_indian_affair_card_no",
                "tribal_id_card_no",
                "visa_purpose",
                "state_driver_license",
                "us_state",
                "state_hunting",
                "state_fishing",
                "state_pilot_license",
                "state_handgun_firearm",
                "state_medicaid",
                "state_medicare",
                "us_military_branch",
            )
        );

    }
    public function store_family_and_medical_info($request)
    {
        return FamilyAndMedicalHistoryInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'number_of_brother',
                'olders_brother_name',
                'number_of_sister',
                'youngest_sister_name',
                'place_of_birth',
                'name_of_hospital_you_born_in',
                'name_of_mid_wife',
                'first_name_of_mid_wife',
                'last_name_of_mid_wife',
                'exact_location_of_first_reponder',
                'address_description',
                'birth_house_address',
                'birth_street',
                'birth_country',
                'birth_state',
                'birth_city',
                'birth_zipcode',
                'birth_address_description',
                'your_age'
            )
        );
    }
    public function store_jobs_db()
    {
        // Path to the CSV file
        $csvFile = public_path('csv/jobs.csv');

        // Check if the file exists
        if (!file_exists($csvFile)) {
            return response()->json(['error' => 'CSV file not found.'], 404);
        }

        // Open the CSV file using SplFileObject for efficient reading
        $file = new SplFileObject($csvFile, 'r');
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY | SplFileObject::READ_AHEAD);

        $storedJobTitles = [];
        foreach ($file as $row) {
            if (!empty($row[0])) {
                $title = trim($row[0]); 
                $jobTitle = Jobtitles::firstOrCreate(['title' => $title]);
                $storedJobTitles[] = $jobTitle->id;
            }
        }
        return response()->json(['message' => 'Job titles stored successfully.']);
    }
    public function card_check($number)
    {
        $response = Http::get('https://api.bincodes.com/cc/json/221183033bdab61e520d8b8d0babeb88/'.$number.'/');
        return response()->json($response->json());
    }
    
    public function store_medical_info($request)
    {
        
        return MedicalInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'medical_house_address',
                'medical_street',
                'medical_country',
                'medical_state',
                'medical_city',
                'medical_zipcode',
                'medical_guid',
                'want_to_know_law_inforcement',
                'do_you_have_hidden_ailment',
                'agoraphobia',
                'generalized_anxiety_disorder_gad',
                'panic_disorder',
                'separation_anxiety_disorder',
                'social_anxiety_disorder',
                'specific_phobias',
                'depressive_episodes',
                'mania',
                'breathing_related_sleep_disorders',
                'hypersomnolence',
                'insomnia_disorder',
                'narcolepsy',
                'parasomnias',
                'restless_legs_syndrome',
                'disruptive_mood_dysregulation_disorder',
                'major_depressive_disorder',
                'persistent_depressive_disorder',
                'other_or_unspecified_depressive_disorder',
                'premenstrual_dysphoric_disorder',
                'medication_depressive_disorder',
                'conduct_disorder',
                'intermittent_explosive_disorder',
                'kleptomania',
                'oppositional_defiant_disorder',
                'pyromania',
                'dissociative_amnesia',
                'dissociative_identity_disorder',
                'derealization_disorder',
                'anorexia_nervosa',
                'binge_eating_disorder',
                'bulimia_nervosa',
                'pica',
                'rumination_disorder',
                'sleep_disorders',
                'delirium',
                'neurocognitive_disorders',
                'adhd',
                'autism_spectrum_disorder',
                'communication_disorders',
                'global_developmental_delay',
                'intellectual_disability',
                'obsessive_compulsive_disorder',
                'body_dysmorphic_disorder',
                'hoarding_disorder',
                'trichotillomania',
                'excoriation_disorder',
                'ocd_medical_condition',
                'antisocial_personality_disorder',
                'avoidant_personality_disorder',
                'borderline_personality_disorder',
                'dependent_personality_disorder',
                'histrionic_personality_disorder',
                'narcissistic_personality_disorder',
                'obsessive_compulsive_personality_disorder',
                'paranoid_personality_disorder',
                'schizoid_personality_disorder',
                'schizotypal_personality_disorder',
                'delusions',
                'hallucinations',
                'disorganized_speech',
                'disorganized_behavior',
                'negative_symptoms',
                'conversion_disorder',
                'factitious_disorder',
                'illness_anxiety_disorder',
                'somatic_symptom_disorder',
                'acute_stress_disorder',
                'adjustment_disorders',
                'post_traumatic_stress_disorder',
                'reactive_attachment_disorder',
                'alcohol_related_disorders',
                'inhalant_use_disorders',
                'stimulant_use_disorder',
                'tobacco_use_disorder',
                'gambling_disorder',

                'abdominal_aortic_aneurysm',
                'acne',
                'acute_cholecystitis',
                'acute_lymphoblastic_leukaemia',
                'acute_lymphoblastic_leukaemia_children',
                'acute_lymphoblastic_leukaemia_teenagers_and_young_adults',
                'acute_myeloid_leukaemia',
                'acute_myeloid_leukaemia_children',
                'acute_myeloid_leukaemia_teenagers_and_young_adults',
                'acute_pancreatitis',
                'addison_disease',
                'alcohol_related_liver_disease',
                'allergic_rhinitis',
                'allergies',
                'alzheimer_disease',
                'anal_cancer',
                'anaphylaxis',
                'angioedema',
                'ankylosing_spondylitis',
                'anxiety',
                'anxiety_disorders_in_children',
                'appendicitis',
                'arthritis',
                'asbestosis',
                'asthma',
                'atopic_eczema',
                'attention_deficit_hyperactivity_disorder_adhd',
                'autistic_spectrum_disorder_asd',
                'bacterial_vaginosisautistic_spectrum_disorder_asd',
                'benign_prostate_enlargement',
                'bile_duct_cancer_cholangiocarcinoma',
                'binge_eating',
                'bipolar_disorder'


            )
        );
    }
    public function twin_identifier_info($request)
    {
        return TwinIdentifierInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'dominant_hand_writing_side',
                'are_you_twin',
                'twin_type',
                'twin_first_name',
                'twin_mi',
                'twin_last_name',
                'twin_difference_description',
                'birth_mark_located',
                'twin_birth_mark_located',
                'my_freckles_located',
                'twin_freckles_located',
                'my_moles_located',
                'twin_moles_located',
                'hair_are_different',
                'my_eye_color',
                'twin_eye_color',
                'my_hair_color',
                'twin_hair_color',
            )
        );
    }
    public function distinguish_identifier_info($request)
    {
        return DistinguishIdentifierInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'facial_neck_scars',
                'facial_neck_scars_description',
                'facial_or_neck_tattoos',
                'facial_or_neck_tattoos_description',
                'facial_plastic_surgery',
                'right_eye',
                'left_eye',
                'nose_job',
                'cheeks',
                'mouth',
                'chin',
                'fore_head',
                'face_lift',
                'lips',
                'facial_surgery_date',
                'number_of_plastic_surgery',
                'plastic_surgeon_name',
                'first_name_of_surgeon',
                'last_name_of_surgeon',
                'surgeon_house_address',
                'surgeon_street',
                'surgeon_state',
                'surgeon_city',
                'surgeon_zipcode',
                'surgeon_telephone',


            )
        );
    }
    public function store_hair_info($request)
    {
        return HairInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'natural_hair_color',
                'hair_style',
                'facial_hair_description',

            )
        );
    }

    public function store_head_and_face_info($request)
    {
        return HeadAndFaceInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'chin_description',
                'eyes_description',
                'hair_description',
                'mouth_description',
                'eye_color',
                'eyeware_prescription'
            )
        );
    }

    public function store_charge_card_info($request)
    {
        // dd($request->all());
        $data = $request->all();
        // dd($request->card_info);
        for ($i = 0; $i < count($request->card_info); $i++) {
            // dd($request->card_info[$i]);
            ChargeCardInformation::updateOrCreate(
                ['consumer_id' => $request->consumer_id, 'card_number' => $data['card_info'][$i]['card_number']],
                [
                    'card_number' => $data['card_info'][$i]['card_number'],
                    'nickname' => $data['card_info'][$i]['nickname'],
                    'primary_first_name' => $data['card_info'][$i]['primary_first_name'],
                    'primary_last_name' => $data['card_info'][$i]['primary_last_name'],
                    'cvc' => $data['card_info'][$i]['cvc'],
                    'name_of_bank' => $data['card_info'][$i]['name_of_bank'],
                    'expiry_date' => $data['card_info'][$i]['expiry_date'],
                    'card_has_card_has_secondary_auth_user' => isset($data['card_has_card_has_secondary_auth_user'][$i]) ? $data['card_has_card_has_secondary_auth_user'][$i] : null
                ]
            );
        }
        return;
    }
    public function store_employement_info($request)
    {
        return EmploymentInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'employer_name',
                'job_title',
                'employer_identification_number',
                'anual_salary_last_year',
                'are_you_active_memeber_of_labour_union',
                'labor_union_name',
                'your_union_membership_number',
                'membership_start',
                'membership_end',
                'union_contact_info'
            )
        );
    }
    public function store_my_neighborhood_info($request)
    {
            return MyNeighborhoodInformation::updateOrCreate(
                ['consumer_id' => $request->consumer_id],
                $request->only(
    
                    'consumer_id',
                    "neighborhood_guid_right",
                    "name_of_neighborhood_household_head_right",
                    "neighborhood_race_right",
                    'provide_neigborhood_address_right',
                    'neighborhood_house_address_right',
                    'neighborhood_urbanization_name_right',
                    'neighborhood_zipcode_right',
                    'neighborhood_state_right',
                    'neighborhood_city_right',
    
                    "neighborhood_race_left",
                    'provide_neigborhood_address_left',
                    'neighborhood_house_address_left',
                    'neighborhood_urbanization_name_left',
                    'neighborhood_zipcode_left',
                    'neighborhood_state_left',
                    'neighborhood_city_left',
                    "name_of_neighborhood_household_head_left",
                    "neighborhood_guid_left",
    
    
                    "neighborhood_race_front",
                    'provide_neigborhood_address_front',
                    'neighborhood_house_address_front',
                    'neighborhood_urbanization_name_front',
                    'neighborhood_zipcode_front',
                    'neighborhood_state_front',
                    'neighborhood_city_front',
                    "name_of_neighborhood_household_head_front",
                    "neighborhood_guid_front",
    
    
                    'provide_neigborhood_address_back',
                    'neighborhood_house_address_back',
                    'neighborhood_urbanization_name_back',
                    'neighborhood_zipcode_back',
                    'neighborhood_state_back',
                    'neighborhood_city_back',
                    "neighborhood_race_back",
                    "name_of_neighborhood_household_head_back",
                    "neighborhood_guid_back",
    
                )
            );
        
    }
    public function store_ethnicity_info($request)
    {

        $admin = Admin::find($request->consumer_id);

        if (empty($admin->guid)) {
            $random_bytes = random_bytes(32); // generates 16 random bytes
            $random_string = bin2hex($random_bytes);
            Admin::where('id', $request->consumer_id)->update(['guid' => 'CUSA' . $request->state . $this->getP52Info($request) . $request->consumer_id . $random_string]);
        }
        return EthnicityInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'race',
                'marital_status',
                'weight',
                'height',
                'middle_initial',
                'complexion',
                'Ethnicity'
            )
        );
    }
    public function getP52Info($request)
    {
        if ($request->race == 'white') {
            return 'W';
        } else {
            return 'P52';
        }
    }

    public function store_gender_identity_info($request)
    {
        return GenderIdentityInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'sex_at_birth',
                'legal_sex',
                'self_identify_sex'
            )
        );
    }

    public function store_find_me_here($request)
    {

        return FindMeHere::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'house_address',
                'building_name',
                'street_name',
                'state',
                'city',
                'town',
                'township',
                'parish',
                'village',
                'hamlet',
                'district',
                'county',
                'neighborhood_name',
                'zipcode',
                'urbanization_name',
                'house_type',
                'do_you_live_in_sky_crapper',
                'no_of_floor',
                'your_floor_no',
                'apartment_no',
                'room_no',
                'bed_no',
                'living_for_two_years',
                'old_house_address',
                'old_building_name',
                'old_street_name',
                'old_state',
                'old_city',
                'old_town',
                'old_township',
                'old_parish',
                'old_village',
                'old_hamlet',
                'old_district',
                'old_county',
                'old_neighborhood_name',
                'old_zipcode',
                'old_urbanization_name',
                'old_house_type',
                'old_do_you_live_in_sky_crapper',
                'old_no_of_floor',
                'old_your_floor_no',
                'old_apartment_no',
                'old_room_no',
                'old_bed_no',
                'email',
                'primary_area_code',
                'primary_mobile_number',
                'alternate_area_code',
                'alternate_telephone_number',
               

            )
        );
    }

    public function get_state_abbriviation($request)
    {
        $states = array(
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
        $state_abbr = null;
        if (FindMeHere::where('consumer_id', $request->consumer_id)->exists()) {
            $find_me_here = FindMeHere::where('consumer_id', $request->consumer_id)->first();
            $state_name = $find_me_here->state;
            if (!empty($state_name))
                $state_abbr = $states[$state_name];
        }
        return $state_abbr;
    }
    public function store_my_pidegree_info($request)
    {

        return MyPidegreeInformation::updateOrCreate(
            ['consumer_id' => $request->consumer_id],
            $request->only(
                'consumer_id',
                'fname',
                'middle_initial',
                'lname',
                'suffix',
                'nick_name',
                'date_of_birth',
                'social_security_no',
                'cpn_no',
                'us_vetran',
                'eligibility_protection',
                'consumer_presently_incarcerated'
            )
        );
    }

    public function return_later(Request $request)
    {
        FieldsetReturnBackData::updateOrCreate(['admin_id' => session('id')], $request->only('fieldset_id', 'module') + ['admin_id' => session('id')]);
        return response()->json(['success' => true, 'message' => 'Data saved successfully']);
    }

    public function updateProccess(Request $request)
    {

        // return $request->all();
        $url = "https://george-backend.quantilence.com/api/reset-process";
        $client = new Client();

        $array = [
            'gui' => $request->gui
        ];

        $res = $client->request('POST', $url, [
            'body' => json_encode($array),
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        return $res;

    }

    public function storeFieldSetData(int $adminId, string $module, string $fieldset_id)
    {
        $record = FieldsetReturnBackData::where('admin_id', $adminId)->first();
        if ($record) {
            $record->fieldset_id = $fieldset_id;
            $record->save();
        } else {
            $returnBackData = new FieldsetReturnBackData();
            $returnBackData->admin_id = $adminId;
            $returnBackData->module = $module;
            $returnBackData->fieldset_id = $fieldset_id;
            $returnBackData->save();
        }
    }
  
}
