<?php

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');

function send_mail()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $from =  get_field('send_mail', 'option');
        $mail_to = get_field('get_mail', 'option');
        $subject = 'Заявка с сайта ' . get_bloginfo('name');
        $content = '';

        # Sender Data
        $name = $_POST['name'];
        $message = $_POST['message'];
        $email = $_POST['email'];
        $them = $_POST['subject'];

        if (empty($name) or empty($email) or empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo __('Пожалуйста заполните все поля');
	        die();
        }
        # Mail Content
        $content .= "Тема: $them\n\n";
        $content .= "Email: $email\n\n";
        $content .= "Имя: $name\n\n";
        $content .= "Сообщение: $message\n\n";


        # email headers.
        $headers = "From: timezone <$from>";

        # Send the email.
        $success = wp_mail($mail_to, $subject, $content, $headers);

        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo __('Ваше сообщение отправлено.');
	        die();
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo __('Ой! Что-то пошло не так, нам не удалось отправить ваше сообщение.');
	        die();
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo __('Возникла проблема с отправкой, попробуйте еще раз.');
	    die();
    }
}