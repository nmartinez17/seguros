<!DOCTYPE html>
<html>
<head>
  <style>
    .dropbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }

    .dropup {
        position: relative;
        display: inline-block;
    }

    .dropup-content {
        display: none;
        position: relative;
        background-color: #f1f1f1;
        min-width: 160px;
        bottom:50px;
        z-index: 1;
    }

    .dropup-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropup-content a:hover {background-color: #ccc}

    .dropup:hover .dropup-content {
        display: block;
    }

    .dropup:hover .dropbtn {
        background-color: #3e8e41;
    }

    * {
        box-sizing: border-box;
    }

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    button:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 10%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
  </style>

  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Cargar Cliente</title>

</head>
<body>

  <h2>Formulario de Clientes</h2>
  <div class="dropup">
    <button class="dropbtn">Menu</button><br>
    <div class="dropup-content">
      <a href="{{url('/')}}">Deudas</a>
      <a href="{{url('/clientes')}}">Clientes</a>
    </div>
  </div>

  <br><br>
  <form id="fo3" action="/editar-cliente/update" method="post">
    @foreach($clientes as $cli)
    <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="id">Id</label>
        </div>
        <div class="col-75">
          <input type="text" value="{{$cli->id}}" id="id" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nombre">Nombre</label>
        </div>
        <div class="col-75">
          <input type="text" value="{{$cli->nombre}}" id="nombre" placeholder="Nombre..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="recibo">Recibo</label>
        </div>
        <div class="col-75">
          <input type="text" value="{{$cli->recibo}}" id="recibo" placeholder="Recibo..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="poliza">Poliza</label>
        </div>
        <div class="col-75">
          <input type="text" value="{{$cli->poliza}}" id="poliza" placeholder="Poliza..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="email">Email</label>
        </div>
        <div class="col-75">
          <input type="text" value="{{$cli->email}}" id="email" placeholder="Email..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="telefono">Telefono</label>
        </div>
        <div class="col-75">
          <input type="text" value="{{$cli->telefono}}" id="telefono" placeholder="Telefono..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="direccion">Direccion</label>
        </div>
        <div class="col-75">
          <input type="text" value="{{$cli->direccion}}" id="direccion" placeholder="Direccion..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fpago">Forma de Pago</label>
        </div>
        <div class="col-75">
          <select id="fpago">
            <?php
              if($cli->fpago=="efectivo"){
            ?>
                <option selected value="efectivo">Efectivo</option>
                <option value="debito">Debito</option>
                <option value="credito">Credito</option>
            <?php  
              }
              elseif ($cli->fpago=="debito") {
            ?>
                <option value="efectivo">Efectivo</option>
                <option selected value="debito">Debito</option>
                <option value="credito">Credito</option>
            <?php
              }
              else{
            ?>
                <option value="efectivo">Efectivo</option>
                <option value="debito">Debito</option>
                <option selected value="credito">Credito</option>
            <?php
              }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="detalle">Detalle</label>
        </div>
        <div class="col-75">
          <textarea id="detalle" placeholder="Detalle.." style="height:200px"></textarea>
        </div>
      </div>
      <div class="row">
        <button type="submit">Cargar</button>
      </div>
    </div>
    @endforeach
  </form>
  

  <script src="//code.jquery.com/jquery-latest.js"></script>
  <script>
    $(document).ready(function() {
       // Interceptamos el evento submit
        $("#fo3").submit(function() {

          var clave = $('#id').val();
          var nom = $('#nombre').val();
          var reci = $('#recibo').val();
          var poli = $('#poliza').val();
          var correo = $('#email').val();
          var tel = $('#telefono').val();
          var dir = $('#direccion').val();
          var fpa = $('#fpago').val();

          var datos = clave+'|'+nom+'|'+reci+'|'+poli+'|'+correo+'|'+tel+'|'+dir+'|'+fpa;
          alert(datos);
            // Enviamos el formulario usando AJAX
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: {id:clave, nombre:nom, recibo:reci, poliza:poli, email:correo, telefono:tel, direccion:dir, fpago:fpa, _token: '{{csrf_token()}}'},
              // Mostramos un mensaje con la respuesta de PHP
              success: function(data) {
                //document.getElementById('id01').style.display='block';
                alert(data);
                location.reload();  
              },
              error: function(){
                alert( "Error con el servidor" );
                location.reload();
              }
          })       
          return false;
        }); 

    });
  </script>

</body>
</html>