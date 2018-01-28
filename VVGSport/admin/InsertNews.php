<div id = "TableNews" class="container"  style="table-layout: fixed;">
  
          <table class="table ">
              <thead class="thead-inverse">

                  <tr>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Archived</th>
                      <th>Not Archived</th>
                      <th>Delete</th>
                  
                  </tr>
              </thead>
              <tbody>
              <?php
              
                $id = $_SESSION['user']['username'];
              $query= "SELECT * FROM `news` WHERE userID = '$id'";
              $result = mysqli_query($db,$query);
              
              while($row = mysqli_fetch_array($result)){

              ?>
                  <tr>
                      <td "width:100px; height: 100px;"><button class ="btn btn-primary btn-sm view_data" name ="view" id = "<?php echo $row['id']?>" ><i class="fas fa-eye fa-1x"></i></button></td>
                      <td "width:100px; height: 100px;"><button class="btn btn-primary btn-sm"><a id = "<?php $privremeniID = $row['title']; echo $privremeniID ?>"<?php echo "href='index.php?menu=2&amp;action=1'"?>>edit</a></button></td>
                      <td "width:100px; height: 100px;"><button class ="btn btn-warning btn-sm Archive" name ="Archive" id = "<?php echo $row['id']?>" ><i class="fas fa-envelope fa-1x"></i></button></td>
                      <td "width:100px; height: 100px;"><button class ="btn btn-success btn-sm NotArchive" name ="NotArchive" id = "<?php echo $row['id']?>" ><i class="fas fa-envelope-open fa-1x"></i></button></td>
                      <td "width:100px; height: 100px;"><button class ="btn btn-danger btn-sm delete" name ="delete" id = "<?php echo $row['id']?>" ><i class="far fa-trash-alt fa-1x"></i></button></td>
                      <td style="width:600px; height: 100px;"><?php echo substr($row['title'],0,90).".."?></td>
                      <td style="width:100px; height: 100px;"><img style="max-height:100%; max-width:100%" src =<?php echo "admin/images/".$row['image']?>></div>
                      <td><?php if ($row['isArchived'] == 0){ ?> Arhivirano <?php }else{ ?> Nije arhivirano <?php } ?></td>
                      
                  </tr>
                 
              <?php
              }
              ?>
              </tbody>
          </table>
          
          
      </div><div id="dataModal" class="modal fade">  
              <div class="modal-dialog">  
                   <div class="modal-content">  
                        <div class="modal-header">    
                             <h4 class="modal-title"><?php echo $row['title'];?></h4>  
                        </div>  
                        <div class="modal-body" id="vijesti">  
                        </div>
                   </div>  
              </div>  
         </div>  


<?php



 
?>