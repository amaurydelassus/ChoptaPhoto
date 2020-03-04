<!-- CONTENT -->
  <div class="container">
    <div id="contact">
      <h1 class = "text-center">Un petit message ?</h1>
      <br/><br/>
      <?php if(array_key_exists('errors',$_SESSION)): ?>
        <div class="alert alert-danger">
          <?= implode('<br>', $_SESSION['errors']); ?>
        </div>
      <?php endif; ?> 

      <?php if(array_key_exists('success',$_SESSION)): ?>
        <div class="alert alert-success">
          Votre email à bien été transmis !
        </div>
      <?php endif; ?>

      <form action="index.php?page=mail" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="inputname">Votre nom</label>
              <input required type="text" name="name" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">
            </div><!--/*.form-group-->
          </div><!--/*.col-md-6-->
          <div class="col-md-6">
            <div class="form-group">
              <label for="inputemail">Votre email</label>
              <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">
            </div><!--/*.form-group-->
          </div><!--/*.col-md-6-->
          <div class="col-md-12">
            <div class="form-group">
              <label for="inputmessage">Votre message</label>
              <textarea required id="inputmessage" name="message" class="form-control"><?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>
            </div><!--/*.form-group-->
          </div><!--/*.col-md-12-->
          <div class="col-md-12">
            <div class="checkbox">
              <label for="checkspam">
                <input type="checkbox" name="antispam" id="checkspam">Je suis un spammer et je l'assume!
              </label>
            </div>
          </div><!--/*.col-md-12-->
          <div class="col-md-12">
            <button type='submit' class='btn btn-primary'>Envoyer</button>
          </div><!--/*.col-md-12-->
        </div><!--/*.row-->
      </form>
    </div>
  </div><!--/*.container-->
<!-- END CONTENT -->
<?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
unset($_SESSION['success']);
unset($_SESSION['errors']);