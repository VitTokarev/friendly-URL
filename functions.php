<?php


function render($view_name, $data = [], $realty_types =[], $with_layout = true)
{
    ob_start();
    // проверка существования файла

    foreach($data as $key => $value)
    {
        $$key = $value;
    }
	
	$realty_types;
	
    require_once("teamplates/$view_name.php");
    $content = ob_get_contents();
    ob_end_clean();

    if ($with_layout)
    {
        ob_start();
        require_once("teamplates/layout/index.php");
        $content = ob_get_contents();
        ob_end_clean();
    }

    return $content;
}


function class_autoloader($classname)
{

    if (mb_substr($classname, 0, 10,'utf-8') === 'Controller')
    {
        $class_string = mb_substr($classname, 0, mb_strlen($classname,'utf-8'),'utf-8');
        $name = preg_replace('/([a-z])([A-Z])/', '$1_$2', $class_string);
        $file_name = "controller/".mb_strtolower($name,'utf-8').'.php';

        if (file_exists($file_name))
        {
            include_once $file_name;
        }
        else
        {

            e404();
        }
    }	
	if (mb_substr($classname, 0, 5,'utf-8') === 'Model')
	{
		 $class_string = mb_substr($classname, 0, mb_strlen($classname,'utf-8'),'utf-8');
        $name = preg_replace('/([a-z])([A-Z])/', '$1_$2', $class_string);
        $file_name = "model/".mb_strtolower($name,'utf-8').'.php';

        if (file_exists($file_name))
        {
            include_once $file_name;
        }
        else
        {

            e404();
        }
	} 
}

function name2controller_class_name($name)
{
    $pie = explode('_',$name);
    $result = '';
    foreach($pie as $v)
    {
        $result .= ucfirst($v);
    }   
	$result="Controller".$result;
		
    return $result;
}
