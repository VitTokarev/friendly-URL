<!-- Выборка одной записи -->


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Выборка одного объекта недвижимости</h1>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Тип объекта недвижимости:
                            </div>
                            <span class="form-control"><?= $realty->type->title?></span>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Описание объекта недвижимости:
                            </div>
                            <span class="form-control form-control-my"><?= $realty->title?></span>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Адрес объекта недвижимости:
                            </div>
                            <span class="form-control"><?= $realty->address?></span>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Цена объекта недвижимости:
                            </div>
                            <span class="form-control"><?= number_format($realty->price,0,' ',' ')?></span>
                        </div>
                        <form method="POST">
                            <p>
                                <input class="btn btn-info" type="submit" name="edite_object" value="Редактировать">
                                <input class="btn btn-success" type="submit" name="delete_object" value="Удалить">
                                <input class="btn btn-warning" type="submit" name="esc_submit" value="Отмена">
                            </p>
                        </form>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->



            </div>
            <!-- /.col-lg-12 -->

        </div>
        