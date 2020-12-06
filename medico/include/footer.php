<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 segment-two">
                    <h2>MonHôpital</h2>
                    <ul>
                      <?php if(isset($_SESSION['email'])){ ?>

                        <li><a href=""  data-toggle="modal" data-target="#exampleModalPARA">Mon compte</a></li>
                              <li><a href="" data-toggle="modal" data-target="#exampleModalGr">Gérer mes rendez-vous</a></li>
                              <li><a href="" data-toggle="modal" data-target="#exampleModalPr">Prendre rendez-vous</a></li>
                              <li><a href="" data-toggle="modal" data-target=".bd-example-modal-lg">Offre emploies</a></li>
                      <?php } else { ?>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="#our-services-id">Nos Services</a></li>
                        <li><a href="" data-toggle="modal" data-target="#exampleModalC">Contact</a></li>
                      <?php } ?>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 segment-three">

                    <a href="https://www.instagram.com/guizmolabanquise/?hl=fr" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://twitter.com/GuizLaBanquise?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
    <p class="footer-bottom-text">Tous les droits réservés à &copy;MonHôpital</p>
</footer>
