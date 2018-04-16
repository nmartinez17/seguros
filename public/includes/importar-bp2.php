<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizacion de datos v3</title>
</head>
<body>
<?php 
	// include ("../../includes/conectadb3.php");
	include ("conecta-pdo.php");
	
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $salto_linea="'\r\n'";
      }else{
    $salto_linea="'\n'";
}


/////    STOCK00
try {
$query0="truncate table deudas0";

$stmt = $conn->prepare($query0);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se borraron los datos de deudas0<BR>";
	echo $e->getMessage();
}	

$query="LOAD DATA LOCAL INFILE ";
$query.="'".'RecibosDeudas.csv'."'";
$query.= " REPLACE INTO TABLE deudas0";
$query.= " CHARACTER SET UTF8";
$query.= " FIELDS ENCLOSED BY '\"' TERMINATED BY ';' ";
$query.= " LINES TERMINATED BY '\r\n' ";
$query.= " IGNORE 1 LINES ";
$query.= "(NombreCliente,CodigoCliente,Ramo,Referencia,Recibo,Cuota,FechaVencimientoRecibo,Moneda,DeudaTotalRecibo,QqEntregar,PolizaVigente,DescripcionRiesgo,Certificado,Producto,FormaPago,NumeroTarjetaCredito,NombreTarjetaCredito,CBU,SituacionRecibo,TipoDeuda,PrimaEmitida,PremioTotal,FechaEmisionRecibo,FechaInicioVigencia,FechaFinVigencia,Direccion,Telefono,Email,GrupoEstadistico,PolizaCombinada,PolizaBasePolizaCombinada,NroPoliza,Banco,Organizador,Productor,Participante,Vendedor,Cobrador)";



$stmt = $conn->prepare($query);
$stmt->execute();

		echo "Se actualizaron los datos de deudas0<BR>";

/*

/////////////////////////////////////////////////////////////

	
/////    CODBARRA0

/*
try {
$query0="truncate table codbarra0";

$stmt = $conn->prepare($query0);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se borraron los datos de CODBARRA0<BR>";
	echo $e->getMessage();
}	
	
$query="LOAD DATA LOCAL INFILE ";
$query.="'".$_SERVER['DOCUMENT_ROOT'].'/BP2/pv/csv/codbarra0.csv'."'";
$query.= " REPLACE INTO TABLE codbarra0";
$query.= " CHARACTER SET UTF8";
$query.= " FIELDS ENCLOSED BY '\"' TERMINATED BY ';' ";
$query.= " LINES TERMINATED BY '\r\n' ";
$query.= " IGNORE 1 LINES ";
$query.= " (codigo,created_at,updated_at,coddun14,unidades,canautprep,formato)";

$stmt = $conn->prepare($query);
$stmt->execute();

		echo "Se actualizaron los datos de CODBARRA0<BR>";

/////////////////////////////////////////////////////////////

/////    LISTAPR0
try {
$query0="truncate table dlistapr0";

$stmt = $conn->prepare($query0);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se borraron los datos de dlistapr0<BR>";
	echo $e->getMessage();
}	
	
$query="LOAD DATA LOCAL INFILE ";
$query.="'".$_SERVER['DOCUMENT_ROOT'].'/BP2/pv/csv/dlistapr0.csv'."'";
$query.= " REPLACE INTO TABLE dlistapr0";
$query.= " CHARACTER SET UTF8";
$query.= " FIELDS ENCLOSED BY '\"' TERMINATED BY ';' ";
$query.= " LINES TERMINATED BY '\r\n' ";
$query.= " IGNORE 1 LINES ";
$query.= " (id_rws, created_at, updated_at, listapre, version, codigo, precio, ult_modif)";

$stmt = $conn->prepare($query);
$stmt->execute();

		echo "Se actualizaron los datos de DLISTAPR0<BR>";

/////////////////////////////////////////////////////////////	
	
/////    LISTAPR0
	
$query="LOAD DATA LOCAL INFILE ";
$query.="'".$_SERVER['DOCUMENT_ROOT'].'/BP2/pv/csv/dlistapr1.txt'."'";
$query.= " INTO TABLE dlistapr0";
$query.= " CHARACTER SET UTF8";
$query.= " FIELDS ENCLOSED BY '\"' TERMINATED BY ';' ";
$query.= " LINES TERMINATED BY '\r\n' ";
$query.= " IGNORE 1 LINES ";
$query.= " (id_rws, created_at, updated_at, listapre, version, codigo, precio, ult_modif)";

$stmt = $conn->prepare($query);
$stmt->execute();

		echo "Se actualizaron los datos de DLISTAPR0<BR>";

/////////////////////////////////////////////////////////////		

	echo "fin de la importacion de datos...<br>";

	
/////    Actualizacion fragancias discontinuas
try {
   $news="update stock00 set discontinu=0 where codigo=109069; INSERT INTO  `dlistapr0` (  `id_rws` ,  `created_at` ,  `updated_at` ,  `listapre` ,  `version` ,  `codigo` ,  `precio` ,  `ult_modif` ) VALUES ( 999999999, NOW( ) , NOW( ) ,  'FFORMOSA', 2, 109069, 430, NOW() );";
	
$stmt = $conn->prepare($news);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se registró la excepción de fragancias discontinuas.";
	echo $e->getMessage();
}	

/////////////////////////////////////////////////////////////			
	
	
	
	
/////    LISTAPR0
try {
$query0="truncate table stock0";

$stmt = $conn->prepare($query0);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se borraron los datos de dlistapr0<BR>";
	echo $e->getMessage();
}	
	
$query="INSERT INTO stock0 (codigo,detalle,rubro,especif,especif1,especif2,marca_cor,nombre_cor,agrupa,tamano,extracto,genero,familia,info,notas,precio,relacion1,relacion2,relacion3,discontinu,sin_stock, listapre) SELECT DISTINCT a.codigo, a.detalle, a.rubro, a.especif, a.especif1, a.especif2, a.marca_cor, a.nombre_cor, a.agrupa, a.tamano, a.extracto, a.genero, a.familia, a.info, a.notas, b.precio, relacion1, relacion2, relacion3,discontinu, sin_stock, b.listapre as listapre FROM stock00 a LEFT JOIN dlistapr0 b ON a.codigo = b.codigo WHERE agrupa >0 AND especif in('fragancia','SET DE PRODUCTOS') AND rubro IN ( 'selectivo', 'semiselectivo' ) and especif1 in('PROD. REGULAR','PRODUCTO REGULAR','COFRE','EDI. LIMITADA','EDI. LIMITA','EDI. ESPECIAL') AND DISCONTINU=0 and listapre in('MAYORISTA','LBS1','FRESISTENC','FFORMOSA','FLAPLATA','LESPERANZA','LSANTAFE1','FLAPAMPA','F_SANTIAGO') and detalle not like '%promo%'";

$stmt = $conn->prepare($query);
$stmt->execute();

		echo "Se actualizaron los datos de STOCK0<BR>";

/////////////////////////////////////////////////////////////	
	
/////    actualizaciones internas
try {
$query1="UPDATE `stock0` SET `especif1` = 'PROD. REGULAR' WHERE especif1 ='PRODUCTO REGULAR'";

$stmt = $conn->prepare($query1);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se actualizaron los ESPECIF<BR>";
	echo $e->getMessage();
}	

/////////////////////////////////////////////////////////////		
	
/////    actualizacion de las plantillas de contenidos
try {
$query2="insert into bp_plantillas_contenido SELECT distinct 0 as id, c.id as idplantilla, a.agrupa as agrupa, 1 as orden, 0 as control, 0 as habilitada FROM `stock0` a left join bp_marcas b on a.marca_cor=b.marca left join bp_plantillas c on b.id=c.idmarca WHERE a.AGRUPA NOT IN(select agrupa from bp_plantillas_contenido)";
	
$stmt = $conn->prepare($query2);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se actualizaron los ESPECIF<BR>";
	echo $e->getMessage();
}	

/////////////////////////////////////////////////////////////			
	

/////    LISTAPR0
try {
$query0="drop table IF EXISTS bp_relaciones";

$stmt = $conn->prepare($query0);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se borraron los de relaciones<BR>";
	echo $e->getMessage();
}	
	
$query="CREATE TABLE bp_relaciones AS SELECT distinct a.agrupa, c.agrupa as rel FROM stock0 a left join codbarra0 b on a.relacion1=b.coddun14 left join stock0 c on b.codigo=c.codigo where a.relacion1<>'' union SELECT distinct a.agrupa, c.agrupa as rel FROM stock0 a left join codbarra0 b on a.relacion2=b.coddun14 left join stock0 c on b.codigo=c.codigo where a.relacion2<>'' union SELECT distinct a.agrupa, c.agrupa as rel FROM stock0 a left join codbarra0 b on a.relacion3=b.coddun14 left join stock0 c on b.codigo=c.codigo where a.relacion3<>'' ";

$stmt = $conn->prepare($query);
$stmt->execute();

		echo "Se actualizaron los datos de relaciones.<BR>";

/////////////////////////////////////////////////////////////		

/////    LISTAPR0

$query="update stock0 a inner join relaciones0 b on a.codigo=b.codigo set a.relacion1=b.relacion1, a.relacion2=b.relacion2, a.relacion3=b.relacion3";

$stmt = $conn->prepare($query);
$stmt->execute();

		echo "Se actualizaron los datos de relaciones.<BR>";

/////////////////////////////////////////////////////////////		

		
	
	
/////    actualizacion para control
try {
   $news="INSERT INTO bp_novedades (descripcion) VALUES ('Se ha actualizado la base de datos de productos')";
	
$stmt = $conn->prepare($news);
$stmt->execute();
}
	catch(PDOException $e) 
{
	echo "Se registró la actualización";
	echo $e->getMessage();
}	

/////////////////////////////////////////////////////////////			
		*/
?>

</body>
</html>