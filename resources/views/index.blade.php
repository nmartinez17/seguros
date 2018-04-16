<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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

  <h2>Deudas Total</h2>

  <div class="dropup">
    <button class="dropbtn">Dropup</button>
    <div class="dropup-content">
      <a href="#">Clientes</a>
      <a href="#">Polizas</a>
    </div>
  </div>
  <br> 
  <div class="container" style="width: 100%;">
    <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    <br>

    <table class="table table-bordered table-striped" style="width: 100%;">
      <thead>
        <tr style="position: relative; background-color: black; color: white;">
          <th>Nombre</th>
          <th>Codigo</th>
          <th>Ramo</th>
          <th>Referencia</th>
          <th>Recibo</th>
          <th>Cuota</th>
          <th>Fecha Vencimiento</th>
          <th>Deuda Total</th>
          <th>Forma de Pago</th>
        </tr>
      </thead>
      <thead id="myTable">
      @foreach($cliente as $cli)
        <tr style="position: relative;">
          <td>{{$cli->NombreCliente}}</td>
          <td>{{$cli->CodigoCliente}}</td>
          <td>{{$cli->Ramo}}</td>
          <td>{{$cli->Referencia}}</td>
          <td>{{$cli->Recibo}}</td>
          <td>{{$cli->Cuota}}</td>
          <td>{{$cli->FechaVencimientoRecibo}}</td>
          <td>{{$cli->DeudaTotalRecibo}}</td>
          <td>{{$cli->FormaPago}}</td>
        </tr>
      @endforeach
      </thead>
    </table>
  </div>

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