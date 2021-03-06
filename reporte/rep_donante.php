<?php   require_once("libreria/fpdf/clsFpdf_vertical.php");
   require_once("modelo/class_donante.php");
   $donante = new donante;
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,"Reporte de Donantes",0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
         //Titulos de las Celdas
		 
		$nombre_rif_donante="Rif o cedula del donante"; 
		$nombre_nombre="Nombre"; 
		$nombre_telefono="Teléfono"; 
		$nombre_direccion="Dirección";
	
		$suma_mayor_rif_donante=$lobjPdf->GetStringWidth(utf8_decode($nombre_rif_donante));
		$suma_mayor_nombre=$lobjPdf->GetStringWidth(utf8_decode($nombre_nombre));
		$suma_mayor_telefono=$lobjPdf->GetStringWidth(utf8_decode($nombre_telefono));
		$suma_mayor_direccion=$lobjPdf->GetStringWidth(utf8_decode($nombre_direccion));$suma_mayor=0;    
   $donante->listar();
      while ($row=$donante->row()){
				$suma_rif_donante=$lobjPdf->GetStringWidth($row["rif_donante"]);
				$suma_nombre=$lobjPdf->GetStringWidth($row["nombre"]);
				$suma_telefono=$lobjPdf->GetStringWidth($row["telefono"]);
				$suma_direccion=$lobjPdf->GetStringWidth($row["direccion"]);
		if($suma_rif_donante>$suma_mayor_rif_donante){
			$suma_mayor_rif_donante=$suma_rif_donante;
		}
		$suma_rif_donante=0;
		if($suma_nombre>$suma_mayor_nombre){
			$suma_mayor_nombre=$suma_nombre;
		}
		$suma_nombre=0;
		if($suma_telefono>$suma_mayor_telefono){
			$suma_mayor_telefono=$suma_telefono;
		}
		$suma_telefono=0;
		if($suma_direccion>$suma_mayor_direccion){
			$suma_mayor_direccion=$suma_direccion;
		}
		$suma_direccion=0;
   } 
		$lobjPdf->Cell(($suma_mayor_rif_donante+2),6,utf8_decode($nombre_rif_donante),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_nombre+2),6,utf8_decode($nombre_nombre),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_telefono+2),6,utf8_decode($nombre_telefono),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_direccion+2),6,utf8_decode($nombre_direccion),1,0,"C");
   $lobjPdf->SetFont("arial","",12);
   $lobjPdf->Ln();
      $donante->listar();
   while ($row=$donante->row()){
				$lobjPdf->Cell(($suma_mayor_rif_donante+2),6,utf8_decode($row["rif_donante"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_nombre+2),6,utf8_decode($row["nombre"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_telefono+2),6,utf8_decode($row["telefono"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_direccion+2),6,utf8_decode($row["direccion"]),1,1,"R");
   }
   $lobjPdf->Output(); ?>
