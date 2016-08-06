


<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Пользователи</h1>

        <?php

        // вывод данных тут
        if (count($users)>0)
        {
            ?>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Список
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя пользователя</th>
                                <th>Роль</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($users as $user)
                            {
                                ?>

                                <tr>
                                    <td><?= $user->id ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= ModelUser::$roles[$user->role] ?></td>
                                    <td>                                        
                                        <a class="btn btn-success" href="/users/users_edit/<?= $user->id ?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" href="/users/users_del/<?= $user->id ?>"><i class="fa fa-times-circle"></i></a>
										
										
										
                                    </td>
                                </tr>


                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
				</div>
            <a href="/users/users_add" class="btn btn-success"><i class="fa fa-plus-circle"></i> Добавить</a>
            <?php
        }
        else
        {
            ?>
            <h2>Пока нет ни одной записи. Вы можете <a href="/users/users_add">добавить</a> первую</h2>
            <?php
        }


        ?>

    </div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
