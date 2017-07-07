<?php
global $app;
$mailsetting = unserialize(getSetting("mail"));
$settings='a:6:{s:5:"uname";s:29:"danykyroz@gmail.com";s:4:"pass";s:8:"daniel1987";s:4:"host";s:15:"smtp.gmail.com";s:4:"port";s:3:"465";s:6:"sender";s:11:"information";s:8:"mailmode";s:7:"smtp";}';
$smtp=true;
if($smtp==true){
$app['swiftmailer.options'] = array(
        'host' => "smtp.gmail.com",
        'port' => "587",
        'username' => "noresponder@earthbit-coin.com",
        'password' => "EarthBit12345678",
        'encryption' => 'tls',
        'auth_mode' => 'login'
    );
}
