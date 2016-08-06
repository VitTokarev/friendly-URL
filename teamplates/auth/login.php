

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row">
    <div class="col-lg-12">
		<br><br>
		<div class="panel panel-danger">
			<div class="panel-heading">Просматривать информацию могут только зарегистрированные пользователи!!!</div>
		</div>
        <h1 class="page-header">Авторизация</h1>
        <form action="" method="post">
            <input type="hidden" name="action" value="login"/>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" placeholder="Имя пользователя" class="form-control" name="username">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" placeholder="Пароль" class="form-control" name="password">
            </div>
            <button class="btn btn-success" type="submit">Войти</button>			
        </form>
		<br>
		<div class="panel panel-default">
			<div class="panel-heading"> Если Вы не зарегистрированы, нажмите на кнопку: </div>				
			</div>
			<a class="btn btn-warning" href = "/users_ordinary/users_ordinary_add">Добавить пользователя</a>
		</div>
		
    </div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->