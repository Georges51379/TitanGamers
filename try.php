300 px 641px 1024px
for responsivity

<?php
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$hashedString = '';

for ($i = 0 ; $i <= 10; $i++){
  $index = rand(0, strlen($characters) - 1);
  $hashedString .= $characters[$index];
}

echo $hashedString;
 ?>


Mr3rR1dQRwU // try this in the URL of YOUTUBE TO CHECK IF IT IS A TOKEN
