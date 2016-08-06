<?php


class ControllerUsers extends Controller
{
    function __call($name, $params)
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

    function users_add_controller()
    {

        if (count($_POST)) {
            if ($_POST['action'] === 'add') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                $user = new ModelUser();
                $user->username = $username;
                $user->role = $role;
                $user->create_password($password);

                // TODO обработать password

                if ($user->add()!==Model::CREATE_FAILED) {
                    header("Location: /users/users_list");
                    die();

                }
                else
                {
                    die("Не удалось добавить");
                }

            }
        }

        return $this->render('users/add_user', [

        ]);

    }

    function users_list_controller()
    {
        $users = ModelUser::all_lines();

        return $this->render('users/user_list', [
            'users' => $users
        ]);
    }
	
	function users_del_controller($id)
    {
        
				
                $user = new ModelUser();
                

                

                if ($user->del($id)!==Model::CREATE_FAILED) {
                    header("Location: /users/users_list");
                    die();

                }
                else
                {
                    die("Не удалось добавить");
                }

            
        

        return $this->render('users/add_user', [

        ]);

	}
	
	function users_edit_controller($id)
    {
		
		
		$user_edit = new ModelUser();
		$user_edit -> one($id); 

        if (count($_POST)) {
            if ($_POST['action'] === 'edit') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];
				

                
				$user_edit->id = $id;
                $user_edit->username = $username;
                $user_edit->role = $role;
                $user_edit->create_password($password);

                // TODO обработать password

                if ($user_edit->edit()!==Model::CREATE_FAILED) 
				{
                    header("Location: /users/users_list");
                    die();

                }
                else
                {
                    die("Не удалось добавить");
                }

            }
        }

        return $this->render('users/edit_user', [
					'user_edit' => $user_edit
        ]);

    }
}
















