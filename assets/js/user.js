$(function(){
  // deleteAccountModal
  $('#deleteAccountButton').click(function(){
    $('#deleteAccountModal').modal('show');
  });
  $('#cancelDeleteAccount').click(function(){
    $('#deleteAccountModal').modal('hide');
  });
  // signOffModal
  $('#signOffButton').click(function(){
    $('#signOffModal').modal('show');
  });
  $('#cancelSignOff').click(function(){
    $('#signOffModal').modal('hide');
  });
  $('#signOffConfirmation').click(function(){
    clearStorage_LS();
  })
  // settingsModal
  $('#settingsButton').click(function(){
    $('#settingsModal').modal('show');
  });
});
