<?
error_reporting(E_ALL);


class ModelRealtyType  extends Model

{
	 public static function className()
    {
        return 'ModelRealtyType';
    }

    public static function tableName()
    {
        return 'realty_type';   
	}

		
	 public static function type_id_array($all)
    {
        $result = array();
        foreach($all as $row)
        {
            $result[$row->id] = $row;
        }

        return $result;
    }	

	public static function realty_types_for_edit($id) //для редактирования объекта недвижимости
	{
		$realty_types = ModelRealtyType::all_lines();
		
		$realty = new ModelRealty();
		$realty -> one($id);
		$first_id = $realty->type_id;
		$realty_types_sort = array();
		
		foreach($realty_types as $key => $massiv)
		{
				$realty_types_sort[$key]['id'] = $realty_types[$key]->id;
				$realty_types_sort[$key]['title'] = $realty_types[$key]->title;
		}

		foreach($realty_types as $key => $massiv)
		{
			if($realty_types[$key]->id == $first_id)
			{	
				$first_title = $realty_types[$key]->title;
				$no_first_id = $realty_types[0]->id;
				$no_first_title = $realty_types[0]->title;
				$realty_types_sort[0]['id'] = $first_id;
				$realty_types_sort[0]['title'] = $first_title;
				$realty_types_sort[$key]['id'] = $no_first_id;
				$realty_types_sort[$key]['title'] = $no_first_title;
				
			}
		}
		print_r($realty_types_sort);
		return $realty_types_sort;
	}	
	
	public static function all_by_type($id)
	{	
		$result = parent::all_by_type($id); 
		$types = ModelRealtyType::all_lines(); 
		$types = ArrayHelper::index($types,'id');
		
		foreach (array_keys($result) as $k)
        {
            $result[$k]->load_relations(
                [
                    'type' => $types[$result[$k]->type_id]
                    
                ]
            );
        }
		
		return $result;
	}
	//Выборка всех типов объектов недвижимости
	
	// public static function all_types()
	// {
		// global $link;
		// $sql = "SELECT * FROM `realty_type`";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		// $realty_types = array();
		// while ($row = mysqli_fetch_assoc($res))
		// {
			// $realty_types[] = $row;
		// }
		
		// return $realty_types;
	// }
	
	//Выборка одного типа объекта недвижимости
	
	// public static function one_type($type_id)
	// {
		// global $link;
		// $sql = "SELECT * FROM `realty_type` WHERE `realty_type`.`type_id` = '".$type_id."'";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		// $realty_type  = mysqli_fetch_assoc($res);	
		
		// return $realty_type;
	// }
	
	//Редактирование типа  объекта недвижимости
	
	// public static function edite_type($type_id, $type)
	// {
		// global $link;
		// $sql = "UPDATE `realty_type` SET `type` = '".$type."' WHERE `realty_type`.`type_id` = '".$type_id."'";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		
		// return true;
	// }
	
	//Добавление типа  объекта недвижимости
	
	// public static function add_type($type)
	// {
		// global $link;
		// $sql = "INSERT INTO `realty_type` (`type`) VALUES ( '".$type."')";            
		// mysqli_query($link, $sql) or die(mysqli_error($link));
		
		// return true;
	// }
	
	//Удаление типа объекта недвижимости
	
	// public static function delete_type($type_id)
	// {
		// global $link;
		// $sql ="DELETE FROM `realty_type` WHERE `realty_type`.`type_id` = '".$type_id."'";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		
		// return true;
	// }
	
	//Выборка объектов по определенному типу
	
	// public static function all_lines_of_type($type_id)
	// {	
		// global $link;
		// $sql = "SELECT `realty`.`id` ,`realty_type`.`type` ,`realty_type`.`type_id`, `realty`.`title`, `realty`.`address`, `realty`.`price` FROM `realty` LEFT JOIN `realty_type` ON realty.type_id = realty_type.type_id WHERE `realty_type`.`type_id` = '".$type_id."'";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		// $all_lines_of_type = array();
		// while ($row = mysqli_fetch_assoc($res))
		// {
			// $all_lines_of_type[] = $row;
		// }
		
		// return $all_lines_of_type;
	// }
	
	//Выборка всех типов с подстановкой в первый элемент элемент по которому задается id, для вывода первым значением в селекте при редактировании
	
	// public static function realty_types_for_edit($id)
	// {
		// $realty_types = RealtyType::all_types();
		// $realty = Realty::one_line($id);
	
		// $first_type_id = $realty_types[0]['type_id'];
			// $first_type = $realty_types[0]['type'];
			
			// foreach($realty_types as $key => $massiv)
			// {
				// if($realty_types[$key]['type'] == $realty['type'])
				// {	
					// $realty_types[0]['type_id'] = $realty_types[$key]['type_id'];
					// $realty_types[0]['type'] = $realty_types[$key]['type'];
					// $realty_types[$key]['type_id'] = $first_type_id;
					// $realty_types[$key]['type'] = $first_type;
				// }
			// }
		// return $realty_types;
	// }
}





