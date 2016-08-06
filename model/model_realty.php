<?php
error_reporting(E_ALL);
//Выборка всех записей

class ModelRealty extends Model
{
	
	
	public static function className()
    {
        return 'ModelRealty';
    }

    public static function tableName()
    {
        return 'realty';
    }
	
	
	
	 public function one($id)
    {
        $result = parent::one($id);

        $this->load([],true); // загрузка только связей - уместно выделить это в отдельный метод
        return $result;
    }

    
	 public static function all_lines()
	{	
		$result = parent::all_lines(); 
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
	
	public function load($data = array(),$with_relations = false)
		{
			$result = parent::load($data);
	
			if ($with_relations)
			{
				if ($this->type_id !== NULL) {
					$this->relations['type'] = new ModelRealtyType($this->type_id);
				}				
			}
			return $result;
		}
	
	
	// public $id;
	// public $type;
    // public $type_id;
    // public $title;
    // public $address;
    // public $price;
	
	//Выборка одной записи
	
	// public static function one_line($id)
	// {
		// global $link;
		// $sql = "SELECT `realty`.`id` ,`realty_type`.`type`, `realty`.`title`, `realty`.`address`, `realty`.`price` FROM `realty` LEFT JOIN `realty_type` ON realty.type_id = realty_type.type_id WHERE `realty`.`id` = '".$id."'";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		// $realty = array();
		// $realty = mysqli_fetch_assoc($res);
		
		// return $realty;
	// }
	
	//Добавление одной записи
	
	// public static function add_line($type, $title, $address, $price)
	// {	
		// global $link;
		// $sql = "INSERT INTO `realty` (`id`,`type_id`, `title`, `address`, `price`) VALUES (NULL, '".$type."', '".$title."', '".$address."', '".$price."')";            
		// mysqli_query($link, $sql) or die(mysqli_error($link));
	
		// return true;
	// }
	
	//Удаление записи
	
	// public static function delete_line($id)
	// {
		// global $link;
		// $sql ="DELETE FROM `realty` WHERE `realty`.`id` = '".$id."'";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		
		// return true;
	// }
	
	//Редактирование записи
	
	// public static function edite_line($id, $type, $title, $address, $price)
	// {
		// global $link;
		// $sql = "UPDATE `realty` SET `type_id` = '".$type."', `title` = '".$title."', `address` = '".$address."', `price` = '".$price."' WHERE `realty`.`id` = '".$id."'";
		// $res = mysqli_query($link, $sql) or die(mysqli_error($link));
		
		// return true;
	// }
}