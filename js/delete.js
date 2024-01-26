 // Student Delete scripts  //  
$(document).ready(function () {

    $('.delete_confirm_btn').click(function(e) {
       //  var form = document.forms["dataTable"];
         e.preventDefault();

         var id = $(this).val();

         swal({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             $.ajax({
                  method: "POST",
                  url: "studentdelete.php",
                  data: {
                      'studentID':id,
                      'delete_confirm_btn': true

                  },
                  success: function(response){
                     if(response == 200)
                     {
                        swal("Success!","Student Information Deleted!", "success");
                        $(".delete_confirm_btn").load(location.href = "students.php");
                     }
                     else if(response == 500)
                     {
                       swal("Oops!","Save Error!", "error");
                     }
                  }
               });
           }
         })
     });
 });
 
  // Student Delete scripts  //  
$(document).ready(function () {

    $('.class_delete_confirm_btn').click(function(e) {
       //  var form = document.forms["dataTable"];
         e.preventDefault();

         var id = $(this).val();
         swal({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             $.ajax({
                  method: "POST",
                  url: "classdelete.php",
                  data: {
                      'classID':id,
                      'class_delete_confirm_btn': true

                  },
                  success: function(response){
                     if(response == 200)
                     {
                        swal("Success!","Class Information Deleted!", "success");
                        $(".class_delete_confirm_btn").load(location.href = "class.php");
                     }
                     else if(response == 500)
                     {
                       swal("Oops!","Save Error!", "error");
                     }
                  }
               });
           }
         })
     });
 });
  // Student Delete scripts  //  
$(document).ready(function () {

    $('.settingsdelete_confirm_btn').click(function(e) {
       //  var form = document.forms["dataTable"];
         e.preventDefault();

         var id = $(this).val();

         swal({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             $.ajax({
                  method: "POST",
                  url: "studentdelete.php",
                  data: {
                      'settingsID':id,
                      'settingsdelete_confirm_btn': true

                  },
                  success: function(response){
                     if(response == 200)
                     {
                        $(".settingsdelete_confirm_btn").load(location.href = "settings.php");
                     }
                     else if(response == 500)
                     {
                       swal("Oops!","Save Error!", "error");
                     }
                  }
               });
           }
         })
     });
 });        