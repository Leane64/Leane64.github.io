<?php
$confirmation = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des champs
    $prenom = htmlspecialchars(trim($_POST["prenom"]));
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $confidentialite = isset($_POST["confidentialite"]);

    // Vérification des champs
    if ($prenom && $nom && filter_var($email, FILTER_VALIDATE_EMAIL) && $message && $confidentialite) {
        // Contenu de l'email
        $to = "leanepeyrot912@gmail.com"; // Remplace par ton adresse de réception
        $subject = "Nouveau message du formulaire de contact";
        $body = "Nom : $nom\nPrénom : $prenom\nEmail : $email\n\nMessage :\n$message";
        $headers = "From: $email";

        // Envoi
        if (mail($to, $subject, $body, $headers)) {
            //$confirmation = "Merci, votre message a été envoyé avec succès.";
            header("Location: contact-confirmation-formulaire.html");
            exit;
        } else {
            $confirmation = "Erreur lors de l'envoi du message. Veuillez réessayer.";
        }
    } else {
        $confirmation = "Veuillez remplir tous les champs correctement.";
    }
}
?>


