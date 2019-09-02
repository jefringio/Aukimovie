<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>AukiMovies</title>
    <style>
       .editable {background-color: wheat;}
    </style>

   
    <script>
        function getMovie(){
            $.get(
                    'getMovie.php',
                      function(data){
                            $('#gethere').html(data);
                        }
                );

        }
        function deleteRecord(id) {
            console.log("id =" + id);
            if(confirm("Are you sure you want to delete this row?")) {
                    $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data:'id='+id,
                        success: function(data){
                            if(data=="successfully"){
                                // console.log('ys');
                                getMovie();
                            }
                            else{
                                // alert(data)
                                console.log('error');
                            }
                        }
                });
            }
        }

        function addactor() {
                var actorname =$('#actor-name').val();
                console.log("id =" + actorname);
                    $.ajax({
                        url: "serveractor.php",
                        type: "POST",
                        data: {
                            f:actorname
                        },
                        success: function(data){
                            // alert(data);
                            if(data=="added"){
                                // alert("added");
                                // console.log('ys');
                                getMovie();
                            }
                            else{
                                // alert(data)
                                console.log('error');
                            }
                        }
                });
            }
            function addgenre() {
                var genrename =$('#genre-name').val();
                console.log("gen =" + genrename);
                    $.ajax({
                        url: "serveractor.php?req=genre",
                        type: "POST",
                        data: {
                            f:genrename
                        },
                        success: function(data){
                            // alert(data);
                            if(data=="added"){
                                // alert("added");
                                // console.log('ys');
                                getMovie();
                            }
                            else{
                                // alert(data)
                                console.log('error');
                            }
                        }
                });
            }
    function ready(id){
        var $div=$('.'+id), isEditable=$div.is('.editable');
        $('.'+id).prop('contenteditable',!isEditable).toggleClass('editable');
        
        
    }
    function editrecord(id,obj){
              
        console.log(id);      
        // console.log();
        var id = id;
        var year = $(obj).parents("#main").find("#year").text();
        console.log(year);
        var actorname = $(obj).parents("#main").find("#actorname").text();
        console.log(actorname);
        var genre = $(obj).parents("#main").find("#genrename").text();
        console.log(genre);
        var rating = $(obj).parents("#main").find("#rating").text();
        console.log(rating);
        $.post(
            "server.php?req=edit",
            {year:year , actorname:actorname , genre:genre , rating:rating , id:id
            },function(data){
                // alert(data);
                // if(data=="added"){
                //     // alert("added");
                //     // console.log('ys');
                //     getMovie();
                // }
                // else{
                //     // alert(data)
                //     console.log('error');
                // }
            }
        );

    }
        
       
    </script>
    
</head>
<body>
    <h1>Auki Movies</h1>
    <!-- add movie   -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modaladdgenre" data-whatever="@addgenre"onclick="window.location.href='addmovies.php'">Add Movie</button>
    <!-- modal button for add actor -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modaladdactor" data-whatever="@addactor">Add Actors</button>
        <div class="modal fade" id="Modaladdactor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD ACTORS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Actor Name</label>
                    <input type="text" class="form-control" id="actor-name">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick=" addactor() " data-dismiss="modal">ADD</button>
            </div>
            </div>
        </div>
        </div>
    <!-- modal button for add actor -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modaladdgenre" data-whatever="@addgenre">Add Genre</button>
        <div class="modal fade" id="Modaladdgenre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD GENRE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addgenre.php" method="POST">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Genre Name</label>
                    <input type="text" class="form-control" id="genre-name">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick=" addgenre() " data-dismiss="modal">ADD</button>
            </div>
            </div>
        </div>
        </div>


       
    <br>
    <br>
    
            <div id="gethere"></div>

       
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script>getMovie()</script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>