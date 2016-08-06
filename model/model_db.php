<?php
define("DB",'db_realty');

$link = mysqli_connect('localhost', 'root', '', DB);

/* проверка соединения */
if (mysqli_connect_errno())
{
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

/* изменение набора символов на utf8 */
if (!mysqli_set_charset($link, "utf8"))
{
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
    exit();
} 