<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hitung extends CI_Controller {

  function __construct(){
    parent::__construct();    
    $this->load->model('m_alternatif');
    $this->load->model('m_kriteria');
  }

  public function saran_lahan(){
    // $kec = $this->input->post('kec');
    // $desa = $this->input->post('desa');
    // $ketinggian = $this->input->post('ketinggian');
    // $curahHujan = $this->input->post('curahHujan');
    // $akses = $this->input->post('aksesJalan');
    // $lahan = $this->m_alternatif->data_lahan($kec,$akses,$ketinggian,$suhu,$curahHujan);
    // $krite = $this->m_kriteria->data_kriteria()->result();
    // $jml_alt= $this->m_alternatif->jumlah_alternatif()->result();
    // $jml_kri= $this->m_kriteria->jumlah_kriteria()->result();
    //array data lahan
    $nama = array( 
      "0" => array ("daerah"=>"galaxy","f1" => 3500, "f2" => 70, "f3" => 10, "f4" => 80, "f5" => 1,"f6" => 36),
      "1" => array ("daerah"=>"iphone","f1" => 4500, "f2" => 90, "f3" => 10, "f4" => 60, "f5" => 5,"f6" => 48),
      "2" => array ("daerah"=>"BB","f1" => 4000, "f2" => 80, "f3" => 9, "f4" => 90, "f5" => 2,"f6" => 48),
      "3" => array ("daerah"=>"Lumia","f1" => 4000, "f2" => 70, "f3" => 8, "f4" => 50, "f5" => 4,"f6" => 60)
      );

    $kriteria = array(
      "0" => array("kriteria" => "f1" , "bobot" => 0.2 ,"tipe" =>4,"p" =>1000,"q" =>500 ,"g" =>0 ,"mm" =>"min"),
      "1" => array("kriteria" => "f2" , "bobot" => 0.25 ,"tipe" =>3,"p" =>20,"q" =>0 ,"g" =>0 ,"mm" =>"max"),
      "2" => array("kriteria" => "f3" , "bobot" => 0.2 ,"tipe" =>3,"p" =>2,"q" =>0 ,"g" =>0 ,"mm" =>"max"),
      "3" => array("kriteria" => "f4" , "bobot" => 0.125 ,"tipe" =>2,"p" =>0,"q" =>20,"g" =>0 ,"mm" => "max"),
      "4" => array("kriteria" => "f5" , "bobot" => 0.125 ,"tipe" =>5,"p" =>2,"q" =>1,"g" =>0  ,"mm" =>"min"),
      "5" => array("kriteria" => "f6" , "bobot" => 0.1 ,"tipe" =>1,"p" =>0,"q" =>0 ,"g" =>0 ,"mm" =>"max")
      );

    $d = array(); //simpan selisih 
    $e=1;

    //hitung selisih tiap alternatif masing-masing kriteria
    $jml_kriteria = count($kriteria);

    for ($k=0; $k < count($kriteria) ; $k++) { 
      echo $e;
      $namaKriteria = $kriteria[$k]['kriteria'];
      echo $namaKriteria."</br>";
      $x=0;
      $y=0;
      for ($i=0; $i < count($nama); $i++) { 
        for ($j=0; $j < count($nama); $j++) { 
          echo "d".$k.$i.$j." = ".$nama[$i][$namaKriteria]." - ".$nama[$j][$namaKriteria];
          $d[$k][$i][$j] = (($nama[$i][$namaKriteria]-$nama[$j][$namaKriteria]));
          echo " = ".$d[$k][$i][$j]."</br>";
          $y++;
        }
        $x++;
      }
      $e++;
    }

    echo "</br></br>nilai d</br>";
    for ($k=0; $k < count($kriteria); $k++) { 
      for ($i=0; $i < count($nama) ; $i++) { 
        for ($j=0; $j < count($nama); $j++) { 
          echo $d[$k][$i][$j]." , ";
        }echo"</br>";
      }echo"</br>";
    }



    //funsi maximasi dan minimasi
    for ($k=0; $k < count($kriteria); $k++) { 
      for ($i=0; $i < count($nama) ; $i++) { 
        for ($j=0; $j < count($nama); $j++) { 
          if ($kriteria[$k]['mm']=="max") {
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
    for ($k=0; $k < count($kriteria); $k++) { 
      for ($i=0; $i < count($nama) ; $i++) { 
        for ($j=0; $j < count($nama); $j++) { 
          echo $d[$k][$i][$j]." , ";
        }echo"</br>";
      }echo"</br>";
    }


    echo "</br></br>nilai preferensi</br>";
    //cek tipe preferensi dan hitung preferensi

    //---variable
    $H = array();//simpan nilai preferensi

    //---function
    for ($i=0; $i < count($kriteria); $i++) { 
      //cek tipe preferensi
      //tipe preferensi 1 

      if ($kriteria[$i]['tipe']==1) {
        echo "kriteria ".$kriteria[$i]['kriteria']." memiliki tipe preferensi 1</br>";
        for ($j=0; $j < count($nama); $j++) { 
         for ($k=0; $k < count($nama); $k++) { 
           echo "P(".$j.$k.") = ";
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
    if ($kriteria[$i]['tipe']==2) {
      echo "kriteria ".$kriteria[$i]['kriteria']." memiliki tipe preferensi 2</br>";
      for ($j=0; $j < count($nama); $j++) { 
       for ($k=0; $k < count($nama); $k++) { 
         echo "P(".$j.$k.") = ";
         if ($d[$i][$j][$k]< -$kriteria[$i]['q'] || $d[$i][$j][$k]>$kriteria[$i]['q']) {
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
  if ($kriteria[$i]['tipe']==3) {
   echo "kriteria ".$kriteria[$i]['kriteria']." memiliki tipe preferensi 3</br>";
   for ($j=0; $j < count($nama); $j++) { 
     for ($k=0; $k < count($nama); $k++) { 
       echo "P(".$j.$k.") = ";
       if ($d[$i][$j][$k]< -$kriteria[$i]['p'] || $d[$i][$j][$k]>$kriteria[$i]['p']) {
        $H[$i][$j][$k]=1;
        echo $H[$i][$j][$k].", ";
      }else{
        $H[$i][$j][$k]= $d[$i][$j][$k]/$kriteria[$i]['p'];
        echo $H[$i][$j][$k].", ";
      }
    }
    echo "</br>";
  }
}
      //tipe preferensi 4
if ($kriteria[$i]['tipe']==4) {
 echo "kriteria ".$kriteria[$i]['kriteria']." memiliki tipe preferensi 4</br>";
 for ($j=0; $j < count($nama); $j++) { 
   for ($k=0; $k < count($nama); $k++) { 
     echo "P(".$j.$k.") = ";
     if (abs($d[$i][$j][$k])<= $kriteria[$i]['q'] ) {
      $H[$i][$j][$k]=0;
      echo $H[$i][$j][$k].", ";
    } else if (abs($d[$i][$j][$k])>$kriteria[$i]['p'] ) {
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
if ($kriteria[$i]['tipe']==5) {
 echo "kriteria ".$kriteria[$i]['kriteria']." memiliki tipe preferensi 5</br>";
 for ($j=0; $j < count($nama); $j++) { 
   for ($k=0; $k < count($nama); $k++) { 
     echo "P(".$j.$k.") = ";
     if (abs($d[$i][$j][$k])<= $kriteria[$i]['q'] ) {
      $H[$i][$j][$k]=0;
      echo $H[$i][$j][$k].", ";
    } else if (abs($d[$i][$j][$k])>$kriteria[$i]['p'] ) {
      $H[$i][$j][$k]= 1;
      echo $H[$i][$j][$k].", ";
    }else{
      $H[$i][$j][$k]= (abs($d[$i][$j][$k]) - $kriteria[$i]['q'])/($kriteria[$i]['p']-$kriteria[$i]['q']);
      echo $H[$i][$j][$k].", ";
    }
  }
  echo "</br>";
}
}
      //tipe preferensi 6
if ($kriteria[$i]['tipe']==6) {
 echo "kriteria ".$kriteria[$i]['kriteria']." memiliki tipe preferensi 6</br>";
 for ($j=0; $j < count($nama); $j++) { 
   for ($k=0; $k < count($nama); $k++) { 
     echo "P(".$j.$k.") = ";
     $H[$i][$j][$k]=1- exp((-pow($d[$i][$j][$k], 2))/2*pow($kriteria[$i]['g'], 2));
     echo $H[$i][$j][$k].", ";
   }
   echo "</br>";
 }
}
}


echo "</br></br>nilai H(|d|) atau preferensi</br>";
for ($k=0; $k < count($kriteria); $k++) { 
  for ($i=0; $i < count($nama) ; $i++) { 
    for ($j=0; $j < count($nama); $j++) { 
      echo $H[$k][$i][$j]." , ";
    }echo"</br>";
  }echo"</br>";
}

    //hitung dan simpan nilai index preferensi

    //atribut
    $ip = array();// nilai index preferensi

    //---function
    echo "</br></br>nilai Index preferensi</br>";
    for ($i=0; $i < count($kriteria); $i++) { 
      echo "kriteria ".$kriteria[$i]['kriteria']." memiliki bobot ".$kriteria[$i]['bobot']."</br>";
      for ($j=0; $j < count($nama) ; $j++) {
        for ($k=0; $k < count($nama) ; $k++) { 
          $ip[$i][$j][$k]=$H[$i][$j][$k]*$kriteria[$i]['bobot'];
          echo $ip[$i][$j][$k].", ";
        }
        echo "</br>";
      }
      echo "</br>";
    }

    //nilai total index preferensi

    $tot_ip = array();

    echo "</br></br>nilai total index preferensi</br>";
    for ($i=0; $i < count($nama); $i++) { 
      for ($j=0; $j < count($nama); $j++) { 
        $tot_ip[$i][$j]=0;
        for ($k=0; $k < count($kriteria); $k++) { 
          $tot_ip[$i][$j]+=$ip[$k][$i][$j];
        }
        echo "(".$i.$j.")".$tot_ip[$i][$j]." , ";
      }echo"</br>";
    }


    //nilai leaving flow, entering flow, net flow
    echo "</br></br>nilai leaving flow, entering flow, net flow</br>";
    $leaving_flow = array();
    $entering_flow = array();
    $net_flow = array();
    for ($i=0; $i < count($nama) ; $i++) { 
      $leaving_flow[$i] = 0;
      $entering_flow[$i] = 0;
      for ($j=0; $j < count($nama) ; $j++) { 
        $leaving_flow[$i]+= $tot_ip[$i][$j];
        $entering_flow[$i] += $tot_ip[$j][$i];
      }
      $net_flow[$i]['net_flow'] = $leaving_flow[$i]-$entering_flow[$i];
      $net_flow[$i]['daerah'] = $nama[$i]['daerah'];
      echo $net_flow[$i]['daerah']."========>".$leaving_flow[$i]." , ".$entering_flow[$i]." , ".$net_flow[$i]['net_flow']."</br>";
    }

    //terurut nilai
    echo "</br></br>peringkat </br>";
    rsort($net_flow);
    for ($i=0; $i < count($net_flow); $i++) { 
      echo $net_flow[$i]['net_flow']." ".$net_flow[$i]['daerah']."</br>";
    }
  }
}

?>