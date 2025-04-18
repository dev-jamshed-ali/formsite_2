<fieldset class="wizard-fieldset  mt-4 @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_thirteen') show @endif" id="fieldset_thirteen">
    <h5>13. Open</h5>
    <input type="hidden" name="form_section" value="open" />

    <div class="row">
     
      

     

    </div>

  
    <div class="form-group clearfix">
        <a  href="javascript:;" onclick="returnLater('fieldset_thirteen','consumer_this_is_me')" class="form-wizard-return-btn float-left mr-3">Pause & Return Later</a>

        <a  href="javascript:;" onclick="previousStep('open_bar','twin_identifier_bar')" class="form-wizard-previous-btn float-left">Previous</a>
        <a onclick="checkFieldSetOpen()" href="javascript:;" class="form-wizard-next-btn  float-right">Save & Continue</a>
    </div>
</fieldset>
