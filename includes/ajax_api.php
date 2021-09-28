<?php

require('config.php');

// function to sanitize data which is being passed
function Sanitize_data($data)
{

    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

//saving new soul information
if (isset($_POST['save_new_soul'])) {

    if (isset($_POST['save_new_soul']) == 'save_new_soul') {

        $new_soul_name = Sanitize_data(ucwords($_POST["new_soul_name"]));
        $new_soul_contact = Sanitize_data($_POST["new_soul_contact"]);
        $new_soul_origin = Sanitize_data(ucwords($_POST["new_soul_origin"]));

        // check query to see if new soul information are in db
        $chk_info_sql = "SELECT * FROM new_souls WHERE soul_contact = '$new_soul_contact'";
        // execute check query
        $chk_info_exe = mysqli_query($conn_str, $chk_info_sql);

        // get query result whether data exists
        if (mysqli_num_rows($chk_info_exe) > 0) {

            echo "<p class='alert alert-info' id='MyAlert'>$new_soul_name already exists.</p>";
        }
        // if data does not exist, insert into new souls table
        else {

            // insert query
            $ins_info_sql = "INSERT INTO new_souls(soul_name, soul_contact, soul_origin) VALUES('$new_soul_name', '$new_soul_contact', '$new_soul_origin')";
            // execute
            $ins_info_exe = mysqli_query($conn_str, $ins_info_sql);

            // check whether the query has been executed successfully
            if ($ins_info_exe) {

                echo "<p class='alert alert-success' id='MyAlert'>$new_soul_name has been won for God</p>";
            } else {

                echo "<p class='alert alert-warning' id='MyAlert'>Failed to register $new_soul_name in the system. Contact System Administrator. " . mysqli_error($conn_str) . "</p>";

                // echo "<script>alert('Failed to register $new_soul_name in the system. Contact System Administrator {mysqli_error($conn_str)}');</p>";
            }
        }
    }
}
