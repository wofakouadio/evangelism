$(document).ready(function() {

    list;

    // dataTables js in table
    var list = $("#New_Souls_List").DataTable({
        dom: 'Blfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
        serverSide: true,
        processing: true,
        ajax: 'includes/new_souls_list.php',
        lengthChange: true,
        autowidth: true,
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
    });

    // // check if input is text
    // $("input[name=ns_fname]").keyup(function() {

    //     var regex = /^[a-zA-Z ]+$/;

    //     if (regex.test(this.value) === true) {
    //         var new_soul_name = $(this).val();
    //         console.log(new_soul_name);
    //     } else {
    //         console.log("invalid input");
    //     }
    //     this.value = this.value.replace(/[^a-zA-Z ]+/, '');

    // });


    // $("input[name=ns_origin]").keyup(function() {

    //     var regex = /^[a-zA-Z0-9 ]+$/;

    //     if (regex.test(this.value) === true) {
    //         var new_soul_origin = $(this).val();
    //         console.log(new_soul_origin);
    //     } else {
    //         console.log("invalid input");
    //     }
    //     // this.value = this.value.replace(/[a-zA-Z0-9 ]+/, '');

    // });

    // $("input[name=ns_contact]").keyup(function() {

    //     var regex = /^[0-9]+$/;

    //     if (regex.test(this.value) === true) {
    //         var new_soul_contact = $(this).val();
    //         console.log(new_soul_contact);
    //     } else {
    //         console.log("invalid input");
    //     }
    //     this.value = this.value.replace(/[0-9]+/, '');

    // });



    // getting variables for validation check
    $("button[type=button]").click(function() {

        var new_soul_name = $("input[name=ns_fname]").val();
        var new_soul_contact = $("input[name=ns_contact]").val();
        var new_soul_origin = $("input[name=ns_origin]").val();

        if (new_soul_name == "") {
            $("#ns_fname_err").html("Full Name cannot be empty");
        } else if (new_soul_contact == "") {
            $("#ns_contact_err").html("Contact cannot be empty");
        } else if (new_soul_origin == "") {
            $("#ns_origin_err").html("Origin cannot be empty");
        } else {
            $("#ns_fname_err").html("");
            $("#ns_contact_err").html("");
            $("#ns_origin_err").html("");

            $.ajax({

                url: 'includes/ajax_api',
                method: 'POST',
                data: {
                    save_new_soul: 'save_new_soul',
                    new_soul_name: new_soul_name,
                    new_soul_contact: new_soul_contact,
                    new_soul_origin: new_soul_origin
                },
                success: function(SaveNewSoul_Success) {

                    $("#msg").html(SaveNewSoul_Success);
                    $("#form-submit")[0].reset();
                    $("input[name=ns_fname]").focus();
                    $("#New_Souls_List").DataTable().ajax.reload();
                    list;

                    setTimeout(function() {
                        $("#MyAlert").hide();
                    }, 3000)

                    // console.log(SaveNewSoul_Success);

                }

            });

        }

        // console.log(new_soul_name + " - " + new_soul_contact + " - " + new_soul_origin);


    });

    $("#MyAlert").fadeTo(4000, 1000).slideUp(3000, function() {
        $("#MyAlert").slideUp(3000);
    });


});