<?php   require_once("libreria/fpdf/clsFpdf.php");
   require_once("modelo/class_solicitante.php");
   $solicitante = new solicitante;
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("R","Letter");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,"Reporte de Solicitantes",0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
         //Titulos de las Celdas
		 
		$nombre_cedula="Cedula"; 
		$nombre_cod_tipo="Tipo"; 
		$nombre_nombre="Nombre"; 
		$nombre_apellido="Apellido"; 
		$nombre_telefono="Teléfono"; 
		$nombre_direccion="Dirección";
	
		$suma_mayor_cedula=$lobjPdf->GetStringWidth(utf8_decode($nombre_cedula));
		$suma_mayor_cod_tipo=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_tipo));
		$suma_mayor_nombre=$lobjPdf->GetStringWidth(utf8_decode($nombre_nombre));
		$suma_mayor_apellido=$lobjPdf->GetStringWidth(utf8_decode($nombre_apellido));
		$suma_mayor_telefono=$lobjPdf->GetStringWidth(utf8_decode($nombre_telefono));
		$suma_mayor_direccion=$lobjPdf->GetStringWidth(utf8_decode($nombre_direccion));$suma_mayor=0;    
   $solicitante->listar();
      while ($row=$solicitante->row()){
				$suma_cedula=$lobjPdf->GetStringWidth($row["cedula"]);
	include_once("modelo/class_tipo.php");
	$tipo = new tipo;
	$tipo->set_cod_tipo($row["cod_tipo"]);
	$tipo->consultar();
	$row_tipo=$tipo->row();
	$suma_cod_tipo=$lobjPdf->GetStringWidth($row_tipo["nombre"]);
				$suma_nombre=$lobjPdf->GetStringWidth($row["nombre"]);
				$suma_apellido=$lobjPdf->GetStringWidth($row["apellido"]);
				$suma_telefono=$lobjPdf->GetStringWidth($row["telefono"]);
				$suma_direccion=$lobjPdf->GetStringWidth($row["direccion"]);
		if($suma_cedula>$suma_mayor_cedula){
			$suma_mayor_cedula=$suma_cedula;
		}
		$suma_cedula=0;
		if($suma_cod_tipo>$suma_mayor_cod_tipo){
			$suma_mayor_cod_tipo=$suma_cod_tipo;
		}
		$suma_cod_tipo=0;
		if($suma_nombre>$suma_mayor_nombre){
			$suma_mayor_nombre=$suma_nombre;
		}
		$suma_nombre=0;
		if($suma_apellido>$suma_mayor_apellido){
			$suma_mayor_apellido=$suma_apellido;
		}
		$suma_apellido=0;
		if($suma_telefono>$suma_mayor_telefono){
			$suma_mayor_telefono=$suma_telefono;
		}
		$suma_telefono=0;
		if($suma_direccion>$suma_mayor_direccion){
			$suma_mayor_direccion=$suma_direccion;
		}
		$suma_direccion=0;
   } 
		$lobjPdf->Cell(($suma_mayor_cedula+2),6,utf8_decode($nombre_cedula),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_cod_tipo+2),6,utf8_decode($nombre_cod_tipo),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_nombre+2),6,utf8_decode($nombre_nombre),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_apellido+2),6,utf8_decode($nombre_apellido),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_telefono+2),6,utf8_decode($nombre_telefono),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_direccion+2),6,utf8_decode($nombre_direccion),1,0,"C");
   $lobjPdf->SetFont("arial","",12);
   $lobjPdf->Ln();
      $solicitante->listar();
   while ($row=$solicitante->row()){
				$lobjPdf->Cell(($suma_mayor_cedula+2),6,utf8_decode($row["cedula"]),1,0,"R");
	include_once("modelo/class_tipo.php");
	$tipo = new tipo;
	$tipo->set_cod_tipo($row["cod_tipo"]);
	$tipo->consultar();
	$row_tipo=$tipo->row();
	
	$lobjPdf->Cell(($suma_mayor_cod_tipo+2),6,utf8_decode($row_tipo["nombre"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_nombre+2),6,utf8_decode($row["nombre"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_apellido+2),6,utf8_decode($row["apellido"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_telefono+2),6,utf8_decode($row["telefono"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_direccion+2),6,utf8_decode($row["direccion"]),1,1,"R");
   }
   $lobjPdf->Output(); ?>
