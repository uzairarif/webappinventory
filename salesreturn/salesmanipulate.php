<script>  
 $(document).ready(function(){  
      var Shade;
      var rate;
      var i=1; 
      var count = 1; 
      
      $('#add').click(function(){  
          
          var exist = true;
          try {
            var row = document.getElementById("row"+i);
            var prdid = row.cells[0].innerHTML;
            
          } catch (error) {
            exist = false;
          }
          //var prdid = $('#ProductCode'+i+'').val();
          if (prdid != "" || exist == false){
            i = i + 1;
            count++;
           var newrow = $('<tr id="row'+i+'"><td class="pt-3-half" name="ProductCode" id="ProductCode'+i+'"></td><td class="pt-3-half"><select name="Brand" id="Brand'+i+'"><option value="">Brand</option><?php for ($i=0; $i < sizeof($branddatas) ; $i++) {echo '<option>'.$branddatas[$i].'</option>';} ?></select></td><td class="pt-3-half"><select name="Type" id="Type'+i+'"><option value="">Type</option></select></td><td class="pt-3-half"><select name="Shade" id="Shade'+i+'"><option value="Shade">Shade</option></select></td><td class="pt-3-half"><select name="Size" id="Size'+i+'"><option value="">Size</option><?php for ($i=0; $i < sizeof($sizedatas) ; $i++) {echo '<option>'.$sizedatas[$i].'</option>';} ?></select></td><td class="pt-3-half" contenteditable="true" name="Qty" id="Qty'+i+'"></td><td class="pt-3-half" name="Rate" id="Rate'+i+'"></td><td class="pt-3-half" name="Amount" id="Amount'+i+'"></td><td><span class="table-remove"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-rounded btn-sm my-0 glyphicon glyphicon-trash"></button></span></td></tr>').on('click', function(event) {
      
      $('#Type'+i+'').on('change',function(){
        var id = $(this).attr("id"); 
        var str = id;
        str = str.substring(4,str.length);
        var e = document.getElementById("Type"+str);
        var js_type = e.options[e.selectedIndex].text;
        var b = document.getElementById("Brand"+str);
        var js_brand = b.options[b.selectedIndex].text;
          
        //var typeselected = $('#Type'+str+'').val();
        if(js_type != "Type"){
          //var js_type = $('#Type'+str+'').val(); 
          $.ajax({
            type:'POST',
            url:'fetchData.php',
            data:{
              js_brand: js_brand,
              js_type: js_type,
            }
            ,
            success:function(html){
              $('#Shade'+str+'').html(html);
                  
                }
            }); 
        }
      });


      $('#Brand'+i+'').on('change', function(){
          var id = $(this).attr("id"); 
          var str = id;
          str = str.substring(5,str.length);
          var e = document.getElementById("Brand"+str);
          var brandselected = e.options[e.selectedIndex].text;
          if(brandselected != "Brand"){
          $.ajax({
            type:'POST',
            url:'fetchData4.php',
            data:'brand='+brandselected,
            success:function(html){
              $('#Type'+str+'').html(html);
                
                }
            }); 
        }
      });

      $('#Size'+i+'').on('change',function(){
        var id = $(this).attr("id"); 
        var str = id;
        str = str.substring(4,str.length);
        var e = document.getElementById("Type"+str);
        var js_type = e.options[e.selectedIndex].text;
        var b = document.getElementById("Brand"+str);
        var js_brand = b.options[b.selectedIndex].text;
        var s = document.getElementById("Shade"+str);
        var js_shade = s.options[s.selectedIndex].text;
        var sizeselected = $('#Size'+str+'').val();
        if(sizeselected != "Size"){
          $.ajax({
            type:'POST',
            url:'fetchData2.php',
            data:{
              js_size: sizeselected,
              js_brand: js_brand,
              js_type: js_type,
              js_shade: js_shade
            }
            ,
            
            success:function(html){
              $('#Rate'+str+'').text(html);
                   rate = html;
                }
            }); 
        }
      });
      $('#Qty'+i+'').on('input',function(event) {
        var id = $(this).attr("id"); 
        var str = id;
        str = str.substring(3,str.length);
        var row = document.getElementById("row"+str);
        var qty = row.cells[5].innerHTML;
        var rate = row.cells[6].innerHTML;
        
        var nqty=Number(qty);
        var nrate= Number(rate);
        row.cells[7].innerHTML = nqty*nrate;
        var e = document.getElementById("Type"+str);
        var js_type = e.options[e.selectedIndex].text;
        var b = document.getElementById("Brand"+str);
        var js_brand = b.options[b.selectedIndex].text;
        var s = document.getElementById("Shade"+str);
        var js_shade = s.options[s.selectedIndex].text;
        var sz = document.getElementById("Size"+str);
        var js_size = sz.options[sz.selectedIndex].text;
        
        $.ajax({
            type:'POST',
            url:'fetchData3.php',
            data:{
              js_size: js_size,
              js_brand: js_brand,
              js_type: js_type,
              js_shade: js_shade
            }
            ,
            
            success:function(html){
              $('#ProductCode'+str+'').text(html);
                   
                }
            }); 
      });
                  
           });
           $("#dynamic_field").append(newrow);
          }
          else {
            alert('Please fill the previous row');
          }
      });  
      
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");
           count--; 
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){  
            var dict = {};
            var j = 1;
            var b = 0;
            for (var k = 1; k <= i; k++) {
              try {
                         
                var tr = document.getElementById("row"+k);
                var productid = tr.cells[0].innerHTML;
                var e = document.getElementById("Type"+k);
                var type = e.options[e.selectedIndex].text;
                var b = document.getElementById("Brand"+k);
                var brand = b.options[b.selectedIndex].text;
                var s = document.getElementById("Shade"+k);
                var shade = s.options[s.selectedIndex].text;
                var sz = document.getElementById("Size"+k);
                var size = sz.options[sz.selectedIndex].text;
                

                var qty = tr.cells[5].innerHTML;
                var rate = tr.cells[6].innerHTML;
                var amount = tr.cells[7].innerHTML;
                dict['productid'+j] = productid;
                dict['brand'+j] = brand;
                dict['type'+j] = type;
                dict['shade'+j] = shade;
                dict['size'+j] = size;
                dict['qty'+j] = qty;
                dict['rate'+j] = rate;
                dict['amount'+j] = amount;

                b++;
                j++;
              }
              catch (err) {
              }
    
                
            }

            dict["CID"] = "<?php echo $customerrow[0]; ?>";
            dict["items"] = j-1;
            

            
           $.ajax({  
                url:"insertsalesreturn.php",  
                method:"POST",  
                data:{
                 dictionary:dict
                }, 

                success:function(data)  
                {  
                     window.location.href = "salesreturn_list.php";
                }
               
           });
           
      });  
/*      $('#Type'+i+'').on('change', function(){
          var id = $(this).attr("id"); 
          var str = id;
          str = str.substring(4,str.length);
          var typeselected = $('#Type'+str+'').val();
          if(typeselected != "Type"){
          $.ajax({
            type:'POST',
            url:'fetchData.php',
            data:'type='+typeselected,
            success:function(html){
              $('#Shade'+str+'').html(html);
                
                }
            }); 
        }
      });*/

      $('#Type'+i+'').on('change',function(){
        var id = $(this).attr("id"); 
        var str = id;
        str = str.substring(4,str.length);
        var e = document.getElementById("Type"+str);
        var js_type = e.options[e.selectedIndex].text;
        var b = document.getElementById("Brand"+str);
        var js_brand = b.options[b.selectedIndex].text;
          
        //var typeselected = $('#Type'+str+'').val();
        if(js_type != "Type"){
          //var js_type = $('#Type'+str+'').val(); 
          $.ajax({
            type:'POST',
            url:'fetchData.php',
            data:{
              js_brand: js_brand,
              js_type: js_type,
            }
            ,
            success:function(html){
              $('#Shade'+str+'').html(html);
                  
                }
            }); 
        }
      });


      $('#Brand'+i+'').on('change', function(){
          var id = $(this).attr("id"); 
          var str = id;
          str = str.substring(5,str.length);
          var e = document.getElementById("Brand"+str);
          var brandselected = e.options[e.selectedIndex].text;
          if(brandselected != "Brand"){
          $.ajax({
            type:'POST',
            url:'fetchData4.php',
            data:'brand='+brandselected,
            success:function(html){
              $('#Type'+str+'').html(html);
                
                }
            }); 
        }
      });

      $('#Size'+i+'').on('change',function(){
        var id = $(this).attr("id"); 
        var str = id;
        str = str.substring(4,str.length);
        var e = document.getElementById("Type"+str);
        var js_type = e.options[e.selectedIndex].text;
        var b = document.getElementById("Brand"+str);
        var js_brand = b.options[b.selectedIndex].text;
        var s = document.getElementById("Shade"+str);
        var js_shade = s.options[s.selectedIndex].text;
       var sizeselected = $('#Size'+str+'').val();
        if(sizeselected != "Size"){
          $.ajax({
            type:'POST',
            url:'fetchData2.php',
            data:{
              js_size: sizeselected,
              js_brand: js_brand,
              js_type: js_type,
              js_shade: js_shade
            }
            ,
            
            success:function(html){
              $('#Rate'+str+'').text(html);
                   rate = html;
                }
            }); 
        }
      });
      $('#Qty'+i+'').on('input',function(event) {
        var id = $(this).attr("id"); 
        var str = id;
        str = str.substring(3,str.length);
        var row = document.getElementById("row"+str);
        var qty = row.cells[5].innerHTML;
        var rate = row.cells[6].innerHTML;
        
        var nqty=Number(qty);
        var nrate= Number(rate);
        row.cells[7].innerHTML = nqty*nrate;
        var e = document.getElementById("Type"+str);
        var js_type = e.options[e.selectedIndex].text;
        var b = document.getElementById("Brand"+str);
        var js_brand = b.options[b.selectedIndex].text;
        var s = document.getElementById("Shade"+str);
        var js_shade = s.options[s.selectedIndex].text;
        var sz = document.getElementById("Size"+str);
        var js_size = sz.options[sz.selectedIndex].text;
        
        $.ajax({
            type:'POST',
            url:'fetchData3.php',
            data:{
              js_size: js_size,
              js_brand: js_brand,
              js_type: js_type,
              js_shade: js_shade
            }
            ,
            
            success:function(html){
              $('#ProductCode'+str+'').text(html);
                   
                }
            }); 
      });
 }); 
 </script>