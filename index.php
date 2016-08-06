<?php
error_reporting(E_ALL);

session_start();

require_once "system/system.class.php";
require_once "system/model.class.php";
require_once "system/helper/array.helper.php";
//require_once "model/model_realty.php";
//require_once "model/model_realty_type.php";
//require_once "model/model_user.php";
require_once "functions.php";
require_once "system/controller.class.php";


spl_autoload_register('class_autoloader');



$param = NULL;

if (isset($_GET['route']))
{ 

    // заменил request_id на param для большей универсальности - как обсуждали на вебинаре
    // ВАЖНО!
    // ставьте выше более сложные правила - потому что если мы попадем в совпадение по более простому, дальше поиск производиться не будет,
    // и более сложное правило таким образом будет заблокировано
    $url_manager =
        [
            '|([a-z_]+)\/([a-z_]+)\/([0-9]+)|' =>
            [
                'controller',
                'controller_action',
                'param'
            ],
            '|([a-z_]+)\/([a-z_]+)|' =>
                [
                    'controller',
                    'controller_action',
                ],
            '|([a-z_]+)|' =>
                [
                    'controller',
                ]
        ];

    $url_ok = false;

    foreach(array_keys($url_manager) as $exp)
    {
        // условие видоизменено по сравнению с вебинаром - нам еще важно, чтобы совпавшее регулярное выражение полность совпадало с URL,
        // а не являлось его какой-то начальной частью
        if (preg_match($exp,$_GET['route'],$matches) && ($matches[0] === $_GET['route']))
        {

            foreach($matches as $k => $m)
            {
                if ($k === 0) continue;
                $var_name = $url_manager[$exp][$k-1];
                $$var_name = $m; // записываем части url туда, куда прописано в url_manager - тут можно еще записать данные в поля класса System для больших возможностей
            }
            $url_ok = true;
            break;
        }

    }

    // действия по умолчанию, если регулярка подошла, но какие-то кусочки необходимые не указаны в url_manager
    // можно усложнить url_manager и дать больше возможностей - например, указывать жесткое значение 'controller' => 'apartments'
    // это усложнит ПРЕДЫДУЩИЙ цикл, но вот эту часть можно будет вообще, в теории, отбросить
    if ($url_ok)
    {
        if (!isset($controller))
        {
            $controller = 'realty';
        }

        if (!isset($controller_action))
        {
            $controller_action = 'all_lines';
        }
    }
    else
    {
        //e404();
    }


}
else
{
    // запрос главной страницы нас тут только может интересовать. в любом другом случае мы либо выполняем другой php скрипт,
    // который реально существует на сервере, и от этого нет переадресации, либо сработает переадресация и мы попадаем в ветку выше
    $controller = 'realty';
    $controller_action = 'all_lines';
    
}

// if(isset($_GET['controller']))
// {
	// $controller = $_GET['controller'];
// }
// else
// {
	// $controller = "controller_realty";
// }	


// if(isset($_GET['redirect']))
// {
	// $controller_action = $_GET['redirect'];
	// if(isset($_GET['id']))
	// {
		// $id = $_GET['id'];
	// }	
// }
// else
// {
	// $controller_action = 'all_lines';
// }

$controller_class_name = name2controller_class_name($controller); //ControllerRealty


$controller_function_name = $controller_action."_controller"; //all_lines_controller



$controller_object = new $controller_class_name();  //New ControllerRealty()


if ($param !== NULL)
	{
		$result = $controller_object->$controller_function_name($param);
	}
else
	{
		$result = $controller_object->$controller_function_name();
	}

if ($result) echo $result;

