<?php   require_once("libreria/fpdf/clsFpdf_vertical.php");
   require_once("modelo/class_clase_solicitud.php");
   $clase_solicitud = new clase_solicitud;
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,"Reporte de Clases",0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
         //Titulos de las Celdas
		 
		$nombre_cod_clase_solicitud="Codigo"; 
		$nombre_nombre="Nombre";
	
		$suma_mayor_cod_clase_solicitud=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_clase_solicitud));
		$suma_mayor_nombre=$lobjPdf->GetStringWidth(utf8_decode($nombre_nombre));$suma_mayor=0;    
   $clase_solicitud->listar();
      while ($row=$clase_solicitud->row()){
				$suma_cod_clase_solicitud=$lobjPdf->GetStringWidth($row["cod_clase_solicitud"]);
				$suma_nombre=$lobjPdf->GetStringWidth($row["nombre"]);
		if($suma_cod_clase_solicitud>$suma_mayor_cod_clase_solicitud){
			$suma_mayor_cod_clase_solicitud=$suma_cod_clase_solicitud;
		}
		$suma_cod_clase_solicitud=0;
		if($suma_nombre>$suma_mayor_nombre){
			$suma_mayor_nombre=$suma_nombre;
		}
		$suma_nombre=0;
   } 
		$lobjPdf->Cell(($suma_mayor_cod_clase_solicitud+2),6,utf8_decode($nombre_cod_clase_solicitud),1,0,"C"); 
		$lobjPdf->Cell(($suma_mayor_nombre+2),6,utf8_decode($nombre_nombre),1,0,"C");
   $lobjPdf->SetFont("arial","",12);
   $lobjPdf->Ln();
      $clase_solicitud->listar();
   while ($row=$clase_solicitud->row()){
				$lobjPdf->Cell(($suma_mayor_cod_clase_solicitud+2),6,utf8_decode($row["cod_clase_solicitud"]),1,0,"R");
				$lobjPdf->Cell(($suma_mayor_nombre+2),6,utf8_decode($row["nombre"]),1,1,"R");
   }
   $lobjPdf->Output(); ?>
