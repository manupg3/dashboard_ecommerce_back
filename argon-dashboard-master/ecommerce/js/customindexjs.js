
const CART = {
    items:[],
}
const ITEMS ={
    repetidos:[],
}
setInterval(() => {
      quantityCart(); 
}, 1500);
function quantityCart(){
	var cartItems = JSON.parse(localStorage.getItem('sidebarCart'));
    if(cartItems != null){
		$('.cart-quantity').text(cartItems.length);
		console.log("LENGTH",cartItems.length);
	}
  
}

function removeItem(id){

 let itemsEnStorage = JSON.parse(localStorage.getItem('sidebarCart'));
 let textoAlerta = "Producto eliminado";
 let textoAlertaVacio = "Carrito vacio";
 const newArray = itemsEnStorage.filter((item) => item.idItem !== id);
   if(newArray.length == 0){
      $('#footer-cart').hide();

      MostrarAlerta(textoAlertaVacio);
    }

 localStorage.setItem("sidebarCart", JSON.stringify(newArray));
 mostrarYcargarCarrito();
 quantityCart();
 MostrarAlerta(textoAlerta);

}

function mostrarYcargarCarrito(){
   
	const cart_body = document.getElementById('cart-body');
    var subTotal=0;
	var cartItems = JSON.parse(localStorage.getItem('sidebarCart'));
   
   
   cart_body.innerHTML = '';

	 cartItems.forEach(item => {

     	const itemsEnCarrito = JSON.parse(localStorage.getItem('ItemsEnCarrito')); 
    
	console.log(itemsEnCarrito);

	 console.log("ITEM EN CARRITO", item);
	 const itemF = document.createElement('div');
	 itemF.className = "cart-item";
     const divImg = document.createElement('div');
	 divImg.className = "img-cart";
	 const imgF = document.createElement('img');
	 imgF.src = "img/category/s-p1.jpg";
	 const textosF = document.createElement('div');
	 textosF.className = "textos-cart";
	 const buttonsActions = document.createElement('div');
	 buttonsActions.className = "buttons-actions-cart";
	 
	 const buttonDelete = document.createElement('button');
	 buttonDelete.className = "button-delete-cart";
	 buttonDelete.addEventListener( 'click', function(){

		removeItem(item.idItem); 

	});	
	 const h4F = document.createElement('h4');
	 h4F.className = "title-prod-side-cart";
	 h4F.textContent = item.tituloItemCart;
	 const iconClose = document.createElement('i');
	 iconClose.className = "fa-solid fa-xmark";
	 
	 const h5F = document.createElement('h5');
	 h5F.className = "price-prod-side-cart";
	 h5F.textContent = item.precioItemCart;

     cart_body.appendChild(itemF);
	 itemF.appendChild(divImg);
	 divImg.appendChild(imgF);
	 itemF.appendChild(textosF);
	 textosF.appendChild(h4F);
	 textosF.appendChild(h5F);
	 itemF.appendChild(buttonsActions);
	 buttonsActions.appendChild(buttonDelete);
     buttonDelete.appendChild(iconClose);

	 localStorage.setItem('ItemsEnCarrito',JSON.stringify(item));
      
	});
    if(cartItems.length > 0){
    
        $('#footer-cart').show();
        $('#msg-empty').hide();
      
    }
    else{
        const msgCartEmpty = document.createElement('h4');
        msgCartEmpty.setAttribute("id", "msg-empty"); 
        msgCartEmpty.className = "msg-empty";
        msgCartEmpty.textContent = "El carrito esta vacio";
        cart_body.appendChild(msgCartEmpty);

        $('#footer-cart').hide();
        $('#msg-empty').show();
        
    }
    for (let index = 0; index < cartItems.length; index++) {
        subTotal += Number(cartItems[index].precioItemCart);
        console.log("SUBTOTAL",subTotal);
        
    }
     console.log("SUBTOTAL",subTotal);
      if(subTotal > 0 ){
            $('#subtotal-cart').text("Subtotal: "+"$"+subTotal.toString());
        }
      
    }
    


function addToCartIndex(producto){
  
    let itemsEnStorage = JSON.parse(localStorage.getItem('sidebarCart'));
    const arrProd = producto.split(',');  
    
   let buttonADD = document.getElementById(arrProd[0]);
   console.log("Button ADD",buttonADD);


    
   let product = {
        idItem: arrProd[0], 
        tituloItemCart: arrProd[1],
        precioItemCart: arrProd[2], 
      }



    if(itemsEnStorage != null){
       let repedito = false;
        itemsEnStorage.forEach(element => {
            if (element.tituloItemCart === product.tituloItemCart) {
            repedito = true; 
           }
          });
          if(repedito){ 
        
        const newArr = itemsEnStorage.map(obj => {
            console.log("OBJ TITULO",obj.tituloItemCart);
            console.log("ARRPROD TITULO",arrProd[1]);
            if (obj.tituloItemCart === arrProd[1]) {
                obj.precioItemCart = Number(obj.precioItemCart) + Number(arrProd[2]);
               console.log("PRECIO REPETIDO",obj.precioItemCart);  
            }
          
            return obj;
          });
          localStorage.setItem("sidebarCart", JSON.stringify(newArr));
          console.log("newArr", newArr);
          let textoAlerta = "Producto añadido";
          MostrarAlerta(textoAlerta);     
        }
        else{
            
            itemsEnStorage.push(product);
            console.log("CART ITEMS AGREGADO",itemsEnStorage);
            localStorage.setItem("sidebarCart", JSON.stringify(itemsEnStorage));
            let textoAlerta = "Producto añadido";
            MostrarAlerta(textoAlerta);
       
        }
    }
    else{

     CART.items.push(product);
     console.log("CART ITEMS AGREGADO",CART.items);
     localStorage.setItem("sidebarCart", JSON.stringify(CART.items));
     let textoAlerta = "Producto añadido";
     MostrarAlerta(textoAlerta);

    }

    console.log("PRODUCTO TRAIDO", arrProd);

}

function MostrarAlerta(textoAlerta){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: textoAlerta
      })
  }




    
