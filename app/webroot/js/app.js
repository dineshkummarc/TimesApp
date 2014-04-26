// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation({
  abide : {
    patterns: {
      pass: /^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8}$/
    },
    validators: {
    	dateValidate: function(el, required, parent) {
    		if($('#dpInvoiceDate').val() > $('#dpDueDate').val()) {
    			return false;
    		} else {
    			$('.dateError').removeClass('error');
    			return true;
    		}
    	},
    	dateValidateNoRequired: function(el, required, parent) {
    		if(($('#dpProjectStartingDate').val() > $('#dpProjectDeadLine').val()) && $('#dpProjectDeadLine').val().length>0) {
    			return false;
    		} else {
    			$('.dateError').removeClass('error');
    			return true;
    		}
    	}
    }
  }
});
