<?php
// Process form submission
if (isset($_POST['submit'])) {
    // Captura os dados do formulário
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $prefixo = isset($_POST['prefixo']) ? $_POST['prefixo'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $telefoneCompleto = trim($prefixo . ' ' . $telefone);
    $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
    $assunto = isset($_POST['assunto']) ? $_POST['assunto'] : 'Trabalhe conosco - Site';
    $dataEnvio = date('d/m/Y H:i:s');

    // Informações do e-mail
    $email_remetente = 'contato@wolfstore.com.br';
    $email_destinatario = 'rh@wolfstore.com.br';
    $email_reply = $email;
    $email_assunto = "Contato: " . $assunto;

    // Conteúdo do e-mail em HTML
    $email_conteudo = "
    <html>
    <head>
        <style>            
            body { 
                font-family: 'sans-serif'; 
                line-height: 1.6; 
                color: #666666; /* --text-light */
                background-color: #f9f9f9; /* --background-light */
            }
            .container {
                max-width: 600px; 
                margin: 0 auto; 
                padding: 0; 
                border: 1px solid #e1e1e1; 
                border-radius: 8px; 
                overflow: hidden; 
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }
            .header { 
                background-color: #cc7248; /* --primary-color */
                color: white; 
                padding: 20px; 
                text-align: center;
                font-family: 'sans-serif';
            }
            .content { 
                padding: 25px; 
                background-color: #f9f9f9; /* --background-light */
            }
            .footer { 
                background-color: #e8e8e8; 
                padding: 15px; 
                text-align: center; 
                font-size: 12px; 
                color: #666666; /* --text-light */
                border-top: 1px solid #ddd;
            }
            .field { 
                margin-bottom: 18px; 
            }
            .field-label { 
                font-weight: bold; 
                color: #cc7248; /* --primary-color */
                display: block; 
                margin-bottom: 5px;
                font-family: 'sans-serif';
            }
            .message { 
                background-color: white; 
                padding: 15px; 
                border-radius: 5px; 
                border-left: 4px solid #cc7248; /* --primary-color */
                color: #333;
            }
            .info-box { 
                background-color: #f0e6e0; 
                padding: 12px; 
                border-radius: 5px; 
                margin-bottom: 20px; 
                font-size: 14px;
                border-left: 3px solid #cc7248; /* --primary-color */
            }
            a {
                color: #cc7248; /* --primary-color */
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>            
                <h2>Nova mensagem de contato</h2>
            </div>
            
            <div class='content'>
                <div class='info-box'>
                    Mensagem enviada em: $dataEnvio
                </div>
                
                <div class='field'>
                    <span class='field-label'>📧 E-mail</span>
                    <a href='mailto:$email'>$email</a>
                </div>
                
                <div class='field'>
                    <span class='field-label'>📞 Telefone</span>
                    <a href='tel:$telefoneCompleto'>$telefoneCompleto</a>
                </div>
                
                <div class='field'>
                    <span class='field-label'>✉️ Mensagem</span>
                    <div class='message'>$mensagem</div>
                </div>
            </div>
            
            <div class='footer'>
                Mensagem enviada através do formulário de contato do site Wolfstore
            </div>
        </div>
    </body>
    </html>";

    // Verifica se há anexo
    if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] === UPLOAD_ERR_OK) {
        // Captura os dados do arquivo
        $file_tmp = $_FILES['anexo']['tmp_name'];
        $file_name = $_FILES['anexo']['name'];
        $file_type = $_FILES['anexo']['type'];
        $file_size = $_FILES['anexo']['size'];
        $file_data = file_get_contents($file_tmp);
        $file_encoded = chunk_split(base64_encode($file_data));
        $boundary = md5(time());

        // Cabeçalhos com anexo
        $email_headers = "From: " . $email_remetente . "\r\n";
        $email_headers .= "Reply-To: " . $email_reply . "\r\n";
        $email_headers .= "MIME-Version: 1.0\r\n";
        $email_headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

        // Corpo do e-mail com anexo
        $message_body = "--$boundary\r\n";
        $message_body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message_body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $message_body .= $email_conteudo . "\r\n";
        $message_body .= "--$boundary\r\n";
        $message_body .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
        $message_body .= "Content-Transfer-Encoding: base64\r\n";
        $message_body .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n";
        $message_body .= "Content-Length: $file_size\r\n\r\n";
        $message_body .= $file_encoded . "\r\n";
        $message_body .= "--$boundary--";

    } else {
        // Cabeçalhos simples (sem anexo)
        $email_headers = "From: " . $email_remetente . "\r\n";
        $email_headers .= "Reply-To: " . $email_reply . "\r\n";
        $email_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $email_headers .= "MIME-Version: 1.0\r\n";

        // Corpo do e-mail simples
        $message_body = $email_conteudo;
    }

    // Envia o e-mail
    $success = mail($email_destinatario, $email_assunto, $message_body, $email_headers);

    // Inicia sessão para passar status
    session_start();
    $_SESSION['email_status'] = $success ? 'success' : 'error';

    // Redireciona de volta para a página do formulário
    header('Location: trabalhe-conosco.php');
    exit;
}
?>