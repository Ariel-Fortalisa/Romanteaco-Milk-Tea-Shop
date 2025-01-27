<form action="./addtocart.php" method="post">
<div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">   
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
               <div class="fas fa-xmark fa-xs" style="color: #000;"></div>
            </span>
             </button>
             <div class="product-img" id="product-img">
                
             </div>
             <div class="product-name">
                <h6 class="title" id="product-name"></h6>
             </div>
             <div class="flavor_label" id="flavor-div" style="display: flex; padding-top: 2rem"></div>

            <div class="size_label" id="size-div" style="display: flex; padding-top: 2rem;">
            
            </div>
             <div class="quan_label">
                <h3 class="quan">Quantity</h3>
             <div class="quantity">

                <!--Order Name Value on Input-->
                <input type="hidden" id="categoryId" name="categoryId" value="">
                <input type="hidden" id="categoryName" name="categoryName" value="">
                <input type="hidden" id="sizeId" name="sizeId" value="">
                <input type="hidden" id="size" name="size" value="">
                <input type="hidden" id="price" name="price" value="">
                <input type="hidden" id="addonsName" name="addonsName" value="">
                <input type="hidden" id="addonsPrice" name="addonsPrice" value="">
                <input type="hidden" id="productId" name="product_id" value="">
                <input type="hidden" id="productName" name="product_name" value="">
                <input type="hidden" id="subtotal" name="subtotal" value="">
                <input type="hidden" id="image" name="image" value="">

                <button type="button" class="decrement" id="decrement" onclick="decrementQuantity()">
                  <div class="fas fa-minus fa-2xs" style="color: #ffffff; vertical-align: middle"></div>
                </button>
                <input type="number" class="product_quantity" id="quantity" name="quantity" value="1" min="1" style="text-align: center; background: #FFF;" readonly>
                <button type="button" class="increment" id="increment" onclick="incrementQuantity()">
                  <div class="fas fa-plus fa-2xs" style="color: #ffffff; vertical-align: middle"></div>
                </button>
             </div>
             </div>
             <div class="add-ons" id="add-ons-div" style="display: flex; padding-top: 2rem; padding-bottom: 2rem">
            </div>
            <p class="text-right"><i id="addonsSmall" class="text-muted"></i></p>
             <h3 class="total" style="padding-left: .5rem; margin-bottom: 0"><b>Price:<span id="subtotalText" style="float:right; padding-right: .5rem"></span></b></h3>
            </div>
            <div class="modal-footer">
               <button type="submit" class="add"><img src="images/add-to-cart.png" alt="" style="height: 25px; width: 40px; object-fit: contain;">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
   $('#product_modal').on('hide.bs.modal', function (e) {
      $("#quantity").val(1);
   })
   function onchangeSize(elem){
      var value = $(elem).val().split(',');

      var sizeId = value[0];
      var size = value[1];
      var price = parseFloat(value[2]);

      var addonsPrice = parseFloat($("#addonsPrice").val());

      $("#quantity").val(1);
      $("#price").val(price);
      $("#sizeId").val(sizeId);
      $("#size").val(size);
      $("#subtotal").val(price + addonsPrice);
      $("#subtotalText").html("₱ " + (price + addonsPrice).toFixed(2));
   }

   function onchangeAddons(elem){
      var value = $(elem).val().split(',');

      var addonsName = value[0];
      var addonsPrice = parseFloat(value[1]);
      
      var quantity = $("#quantity").val();
      var price = $("#price").val();

      var total = (addonsPrice * quantity) + (price * quantity);

      $("#addonsName").val("Add-ons: "+addonsName);
      $("#addonsPrice").val(addonsPrice);
      $("#subtotal").val(total);
      $("#subtotalText").html("₱ " + total.toFixed(2));
   }

   function incrementQuantity(){
      var quantity = parseInt($("#quantity").val())+1;
      var price = parseFloat($("#price").val());
      var subtotal = parseFloat($("#subtotal").val());

      var addonsPrice = parseFloat($("#addonsPrice").val());

      $("#quantity").val(quantity);

      var total = (quantity * price) + (quantity * addonsPrice);
      $("#subtotal").val(total);
      $("#subtotalText").html("₱ " + total.toFixed(2));
   }

   function decrementQuantity(){
      var quantity = parseInt($("#quantity").val())-1;
      if($("#quantity").val() != 1){
         var price = parseFloat($("#price").val());
         var subtotal = parseFloat($("#subtotal").val());

         var addonsPrice = parseFloat($("#addonsPrice").val());

         $("#quantity").val(quantity);

         var total = (quantity * price) + (quantity * addonsPrice);
         $("#subtotal").val(total);
         $("#subtotalText").html("₱ " + total.toFixed(2));
      }
      
   }
</script>