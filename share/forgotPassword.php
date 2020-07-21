<div class="modal fade" id="forgotPasswordModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary py-2"></div>
      <div class="modal-body">
        <h5 class="text-center">Veuillez préciser votre email afin de récupérer l'accès à votre compte</h5>
        <form action="#" method="post">
          <div id="mailInputContainer" class="d-flex flex-wrap">
            <label for="mailInput" class="col-10 mx-auto">Entrer votre email :</label>
            <input id="mailInput" class="col-10 mx-auto" type="mail" name="mail" placeholder="john.doe@mail.com" required>
          </div>
          <div class="d-flex justify-content-around">
            <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal" aria-label="Close">Annuler</button>
            <button type="submit" name="requestNewPassword" class="btn btn-success font-weight-bold">Récupérer mon compte</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
