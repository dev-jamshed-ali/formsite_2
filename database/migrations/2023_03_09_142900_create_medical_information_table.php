<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->string('medical_house_address')->nullable();
            $table->string('medical_street')->nullable();
            $table->string('medical_country')->nullable();
            $table->string('medical_state')->nullable();
            $table->string('medical_city')->nullable();
            $table->string('medical_zipcode')->nullable();
            $table->string('medical_guid')->nullable();
            $table->boolean('want_to_know_law_inforcement')->default(0);
            $table->boolean('do_you_have_hidden_ailment')->default(0);
            $table->boolean('agoraphobia')->default(0);
            $table->boolean('generalized_anxiety_disorder_gad')->default(0);
            $table->boolean('panic_disorder')->default(0);
            $table->boolean('separation_anxiety_disorder')->default(0);
            $table->boolean('social_anxiety_disorder')->default(0);
            $table->boolean('specific_phobias')->default(0);
            $table->boolean('depressive_episodes')->default(0);
            $table->boolean('mania')->default(0);
            $table->boolean('breathing_related_sleep_disorders')->default(0);
            $table->boolean('hypersomnolence')->default(0);
            $table->boolean('insomnia_disorder')->default(0);
            $table->boolean('narcolepsy')->default(0);
            $table->boolean('parasomnias')->default(0);
            $table->boolean('restless_legs_syndrome')->default(0);
            $table->boolean('disruptive_mood_dysregulation_disorder')->default(0);
            $table->boolean('major_depressive_disorder')->default(0);
            $table->boolean('persistent_depressive_disorder')->default(0);
            $table->boolean('other_or_unspecified_depressive_disorder')->default(0);
            $table->boolean('premenstrual_dysphoric_disorder')->default(0);
            $table->boolean('medication_depressive_disorder')->default(0);
            $table->boolean('conduct_disorder')->default(0);
            $table->boolean('intermittent_explosive_disorder')->default(0);
            $table->boolean('kleptomania')->default(0);
            $table->boolean('oppositional_defiant_disorder')->default(0);
            $table->boolean('pyromania')->default(0);
            $table->boolean('dissociative_amnesia')->default(0);
            $table->boolean('dissociative_identity_disorder')->default(0);
            $table->boolean('derealization_disorder')->default(0);
            $table->boolean('anorexia_nervosa')->default(0);
            $table->boolean('binge_eating_disorder')->default(0);
            $table->boolean('bulimia_nervosa')->default(0);
            $table->boolean('pica')->default(0);
            $table->boolean('rumination_disorder')->default(0);
            $table->boolean('sleep_disorders')->default(0);
            $table->boolean('delirium')->default(0);
            $table->boolean('neurocognitive_disorders')->default(0);
            $table->boolean('adhd')->default(0);
            $table->boolean('autism_spectrum_disorder')->default(0);
            $table->boolean('communication_disorders')->default(0);
            $table->boolean('global_developmental_delay')->default(0);
            $table->boolean('intellectual_disability')->default(0);
            $table->boolean('obsessive_compulsive_disorder')->default(0);
            $table->boolean('body_dysmorphic_disorder')->default(0);
            $table->boolean('hoarding_disorder')->default(0);
            $table->boolean('trichotillomania')->default(0);
            $table->boolean('excoriation_disorder')->default(0);
            $table->boolean('ocd_medical_condition')->default(0);
            $table->boolean('antisocial_personality_disorder')->default(0);
            $table->boolean('avoidant_personality_disorder')->default(0);
            $table->boolean('borderline_personality_disorder')->default(0);
            $table->boolean('dependent_personality_disorder')->default(0);
            $table->boolean('histrionic_personality_disorder')->default(0);
            $table->boolean('narcissistic_personality_disorder')->default(0);
            $table->boolean('obsessive_compulsive_personality_disorder')->default(0);
            $table->boolean('paranoid_personality_disorder')->default(0);
            $table->boolean('schizoid_personality_disorder')->default(0);
            $table->boolean('schizotypal_personality_disorder')->default(0);
            $table->boolean('delusions')->default(0);
            $table->boolean('hallucinations')->default(0);
            $table->boolean('disorganized_speech')->default(0);
            $table->boolean('disorganized_behavior')->default(0);
            $table->boolean('negative_symptoms')->default(0);
            $table->boolean('conversion_disorder')->default(0);
            $table->boolean('factitious_disorder')->default(0);
            $table->boolean('illness_anxiety_disorder')->default(0);
            $table->boolean('somatic_symptom_disorder')->default(0);
            $table->boolean('acute_stress_disorder')->default(0);
            $table->boolean('adjustment_disorders')->default(0);
            $table->boolean('post_traumatic_stress_disorder')->default(0);
            $table->boolean('reactive_attachment_disorder')->default(0);
            $table->boolean('alcohol_related_disorders')->default(0);
            $table->boolean('inhalant_use_disorders')->default(0);
            $table->boolean('stimulant_use_disorder')->default(0);
            $table->boolean('tobacco_use_disorder')->default(0);
            $table->boolean('gambling_disorder')->default(0);
            
            $table->boolean('abdominal_aortic_aneurysm')->default(0);
            $table->boolean('acne')->default(0);
            $table->boolean('acute_cholecystitis')->default(0);
            $table->boolean('acute_lymphoblastic_leukaemia')->default(0);
            $table->boolean('acute_lymphoblastic_leukaemia_children')->default(0);
            $table->boolean('acute_lymphoblastic_leukaemia_teenagers_and_young_adults')->default(0);
            $table->boolean('acute_myeloid_leukaemia')->default(0);
            $table->boolean('acute_myeloid_leukaemia_children')->default(0);
            $table->boolean('acute_myeloid_leukaemia_teenagers_and_young_adults')->default(0);
            $table->boolean('acute_pancreatitis')->default(0);
            $table->boolean('addison_disease')->default(0);
            $table->boolean('alcohol_related_liver_disease')->default(0);
            $table->boolean('allergic_rhinitis')->default(0);
            $table->boolean('allergies')->default(0);
            $table->boolean('alzheimer_disease')->default(0);
            $table->boolean('anal_cancer')->default(0);
            $table->boolean('anaphylaxis')->default(0);
            $table->boolean('angioedema')->default(0);
            $table->boolean('ankylosing_spondylitis')->default(0);
            $table->boolean('anxiety')->default(0);
            $table->boolean('anxiety_disorders_in_children')->default(0);
            $table->boolean('appendicitis')->default(0);
            $table->boolean('arthritis')->default(0);
            $table->boolean('asbestosis')->default(0);
            $table->boolean('asthma')->default(0);
            $table->boolean('atopic_eczema')->default(0);
            $table->boolean('attention_deficit_hyperactivity_disorder_adhd')->default(0);
            $table->boolean('autistic_spectrum_disorder_asd')->default(0);
            $table->boolean('bacterial_vaginosisautistic_spectrum_disorder_asd')->default(0);
            $table->boolean('benign_prostate_enlargement')->default(0);
            $table->boolean('bile_duct_cancer_cholangiocarcinoma')->default(0);
            $table->boolean('binge_eating')->default(0);
            $table->boolean('bipolar_disorder')->default(0);     
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_information');
    }
}
