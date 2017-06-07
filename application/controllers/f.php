<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F extends CI_Controller {

	function __construct(){
		parent::__construct();    
		$this->load->model('m_alternatif');
		$this->load->model('m_kriteria');
		$this->load->library('session');
	}

	public function saran_lahan(){
		// $kec = $this->input->post('kec');
		// $desa = $this->input->post('desa');
		// $ketinggian = $this->input->post('ketinggian');
		// $curahHujan = $this->input->post('curahHujan');
		// $akses = $this->input->post('aksesJalan');
		$lahan = $this->m_alternatif->data_lahan()->result();
		$kriteria = $this->m_kriteria->data_kriteria()->result();
		$jml_alt= $this->m_alternatif->jumlah_lahan();
		$jml_kri= $this->m_kriteria->jumlah_kriteria();

    $d = array(); //simpan selisih 
    $e=1;

    //hitung selisih tiap alternatif masing-masing kriteria

    for ($k=0; $k < $jml_kri ; $k++) { 
      echo $e;
      $namaKriteria = $kriteria[$k]->nama_kriteria;
      echo $namaKriteria."</br>";
      $x=0;
      $y=0;
      for ($i=0; $i < $jml_alt; $i++) { 
        for ($j=0; $j < $jml_alt; $j++) { 
          echo "d".$k.$i.$j." = ".$lahan[$i]->$namaKriteria." - ".$lahan[$j]->$namaKriteria;
          $d[$k][$i][$j] = (($lahan[$i]->$namaKriteria-$lahan[$j]->$namaKriteria));
          echo " = ".$d[$k][$i][$j]."</br>";
          $y++;
        }
        $x++;
      }
      $e++;
    }

    echo "</br></br>nilai d</br>";
    for ($k=0; $k < $jml_kri; $k++) { 
      for ($i=0; $i < $jml_alt ; $i++) { 
        for ($j=0; $j < $jml_alt; $j++) { 
          echo $d[$k][$i][$j]." , ";
        }echo"</br>";
      }echo"</br>";
    }


    //funsi maximasi dan minimasi
    for ($k=0; $k < $jml_kri; $k++) { 
      for ($i=0; $i < $jml_alt ; $i++) { 
        for ($j=0; $j < $jml_alt; $j++) { 
          if ($kriteria[$k]->min_max=="max") {
            if ($d[$k][$i][$j]>$d[$k][$j][$i]) {
              $d[$k][$j][$i]=0;
            } else {
              $d[$k][$i][$j]=0;
            }
          } else {//jika minimal
            if ($d[$k][$i][$j]<$d[$k][$j][$i]) {
              $d[$k][$j][$i]=0;
            } else {
              $d[$k][$i][$j]=0;
            }
          }
        }
      }
    }


    echo "</br></br>nilai d setelah minimal dan maximal</br>";
    for ($k=0; $k < $jml_kri; $k++) { 
      for ($i=0; $i < $jml_alt ; $i++) { 
        for ($j=0; $j < $jml_alt; $j++) { 
          echo $d[$k][$i][$j]." , ";
        }echo"</br>";
      }echo"</br>";
    }


    echo "</br></br>nilai preferensi</br>";
    //cek tipe preferensi dan hitung preferensi

    //---variable
    $H = array();//simpan nilai preferensi

    //---function
    for ($i=0; $i < $jml_kri; $i++) { 
      //cek tipe preferensi
      //tipe preferensi 1 

      if ($kriteria[$i]->tipe_preferensi==1) {
        echo "kriteria ".$kriteria[$i]->kriteria." memiliki tipe preferensi 1</br>";
        for ($j=0; $j < $jml_alt; $j++) { 
         for ($k=0; $k < $jml_alt; $k++) { 
          // echo "P(".$j.$k.") = ";
           if ($d[$i][$j][$k]==0) {
            $H[$i][$j][$k]=0;
            echo " 0 , ";
          }else{
            $H[$i][$j][$k]=1;
            echo " 1 , ";
          }
        }
        echo "</br>";
      }
    }
      //tipe preferensi 2
    if ($kriteria[$i]->tipe_preferensi==2) {
      echo "kriteria ".$kriteria[$i]->kriteria." memiliki tipe preferensi 2</br>";
      for ($j=0; $j < $jml_alt; $j++) { 
       for ($k=0; $k < $jml_alt; $k++) { 
        // echo "P(".$j.$k.") = ";
         if ($d[$i][$j][$k]< -$kriteria[$i]->q || $d[$i][$j][$k]>$kriteria[$i]->q) {
          $H[$i][$j][$k]=1;
          echo " 1, ";
        }else{
          $H[$i][$j][$k]=0;
          echo " 0 , ";
        }
      }
      echo "</br>";
    }
  }
      //tipe preferensi 3
  if ($kriteria[$i]->tipe_preferensi==3) {
   echo "kriteria ".$kriteria[$i]->kriteria." memiliki tipe preferensi 3</br>";
   for ($j=0; $j < $jml_alt; $j++) { 
     for ($k=0; $k < $jml_alt; $k++) { 
       //echo "P(".$j.$k.") = ";
       if ($d[$i][$j][$k]< -$kriteria[$i]->p || $d[$i][$j][$k]>$kriteria[$i]->p) {
        $H[$i][$j][$k]=1;
        echo $H[$i][$j][$k].", ";
      }else{
        $H[$i][$j][$k]= $d[$i][$j][$k]/$kriteria[$i]->p;
        echo $H[$i][$j][$k].", ";
      }
    }
    echo "</br>";
  }
}
      //tipe preferensi 4
if ($kriteria[$i]->tipe_preferensi==4) {
 echo "kriteria ".$kriteria[$i]->kriteria." memiliki tipe preferensi 4</br>";
 for ($j=0; $j < $jml_alt; $j++) { 
   for ($k=0; $k < $jml_alt; $k++) { 
     //echo "P(".$j.$k.") = ";
     if (abs($d[$i][$j][$k])<= $kriteria[$i]->q ) {
      $H[$i][$j][$k]=0;
      echo $H[$i][$j][$k].", ";
    } else if (abs($d[$i][$j][$k])>$kriteria[$i]->p) {
      $H[$i][$j][$k]= 1;
      echo $H[$i][$j][$k].", ";
    }else{
      $H[$i][$j][$k]= 0.5;
      echo $H[$i][$j][$k].", ";
    }
  }
  echo "</br>";
}
}
      //tipe preferensi 5
if ($kriteria[$i]->tipe_preferensi==5) {
 echo "kriteria ".$kriteria[$i]->kriteria." memiliki tipe preferensi 5</br>";
 for ($j=0; $j < $jml_alt; $j++) { 
   for ($k=0; $k < $jml_alt; $k++) { 
     //echo "P(".$j.$k.") = ";
     if (abs($d[$i][$j][$k])<= $kriteria[$i]->q ) {
      $H[$i][$j][$k]=0;
      echo $H[$i][$j][$k].", ";
    } else if (abs($d[$i][$j][$k])>$kriteria[$i]->p) {
      $H[$i][$j][$k]= 1;
      echo $H[$i][$j][$k].", ";
    }else{
      $H[$i][$j][$k]= (abs($d[$i][$j][$k]) - $kriteria[$i]->q)/$kriteria[$i]->p-$kriteria[$i]->q;
      echo $H[$i][$j][$k].", ";
    }
  }
  echo "</br>";
}
}
      //tipe preferensi 6
if ($kriteria[$i]->tipe_preferensi==6) {
 echo "kriteria ".$kriteria[$i]->kriteria." memiliki tipe preferensi 6</br>";
 for ($j=0; $j < $jml_alt; $j++) { 
   for ($k=0; $k < $jml_alt; $k++) { 
     //echo "P(".$j.$k.") = ";
     $H[$i][$j][$k]=1- exp((-pow($d[$i][$j][$k], 2))/2*pow($kriteria[$i]->g, 2));
     echo $H[$i][$j][$k].", ";
   }
   echo "</br>";
 }
}
}


// echo "</br></br>nilai H(|d|) atau preferensi</br>";
// for ($k=0; $k < $jml_kri; $k++) { 
//   for ($i=0; $i < $jml_alt ; $i++) { 
//     for ($j=0; $j < $jml_alt; $j++) { 
//       echo $H[$k][$i][$j]." , ";
//     }echo"</br>";
//   }echo"</br>";
// }

    //hitung dan simpan nilai index preferensi

    //atribut
    $ip = array();// nilai index preferensi
    $tot_bobot = 0;
    for ($i=0; $i < $jml_kri; $i++) { 
    	$tot_bobot += $kriteria[$i]->bobot;
    }

    //---function
    echo "</br></br>nilai Index preferensi</br>";
    for ($i=0; $i < $jml_kri; $i++) { 
      echo "kriteria ".$kriteria[$i]->kriteria." memiliki bobot ".$kriteria[$i]->bobot."</br>";
      for ($j=0; $j < $jml_alt ; $j++) {
        for ($k=0; $k < $jml_alt ; $k++) { 
          $ip[$i][$j][$k]=$H[$i][$j][$k]*($kriteria[$i]->bobot/$tot_bobot);
          //echo " ##".$ip[$i][$j][$k]." = ".$H[$i][$j][$k]." * (".$kriteria[$i]->bobot."/".$tot_bobot.")";
          echo $ip[$i][$j][$k].", ";
        }
        echo "</br>";
      }
      echo "</br>";
    }

    //nilai total index preferensi

    $tot_ip = array();

    echo "</br></br>nilai total index preferensi</br>";
    for ($i=0; $i < $jml_alt; $i++) { 
      for ($j=0; $j < $jml_alt; $j++) { 
        $tot_ip[$i][$j]=0;
        for ($k=0; $k < $jml_kri; $k++) { 
          $tot_ip[$i][$j] += $ip[$k][$i][$j];
        }
        echo $tot_ip[$i][$j]." , ";
      }echo"</br>";
    }


    //nilai leaving flow, entering flow, net flow
    echo "</br></br>nilai leaving flow, entering flow, net flow</br>";
    $leaving_flow = array();
    $entering_flow = array();
    $net_flow = array();
    for ($i=0; $i < $jml_alt ; $i++) { 
      $leaving_flow[$i] = 0;
      $entering_flow[$i] = 0;
      for ($j=0; $j < $jml_alt ; $j++) { 
        $leaving_flow[$i]+= $tot_ip[$i][$j];
        $entering_flow[$i] += $tot_ip[$j][$i];
      }
      $net_flow[$i]['net_flow'] = $leaving_flow[$i]-$entering_flow[$i];
      $net_flow[$i]['kecamatan'] = $lahan[$i]->kecamatan;
      $net_flow[$i]['desa'] = $lahan[$i]->desa;
      echo $net_flow[$i]['desa']."========>".$leaving_flow[$i]." , ".$entering_flow[$i]." , ".$net_flow[$i]['net_flow']."</br>";
    }

    //terurut nilai
    echo "</br></br>peringkat </br>";
    rsort($net_flow);
    for ($i=0; $i < count($net_flow); $i++) { 
      echo $net_flow[$i]['net_flow']." // kecamatan = ".$net_flow[$i]['kecamatan']." // desa = ".$net_flow[$i]['desa']."</br>";
    }
	}
}
