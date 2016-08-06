<?
// Разноцветные строки в таблице

$line_color[] = 'success';
$line_color[] = 'info';
$line_color[] = 'warning';
$line_color[] = 'danger';
?>
<!-- Выборка всех записей -->

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Выборка всех объектов недвижимости</h1>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список всех объектов недвижимости
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Тип</th>
                                                <th>Недвижимость</th>
                                                <th>Адрес</th>
                                                <th class = "price">Цена</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$i = 0;
										foreach($realty as $a)
										{											
									?>
                                                <tr class="<?=$line_color[$i]?>">
                                                    <td>
                                                        <?= $a->type->title?>
                                                    </td>
                                                    <td>
                                                        <?= mb_substr($a->title, 0, 70, 'UTF-8')?>
														<?if(strlen($a->title) > 70) echo '...';?>
                                                    </td>
                                                    <td>
                                                        <?= $a->address?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($a->price, 0, ' ', ' ')?>
                                                    </td>
                                                    <td>
														<a href="/realty/one_line/<?= $a->id?>">подробнее</a>
													</td>
                                                </tr>
                                                <?php
										$i++;
										if($i == 3) $i = 0;	
										}	
									?>
                                        </tbody>
                                    </table>
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