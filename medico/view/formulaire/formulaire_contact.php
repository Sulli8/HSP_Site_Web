<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HSP | Contact</title>
  </head>
  <body>
    <form action="../../traitement/traitement_contact.php" method="post">

    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div>
        <label for="mail">e-mail :</label>
        <input type="email" id="mail" name="user_mail">
    </div>
    <div>
        <label for="msg">Message :</label>
        <textarea id="msg" name="user_message"></textarea>
    </div>
</form>


  </body>
</html>
