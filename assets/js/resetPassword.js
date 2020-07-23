$(function(){
  $('form input').keyup(function(){
    var formValid = true;
    $('#submitCodeButton').attr('disabled', true);
    $('#resetCode input').each(function(){
      if ($(this).val().trim() == ''){
        $(this).focus();
        formValid = false;
        return false;
      }
    });
    if (formValid){
      $('#submitCodeButton').attr('disabled', false);
      $('#submitCodeButton').focus();
    }
  })
});
