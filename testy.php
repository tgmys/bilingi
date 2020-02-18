<?php

$hash1 = hash('sha512', 'admin') ;
echo $hash1;
echo password_hash('admin', 'sha512');
$hash = '343adb962355c1fc1453d4e24ed16380aa08500a2797f659aeeb71b8484649256c8d62de68eb57da856dca444e60abbf8adbd1d74df185fbd57452f666452e2c';
if (password_verify('admin', $hash1)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>

<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>