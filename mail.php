<?php

error_reporting(E_ALL); ini_set("display_errors", 1); //Display errors

    if (get_magic_quotes_gpc()){  
        $nom = stripslashes(htmlentities($_POST['nom']));
        $email_from = stripslashes(htmlentities($_POST['email']));
        $message = stripslashes(htmlentities($_POST['message']));
    }else{  
	//Avoid injections in case of HTML Mail
        $nom = htmlentities($_POST['nom']);
        $email_from = htmlentities($_POST['email']); 
        $message = htmlentities($_POST['message']);
    }

	//Check if mail host allow \r
    if(preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", $email_from))
    {
        $passage_ligne = "\n";
    }
    else
    {
        $passage_ligne = "\r\n";
    }

    $email_to = "info@aucoeurdange.ca"; //Recipient
    $email_subject = "Contact for you"; //Subject
    $boundary = md5(rand()); // Random boundary key

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    } 
    
    $headers = "From: \"".$nom."\"<".$email_from.">" . $passage_ligne; //Sender
    $headers.= "Reply-to: \"".$nom."\" <".$email_from.">" . $passage_ligne; //Sender
    $headers.= "MIME-Version: 1.0" . $passage_ligne; //MIME Version
    $headers.= 'Content-Type: multipart/mixed; boundary='.$boundary .' '. $passage_ligne; //Content (2 versions ex:text/plain et text/html)

    $email_message = '--' . $boundary . $passage_ligne; //Opening boundary
    $email_message .= "Content-Type: text/plain; charset=\"utf-8\"" . $passage_ligne; //Content type
    $email_message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne; //Encoding
    $email_message .= $passage_ligne .clean_string($message). $passage_ligne; //Content
    
	//Attachment
    if(isset($_FILES["fichier"]) &&  $_FILES['fichier']['name'] != ""){ //Check if file exists
        $nom_fichier = $_FILES['fichier']['name'];
        $source = $_FILES['fichier']['tmp_name'];
        $type_fichier = $_FILES['fichier']['type'];
        $taille_fichier = $_FILES['fichier']['size'];
                    
        if($nom_fichier != ".htaccess"){ //Check if it's not a .htaccess file
			 if($type_fichier == "image/jpeg" 
                || $type_fichier == "image/pjpeg" 
                || $type_fichier == "application/pdf"){ //Either jpeg or pdf
                 
                if ($taille_fichier <= 2097152) { //Size above 2MB
                    $tabRemplacement = array("é"=>"e", "è"=>"e", "à"=>"a"); //Changing special characters
                    
                    $handle = fopen($source, 'r'); //File opening
                    $content = fread($handle, $taille_fichier); //File reading
                    $encoded_content = chunk_split(base64_encode($content)); //Encoding
                    $f = fclose($handle); //File closing
                                
                    $email_message .= $passage_ligne . "--" . $boundary . $passage_ligne; //Second boundary opening
                    $email_message .= 'Content-type:'.$type_fichier.';name="'.$nom_fichier.'"'."\n"; //Content type (application/pdf or image/jpeg)
                    $email_message .='Content-Disposition: attachment; filename="'.$nom_fichier.'"'."\n"; //Inform there is an attachment
                    $email_message .= 'Content-transfer-encoding:base64'."\n"; //Encoding
                    $email_message .= "\n"; //Blank line. IMPORTANT !
                    $email_message .= $encoded_content."\n"; //Attachment

                }else{
					//Error Message for attachment above 2MB
                    $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais celle ci était superieure à 2Mo.". $passage_ligne;
                }
            }else{
				//Error Message for wrong content type for attachment
                $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais elle n'était pas au bon format.". $passage_ligne;
            }
        }else{
			//Error Message for sending a .htaccess file
            $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe .htaccess.". $passage_ligne;
        }
    }
                
    $email_message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne; //Closing boundary
                
    if(mail($email_to,$email_subject, $email_message, $headers)==true){  //Sending mail
     //   header('Location: index.html#contact'); //Redirection
    }

?>