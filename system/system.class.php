<?php

Class System
{
    protected static $user;

    public static function get_user()
    {
        if (self::$user === NULL)
        {
            self::$user = new ModelUser();
            self::$user->auth_flow();
        }

        return self::$user;
    }
	
	/**
     * Читалка для $_POST
     * @param null|string $field - поле массива, которое мы планируем считать. если null - то весь массив $_POST
     * @param null $default - значение по умолчанию, если такого поля в $_POST не оказалось
     * @return mixed значение из массива, либо, если ничего нет, то значение по умолчанию
     */
    public static function post($field = NULL, $default = NULL)
    {
        if ($field !== NULL)
        {
            if (isset($_POST[$field]))
            {
                if ($_POST[$field] !== '')
                {
                    return $_POST[$field];
                }
                else
                {
                    return $default;
                }
            }
            else
            {
                return $default;
            }
        }
        else
        {
            $result = $_POST;
            unset($result['action']); // action у нас - техническое поле, его стоит выкидывать из данных, потому как оно никакого смысла для контроллера не имеет - в смысле передачи в модель
            return $result;
        }
    }

    /**
     * Читалка для $_GET
     * @param null|string $field - поле массива, которое мы планируем считать. если null - то весь массив $_GET
     * @param null $default - значение по умолчанию, если такого поля в $_GET не оказалось
     * @return null значение из массива, либо, если ничего нет, то значение по умолчанию
     */
    public static function get($field = NULL, $default = NULL)
    {
        if ($field !== NULL)
        {
            if (isset($_GET[$field]))
            {
                if ($_GET[$field] !== '')
                {
                    return $_GET[$field];
                }
                else
                {
                    return $default;
                }
            }
            else
            {
                return $default;
            }
        }
        else
        {
            return $_GET;
        }
    }

    /**
     * Установка сообщения в сессию
     * @param $type string тип сообщения
     * @param $message mixed сообщение. может быть массивом
     */
    public static function set_message($type,$message)
    {
        $_SESSION[$type] = $message;
    }

    /**
     * Чтение сообщения из сессии
     * @param $type string тип сообщения - предполагается error|success и подобные
     * @return null|mixed NULL, если нет сообщений, и сообщение, если данные есть в сессии
     */
    public static function get_message($type)
    {
        if (isset($_SESSION[$type]))
        {
            $value = $_SESSION[$type];
            unset($_SESSION[$type]); // после чтения надо удалить значение из сессии, иначе значение будет считано бесконечное количество раз
            return $value;
        }
        else
        {
            return NULL;
        }
    }

}