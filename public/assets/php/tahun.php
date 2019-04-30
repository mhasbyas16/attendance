<?php
						$tahun = date('Y');
						for ($i=2017; $i <$tahun ; $i++) { 
							echo "<option value='".$i."'>".$i."</option>";
						}
							echo "<option selected value='".$tahun."'>".$tahun."</option>";
						?>		