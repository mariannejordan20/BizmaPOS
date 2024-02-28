<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/
bootstrap .min .css" >
    <title>Document</title>
</head>
<body>
        <div class="container" style="max-width:50%">

        <div class="text-center mt-5 mb-4">
            <h2>Try search</h2>
        </div>
            <input type="text" class="form-control" id="live_search" autocomplete="off">

        </div>

        <div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $("#live_search").keyup(function() {
            var input = $(this).val();


            if(input !=""){
                $.ajax({
                    url:"livesearch.php",
                    method:"POST",
                    data:{input: input},

                    success:function(data){
                        $("#searchresult").show();
                        $("#searchresult").html(data);
                    }
                });
            }else{
                $("#searchresult").css("display","none");
            }
        });
    });

</script>



</body>
</html>

