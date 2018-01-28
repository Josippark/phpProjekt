<div class=" my-sm-5" style="margin-left:20px;">
          <table class="table " style="table-layout: fixed;">
              <h1>Latest News</h1>
              <tbody>
              <?php
              

              $query= "SELECT * FROM `news` ";
              $result = mysqli_query($db,$query);
              
              while($row = mysqli_fetch_array($result)){
                if ($row["isArchived"]== 1){



              ?>
                  <tr>
                      <td style="width:500px; height: 200px;"><img style="max-height:100%; max-width:100%" src =<?php echo "admin/images/".$row['image']?>></div>
                      <td style="width:600px; height: 100px;"><?php echo substr($row['title'],0,90).".."?></td>
                      
                      <td style="width:300px; height: 100px;"><button type="button" id="<?php echo $row['id'];?>"  class="btn btn-primary view_data" >View more</button></td>                      
                      
                  </tr>
                 
              <?php
            }
              }
              ?>
              </tbody>
          </table>
          <div id="dataModal" class="modal fade">  
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
          
          
      </div>