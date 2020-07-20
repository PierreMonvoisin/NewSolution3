<div class="modal fade" id="forgotPasswordModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary py-2"></div>
      <div class="modal-body">
        <h5 class="text-center">Veuillez préciser votre email afin de récupérer l'accès à votre compte</h5>
        <form action="user.php" method="post">
          <div class="d-flex">
            <label for="mailInput" class="col-3">Entrer votre email :</label>
            <input id="mailInput" class="col-9" type="mail" name="mail" placeholder="john.doe@mail.com" required>
          </div>
          <div class="d-flex justify-content-around">
            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Annuler</button>
            <button type="submit" name="requestNewPassword" class="btn btn-success">Récupérer mon compte</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
