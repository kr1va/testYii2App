Here comes Test Yii2 App<br>

<form action="/testapp" method="get">
    <div>
        <p>Фильтр</p>
        <select id="sign" name="sign">
            <option value="">Выбрать</option>
            <option value=">">Больше</option>
            <option value="<">Меньше</option>
            <option value="=">Равно</option>
        </select>
        <input name="filter" id="filter" value="" placeholder="Введите значение">
        <button>Фильтровать</button>
    </div>
</form>

<?php
foreach ($users as $user) {
    echo '<ul>';
    echo '<li style="font-family: monospace"><h4>' . $user->user_name . '</h4>  <p>' . $user->user_address . '</p></li>';
    foreach ($user->maxBill as $bill) {
        echo '<li style="list-style: none;">' . $bill[amount] . '</li>';
    }
    echo '</ul>';
}
?>