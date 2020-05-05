Here comes Test Yii2 App<br>
<?php
foreach ($users as $user) {
    echo '<ul>';
    echo '<li style="font-family: monospace"><h4>' . $user->user_name . '</h4>  <p>' . $user->user_address . '</p></li>';
    foreach ($user->maxBill as $bill) {
        echo '<li style="list-style: none;">' . $bill[amount] . '</li>';
    }
    echo '</ul>';
}