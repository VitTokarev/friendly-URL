

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Удаление объекта недвижимости</h1>

                        <form method="POST">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Удаление типа объекта недвижимости:
                                </div>
                                <span class="form-control"><?= $realty_type->title?></span>
                            </div>
                            <p>
                                <input class="btn btn-success" type="submit" name="delete_type" value="Удалить">
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
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
