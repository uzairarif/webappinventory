<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Order Details</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center" id="dynamic_field">
        <tr>
          <th class="text-center col-sm-1">Product ID</th>
          <th class="text-center">Brand</th>
          <th class="text-center">Type</th>
          <th class="text-center">Shade</th>
          <th class="text-center ">Size</th>
          <th class="text-center col-sm-1">Qty</th>
          <th class="text-center col-sm-1">Rate</th>
          <th class="text-center col-sm-1">Amt</th>
          <th class="text-center col-sm-1">Remove</th>
        </tr>
        <tr id="row1">
          <td class="pt-3-half" name="ProductCode" id="ProductCode1"></td>
          <td class="pt-3-half">
            <select name="Brand" id="Brand1"> 
              <option value="">Brand</option>
              <?php  

              for ($i=0; $i < sizeof($branddatas) ; $i++) { 
                 echo '<option>'.$branddatas[$i].'</option>';
               } 

               
              ?>
            </select>
          </td>
          <td class="pt-3-half">
            <select name="Type" id="Type1"> 
            <option value="">Type</option>
            <?php  
                
              for ($i=0; $i < sizeof($typedatas) ; $i++) { 
                 echo '<option>'.$typedatas[$i].'</option>';
               } 

              ?>
            </select>
          </td>
          <td class="pt-3-half">
            <select name="Shade" id="Shade1"> 
            <option value="Shade">Shade</option>
            </select>
          </td>
          <td class="pt-3-half">
            <select name="Size" id="Size1"> 
            <option value="">Size</option>
            <?php  
              for ($i=0; $i < sizeof($sizedatas) ; $i++) { 
                 echo '<option>'.$sizedatas[$i].'</option>';
               } 

              ?>
            </select>
          </td>
          <td class="pt-3-half" contenteditable="true" name="Qty" id="Qty1">
            
          </td>
          <td class="pt-3-half" name="Rate" id="Rate1"></td>
          <td class="pt-3-half" name="Amount" id="Amount1"></td>
          <td>
            <span class="table-remove"><button type="button" name="remove" id=1 class="btn btn-danger btn_remove btn-rounded btn-sm my-0
              glyphicon glyphicon-trash"></button></span>
          </td>
        </tr>
        
        
      </table>
      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />    
    </div>
  </div>
</div>
