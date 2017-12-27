<?
if((isset($_POST['name'])&&$_POST['name']!=""&&preg_match("/^[А-Яа-я]+$/",$_POST['name']))&&(isset($_POST['phone'])&&$_POST['phone']!=""&&preg_match("/^(8|7)(9)[\d]{9}}$/", $_POST['phone']))&&preg_match("/[\d]{1}/",$_POST['type'])){ 
        $to = 'lol@mail.ru'; 
        $subject = 'Обратный звонок'; 
		$theme='';
		if($_POST['type']==1)
		{$theme='Информационный звонок';}
			if($_POST['type']==2)
		{$theme='Заказ 3 штук';}
			if($_POST['type']==3)
		{$theme='Заказ 6 штук';}
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['name'].'</p>
                        <p>Телефон: '.$_POST['phone'].'</p>        
                        <p>Причина: '.$theme.'</p>  						
                    </body>
                </html>'; 
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
        $headers .= "From: Отправитель <from@example.com>\r\n"; 
        if(mail($to, $subject, $message, $headers)){
			  http_response_code(200);
        } else {
            http_response_code(500);
            echo "Не получилось отправить письмо.";
        }
}
?>