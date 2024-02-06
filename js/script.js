// const inputBuscador = document.querySelector('#buscar');

eventListeners();

function eventListeners() {
     // inputBuscador.addEventListener('input', buscarContactos);
     numeroContactos();
}

function buscarContactos(e) {
     const expresion = new RegExp(e.target.value, "i");
     const columnas = document.querySelectorAll('.col');
     console.log(columnas)
     columnas.forEach(columna => {
         columna.style.display = 'none';
 
         const nombre = columna.querySelector('h4').textContent.replace(/\s/g, " ");
         const precio = columna.querySelector('.card-title').textContent.replace(/\s/g, " ");
         const stock = columna.querySelector('ul li:first-child').textContent.replace(/\s/g, " ");
         const descripcion = columna.querySelector('ul li:last-child').textContent.replace(/\s/g, " ");
 
         const texto = `${nombre} ${precio} ${stock} ${descripcion}`;
 
         if (texto.search(expresion) != -1) {
             columna.style.display = 'block';
         }
         numeroContactos();
     });
 }
 

function numeroContactos() {
     const totalContactos   = document.querySelectorAll('.col'),
           contenedorNumero = document.querySelector('.total-productos span');

     let total = 0;

     totalContactos.forEach(contacto => {
          if(contacto.style.display === '' || contacto.style.display === 'block'){
               total++;
          }
     });

     contenedorNumero.textContent = total;
}