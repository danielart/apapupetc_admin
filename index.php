<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin PUPETC</title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>

</head>
<body>

<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Módulo de administración APA PUPETC</h1>
            <h2>Asociación Protectora de Animales</h2>
            <h3>Pon Una Patita En Tu Corazón</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
            </div>
        </div>
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
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir perro nuevo</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="first_name">Nombre</label>
                    <input type="text" id="name" placeholder="Nombre" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="last_name">Edad</label>
                    <input type="text" id="age" placeholder="Edad" class="form-control" title="En años y/o meses"/>
                </div>

                <div class="form-group">
                    <label for="last_name">Raza</label>
                    <input type="text" id="breed" placeholder="Raza" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="last_name">Peso</label>
                    <input type="number" id="weight" placeholder="Peso ( en kg )" class="form-control" title="Peso en kilogramos"/>
                </div>

                <div class="form-group">
                    <label for="last_name">Llegada</label>
                    <input type='text' class="form-control" id='arrived' />

                    <!-- <input type="text" id="arrived" placeholder="Fecha de llegada" class="form-control"/> -->
                </div>

                <div class="form-group">
                    <label for="last_name">Descripción</label>
                    <input type="text" id="description" placeholder="Descripción" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Medida</label>
                    <select  id="size" class="form-control">
                      <option value="grande">grande</option>
                      <option value="mediano">mediano</option>
                      <option value="pequeño">pequeño</option>
                      <option value="mini">mini</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="last_name">Cachorro
                    <input type="checkbox" id="puppy" class="form-control"/></label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="update_name">Nombre</label>
                    <input type="text" id="update_name" placeholder="Nombre" class="form-control" value="" />
                </div>

                <div class="form-group">
                    <label for="update_age">Edad</label>
                    <input type="text" id="update_age" placeholder="Edad" class="form-control" title="En años y/o meses"/>
                </div>

                <div class="form-group">
                    <label for="update_breed">Raza</label>
                    <input type="text" id="update_breed" placeholder="Raza" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="update_weight">Peso</label>
                    <input type="number" id="update_weight" placeholder="Peso ( en kg )" class="form-control" title="Peso en kilogramos"/>
                </div>

                <div class="form-group">
                    <label for="update_arrived">Llegada</label>
                    <input type='text' class="form-control" id='update_arrived' />
                </div>

                <div class="form-group">
                    <label for="update_description">Descripción</label>
                    <input type="text" id="update_description" placeholder="Descripción" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_size">Medida</label>
                    <select  id="update_size" class="form-control">
                        <option value="grande">grande</option>
                        <option value="mediano">mediano</option>
                        <option value="pequeño">pequeño</option>
                        <option value="mini">mini</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="update_puppy">Cachorro
                        <input type="checkbox" id="update_puppy" class=""/></label>
                </div>
                <hr>
                <div class="form-group">
                    <label for="update_adopted">Adoptado
                        <input type="checkbox" id="update_adopted" class=""/></label>
                        <input type='text' style="display: none;" class="form-control" id='update_adopted_date' />
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/collapse.js"></script>
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/transition.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/moment.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


<script>

    $(document).on('show.bs.modal', '.modal', function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    $(function () {
        $('#arrived,#update_adopted_date,#update_arrived').datetimepicker({format:'YYYY-MM-DD'});
        $("#update_adopted").change(function () {
           if($(this).is("checked")){
               $("#update_adopted_date").show();
           } else {
               $("#update_adopted_date").hide();
           }
        });
    });
</script>
</body>
</html>
