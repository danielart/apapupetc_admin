// Add Record
function setFormReady(){
    $("#uploadForm").on('submit',(function(e){
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                $("#targetLayer").html(data);
            },
            error: function(){}
        });
    }));
}

function addRecord() {
    // get values
    var name = $("#name").val();
    var age = $("#age").val();
    var breed = $("#breed").val();
    var weight = $("#weight").val();
    var arrived = $("#arrived").val();
    var description = $("#description").val();
    var size = $("#size").val();

    // Add record
    $.post("ajax/addRecord.php", {
        name: name,
        age: age,
        breed: breed,
        weight: weight,
        arrived: arrived,
        description: description,
        size: size
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#name").val("");
        $("#age").val("");
        $("#breed").val("");
        $("#weight").val("");
        $("#arrived").val("");
        $("#description").val("");
        $("#size").val("");
    }).success(function (data) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        clearNewRecordInputs()
    }).error(function (xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
    });

    $("#createNewRecord").hide();
}

// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
    $.get("ajax/readAdoptedRecords.php", {}, function (data, status) {
        $(".adoptados_content").html(data);
    });
}

function setAnimalIdToDelete(id){
    $.post("ajax/deleteUser.php", {
            id: id
        },
        function () {
            // reload Users by using readRecords();
            readRecords();
        });
}

function setAnimalIdAsAdopted(id){
    $.post("ajax/adoptAnimal.php", {
            id: id
        },
        function () {
            // reload Users by using readRecords();
            readRecords();
        });
}
function setAnimalIdToReturn(id){
    $.post("ajax/returnAnimal.php", {
            id: id
        },
        function () {
            // reload Users by using readRecords();
            readRecords();
        });
}


function getUserDetailsPanel(id) {
    $(".animalPanel").show();
    $.post("ajax/readUserDetails.php", { id: id },
        function (data, status) {

            var user = JSON.parse(data);
            $("#panelName").text(user.name);
            $("#panelNameTitle").text(user.name);
            $("#panelAge").text(user.age);
            $("#panelBreed").text(user.breed);
            $("#panelWeight").text(user.weight);
            $("#panelArrived").text(user.arrived);
            $("#panelDescription").text(user.description);
            $("#panelSize").text(user.size);
        }
    );

}
function openImagesForm(){
    $("#addImagesToAnimal").show();
}

function getUserDetails(id) {
    // Add User ID to the hidden field for furture usage

    $("#update_user_modal").show();

    $.post("ajax/readUserDetails.php", { id: id },
        function (data, status) {

            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_name").val(user.name);
            $("#update_age").val(user.age);
            $("#update_breed").val(user.breed);
            $("#update_weight").val(user.weight);
            $("#update_arrived").val(user.arrived);
            $("#update_description").val(user.description);
            $("#update_size").val(user.size);
            if(user.adopted === 1)
                $("#update_adopted").prop("checked",true);
            if(user.puppy === 1)
                $("#update_puppy").prop("checked",true);

            $("#update_adopted_date").val(user.adoptedDate);
        }
    );
    // Open modal popup
    $("#hidden_user_id").val(id);
}

function updateUserDetails() {
    // get values
    var id = $("#hidden_user_id").val();
    var name = $("#update_name").val();
    var age = $("#update_age").val();
    var breed = $("#update_breed").val();
    var weight = $("#update_weight").val();
    var arrived =  $("#update_arrived").val();
    var desc = $("#update_description").val();
    var size = $("#update_size").val();
    var puppy = 0;
    if($("#update_puppy").is(":checked")){
        puppy = 1;
    }
    var adopted = 0;
    if($("#update_adopted").is(":checked")){
        adopted = 1;
    }
    var adoptedDate = $("#update_adopted_date").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            name:name,
            age: age,
            breed: breed,
            weight: weight,
            arrived: arrived,
            desc: desc,
            size: size,
            puppy: puppy,
            adopted: adopted,
            adoptedDate: adoptedDate
        },
        function (data, status) {
        console.log(data )
        console.log(status)
            $.notify(name + " ha sido editado correctamente","success");
            // hide modal popup
            $("#update_user_modal").hide();
            // reload Users by using readRecords();
            readRecords();
        }
    );
    // clearEditRecordInputs();
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});

$("#closeNewRecordDivButton,#closeNewRecordDivX").click(function(){
    $("#createNewRecord").hide();
    clearNewRecordInputs();
});

$("#cancelEditRecord,#closeEditRecordX").click(function(){
    $("#update_user_modal").hide();
    clearEditRecordInputs();
});

$("#addNewRecordButton").click(function(){
    $("#createNewRecord").show();
});

function clearNewRecordInputs(){
    $("#name").val("");
    $("#age").val("");
    $("#breed").val("");
    $("#weight").val("");
    $("#arrived").val("");
    $("#description").val("");
    $("#size").val("");
}

function clearEditRecordInputs(){
    $("#update_name").val("");
    $("#update_age").val("");
    $("#update_breed").val("");
    $("#update_weight").val("");
    $("#update_arrived").val("");
    $("#update_description").val("");
    $("#update_size").val("");
    $("#update_puppy").val("");
}
