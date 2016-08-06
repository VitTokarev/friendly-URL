<?

error_reporting(E_ALL);

class ControllerRealtyType extends Controller 
{
	function __call($name,$params)
    {
        e404();
    }
	
 public function __construct()
    {
        $this->layout = 'index.php';

        if ((int)System::get_user()->role != ModelUser::ROLE_USER && (int)System::get_user()->role != ModelUser::ROLE_ADMIN)
        {
            header("Location: /auth/login");
            die();
        }
		
		if(isset($_POST['exit_session']))
		{
			session_unset();
			session_destroy();
			header("Location: /");
		}


        
    }	

//Выборка всех типов

	public function all_types_controller()
	{
		if(ISSET($_POST['esc_submit']))
		{	
			header("Location: /");
			return;
		}	
		
		if(ISSET($_POST['add_type']))
		{	
			header("Location: /realty_type/add_type");
			return;
		}	
		
		$realty_types = ModelRealtyType::all_lines();
	
		return $this->render("main_type_content",['realty_types' => $realty_types]);
	}
	
	//Добавление типа
	
	public function add_type_controller()
	{
		if(ISSET($_POST['esc_submit']))
		{	
			header("Location: /realty_type/all_types");
			return;
		}	
		
		if(ISSET($_POST['add_type']))
		{	
			$title = $_POST['title'];
			$realty_type = new ModelRealtyType();
			$realty_type -> load([
								'title' => $title
								]);
			$result = $realty_type->add();
			header("Location: /realty_type/all_types");
			return;
		}	
		
		return $this->render("add_type_content");
	}
	
	
	//Редактирование типа
	
	public function edite_type_controller($id)
	{
		if(ISSET($_POST['esc_submit']))
		{	
			header("Location: /realty_type/all_types");
			return;
		}	
		
		if(ISSET($_POST['edite_type']))
		{	
			
			$title = $_POST['title'];
			$realty_type = new ModelRealtyType($id);
			$realty_type -> title = $title;
			$realty_type -> edit();
			header("Location: /realty_type/all_types");
			return;
		}	
		
		
		$realty_type = new ModelRealtyType();
		$realty_type -> one($id);
		
		return $this->render("realty_types_edite_content",['realty_type' => $realty_type]);
	}
	
	//Удаление типа
	
	public function delete_type_controller($id)
	{
	
		if(ISSET($_POST['esc_submit']))
		{	
			header("Location: /realty_type/all_types");
			return;
		}	
		
		if(ISSET($_POST['delete_type']))
		{	
			
			
			$realty = ModelRealty::all_by_type($id);
			$types = ModelRealtyType::all_lines();
			$types = ModelRealtyType::type_id_array($types);
			
			if($realty != NULL)
			{	
				$type_not_del = $types[$id]->title;
				return $this->render("existing_type_not_delete_content",['realty' => $realty,
									   'realty_type' => $types,
										'type_not_del' => $type_not_del]);
				
			}
			
			
			$realty_type = new ModelRealtyType();
			$realty_type -> del($id);
			header("Location: /realty_type/all_types");
			return;
		}
		
		
		$realty_type = new ModelRealtyType();
		$realty_type -> one($id);
		
		return $this->render("realty_type_delete_content",['realty_type' => $realty_type]);
		}

	}





