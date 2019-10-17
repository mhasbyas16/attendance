<?php
$service=DB::table('service')->where('status','');
        $cekservice=$service->count();

        if ($cekservice==0) {
            $status='';
        }elseif ($cekservice>=1) {
            $status='red';
        }
?>
