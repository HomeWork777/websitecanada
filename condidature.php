<?php $page='career' ?>
<?php include("config.php");?>
<?php include("header.php");?>
<div class="background"></div>
<div class="container condidature">
<form method="post"  enctype="multipart/form-data">
 <div class="form-group">
<label><h3><?php echo $lang['condidature_mail'];?></h3> </label>
<input name="mail" class="form-control" type="text" id="mail" value="" size=60 maxlength=60 required/>
</div>
<div class="form-group">
<label><h3><?php echo $lang['condidature_name'];?></h3></label>
<input name="nom_expediteur" class="form-control" type="text" id="nom_expediteur" value="" size=60 maxlength=60 class="text-input" />
</div>
<div class="form-group">
<label><h3><?php echo $lang['condidature_choix'];?></h3></label>
<select name="poste_demande" class="form-control form-control-lg">
  <option><?php echo $lang['career_poste1'];?></option>
  <option><?php echo $lang['career_poste3'];?></option>
  <option><?php echo $lang['career_poste3'];?></option>
</select>
</div>
<div class="form-group">
<label><h3><?php echo $lang['condidature_upload'];?> </h3></label>
<input name="piecejointe" type="file" size="60" class="form-control-file" />
</div>
<div class="form-group">
<label><h3>Message</h3></label>
<textarea name="texte_message" cols="60" rows="10" class="form-control"></textarea>
</div>
<div class="text-center"><button type="submit" name="envoi_message" class="btn btn-primary"><?php echo $lang['condidature_envoi'];?></button></div>
</form>
<?php
 
if (isset($_POST["envoi_message"])) {
 
     //=====Mail du destinataire final du message envoyé
     $mail_destinataire = "hamzaouikhaled@gmail.com";
 
    //=====Vérification de l'existence d'une pièce jointe.
    if ($_FILES['piecejointe']['name']<>"") $ispiece = true; else $ispiece = false;
 
    //=====Vérification de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail_destinataire)) $passage_ligne = "\r\n"; else $passage_ligne = "\n";
 
    //=====Récupération du mail, du nom de l'expéditeur et du sujet.
    $mail = $_POST["mail"];
    $nom_expediteur = $_POST["nom_expediteur"];
    $sujet = 'Demande d\'emploi';
     
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Demande d'emploi.";
    $msg_body  = "<font color='#666666'><em><p>Mail de l'expéditeur : </font><strong>".$mail."</strong><br>";
    $msg_body .= "<font color='#666666'>Nom de l'expéditeur : </font><strong>".$nom_expediteur."</strong><br></p>";
    $msg_body .= "<font color='#666666'>Poste demandé : </font><strong>".$_POST['poste_demande']."</strong><br></p>";
    $msg_body .= "<p><font color='#666666'>La personne ci-dessus vous a contacté(e) à partir de votre site. Si vous désirez lui répondre, il vous suffit de répondre à ce message. Voici le contenu de son message :</font></em></p><br />";
 
    $message_tape = htmlspecialchars($_POST["texte_message"], ENT_QUOTES);
    $retourligne   = array("\r\n", "\n", "\r");
    $remplace = '<br />';
    $msg_body .= "<p>".str_replace($retourligne, $remplace, $message_tape)."</p>";
    $msg_body = stripslashes($msg_body);
 
    $message_html = "<html><head></head><body>".$msg_body."</body></html>";
     
    //=====Transfert de la pièce jointe sur le serveur.
    if ($ispiece) { //===traitement de la pièce jointe seulement si le champ du formulaire a été renseigné
        $uploaddir = './attachement/'; //===Chemin du dossier de votre serveur web dans lequel sera transféré la pièce jointe avant d'être traitée
        $upload_file = $uploaddir . $_FILES['piecejointe']['name'];
        if (move_uploaded_file($_FILES['piecejointe']['tmp_name'], $upload_file)) {
            $ext = explode(".", basename($_FILES['piecejointe']['name']));
            switch($ext[1]) {
                default:      
                //$attach_type =  "application/octet-stream"; 
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                votre Cv doit etre en format pdf !!
              </div>";
                exit;
            break;
                case "pdf":  
                $attach_type =  "application/pdf";
            break;
               
            }
            $attach_name = $_FILES["piecejointe"]["name"];
        }
        //=====Lecture et mise en forme de la pièce jointe.
        if (file_exists($upload_file)) {
            $fichier = fopen($upload_file, "r");
            $attachement = fread($fichier, filesize($upload_file));
            $attachement = chunk_split(base64_encode($attachement));
            fclose($fichier);
        }
    }
        
     
    //=====Création de la boundary.
    $boundary = "-----=".md5(rand());
    $boundary_alt = "-----=".md5(rand());
       
    //=====Création du header de l'e-mail.
    $header = 'From: Workteam <contact@workteam.fr>'.$passage_ligne;
    $header.= "Reply-To: ".$nom_expediteur." <".$mail.">".$passage_ligne;
    $header .= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
       
    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
    $message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
    //=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
       
    $message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
       
    //=====Ajout du message au format HTML.
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
       
    //=====On ferme la boundary alternative.
    $message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
       
    //=====Ajout de la pièce jointe.
    if ($ispiece) { //===Ajout de la pièce jointe seulement si le champ du formulaire a été renseigné
        $message.= "Content-Type: ".$attach_type."; name=\"".$attach_name."\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: base64".$passage_ligne;
        $message.= "Content-Disposition: attachment; filename=\"".$attach_name."\"".$passage_ligne;
        $message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
        //$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    }
 
 
    //=====Envoi de l'e-mail.
    mail($mail_destinataire,$sujet,$message,$header);
    //==========
    echo "<div class=\"alert alert-primary\" role=\"alert\">votre condidature a été envoyée !</div>";
 
 
}
 
?>


</div>



<?php include("footer.php")  ?>
