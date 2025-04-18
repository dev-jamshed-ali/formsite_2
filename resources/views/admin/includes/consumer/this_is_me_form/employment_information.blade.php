<fieldset class="wizard-fieldset @if (!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_six') show @endif" id="fieldset_six">
    <h4 class="stepper-right-f1 mb-3">
        6. Employment Information
    </h4>
    <input type="hidden" name="form_section" value="employment_information" />

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="employer-name" class="mb-2">Employer's name</label>
            <input value="{{ $employment_info->employer_name ?? '' }}" 
                   name="employer_name" 
                   type="text"
                   class="form-control wizard-required" 
                   id="employer_name">
            <p class="text_danger form_error"></p>
        </div>
        
        <div class="col-md-4 mb-3">
            <label class="mb-2">Job Title</label>
            <input type="text" 
                   id="job-title" 
                   name="job_title" 
                   value="{{ $employment_info->job_title ?? '' }}" 
                   class="form-control" 
                   placeholder="Start typing a job title..."
                   autocomplete="off">
            <div id="autocomplete-results" 
                 class="list-group mt-2 position-absolute" 
                 style="max-height: 200px; overflow-y: auto; z-index: 1000; width: 95%;">
            </div>
            <p class="text_danger form_error"></p>
        </div>

        <div class="col-md-4 mb-3">
            <label for="Employer identification number" class="mb-2">Employer identification number</label>
            <input value="{{ $employment_info->employer_identification_number ?? '' }}"
                   name="employer_identification_number" 
                   type="text" 
                   class="form-control wizard-required"
                   id="employer_identification_number">
            <p class="text_danger form_error"></p>
        </div>

        <div class="col-md-4 mb-3">
            <label class="mb-2">Annual income last year</label>
            <select class="form-control" name="anual_salary_last_year" id="anual_salary_last_year" required>
                <option value="">Select Annual Income</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '0_30000') selected @endif value="0_30000">0 - 30,000</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '30000_75000') selected @endif value="30000_75000">30,000 - 75,000</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '75000_125000') selected @endif value="75000_125000">75,000 - 125,000</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '125000_200000') selected @endif value="125000_200000">125,000 - 200,000</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '200000_250000') selected @endif value="200000_250000">200,000 - 250,000</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '250000_500000') selected @endif value="250000_500000">250,000 - 500,000</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '500000_1000000') selected @endif value="500000_1000000">500,000 - 1,000,000</option>
                <option @if (!empty($employment_info) && $employment_info->anual_salary_last_year == '1000000_plus') selected @endif value="1000000_plus">1,000,000+</option>
            </select>
            <p class="text_danger form_error"></p>
        </div>

        <div class="col-md-12 mt-3 mb-4">
            <div class="form-check form-switch pb-2">
                <input class="form-check-input" 
                       type="checkbox" 
                       role="switch"
                       id="labor_union_switch"
                       name="are_you_active_memeber_of_labour_union"
                       @if (!empty($employment_info) && $employment_info->are_you_active_memeber_of_labour_union == 1) checked @endif
                       value="1" />
                <label class="form-check-label" for="labor_union_switch">
                    Are you an active member of a Trade or Labor Union?
                </label>
            </div>
        </div>
    </div>

    <div class="row mb-5" id="union_fields">
        <div class="col-md-4 mb-3">
            <label for="labor_union_name" class="mb-2">Union Name</label>
            <input value="{{ $employment_info->labor_union_name ?? '' }}" 
                   name="labor_union_name" 
                   type="text"
                   class="form-control union-field" 
                   id="labor_union_name" 
                   disabled>
            <p class="text_danger form_error"></p>
        </div>

        <div class="col-md-4 mb-3">
            <label class="mb-2">Union Membership Number</label>
            <input value="{{ $employment_info->your_union_membership_number ?? '' }}"
                   name="your_union_membership_number" 
                   type="text" 
                   class="form-control union-field"
                   id="your_union_membership_number" 
                   disabled>
            <p class="text_danger form_error"></p>
        </div>

        <div class="col-md-4 mb-3">
            <label for="membership_start" class="mb-2">Membership Start Date</label>
            <input type="date" 
                   class="form-control union-field" 
                   value="{{ $employment_info->membership_start ?? '' }}"
                   id="membership_start" 
                   name="membership_start" 
                   disabled>
            <p class="text_danger form_error"></p>
        </div>

        <div class="col-md-4 mb-3">
            <label for="membership_end" class="mb-2">Membership End Date</label>
            <input type="date" 
                   value="{{ $employment_info->membership_end ?? '' }}" 
                   class="form-control union-field"
                   id="membership_end" 
                   name="membership_end" 
                   disabled>
            <p class="text_danger form_error"></p>
        </div>

        <div class="col-md-4 mb-3">
            <label class="mb-2">Union Contact Information</label>
            <input type="text" 
                   class="form-control union-field" 
                   value="{{ $employment_info->union_contact_info ?? '' }}"
                   id="union_contact_info" 
                   name="union_contact_info" 
                   disabled>
            <p class="text_danger form_error"></p>
        </div>
    </div>

    <!-- Navigation buttons -->
    <button type="button" name="previous" onclick="returnLater('fieldset_six','consumer_this_is_me')"
        class="form-wizard-return-btn arrow-btn float-start">
        <img src="{{ asset('/public/files/img/arrow-back.png') }}" alt="btn-arrow" value="Pause and Return Later" />
        Pause and Return Later
    </button>

    <button type="button" name="next" onclick="checkFieldSetEmploymentInformation()"
        id="employment_information_button" class="form-wizard-next-btn arrow-btn float-end">
        Save & Continue
        <img src="{{ asset('/public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
    </button>

    <script>
    $(document).ready(function() {
        let typingTimer;
        const doneTypingInterval = 300;
        
        // Job title autocomplete
        $('#job-title').on('click', function() {
            const query = $(this).val().trim();
            if (query.length >= 3) {
                fetchJobTitles(query);
            }
        });
        
        $('#job-title').on('input', function() {
            clearTimeout(typingTimer);
            const query = $(this).val().trim();
            const results = $('#autocomplete-results');
            
            if (query.length < 3) {
                results.empty();
                return;
            }
            
            typingTimer = setTimeout(() => {
                fetchJobTitles(query);
            }, doneTypingInterval);
        });

        function fetchJobTitles(query) {
            $.ajax({
                url: "{{ route('autocomplete.job.titles') }}",
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    const results = $('#autocomplete-results');
                    results.empty();
                    
                    if (data.length > 0) {
                        data.forEach(item => {
                            const cleanTitle = item.title.trim();
                            results.append(`
                                <button type="button" 
                                        class="list-group-item list-group-item-action job-title-option"
                                        data-title="${cleanTitle}">
                                    ${cleanTitle}
                                </button>
                            `);
                        });
                    } else {
                        results.append(`
                            <div class="list-group-item text-muted">
                                No matching job titles found
                            </div>
                        `);
                    }
                },
                error: function() {
                    $('#autocomplete-results').empty().append(`
                        <div class="list-group-item text-danger">
                            Error loading job titles
                        </div>
                    `);
                }
            });
        }

        // Handle job title selection
        $(document).on('click', '.job-title-option', function() {
            const selectedTitle = $(this).data('title');
            $('#job-title').val(selectedTitle);
            $('#autocomplete-results').empty();
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#job-title, #autocomplete-results').length) {
                $('#autocomplete-results').empty();
            }
        });

        // Update union fields handling
        $('#labor_union_switch').on('change', function() {
            const isChecked = $(this).is(':checked');
            $('.union-field').prop('disabled', !isChecked);
            
            if (!isChecked) {
                // Clear all union fields when unchecked
                $('.union-field').val('');
                // Remove required attribute when disabled
                $('.union-field').prop('required', false);
                // Clear any error messages
                $('.union-field').closest('.mb-3').find('.text_danger').text('');
            } else {
                // Add required attribute when enabled
                $('.union-field').prop('required', true);
            }
        });

        // Date validation for membership dates
        $('#membership_start, #membership_end').on('change', function() {
            const startDate = new Date($('#membership_start').val());
            const endDate = new Date($('#membership_end').val());
            const today = new Date();

            if (startDate > endDate) {
                alert('Membership start date cannot be after end date');
                $(this).val('');
            }

            if (startDate > today) {
                alert('Membership start date cannot be in the future');
                $('#membership_start').val('');
            }
        });

        // Initialize union fields based on initial checkbox state
        const initialUnionState = $('#labor_union_switch').is(':checked');
        $('.union-field').prop('disabled', !initialUnionState);
        $('.union-field').prop('required', initialUnionState);
    });

    // Update the form validation function
    function checkFieldSetEmploymentInformation() {
        let isValid = true;
        $('.wizard-required').each(function() {
            if ($(this).val() === '') {
                $(this).closest('.mb-3').find('.text_danger').text('This field is required');
                isValid = false;
            } else {
                $(this).closest('.mb-3').find('.text_danger').text('');
            }
        });

        // Only validate union fields if the switch is checked
        if ($('#labor_union_switch').is(':checked')) {
            $('.union-field:not(:disabled)').each(function() {
                if ($(this).val() === '') {
                    $(this).closest('.mb-3').find('.text_danger').text('This field is required');
                    isValid = false;
                } else {
                    $(this).closest('.mb-3').find('.text_danger').text('');
                }
            });
        }

        if (isValid) {
            nextFieldset();
        }
        return isValid;
    }
    </script>
</fieldset>