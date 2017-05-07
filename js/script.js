// Add Record
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
    }).done(function( data ) {
    }).error(function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
  alert(err.Message);
});
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


function getUserDetails(id) {
    // Add User ID to the hidden field for furture usage

    $.post("ajax/readUserDetails.php", { id: id },
        function (data, status) {

            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_name").val(user.name);
            $("#update_age").val(user.age);
            $("#update_breed").val(user.breed);
            $("#update_weight").val(user.weight);
            $("#update_arrived").val(user.arrived);
            $("#update_description").val(user.description);
            $("#update_size").val(user.size);
            $("#update_puppy").val(user.puppy);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
    $("#hidden_user_id").val(id);
}

function updateUserDetails() {
    // get values
    var name = $("#update_name").val();


    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            name: name
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
