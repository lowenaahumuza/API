<?php
require 'ClassAutoLoad.php';

$mailCnt = [
    'name_from' => 'BBIT Systems Admin',
    'mail_from' => 'noreply@bbit.com',
    'name_to' => 'Lowena Ahumuza',
    'mail_to' => 'lowenaahumuza@gmail.com',
    'subject' => 'Welcome to BBIT E Services',
    'body' => 'This is a new semester <b> Get ready to code!</b>'
];

$ObjSendMail->Send_Mail($conf, $mailCnt);