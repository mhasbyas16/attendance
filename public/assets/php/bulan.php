<?php
								$Abulan = array(
									'Januari' =>'01',
									'Februari' =>'02' ,
									'Maret' =>'03' ,
									'April' =>'04' ,
									'Mei' =>'05' ,
									'Juni' =>'06' ,
									'Juli' =>'07' ,
									'Agustus'=>'08' ,
									'September' =>'09' ,
									'Oktober' =>'10' ,
									'November' =>'11' ,
									'Desember' =>'12');
								$ANbulan = array(
									1=>'Januari',
									2=>'Februari',
									3=>'Maret',
									4=>'April',
									5=>'Mei',
									6=>'Juni',
									7=>'Juli',
									8=>'Agustus',
									9=>'September',
									10=>'Oktober',
									11=>'November',
									12=>'Desember' );

									for ($i=1; $i <=12 ; $i++) { 
										echo "<option value='".$Abulan[$ANbulan[$i]]."'>".$ANbulan[$i]." </option>";
																			 	# code...
									}									 
							?>
