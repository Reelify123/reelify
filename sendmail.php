<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Ustaw swój adres e-mail tutaj
    $to = 'k274.kowalski@gmail.com';
    $subject = 'Nowa wiadomość od ' . $name;
    $message_body = "Imię: $name\n\nE-mail: $email\n\nWiadomość:\n$message";
    $headers = "From: $email";

    // Sprawdź czy dane są niepuste
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Wysyłanie e-maila
        if (mail($to, $subject, $message_body, $headers)) {
            http_response_code(200);
            echo "Wiadomość została wysłana pomyślnie.";
        } else {
            http_response_code(500);
            echo "Wystąpił problem podczas wysyłania wiadomości.";
        }
    } else {
        http_response_code(400);
        echo "Proszę wypełnić wszystkie pola formularza.";
    }
} else {
    http_response_code(405);
    echo "Metoda nie jest obsługiwana.";
}
?>
