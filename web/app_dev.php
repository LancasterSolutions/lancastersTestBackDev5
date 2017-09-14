<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read https://symfony.com/doc/current/setup.html#checking-symfony-application-configuration-and-setup
// for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'], true) || PHP_SAPI === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

require __DIR__.'/../vendor/autoload.php';
Debug::enable();

$kernel = new AppKernel('dev', true);
if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
}
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);


echo <<<TEXT
<!--
                      _..
                    .'   `",
                   ;        \
            .---._; ^,       ;
         .-'      ;{ :  .-. ._;
    .--""          \*'   o/ o/
   /   ,  /         :    _`";
  ;     \;          `.   `"+'
  |      }    /    _.'T"--"\
  :     /   .'.--""-,_ \    ;
   \   /   /_         `,\   ;
    : /   /  `-.,_      \`.  :
    |;   {     .' `-     ; `, \
    : \  `;   {  `-,__..-'   \ `}+=,
     : \  ;    `.   `,        `-,\"
     ! |\ `;     \}?\|}
  .-'  | \ ;
.'}/ i.'  \ `,                          
``''-'    /   \
         /J|/{/
           `'

Rock in the pool
So nice and cool
So juicy sweet!
Now we wish
To catch﻿ a fish
So juicy sweet!
                                                                              ,///////.           ./
          __                    ___////,,,.._        ,//               __,---//////////,        .///
         /o \/        __       /O            ``--.._///             ,-'  ) ) ) ) ) )''////_    /////
<><      \__/\ __    /o \/     \__  \               ,'          _,-' ))`. ) ) ) ) ) ) ) ) )`-.//////
 <><          /o \/  \__/\      __)  \           ___`.         / ()_)))))\ ) ) ) ) ) ) ) ) )////////
   <><     __ \__/\_            \____/__,,,---''''  \\\        \____ )))))) ) ) ) ) ) ) ) ) \\\\\\\\
 <><      /o \/  /o \/                               `\\        `````.)))/ ) ) ) ) ) ) ) ),-`\\\\\\\
<><       \__/\  \__/\                                           ___,')),') ) ) ) )_),,--'    \\\\\\
<><       __     __                  ___////,,,.._        ,//   (_______.\\)_),--'"            `\\\\
>< <><   /o \/  /o \/     __        /O            ``--.._///             -\\\                    `\\\
><  <><  \__/\  \__/\    /o \/      \__  \               ,'                \\\                     `\
  <><                    \__/\       __)  \           ___`.
<><                __                \____/__,,,---''''  \\\
                  /o \/                                   `\\
           __     \__/\    ___////,,,.._        ,//                                      ,///////.           ./
          /o \/           /O            ``--.._///                                __,---//////////,        .///
          \__/\           \__  \               ,'                              ,-'  ) ) ) ) ) )''////_    /////
                           __)  \           ___`.                          _,-' ))`. ) ) ) ) ) ) ) ) )`-.//////
                           \____/__,,,---''''  \\\                        / ()_)))))\ ) ) ) ) ) ) ) ) )////////
                                                `\\                       \____ )))))) ) ) ) ) ) ) ) ) \\\\\\\\
                                                                           `````.)))/ ) ) ) ) ) ) ) ),-`\\\\\\\
                                                                            ___,')),') ) ) ) )_),,--'    \\\\\\
                                                                           (_______.\\)_),--'"            `\\\\
                                                                                    -\\\                    `\\\
                                                                                      \\\                     `\
-->
TEXT;
