<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Service Messagerie | User </title>
    <link href="../css/style_service_messagerie.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_nav_hsp.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </head>
  <body>

<?php include "../include/header.php"; ?>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$id = $_SESSION['id'];
$db = $manager->connexion_bd();
$select = "SELECT nom,prenom,mail,image_profil from user WHERE id='$id'";
$request = $db->query($select);
$tableau = $request->fetchall();
 ?>

 <?php $destinataire = "SELECT mail from medecin";
 $request = $db->query($destinataire);
 $tab_destinataire = $request->fetchall();

 ?>
<div class="container">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
 <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a class="inbox-avatar" href="javascript:;">
                              <img  width="64" hieght="60" src="../img/images_profils/<?php echo $tableau[0][3]; ?>">
                          </a>
                          <div class="user-name">
                              <h5><a href="#"><?php echo strtoupper($tableau[0][0])." ".$tableau[0][1]; ?></a></h5>
                              <span><a href="#"><?php echo ucwords($tableau[0][2]); ?></a></span>
                          </div>
                      </div>
                      <div class="inbox-body">


                      <ul class="inbox-nav inbox-divider">
                          <li class="">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Nouveau Message</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../traitement/traitement_service_messagerie.php" method="post">
          <div class="form-group">
            <select class="custom-select custom-select-sm" name="destinataire">
                  <option selected>Selectionner un destinataire</option>
            <?php for ($i=0; $i < count($tab_destinataire) ; $i++) {?>
              <?php foreach (array_unique($tab_destinataire[$i]) as $key => $value){ ?>

                  <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php } ?>

        <?php     } ?>
            </select>
          </br><label for="recipient-name" class="col-form-label">Objet :</label>
            <input type="text" name="objet_message" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="message-text"></textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
        <input type="submit" style="background-color:orange;color:white;" class="btn" value="Envoyer message"></input>
          </form>
      </div>
    </div>
  </div>
</div>


                          </li>
                          <li>
                            <form action="#">
                            <input type="submit" class="btn btn-primary" href="../view/service_messagerie.php" value="Boîte de réception"></input>
                            </form>
                          </li>
                          <li>
                            <button type="button" style="background-color:orange;color:white;" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
    Message envoyés
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?php
        $id = $_SESSION['id'];
        $db = $manager->connexion_bd();
        $voir_message = "SELECT message_envoye from message_user  WHERE id_user='$id'";
        $btn_delete = "SELECT id from message_user WHERE id_user='$id'";
        $suppression = $db->query($btn_delete);
        $request = $db->query($voir_message);
        $tab_message = $request->fetchall();
        $tab_suppression = $suppression->fetchall();

        if(count($tab_message) != "0"){


        for ($i=0; $i < count($tab_message) ; $i++) {
          foreach (array_unique($tab_message[$i]) as $key => $value) {?>

            <div class="modal-body">
            <?php echo $value."</br>"; ?>

            </div>

      <?php }
      foreach (array_unique($tab_suppression[$i]) as $key => $value) {
        echo "<a style='color:#fff;width:120px;margin-bottom:10px;margin-left:370px;'class='btn btn-primary' href='../traitement/traitement_suppression_message.php?delete=$value'>Supprimer</a>";
      }
        }
          }
          else{  ?>
                <div class="modal-body">Vous n'avez pas envoyé de message !</div>
  <?php        } ?>



        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

                          </li>


                      </ul>



                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3>Service messagerie</h3>
                          <form action="#" class="pull-right position">
                              <div class="input-append">
                                  <input type="text" class="sr-input" placeholder="Search Mail">
                                  <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                              </div>
                          </form>
                      </div>



                          <table class="table table-inbox table-hover">
                            <tbody>


                                <?php   $affiche_message = $db->query("SELECT objet,message_recu,heure FROM message_user WHERE id_user='$id'");
                                   $boite_reception = $affiche_message->fetchall();
                                   for ($i=0; $i < count($boite_reception) ; $i++) {?>
                                        <tr class="unread">
                                           <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                <?php  foreach (array_unique($boite_reception[$i]) as $key => $value) {?>



                                <?php
                                if($key == 'message_recu'){echo "<td class='view-message'>$value</td>";}
                                if($key == 'objet'){echo "<td class='view-message  dont-show'><a>$value</a></td>";}
                                if($key == 'heure'){ echo "<td class='view-message  text-right'>$value</td>";}?>

                              <?php  }?>
                                </tr>
                          <?php  }
                             ?>




                          <!--    <tr class="unread">
                                  <td class="inbox-small-cells">
                                      <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                  <td class="view-message dont-show">Google Webmaster </td>
                                  <td class="view-message">Improve the search presence of WebSite</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 15</td>
                              </tr>
                            <tr class="">
                                  <td class="inbox-small-cells">
                                      <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                  <td class="view-message dont-show">JW Player</td>
                                  <td class="view-message">Last Chance: Upgrade to Pro for </td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 15</td>
                              </tr>-->




                          </tbody>
                          </table>

                      </div>
                  </aside>
              </div>
</div>
</body>
</html>
<script>  $('#exampleModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('whatever') // Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-title').text('Envoyé à ' + recipient)
modal.find('.modal-body input').val(recipient)
})</script>
