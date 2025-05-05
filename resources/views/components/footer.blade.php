<style>
    .divalto{
        margin-top:5%;
        height: 255px;
    }
    .marginizquierda{
        margin-left:5%;
    }
    .marginderecha{
      margin-right:2%
    }
    .letranegra{
        text-color
    }
    .tamañoimg{
        height:25%;
    }
    ul {
  list-style-type: disc; /* Puntos antes de los elementos */
  padding-left: 20px; /* Un poco de espacio para el marcador */
}
li {
  color: black; /* Color por defecto */
  transition: color 0.3s ease; /* Transición suave para el cambio de color */
  margin-top: 3%;  /* Márgen en la parte superior */
  margin-bottom: 1%;  /* Márgen en la parte inferior */
}
li:hover {
  color: gray; /* Color cuando el mouse pasa sobre el elemento */
}
.divbordes{
  border: 1px solid black;
}
.div1{
  max-width:454px;
}
.div2{
  min-width: 210px;
}
.div3{
  max-width:230px;
}
</style>
<footer  class=" text-black">
  <div style="background-image: url('images/banners/fondoFooter.png');" class=" h-auto w-full mx-auto flex item-center place-content-between flex-wrap gap-8 divbordes">
  <!-- Columna 1 -->
  <div class="divalto marginizquierda  div1">
    <div class="ml-4 flex items-center ">    
        <h3 style="margin-right:12px;" class="text-black text-xl font-bold mb-4 mt-4 mr-10">Carzone</h3>
        <img class="tamañoimg ml-6" src="images/logos/carzone-logo.png"alt="logo Carzone" height="103px" width="103px">
    </div>
    <div class="mt-6">
      <p class="font-bold"> Tu plataforma confiable para encontrar vehículos de calidad.</p>
    </div>
  </div>
  <!-- Columna 2 -->
  <div class="divalto  div2 xl:marginizquierda">
    <h3 class="text-xl font-bold mb-4">Enlaces Útiles</h3>
    <ul class="space-y-2 text-base text-black list-disc">
      <li><a href="#" class="hover:text-white my-4">Inicio</a></li>
      <li><a href="#" class="hover:text-white">Catálogo de Vehiculos</a></li>
      <li><a href="#" class="hover:text-white">Testimonios</a></li>
      <li><a href="#" class="hover:text-white">Contáctanos</a></li>
      <li><a href="#" class="hover:text-white">Preguntas Frecuentes</a></li>
    </ul>
  </div>
  <!-- Columna 3 -->
  <div class="divalto  div3 xl: marginizquierda">
    <h2 class="text-xl font-bold mb-4">Conéctate con nosotros</h2>
    <p class="font-bold"> Síguenos en nuestras redes sociales para conocer nuestras últimas ofertas y novedades.</p>
    <div class="flex my-4 place-content-between"> 
      <img class="marginderecha" src="{{asset('images/logos/iconoFB.png')}}" alt="logo Facebook">
      <img class="marginderecha" src="images/logos/iconowsp.png"alt="logo Whatsaap">
      <img class="marginderecha" src="images/logos/iconoig.png" alt="logo Instagram"> 
    </div>
  </div>
  <!-- Columna 4 -->
  <div class="divalto marginizquierda ">
    <h2 class="text-xl font-bold mb-4">Síguenos</h2>
    <ul class="space-y-2 text-sm text-gray-400">
      <li><a href="#" class="font-bold">Correo: soporte@carzone.com</a></li>
      <li><a href="#" class="font-bold">Teléfono: +56 9 123X XXXX</a></li>
      <li><a href="#" class="font-bold">Horario: Lunes a Viernes, 9:00 a 18:00</a></li>
    </ul>
  </div>
</div>
  </footer>
  
