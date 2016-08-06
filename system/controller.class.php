<?php

Class Controller
{
    protected $layout = 'index.php';

    
    function __call($name,$params)
    {
        e404();
    }
	
	

   
    
    public function render($view_name, $data = [], $realty_types =[], $with_layout = true)
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
			require_once("teamplates/layout/{$this->layout}");
			$content = ob_get_contents();
			ob_end_clean();
		}
	
		return $content;
	}
	
}	