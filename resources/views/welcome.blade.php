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
        <td>{{$val['movie_durstion']}}</td>
        <td> <a href="{{url('api/delete/'.$val['id'])}}" ><i class="fa fa-trash"></i></a> 
        <button value="{{$val['id']}}" onclick="editmovedailogue(this.value)" >  <i class="fa fa-pencil"></i> </button> </td>
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
                <input type="hidden" name="movie_id" id="movie_id"> 
                <input type="text" name="movie_name" id="movie_name" class="form-control m-input" placeholder="Movie name" autocomplete="off">
            </div>
            <div class="col-md-3">
                <input type="text" name="movie_durstion" id="movie_durstion" class="form-control m-input" placeholder="Movie durstion" autocomplete="off">
            </div>
        </div> 

            <div class="row mb-3">
                <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-3">
                        <div class="col-md-3">
                        <input type="hidden" name="cast_id[]">
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
                        <input type="hidden" name="dailogue_id[]">
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
               <button id="submitbtn" type="submit" class="btn btn-info">Submit</button>
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


          // remove row
          $(document).on('click', '#removeRow', function () {

            let castid = $(this).data('cast_id');    
              if(castid !== undefined){
                let costdeleteapi="{{url('api/CastDelete/')}}"+'/'+castid;
                $.get(costdeleteapi, function(data, status){
                });
              }
              $(this).closest('#inputFormRow').remove();
          });

  // remove row
  $(document).on('click', '#removeRow2', function () {    
      let dailogueid = $(this).data('dailogue_id');    
      if(dailogueid !== undefined){
        let costdeleteapi="{{url('api/DailogueDelete/')}}"+'/'+dailogueid;
        $.get(costdeleteapi, function(data, status){
        });
      }    
        $(this).closest('#inputFormRow2').remove();
  });

        // add row dailogue_row
        $(document).on('click', '#addRow2', function (){
              let dailogue_row = '';
              dailogue_row += '<div id="inputFormRow2">';
              dailogue_row += '<div class="input-group mb-3"><div class="col-md-2"><input type="hidden" name="dailogue_id[]">';
              dailogue_row += '<input type="time"  step=".1" name="start_time[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
              dailogue_row += ' </div><div class="col-md-2">';   
              dailogue_row += '<input type="time" step=".1" name="end_time[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
              dailogue_row += '</div> <div class="col-md-2">';  
              dailogue_row += '  <input type="text" name="character_name[]" class="form-control m-input" placeholder="Character name" autocomplete="off">';
              dailogue_row += '</div> <div class="col-md-2">';  
              dailogue_row += ' <input type="text" name="dailogue[]" class="form-control m-input" placeholder="Dailogue" autocomplete="off">';
              dailogue_row += ' </div><div class="col-md-2">';      
              dailogue_row += '<div class="input-group-append">';
              dailogue_row += '<button id="removeRow2" type="button" class="btn btn-danger">Remove</button>';
              dailogue_row += '</div></div>';
              dailogue_row += '</div>';

              $('#newRow2').append(dailogue_row);
          });

              // add row castrow
              $(document).on('click', '#addRow', function () {
            let castrow = '';
            castrow += '<div id="inputFormRow">';
            castrow += '<div class="input-group mb-3"><div class="col-md-3"><input type="hidden" name="cast_id[]">';     
            castrow += '<input type="text" name="cast_name[]" class="form-control m-input" placeholder="Cast name" autocomplete="off">';
            castrow += ' </div><div class="col-md-3">';   
            castrow += '  <input type="text" name="cast_gender[]" class="form-control m-input" placeholder="Cast gender" autocomplete="off">';
            castrow += '</div> <div class="col-md-3">';  
            castrow += ' <input type="text" name="cast_character[]" class="form-control m-input" placeholder="Cast character" autocomplete="off">';
            castrow += ' </div><div class="col-md-3">';      
            castrow += '<div class="input-group-append">';
            castrow += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            castrow += '</div></div>';
            castrow += '</div>';

            $('#newRow').append(castrow);
        });


    $(document).ready(function() {
      //- // Remove  CAST ROW----------------------------------------- 
        

 //-----------------------------------------------------------------------------------    
    
// -------------------------------------------------------------------------------------
        $("#moviedalogue").submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
              type: "POST",
              url: url,
              data: form.serialize(), 
              success: function(data)
              {       $('#moviemodal').modal('hide');      }
            });
        
        });
    });
// ----------------------------------------end-------------------------------------------------
 function editmovedailogue(id) {
  let url="{{url('api/GetAllMoviesDialoguebyid/')}}"+'/'+id;
   $.get(url, function(data, status){
    $('#movie_name').val(data.movie_name);
    $('#movie_durstion').val(data.movie_durstion);
    $('#movie_id').val(data.id);
      let cast_edit_row='';  
        $.each( data.casts, function( key, value ) {
              cast_edit_row += '<div id="inputFormRow">';
              cast_edit_row += '<div class="input-group mb-3"><div class="col-md-3"><input type="hidden" name="cast_id[]" value ="'+value.id+'">';
              cast_edit_row += '<input type="text" name="cast_name[]"  value ="'+value.cast_name+'" class="form-control m-input" placeholder="Cast name" autocomplete="off">';
              cast_edit_row += ' </div><div class="col-md-3">';   
              cast_edit_row += '  <input type="text" name="cast_gender[]" value ="'+value.cast_gender+'" class="form-control m-input" placeholder="Cast gender" autocomplete="off">';
              cast_edit_row += '</div> <div class="col-md-3">';  
              cast_edit_row += ' <input type="text" name="cast_character[]" value ="'+value.cast_character+'" class="form-control m-input" placeholder="Cast character" autocomplete="off">';
              cast_edit_row += ' </div><div class="col-md-3">';      
              cast_edit_row += '<div class="input-group-append">';
              cast_edit_row += '<button id="removeRow" type="button" data-cast_id="'+value.id+'" class="btn btn-danger">Remove</button>';
              cast_edit_row += '</div></div>';
              cast_edit_row += '</div>';
        });
      
        let dailogue_edit_row = '';
          $.each( data.dailogues, function( key, val ) {
                dailogue_edit_row += '<div id="inputFormRow2">';
                dailogue_edit_row += '<div class="input-group mb-3"><div class="col-md-2"><input type="hidden" name="dailogue_id[]" value ="'+val.id+'">';
                dailogue_edit_row += '<input type="time"  step=".1" name="start_time[]" value ="'+val.start_time+'" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
                dailogue_edit_row += ' </div><div class="col-md-2">';   
                dailogue_edit_row += '<input type="time" step=".1" name="end_time[]" value ="'+val.end_time+'" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
                dailogue_edit_row += '</div> <div class="col-md-2">';  
                dailogue_edit_row += '  <input type="text" name="character_name[]" value ="'+val.character_name+'" class="form-control m-input" placeholder="Character name" autocomplete="off">';
                dailogue_edit_row += '</div> <div class="col-md-2">';  
                dailogue_edit_row += ' <input type="text" name="dailogue[]" value ="'+val.dailogue+'" class="form-control m-input" placeholder="Dailogue" autocomplete="off">';
                dailogue_edit_row += ' </div><div class="col-md-2">';      
                dailogue_edit_row += '<div class="input-group-append">';
                dailogue_edit_row += '<button id="removeRow2" type="button" data-dailogue_id="'+val.id+'" class="btn btn-danger">Remove</button>';
                dailogue_edit_row += '</div></div>';
                dailogue_edit_row += '</div>';
          }); 
     
        $('#newRow').replaceWith(cast_edit_row);
        $('#newRow2').replaceWith(dailogue_edit_row);
        let actionurl="{{url('api/updateMovieDialogue')}}";
        $("#moviedalogue").attr('action',actionurl);
        $("#submitbtn").html("Update");
        $('#moviemodal').modal('show');

    });   
 }

    </script>

</html>