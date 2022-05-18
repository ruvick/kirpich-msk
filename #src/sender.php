<?
header("Access-Control-Allow-Origin: *"); 
// HTTP_ORIGIN
// REMOTE_ADDR
// REQUEST_METHOD
// print_r(json_encode($_SERVER));

if (
    ($_SERVER["HTTP_ORIGIN"] !== "https://localhost:3000")&&
    ($_SERVER["HTTP_ORIGIN"] !== "https://xn----7sbatpdmgegnxfhmdf1o.xn--p1ai")  
    
    ) {
        http_response_code(403);
        die($_SERVER["HTTP_ORIGIN"]); 
    }


    $to = 'rudikov-web@yandex.ru'; 
    $subject = 'Обращение с сайта стройматериалы-мск.рф';
    $message = '
                <html>
                    <head>
                        <title>'.$_REQUEST["msg"].'</title>
                    </head>
                    <body>
                        <p>ФИО: '.$_REQUEST['name'].'</p>
                        <p>Телефон: '.$_REQUEST['tel'].'</p>                    
                    </body>
                </html>'; 
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
        $headers .= "From: Заявка с сайта стройматериалы-мск <noreply@ultrakresla.ru/>\r\n";
        if (mail($to, $subject, $message, $headers)) {
            http_response_code(200);
            die(array());
        } else {
            http_response_code(403);
            die(array());
        }



?>