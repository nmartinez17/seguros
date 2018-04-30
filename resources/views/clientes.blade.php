<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('material-kit/BS3/assets/css/material-kit.css')}}">
  <link rel="stylesheet" href="{{ asset('material-kit/BS3/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('material-kit/BS3/assets/css/demo.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


  <style>
    /*th, td {
        text-align: left;
        padding: 16px;
    }*/

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

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
  </style>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <h2>Clientes</h2>

  <div class="dropup">
    <button class="dropbtn">Menu</button><br>
    <div class="dropup-content">
      <a href="{{url('/')}}">Deudas</a>
      <a href="#">Polizas</a>
    </div>
  </div>

  <br><br> 

  <div class="container" style="width: 100%;">
    <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    <a href="{{url('/agregar')}}">  
      <button class="btn btn-success" style="float: right;">Agregar</button>
    </a>
    <br><br><br>
    
    <table class="table">
      <thead>
        <tr style="background-color: black; color: white;">
          <th class="text-center">Id</th>
          <th class="text-center">Codigo</th>
          <th>Nombre</th>
          <th>Recibo</th>
          <th>Poliza</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Forma de Pago</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody id="myTable">
        @foreach($clientes as $cli)
        <tr>
          <td>{{$cli->id}}</td>
          <td>{{$cli->codigo}}</td>
          <td>{{$cli->nombre}}</td>
          <td>{{$cli->recibo}}</td>
          <td>{{$cli->poliza}}</td>
          <td>{{$cli->direccion}}</td>
          <td>{{$cli->telefono}}</td>
          <td>{{$cli->email}}</td>
          <td>{{$cli->fpago}}</td>
          <td class="td-actions text-right">
            <a href="{{url('/editar-cliente?idcli='.$cli->id)}}">
              <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs">
                Editar
              </button>
            </a>  
            <button id="delete" onclick="eliminar('{{$cli->id}}')" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
              Eliminar
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="//code.jquery.com/jquery-latest.js"></script>
  <script>
    function eliminar(id){
      var answer = confirm("Deseas eliminar este registro?");
      if (answer){
        $.post("/clientes/delete",{clave:id, _token: '{{csrf_token()}}'}, function(theResponse){
          alert(theResponse);
          location.reload();
        });
      }
      else{
        
      }
      
    };
  </script>

  <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</body>
</html>