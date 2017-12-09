<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin PUPETC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>

<!-- Content Section -->
<div class="container-fluid">
    <div class=" row">
        <div class="form-group col-xs-12 col-md-12 col-lg-10 form-group col-xs-12 col-md-12 col-lg-10 col-lg-offset-1 ">
            <header id="header">
                <nav class="navbar navbar-inverse" role="banner">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#" id="addNewRecordButton" class="btn btn-default">Añadir nuevo</a></li>
                            </ul>
                        </div>
                    </div><!--/.container-->
                </nav><!--/nav-->

            </header><!--/header-->

            <div class="portfolio-item apps grandes col-xs-12 col-sm-4 col-md-3 isotope-item animalPanel"
                 style="display: none">
                <div class="recent-work-wrap">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span id="panelNameTitle"></span>
                                <button class="btn btn-danger" id="closePanel" style="float:right;">X</button>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive" height="255" src="images/profile_picture.png"
                                 alt="dog example picture">
                        </div>
                        <div class="panel-footer">
                            <ul>
                                <li>Nombre: <span id="panelName"></span></li>
                                <li>Raza: <span id="panelBreed"></span></li>
                                <li>Peso: <span id="panelWeight"></span></li>
                                <li>Medida: <span id="panelSize"></span></li>
                                <li>Edad: <span id="panelAge"></span></li>
                                <li>Carácter: <span id="panelDescription"></span></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Div - Add New Record -->
            <div id="createNewRecord" class="hiddenDiv">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nuevo Animal</h3>
                    </div>
                    <div class="panel-body">
                        <div class=" row">
                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="first_name">Nombre</label>
                                <input type="text" id="name" placeholder="Nombre" class="form-control"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="last_name">Edad</label>
                                <input type="text" id="age" placeholder="Edad" class="form-control"
                                       title="En años y/o meses"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="last_name">Raza</label>
                                <input type="text" id="breed" placeholder="Raza" class="form-control"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="last_name">Peso</label>
                                <input type="number" id="weight" placeholder="Peso ( en kg )" class="form-control"
                                       title="Peso en kilogramos"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="last_name">Llegada</label>
                                <input type='text' class="form-control" id='arrived'/>

                                <!-- <input type="text" id="arrived" placeholder="Fecha de llegada" class="form-control"/> -->
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="last_name">Descripción</label>
                                <input type="text" id="description" placeholder="Descripción" class="form-control"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="email">Medida</label>
                                <select id="size" class="form-control">
                                    <option value="grande">grande</option>
                                    <option value="mediano">mediano</option>
                                    <option value="pequeño">pequeño</option>
                                    <option value="mini">mini</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="last_name">Cachorro
                                    <input type="checkbox" id="puppy" class="form-control"/></label>
                            </div>

                        </div>

                        <div class="panel-footer">
                            <button type="button" class="btn btn-danger" id="closeNewRecordDivButton">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="addRecord()">Añadir</button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Close Div Add new record -->

            <!--  Div Add images to Animal-->
            <div id="addImagesToAnimal" class="bgColor hiddenDiv">
                <form id="uploadForm" action="upload.php" method="post">
                    <div id="targetLayer">No Image</div>
                    <div id="uploadFormLayer">
                        <input name="userImage" type="file" class="inputFile" /><br/>
                        <input type="submit" value="Submit" class="btnSubmit" />
                </form>
            </div>
            <!--  End Div Add images to Animal-->


            <!--Div Edit record-->
            <div id="update_user_modal" class="hiddenDiv">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edición de animal</h3>
                    </div>
                    <div class="panel-body">
                        <div class=" row">
                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_name">Nombre</label>
                                <input type="text" id="update_name" placeholder="Nombre" class="form-control" value=""/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_age">Edad</label>
                                <input type="text" id="update_age" placeholder="Edad" class="form-control"
                                       title="En años y/o meses"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_breed">Raza</label>
                                <input type="text" id="update_breed" placeholder="Raza" class="form-control"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_weight">Peso</label>
                                <input type="number" id="update_weight" placeholder="Peso ( en kg )"
                                       class="form-control" title="Peso en kilogramos"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_arrived">Llegada</label>
                                <input type='text' class="form-control" id='update_arrived'/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_description">Descripción</label>
                                <input type="text" id="update_description" placeholder="Descripción"
                                       class="form-control"/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_size">Medida</label>
                                <select id="update_size" class="form-control">
                                    <option value="grande">grande</option>
                                    <option value="mediano">mediano</option>
                                    <option value="pequeño">pequeño</option>
                                    <option value="mini">mini</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_puppy">Cachorro
                                    <input type="checkbox" id="update_puppy" name="update_puppy" class="form-control"/></label>
                            </div>
                            <hr>
                            <div class="form-group col-xs-12 col-md-6 col-lg-4">
                                <label for="update_adopted">Adoptado
                                    <input type="checkbox" id="update_adopted" class="form-control"/></label>
                                <input type='text' style="display: none;" class="form-control"
                                       id='update_adopted_date'/>
                            </div>

                        </div>
                    </div>

                    <div class="panel-footer">
                        <button type="button" class="btn btn-danger" id="cancelEditRecord">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="updateUserDetails()">Save Changes
                        </button>
                        <input type="hidden" id="hidden_user_id">
                    </div>
                </div>

            </div>
                    <!--Close Div Edit record-->



        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Animales en adopción:</h3>
                <div class="records_content"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Adoptados:</h3>
                <div class="adoptados_content"></div>
            </div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>


<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/collapse.js"></script>
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/transition.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/moment.js"></script>
<script type="text/javascript" src="js/notify.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script>

    $(function () {

        $("#closePanel").click(function () {
            $(".animalPanel").hide()
        })
        $('#arrived,#update_adopted_date,#update_arrived').datetimepicker({format: 'YYYY-MM-DD'});
        $("#update_adopted").bind("change", (function () {
            if ($(this).is(":checked")) {
                $("#update_adopted_date").show();
            } else {
                $("#update_adopted_date").hide();
            }
        }));
        $("#update_puppy").bind("change", (function () {
            if ($(this).is(":checked")) {

            }
        }));
    });

</script>
</body>
</html>
