<!-- Добавление одного объекта -->


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Добавление объекта недвижимости</h1>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Выберите тип объекта недвижимости:
                            </div>
                            <form method="POST">
                                <select class="form-control" name="type_id">
                                    <?
								foreach($realty_types as $a_type)
								{ ?>
                                        <option value="<?=$a_type->id?>">
                                            <?=$a_type->title?>
                                        </option>
                                        <?
								}?>
                                </select>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Описание объекта недвижимости:
                            </div>
                            <textarea class="form-control" rows="3" type="text" name="title"></textarea>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Адрес объекта недвижимости:
                            </div>
                            <input class="form-control" type="text" name="address">
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Цена объекта недвижимости:
                            </div>
                            <input class="form-control" type="text" name="price">
                        </div>
                        <p>
                            <input class="btn btn-success" type="submit" name="add_submit" value="Добавить">
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
        