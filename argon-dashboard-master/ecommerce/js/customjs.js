var cartItems = JSON.parse(localStorage.getItem('sidebarCart'));

console.log("CART",cartItems);

const CART = {
    items:[],
}


 function incrementQty(precio)
 {
    let numberQty = Number($('#sst').val());
    let Qty = numberQty + 1;
    let precioQty = precio;
    
    console.log("QTY", Qty);
    console.log("PrecioQty", precioQty);
     let precioFinal = Qty * precioQty;  
      
      let nombrePrecioFinalEnStorage = "PrecioFinal"+$('#titulo-prod').text();
      let nombreQTY = "QTY"+$('#titulo-prod').text();

     localStorage.setItem (nombrePrecioFinalEnStorage, precioFinal);
     localStorage.setItem (nombreQTY, Qty);

   $('#card-total').removeClass( "hide-card" ).addClass( "show-card" ) 
   $('#total-price').html("$"+precioFinal);
     

  }
  let nombreQTY = "QTY"+$('#titulo-prod').text();
  let nombrePrecioFinalEnStorage = "PrecioFinal"+$('#titulo-prod').text();

  let precioFinalStorage = localStorage.getItem(nombrePrecioFinalEnStorage);
  let QtyStorage = localStorage.getItem(nombreQTY);
  
  console.log("Precio En Storage",precioFinalStorage);
  if(precioFinalStorage == null){
  $('#total-price').html($('#precio-prod').text());
   }
   else{
  
    $('#total-price').html("$"+precioFinalStorage);
    $('#sst').val(QtyStorage);

   } 
  function decrementQty(precio)
 {
    let numberQty = Number($('#sst').val());
    let Qty = numberQty - 1;
    let precioQty = precio;
    
    console.log("QTY", Qty);
    console.log("PrecioQty", precioQty);
    if(Qty > 0)
    {   
        
        let nombrePrecioFinalEnStorage = "PrecioFinal"+$('#titulo-prod').text();
        let nombreQTY = "QTY"+$('#titulo-prod').text();
        
        let precioFinal = Qty * precioQty;
        
        localStorage.setItem (nombrePrecioFinalEnStorage, precioFinal);
        localStorage.setItem (nombreQTY, Qty);
   

      $('#total-price').html("$"+precioFinal);
    }   

  }

  function addToCart(){
let product;
let precioEnStorage = localStorage.getItem(nombrePrecioFinalEnStorage);
let IDitem = $('#id-prod').val();

console.log("PRECIO FINAL",precioEnStorage);   

if(precioEnStorage == null)
{
  
 product = {
  idItem: IDitem, 
  tituloItemCart: $('#titulo-prod').text(),
  precioItemCart: $('#precio-prod').text(),
  imagenItem:$('#img-prod').attr('src'),
  
} 
product.precioItemCart = Number(product.precioItemCart.slice(1));
console.log("IMG PRODUCTO",imagenItem); 
 }
else {
  
 product = {
  idItem: IDitem, 
  tituloItemCart: $('#titulo-prod').text(),
  precioItemCart: precioEnStorage,
  imagenItem:$('.img-prod').attr('src'),
  
}
console.log("IMG PRODUCTO", product.imagenItem); 
} 

let itemsEnStorage = JSON.parse(localStorage.getItem('sidebarCart'));

   


    if(itemsEnStorage != null){
  
    let repedito = false;
    let itemsEnStorage = JSON.parse(localStorage.getItem('sidebarCart'));
    console.log("ITEMS TRAIDOS DE STORAGE",itemsEnStorage);

    itemsEnStorage.forEach(element => {
      if (element.tituloItemCart === product.tituloItemCart) {
      repedito = true; 
     }
    });

    if(repedito){ 
    const newArr = itemsEnStorage.map(obj => {
      if (obj.tituloItemCart === product.tituloItemCart) {
          obj.precioItemCart = Number(obj.precioItemCart) + Number(product.precioItemCart);
        }
    
      return obj;
    });
    asyncProductItems(newArr);

    console.log("NEW ARRAY", newArr);

  }
  else{

    itemsEnStorage.push(product);
    console.log("CART ITEMS AGREGADO",itemsEnStorage);
   asyncProductItems(itemsEnStorage);
  }

  
  }
 else { 

  CART.items.push(product); 
  console.log("CART ITEMS AGREGADO",CART.items);
  asyncProductItems(CART.items);

}


  }
  function asyncProductItems(items){

  localStorage.setItem("sidebarCart", JSON.stringify(items));

    console.log("ITEMS ASYNC", items);
  }