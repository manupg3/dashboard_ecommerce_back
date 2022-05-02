const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");
const icon = searchWrapper.querySelector(".icon");
let linkTag = searchWrapper.querySelector("a");
let webLink;


function select(element){
    let selectData = element.textContent;
    inputBox.value = selectData;
     console.log(element);
     datosDelProducto={
         nombre: selectData,
         id : element.getAttribute('idProd'),
         descripcion : element.getAttribute('descProd'),
         stock : element.getAttribute('stockProd'),
         imagen : element.getAttribute('imagenProd'),
         precio : element.getAttribute('precioProd')
            
     }
     console.log("datosDelProducto",datosDelProducto);
      
    icon.onclick = ()=>{
      cargarProductoPagina(datosDelProducto);
       // webLink = 'http://localhost/argon-dashboard-master/argon-dashboard-master/pages/paginaProducto.php';
       // linkTag.setAttribute("href", webLink);
       // linkTag.click();
    
    }

    searchWrapper.classList.remove("active");
}

function cargarProductoPagina(selectData){
console.log("SELECT DATA",selectData);

//     let data = selectData.replace(/['"]+/g, '');


    $.ajax({

        url:'../assets/crud/cargarPaginaProducto.php',
        type: 'POST',
        data:{nombreProd:selectData.nombre,descripcionProd:selectData.descripcion,imagenProd:selectData.imagen,stockProd:selectData.stock,precioProd:selectData.precio},
        success:function(response){

           // window.location.href='http://localhost/argon-dashboard-master/argon-dashboard-master/pages/paginaProducto.php';
          
            console.log("Respuesta",response);
       
       
        }

     });

}

inputBox.onkeyup = (e)=>{
    let search = e.target.value; //user enetered data

console.log("Data ingresada",search);

$.ajax({
    url:'https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/crud/buscador.php',
    type: 'POST',
    data:{search:search},

    success:function(response){
     let emptyArray = [];

     if(response){

     emptyArray = JSON.parse(response);


        emptyArray = emptyArray.map((emptyArray)=>{
            // passing return data inside li tag

            console.log("EMPTY ARRAY",emptyArray);
            let dat = JSON.stringify(emptyArray.titulo);
            let id = JSON.stringify(emptyArray.id);
            let descripcion = JSON.stringify(emptyArray.descripcion);
            let stock = JSON.stringify(emptyArray.stock);
            let imagen = JSON.stringify(emptyArray.imagen);
            let precio = JSON.stringify(emptyArray.precio);

            let NombreSinComillas = dat.replace(/['"]+/g, ''); 
            let descripcionSincomillas = descripcion.replace(/['"]+/g, '');
            let imagenSincomillas = imagen.replace(/['"]+/g, '');

            console.log("EL PRECIO ES ",imagen);
              
            return emptyArray = `<li class="selectProd" onclick="select(this)" imagenProd="${imagenSincomillas}" idProd="${id}" descProd="${descripcionSincomillas}" stockProd="${stock}" precioProd="${precio}">${NombreSinComillas}</li>`;

        });
        searchWrapper.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
        
        }
    }else{
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
       
  console.log("Response", emptyArray);
  
  }

 });

 function showSuggestions(list){
    let listData;
    if(!list.length){
        userValue = inputBox.value;
        listData = `<li>${userValue}</li>`;
    }else{
      listData = list.join('');
    }
    suggBox.innerHTML = listData;

}

}
