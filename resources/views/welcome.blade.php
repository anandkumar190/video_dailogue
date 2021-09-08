<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Video Dailogue </title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">

<div class="text-center" style="margin: 20px 0px 20px 0px;">
         
         <h1 class="text-secondary">Video Dailogue</h1>
     </div>
<div class="row">
        <!-- <div class="col-md-2">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addanewuser">
                Add a New  User
            </button>
        </div> -->

        <div class="col-md-2">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moviemodal">
                Add Move Dailogue
            </button>
        </div>
</div>
</div>
<div class="container ">

  <table class="table" id="movietable">
    <thead class="thead-light">
      <tr>
          <th> Movie Name</th>
        <th>Movie Durstion</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result as $val )
      <tr>
        <td>{{$val['movie_name']}}</td>
        <td>{{$val['move_name']}}</td>
        <td> <a href="{{url('api/delete/'.$val['id'])}}" ><i class="fa fa-trash"></i></a> </td>
      </tr>

      @endforeach
   
    </tbody>
  </table>
</div>


</body>

 <!-- The Modal Bulk Import User -->
 <div class="modal fade" id="moviemodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Movie Dailogue</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <form method="post" action="{{url('api/StoreMovieDialogue')}}" id="moviedalogue">
        <div class="row mb-2">
            <div class="col-md-3">
                <input type="text" name="movie_name" class="form-control m-input" placeholder="Movie name" autocomplete="off">
            </div>
            <div class="col-md-3">
                <input type="text" name="movie_durstion" class="form-control m-input" placeholder="Movie durstion" autocomplete="off">
            </div>
        </div> 

            <div class="row mb-3">
                <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-3">
                        <div class="col-md-3">
                            <input type="text" name="cast_name[]" class="form-control m-input" placeholder=" Cast name" autocomplete="off">
                         </div>
                         <div class="col-md-3">   
                            <input type="text" name="cast_gender[]" class="form-control m-input" placeholder="Cast gender" autocomplete="off">
                            </div>
                            <div class="col-md-3">  
                              <input type="text" name="cast_character[]" class="form-control m-input" placeholder="cast Character" autocomplete="off">
                            </div>
                            <div class="col-md-3">
                                <div class="input-group-append">                
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div id="inputFormRow2">
                        <div class="input-group mb-3">
                        <div class="col-md-2">
                            <input type="time" name="start_time[]" step=".1" class="form-control m-input" placeholder="start_time" autocomplete="off">
                         </div>
                         <div class="col-md-2">   
                            <input type="time" name="end_time[]" step=".1" class="form-control m-input" placeholder="Enter title" autocomplete="off">
                            </div>
                            <div class="col-md-2">  
                              <input type="text" name="character_name[]" class="form-control m-input" placeholder="Character name" autocomplete="off">
                            </div>
                            <div class="col-md-2">  
                              <input type="text" name="dailogue[]" class="form-control m-input" placeholder="Dailogue" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <div class="input-group-append">                
                                    <button id="removeRow2" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="newRow2"></div>
                    <button id="addRow2" type="button" class="btn btn-info">Add Row</button>
                </div>
            </div>


            <div class="text-center" style="margin: 20px 0px 20px 0px;">
         
            <button  type="submit" class="btn btn-info">Submit</button>
     </div>
            
        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



  <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3"><div class="col-md-3">';
            
            html += '<input type="text" name="cast_name[]" class="form-control m-input" placeholder="Cast name" autocomplete="off">';
            html += ' </div><div class="col-md-3">';   
            html += '  <input type="text" name="cast_gender[]" class="form-control m-input" placeholder="Cast gender" autocomplete="off">';
            html += '</div> <div class="col-md-3">';  
            html += ' <input type="text" name="cast_character[]" class="form-control m-input" placeholder="Cast character" autocomplete="off">';
            html += ' </div><div class="col-md-3">';      
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div></div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });

        $("#addRow2").click(function () {
            var html = '';
            html += '<div id="inputFormRow2">';
            html += '<div class="input-group mb-3"><div class="col-md-2">';
            html += '<input type="time"  step=".1" name="start_time[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
            html += ' </div><div class="col-md-2">';   
            html += '  <input type="time" step=".1" name="end_time[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
            html += '</div> <div class="col-md-2">';  
            html += '  <input type="text" name="character_name[]" class="form-control m-input" placeholder="Character name" autocomplete="off">';
            html += '</div> <div class="col-md-2">';  
            html += ' <input type="text" name="dailogue[]" class="form-control m-input" placeholder="Dailogue" autocomplete="off">';
            html += ' </div><div class="col-md-2">';      
            html += '<div class="input-group-append">';
            html += '<button id="removeRow2" type="button" class="btn btn-danger">Remove</button>';
            html += '</div></div>';
            html += '</div>';

            $('#newRow2').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow2', function () {
            $(this).closest('#inputFormRow2').remove();
        });


$(document).ready(function() {
        // this is the id of the form
    $("#moviedalogue").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(), // serializes the form's elements.
          success: function(data)
          {
              alert(data); // show response from the php script.
          }
        });
    });
});
    </script>

</html>