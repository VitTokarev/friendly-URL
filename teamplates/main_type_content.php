<?
// Разноцветные строки в таблице

$line_color[] = 'success';
$line_color[] = 'info';
$line_color[] = 'warning';
$line_color[] = 'danger';
?>

<!-- Выборка всех типов -->


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Выборка всех типов объектов недвижимости</h1>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список всех типов объектов недвижимости
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Тип</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$i = 0;
										foreach($realty_types as $a)
										{											
									?>
                                                <tr class="<?=$line_color[$i]?>">
                                                    <td>
                                                        <?= $a->title?>
                                                    </td>
                                                    <td><a href="/realty_type/edite_type/<?=$a->id?>">изменить</a></td>
                                                    <td><a href="/realty_type/delete_type/<?=$a->id?>">удалить</a></td>
                                                </tr>
                                                <?php
										$i++;
										if($i == 3) $i = 0;	
										}	
									?>
                                        </tbody>
                                    </table>
                                    <form method="POST">
                                        <p>
                                            <input class="btn btn-info" type="submit" name="add_type" value="Добавить">
                                            <input class="btn btn-warning" type="submit" name="esc_submit" value="Отмена">
                                        </p>
                                    </form>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->

                    </div>
                    <!-- /.col-lg-12 -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
