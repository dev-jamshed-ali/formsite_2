<fieldset class="wizard-fieldset mt-4 @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_ten') show @endif" id="fieldset_ten">
    <h5>10. Hair </h5>
    <input type="hidden" name="form_section" value="hair_information" />

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">

                <label for="natural_hair_color" class="wizard-form-text-label">10.1 What is your natural hair color?  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span>
                </label>
                <select class="form-control" name="natural_hair_color" id="natural_hair_color"  @if(!empty($hair_info) ) disabled @endif>
                    <option></option>
                    <option value="black" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'black') selected @endif>Black</option>
                    <option value="blonde" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'blonde') selected @endif>Blonde</option>
                    <option value="brown" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'brown') selected @endif>Brown</option>
                    <option value="brunette" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'brunette') selected @endif>Brunette</option>
                    <option value="carrot_top_red" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'carrot_top_red') selected @endif>Carrot top red
                    </option>
                    <option value="dark_brown" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'dark_brown') selected @endif>Dark-brown</option>
                    <option value="fiery_red" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'fiery_red') selected @endif>Fiery red</option>
                    <option value="gray" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'gray') selected @endif>Gray</option>
                    <option value="honey" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'honey') selected @endif>Honey</option>
                    <option value="light_brown" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'light_brown') selected @endif>Light-brown</option>
                    <option value="platinum_blonde" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'platinum_blonde') selected @endif>Platinum blonde
                    </option>
                    <option value="sandy" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'sandy') selected @endif>Sandy</option>
                    <option value="silver" @if (!empty($hair_info) && $hair_info->natural_hair_color === 'silver') selected @endif>Silver</option>
                    <option value="strawberry_red" @if (!empty($hair_info) && $hair_info->strawberry_red === 'silver') selected @endif>Strawberry red
                    </option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="hair_style" class="wizard-form-text-label">10.2 What is your most popular hair style
                    these days?
                </label>
                <select class="form-control" name="hair_style" id="hair_style" >
                    <option></option>
                    <option value="1950s" @if (!empty($hair_info) && $hair_info->hair_style === '1950s') selected @endif>1950s</option>
                    <option value="afro" @if (!empty($hair_info) && $hair_info->hair_style === 'afro') selected @endif>Afro</option>
                    <option value="asymmetric_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'asymmetric_cut') selected @endif>Asymmetric Cut
                    </option>
                    <option value="bald" @if (!empty($hair_info) && $hair_info->hair_style === 'bald') selected @endif>Bald</option>
                    <option value="beehive" @if (!empty($hair_info) && $hair_info->hair_style === 'beehive') selected @endif>Beehive</option>
                    <option value="big_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'big_hair') selected @endif>Big Hair</option>
                    <option value="blowout" @if (!empty($hair_info) && $hair_info->hair_style === 'blowout') selected @endif>Blowout</option>
                    <option value="blunt_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'blunt_hair') selected @endif>Blunt Hair</option>
                    <option value="bob_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'bob_cut') selected @endif>Bob Cut</option>
                    <option value="bouffant" @if (!empty($hair_info) && $hair_info->hair_style === 'bouffant') selected @endif>Bouffant</option>
                    <option value="bowl_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'bowl_cut') selected @endif>Bowl Cut</option>
                    <option value="braid" @if (!empty($hair_info) && $hair_info->hair_style === 'braid') selected @endif>Braid</option>
                    <option value="brush_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'brush_cut') selected @endif>Brush Cut</option>
                    <option value="bun_burr" @if (!empty($hair_info) && $hair_info->hair_style === 'bun_burr') selected @endif>Bun/Burr</option>


                    <option value="business_man_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'business_man_cut') selected @endif>Business-Man
                        Cut</option>
                    <option value="butch_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'butch_cut') selected @endif>Butch Cut</option>
                    <option value="buzz_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'buzz_cut') selected @endif>Buzz Cut</option>
                    <option value="caesar_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'caesar_cut') selected @endif>Caesar Cut</option>
                    <option value="chignon" @if (!empty($hair_info) && $hair_info->hair_style === 'chignon') selected @endif>Chignon</option>
                    <option value="chonmage" @if (!empty($hair_info) && $hair_info->hair_style === 'chonmage') selected @endif>Chonmage</option>
                    <option value="comb_over" @if (!empty($hair_info) && $hair_info->hair_style === 'comb_over') selected @endif>Comb Over</option>
                    <option value="conk" @if (!empty($hair_info) && $hair_info->hair_style === 'conk') selected @endif>Conk</option>
                    <option value="cornrows" @if (!empty($hair_info) && $hair_info->hair_style === 'cornrows') selected @endif>Cornrows</option>
                    <option value="crew_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'crew_cut') selected @endif>Crew Cut</option>
                    <option value="cropped_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'cropped_hair') selected @endif>Cropped Hair
                    </option>
                    <option value="crown_braid" @if (!empty($hair_info) && $hair_info->hair_style === 'crown_braid') selected @endif>Crown Braid</option>
                    <option value="croydon_facelift" @if (!empty($hair_info) && $hair_info->hair_style === 'croydon_facelift') selected @endif>Croydon
                        Facelift</option>
                    <option value="curtained_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'curtained_hair') selected @endif>Curtained Hair
                    </option>
                    <option value="devilock" @if (!empty($hair_info) && $hair_info->hair_style === 'devilock') selected @endif>Devilock</option>
                    <option value="dice_bob" @if (!empty($hair_info) && $hair_info->hair_style === 'dice_bob') selected @endif>Dice Bob</option>
                    <option value="dido_flip" @if (!empty($hair_info) && $hair_info->hair_style === 'dido_flip') selected @endif>Dido Flip</option>
                    <option value="dread_perming" @if (!empty($hair_info) && $hair_info->hair_style === 'dread_perming') selected @endif>Dread Perming
                    </option>
                    <option value="dreadlocks" @if (!empty($hair_info) && $hair_info->hair_style === 'dreadlocks') selected @endif>Dreadlocks</option>
                    <option value="ducks_ass" @if (!empty($hair_info) && $hair_info->hair_style === 'ducks_ass') selected @endif>Duck’s Ass</option>
                    <option value="emo_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'emo_hair') selected @endif>Emo Hair</option>
                    <option value="eton_crop" @if (!empty($hair_info) && $hair_info->hair_style === 'eton_crop') selected @endif>Eton Crop</option>


                    <option value="fade" @if (!empty($hair_info) && $hair_info->hair_style === 'fade') selected @endif>Fade</option>
                    <option value="fallerra_hairdo" @if (!empty($hair_info) && $hair_info->hair_style === 'fallerra_hairdo') selected @endif>Fallerra Hairdo
                    </option>
                    <option value="fauxhawk" @if (!empty($hair_info) && $hair_info->hair_style === 'fauxhawk') selected @endif>Fauxhawk</option>
                    <option value="feathered_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'feathered_hair') selected @endif>Feathered Hair
                    </option>
                    <option value="finger_wave" @if (!empty($hair_info) && $hair_info->hair_style === 'finger_wave') selected @endif>Finger Wave</option>
                    <option value="fishtail_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'fishtail_hair') selected @endif>Fishtail Hair
                    </option>
                    <option value="flattop" @if (!empty($hair_info) && $hair_info->hair_style === 'flattop') selected @endif>Flattop</option>
                    <option value="flipped_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'flipped_hair') selected @endif>Flipped Hair
                    </option>
                    <option value="fontange" @if (!empty($hair_info) && $hair_info->hair_style === 'fontange') selected @endif>Fontange</option>
                    <option value="french_braid" @if (!empty($hair_info) && $hair_info->hair_style === 'french_braid') selected @endif>French Braid
                    </option>
                    <option value="french_twist" @if (!empty($hair_info) && $hair_info->hair_style === 'french_twist') selected @endif>French Twist
                    </option>
                    <option value="fringe" @if (!empty($hair_info) && $hair_info->hair_style === 'fringe') selected @endif>Fringe (Bangs)</option>
                    <option value="frosted_tips" @if (!empty($hair_info) && $hair_info->hair_style === 'frosted_tips') selected @endif>Frosted Tips
                    </option>
                    <option value="full_crown" @if (!empty($hair_info) && $hair_info->hair_style === 'full_crown') selected @endif>Full Crown</option>
                    <option value="hair_extensions" @if (!empty($hair_info) && $hair_info->hair_style === 'hair_extensions') selected @endif>Hair Extensions
                    </option>
                    <option value="hairstyles" @if (!empty($hair_info) && $hair_info->hair_style === 'hairstyles') selected @endif>Hairstyles</option>
                    <option value="half_crown" @if (!empty($hair_info) && $hair_info->hair_style === 'half_crown') selected @endif>Half Crown</option>
                    <option value="half_updo" @if (!empty($hair_info) && $hair_info->hair_style === 'half_updo') selected @endif>Half Updo</option>
                    <option value="harvard_clip" @if (!empty($hair_info) && $hair_info->hair_style === 'harvard_clip') selected @endif>Harvard Clip
                    </option>
                    <option value="high_and_tight" @if (!empty($hair_info) && $hair_info->hair_style === 'high_and_tight') selected @endif>High And Tight
                    </option>
                    <option value="highlights" @if (!empty($hair_info) && $hair_info->hair_style === 'highlights') selected @endif>Highlights</option>
                    <option value="hime_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'hime_cut') selected @endif>Hime Cut</option>


                    <option value="historical_christian_hairstyles" @if (!empty($hair_info) && $hair_info->hair_style === 'historical_christian_hairstyles') selected @endif>
                        Historical Christian Hairstyles</option>
                    <option value="hi_top_fade" @if (!empty($hair_info) && $hair_info->hair_style === 'hi_top_fade') selected @endif>Hi-Top Fade</option>
                    <option value="induction_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'induction_cut') selected @endif>Induction Cut
                    </option>
                    <option value="ivy_league" @if (!empty($hair_info) && $hair_info->hair_style === 'ivy_league') selected @endif>Ivy League</option>
                    <option value="jewfro" @if (!empty($hair_info) && $hair_info->hair_style === 'jewfro') selected @endif>Jewfro</option>
                    <option value="jheri_curl" @if (!empty($hair_info) && $hair_info->hair_style === 'jheri_curl') selected @endif>Jheri Curl</option>
                    <option value="layered_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'layered_hair') selected @endif>Layered Hair
                    </option>
                    <option value="liberty_spikes" @if (!empty($hair_info) && $hair_info->hair_style === 'liberty_spikes') selected @endif>Liberty Spikes
                    </option>
                    <option value="line_up" @if (!empty($hair_info) && $hair_info->hair_style === 'line_up') selected @endif>Line Up</option>
                    <option value="lob" @if (!empty($hair_info) && $hair_info->hair_style === 'lob') selected @endif>Lob</option>
                    <option value="long_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'long_hair') selected @endif>Long Hair</option>
                    <option value="macklemore_haircut" @if (!empty($hair_info) && $hair_info->hair_style === 'macklemore_haircut') selected @endif>Macklemore
                        Haircut</option>
                    <option value="marcelling" @if (!empty($hair_info) && $hair_info->hair_style === 'marcelling') selected @endif>Marcelling</option>
                    <option value="mod_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'mod_cut') selected @endif>Mod Cut</option>
                    <option value="mohawk" @if (!empty($hair_info) && $hair_info->hair_style === 'mohawk') selected @endif>Mohawk</option>
                    <option value="mop_top" @if (!empty($hair_info) && $hair_info->hair_style === 'mop_top') selected @endif>Mop-Top</option>
                    <option value="mullet" @if (!empty($hair_info) && $hair_info->hair_style === 'mullet') selected @endif>Mullet</option>
                    <option value="odango" @if (!empty($hair_info) && $hair_info->hair_style === 'odango') selected @endif>Odango</option>
                    <option value="oseledets" @if (!empty($hair_info) && $hair_info->hair_style === 'oseledets') selected @endif>Oseledets</option>
                    <option value="pageboy" @if (!empty($hair_info) && $hair_info->hair_style === 'pageboy') selected @endif>Pageboy</option>
                    <option value="part_in_middle" @if (!empty($hair_info) && $hair_info->hair_style === 'part_in_middle') selected @endif>Part In Middle
                    </option>
                    <option value="part_on_left" @if (!empty($hair_info) && $hair_info->hair_style === 'part_on_left') selected @endif>
                        Part On Left</option>


                    <option value="part_on_right" @if (!empty($hair_info) && $hair_info->hair_style === 'part_on_right') selected="selected" @endif>Part
                        On Right</option>
                    <option value="payot_perm" @if (!empty($hair_info) && $hair_info->hair_style === 'payot_perm') selected="selected" @endif>
                        Payot/Perm</option>
                    <option value="pigtails" @if (!empty($hair_info) && $hair_info->hair_style === 'pigtails') selected="selected" @endif>Pigtails
                    </option>
                    <option value="pixie_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'pixie_cut') selected="selected" @endif>Pixie Cut
                    </option>
                    <option value="pompadour" @if (!empty($hair_info) && $hair_info->hair_style === 'pompadour') selected="selected" @endif>Pompadour
                    </option>
                    <option value="ponytail" @if (!empty($hair_info) && $hair_info->hair_style === 'ponytail') selected="selected" @endif>Ponytail
                    </option>
                    <option value="pony_tail" @if (!empty($hair_info) && $hair_info->hair_style === 'pony_tail') selected="selected" @endif>
                        Pony-Tail</option>
                    <option value="princeton" @if (!empty($hair_info) && $hair_info->hair_style === 'princeton') selected="selected" @endif>
                        Princeton</option>
                    <option value="professional_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'professional_cut') selected="selected" @endif>
                        Professional Cut</option>
                    <option value="psychobilly_wedge" @if (!empty($hair_info) && $hair_info->hair_style === 'psychobilly_wedge') selected="selected" @endif>
                        Psychobilly Wedge</option>
                    <option value="queue" @if (!empty($hair_info) && $hair_info->hair_style === 'queue') selected="selected" @endif>Queue
                    </option>
                    <option value="quiff" @if (!empty($hair_info) && $hair_info->hair_style === 'quiff') selected="selected" @endif>Quiff
                    </option>
                    <option value="rattail" @if (!empty($hair_info) && $hair_info->hair_style === 'rattail') selected="selected" @endif>Rattail
                    </option>
                    <option value="razor_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'razor_cut') selected="selected" @endif>Razor
                        Cut</option>
                    <option value="recon" @if (!empty($hair_info) && $hair_info->hair_style === 'recon') selected="selected" @endif>Recon
                    </option>
                    <option value="regular_haircut" @if (!empty($hair_info) && $hair_info->hair_style === 'regular_haircut') selected="selected" @endif>
                        Regular Haircut</option>
                    <option value="regular_taper_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'regular_taper_cut') selected="selected" @endif>
                        Regular Taper Cut</option>
                    <option value="ringlets" @if (!empty($hair_info) && $hair_info->hair_style === 'ringlets') selected="selected" @endif>Ringlets
                    </option>
                    <option value="semi_bald" @if (!empty($hair_info) && $hair_info->hair_style === 'semi_bald') selected="selected" @endif>
                        Semi-Bald</option>
                    <option value="shag" @if (!empty($hair_info) && $hair_info->hair_style === 'shag') selected="selected" @endif>Shag
                    </option>
                    <option value="shape_up" @if (!empty($hair_info) && $hair_info->hair_style === 'shape_up') selected="selected" @endif>Shape-Up
                    </option>

                    <option value="shingle_bob" @if (!empty($hair_info) && $hair_info->hair_style === 'shingle_bob') selected @endif>Shingle Bob
                    </option>
                    <option value="short_back_and_sides" @if (!empty($hair_info) && $hair_info->hair_style === 'short_back_and_sides') selected @endif>Short
                        Back And Sides</option>
                    <option value="short_brush_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'short_brush_cut') selected @endif>Short Brush
                        Cut</option>
                    <option value="short_hair_1" @if (!empty($hair_info) && $hair_info->hair_style === 'short_hair_1') selected @endif>Short Hair
                    </option>
                    <option value="short_hair_2" @if (!empty($hair_info) && $hair_info->hair_style === 'short_hair_2') selected @endif>Short Hair
                    </option>
                    <option value="slicked_back" @if (!empty($hair_info) && $hair_info->hair_style === 'slicked_back') selected @endif>Slicked-Back
                    </option>
                    <option value="spiky_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'spiky_hair') selected @endif>Spiky Hair
                    </option>
                    <option value="standard_haircut" @if (!empty($hair_info) && $hair_info->hair_style === 'standard_haircut') selected @endif>Standard
                        Haircut</option>
                    <option value="surfer_hair" @if (!empty($hair_info) && $hair_info->hair_style === 'surfer_hair') selected @endif>Surfer Hair
                    </option>
                    <option value="taper_cut" @if (!empty($hair_info) && $hair_info->hair_style === 'taper_cut') selected @endif>Taper Cut</option>
                    <option value="the_rachel" @if (!empty($hair_info) && $hair_info->hair_style === 'the_rachel') selected @endif>The Rachel
                    </option>
                    <option value="tonsure" @if (!empty($hair_info) && $hair_info->hair_style === 'tonsure') selected @endif>Tonsure</option>
                    <option value="undercut" @if (!empty($hair_info) && $hair_info->hair_style === 'undercut') selected @endif>Undercut</option>
                    <option value="updo" @if (!empty($hair_info) && $hair_info->hair_style === 'updo') selected @endif>Updo</option>
                    <option value="waves_weave" @if (!empty($hair_info) && $hair_info->hair_style === 'waves_weave') selected @endif>Waves/Weave
                    </option>


                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">

                <label for="facial_hair_description" class="wizard-form-text-label">10.3 What best describes your
                    Facial Hair as of today?
                </label>
                <select class="form-control" name="facial_hair_description" id="facial_hair_description" >
                    <option></option>
                    <option value="beard" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'beard') selected @endif>Beard</option>
                    <option value="box_braids" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'box_braids') selected @endif>Box Braids
                    </option>
                    <option value="chin_curtain" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'chin_curtain') selected @endif>Chin Curtain
                    </option>
                    <option value="chinstrap" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'chinstrap') selected @endif>Chinstrap</option>
                    <option value="cornrows" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'cornrows') selected @endif>Cornrows</option>
                    <option value="crochet_braids" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'crochet_braids') selected @endif>Crochet Braids
                    </option>
                    <option value="designer_stubble" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'designer_stubble') selected @endif>Designer
                        Stubble</option>
                    <option value="extension" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'extension') selected @endif>Extension</option>
                    <option value="faux_locs" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'faux_locs') selected @endif>Faux Locs</option>
                    <option value="feeder_braids" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'feeder_braids') selected @endif>Feeder Braids
                    </option>
                    <option value="fu_manchu" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'fu_manchu') selected @endif>Fu Manchu</option>
                    <option value="goatee" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'goatee') selected @endif>Goatee</option>
                    <option value="gypsy_braids" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'gypsy_braids') selected @endif>Gypsy Braids
                    </option>
                    <option value="handlebar" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'handlebar') selected @endif>Handlebar</option>
                    <option value="horseshoe" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'horseshoe') selected @endif>Horseshoe</option>
                    <option value="loc_retwist" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'loc_retwist') selected @endif>Loc Retwist
                    </option>
                    <option value="moustache" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'moustache') selected @endif>Moustache</option>
                    <option value="neckbear" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'neckbear') selected @endif>Neckbear</option>
                    <option value="not_applicable" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'not_applicable') selected @endif>Not Applicable
                    </option>
                    <option value="pencil" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'pencil') selected @endif>Pencil</option>
                    <option value="porkchops" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'porkchops') selected @endif>Porkchops</option>
                    <option value="shenandoah" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'shenandoah') selected @endif>Shenandoah
                    </option>
                    <option value="sideburns" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'sideburns') selected @endif>Sideburns</option>
                    <option value="soul_patch" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'soul_patch') selected @endif>Soul Patch
                    </option>
                    <option value="toothbrush" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'toothbrush') selected @endif>Toothbrush
                    </option>
                    <option value="twists" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'twists') selected @endif>Twists</option>
                    <option value="walrus" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'walrus') selected @endif>Walrus</option>
                    <option value="weave" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'weave') selected @endif>Weave</option>
                    <option value="van_dyke" @if (!empty($hair_info) && $hair_info->facial_hair_description === 'van_dyke') selected @endif>Van Dyke</option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>






    </div>
    <div class="form-group clearfix">
        <a  href="javascript:;" onclick="returnLater('fieldset_ten','consumer_this_is_me')" class="form-wizard-return-btn float-left mr-3">Pause & Return Later</a>

        {{-- <a href="javascript:;" onclick="previousStep('hair_bar','head_n_face_bar')"
            class="form-wizard-previous-btn float-left">Previous</a> --}}
        <a onclick="checkFieldSetHair()" href="javascript:;" class="form-wizard-next-btn  float-right"
            id="hair_information_button">Save & Continue</a>
    </div>
</fieldset>
