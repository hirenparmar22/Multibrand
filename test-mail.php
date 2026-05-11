<?php

require 'mail_config.php';

$send = sendMail(
    'receiver@gmail.com',
    'Test Email',
    '<h2>Hello</h2><p>This is test mail from PHP.</p>'
);

if($send){
    echo "Mail Sent Successfully";
}else{
    echo "Mail Failed";
}
?>