<!-- Редактирование объекта -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Редактирование объекта недвижимости</h1>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Выберите тип объекта недвижимости:
                            </div>
                            <form method="POST">
                                <select class="form-control" name="type_id">
                                    <?
								foreach($realty_types as $key => $massive)
								{ ?>
                                        <option value="<?=$realty_types[$key]['id']?>">
                                            <?=$realty_types[$key]['title']?>
                                        </option>
                                        <?
								}?>
                                </select>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Новое описание объекта недвижимости:
                            </div>
                            <textarea class="form-control" rows="3" type="text" name="title"><?= $realty->title?></textarea>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Новый адрес объекта недвижимости:
                            </div>
                            <input class="form-control" type="text" name="address" value="<?= $realty->address?>">
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Новая цена объекта недвижимости:
                            </div>
                            <input class="form-control" type="text" name="price" value="<?= $realty->price?>">
                        </div>
                        <p>
                            <input class="btn btn-success" type="submit" name="edite_submit" value="Изменить">
                            <input class="btn btn-info" type="submit" name="esc_submit" value="Отмена">
                        </p>
                        </form>
                    </div>
                    <!-- /.panel -->



                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->
        </div>
        