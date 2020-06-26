
 <?php  
// Include config file
require_once "config.php";
 
if(isset($_POST["insert"]))  
 {  
      $file = (addslashes(file_get_contents($_FILES["image"]["tmp_name"])));  

      $query = "INSERT INTO images (image) VALUES ('$file');";  

      if(mysqli_query($link, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  else {
	      echo '<script>alert("Image CAN NOT Insert into Database"). $link->error;</script>';
      }
 }  

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>insert image</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">My Images</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
                $query = "SELECT * FROM images ORDER BY image_id DESC";  
                $result = mysqli_query($link, $query);  
		
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td id = "rowId">  

                                   <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" id="imageId" /> 
 					
					<input type="button" value="Delete" onclick="deleteRow('.$row['image_id'].')" />		     
				 
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  
                </table>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  

function deleteRow(rowId) {
  //var row = btn.parentNode.parentNode;
 //var row = document.getElementById(rowId);
// Include config file

 console.log("row is " +rowId + "  " );

      $delete_query = "delete from images where image_id="+rowId;  

  //row.parentNode.removeChild(image_id.item(0));

return this;
}
 </script>  

