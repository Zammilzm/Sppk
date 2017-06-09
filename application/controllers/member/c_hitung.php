<?php
session_start();
class C_hitung extends CI_Controller {

	public function __construct() {
		parent::__construct();

    // $this->load->library('session');
		$this->load->helper('text');
		$this->load->model('m_alternatif');
		$this->load->model('m_kecamatan');
		$this->load->model('m_kriteria');
		$this->load->helper('url');
	}
	public function index() {
    $data['kriteria'] = $this->m_kriteria->data_kriteria()->result();
    $this->load->view('member/hitung',$data);
  }


  public function hitung_prediksi(){
  //memilih lahan yang sesuai dengan pilihan user 
    $gol[0] =  $this->input->post('luas');
    $gol[1] = $this->input->post('harga');
    $gol[2] = $this->input->post('ketinggian');
    $gol[3] = $this->input->post('akses');
    $gol[4] = $this->input->post('suhu');


    $daftarLahan = $this->m_alternatif->saran_lahan();
    $dataKriteria = $this->m_kriteria->data_kriteria()->result();
    $bobotLahan = array();
    $lahan = array();

  //menyimpan pilihan kriteria yang dipilih user
    $kriteria = array();
    $k = $this->input->post('Kriteria');
    for ($i=0; $i < count($this->input->post('Kriteria')); $i++) { 
      $kriteria[$i]['kriteria']=$k[$i];
    }

    // memberi bobot tiap kriteria pada lahan
    for ($i=0; $i < count($daftarLahan); $i++) { 
      for ($j=0; $j < count($dataKriteria); $j++) { 
        $namaKriteria = $dataKriteria[$j]->kriteria;
        if($dataKriteria[$j]->kriteria=='akses'){
          if ($daftarLahan[$i]->$namaKriteria==$dataKriteria[$j]->gol3) {
            $bobotLahan[$i][$namaKriteria] = 3;
          } else if($daftarLahan[$i]->$namaKriteria==$dataKriteria[$j]->gol2){
            $bobotLahan[$i][$namaKriteria] = 2;
          }else{
            $bobotLahan[$i][$namaKriteria] = 1;
          }
          
        } else if($dataKriteria[$j]->min_max=='min') {
         if ($daftarLahan[$i]->$namaKriteria<$dataKriteria[$j]->gol3) {
          $bobotLahan[$i][$namaKriteria] = 3;
        } else if($daftarLahan[$i]->$namaKriteria<=$dataKriteria[$j]->gol2){
         $bobotLahan[$i][$namaKriteria] = 2;
       } else{
         $bobotLahan[$i][$namaKriteria] = 1;
       }
     } else {
       if ($daftarLahan[$i]->$namaKriteria<$dataKriteria[$j]->gol1) {
        $bobotLahan[$i][$namaKriteria] = 1;
      } else if($daftarLahan[$i]->$namaKriteria<=$dataKriteria[$j]->gol2){
       $bobotLahan[$i][$namaKriteria] = 2;
     } else{
       $bobotLahan[$i][$namaKriteria] = 3;
     }
   }
 }
}


// for ($i=0; $i < count($gol); $i++) { 
//   echo $gol[$i]." , ";
// }

// echo "<br><br><br>";

// for ($i=0; $i < count($daftarLahan); $i++) { 
//   for ($j=0; $j < count($dataKriteria); $j++) { 
//     echo $bobotLahan[$i][$dataKriteria[$j]->kriteria]." , ";
//   }
// }echo "<br>";
// echo "<br><br><br>";


  // memilih lahan sesuai dengan pilihan user dan menyimpannya pada variabel array lahan
$no=0;
for ($i=0; $i < count($daftarLahan) ; $i++) { 
  if ($bobotLahan[$i][$dataKriteria[0]->kriteria]==$gol[0]&&
    $bobotLahan[$i][$dataKriteria[1]->kriteria]==$gol[1]&&
    $bobotLahan[$i][$dataKriteria[2]->kriteria]==$gol[2]&&
    $bobotLahan[$i][$dataKriteria[3]->kriteria]==$gol[3]&&
    $bobotLahan[$i][$dataKriteria[4]->kriteria]==$gol[4]) {

    $lahan[$no]['id']=$daftarLahan[$i]->id_alternatif;
  $lahan[$no]['kecamatan']=$daftarLahan[$i]->kecamatan;
  $lahan[$no]['alamat']=$daftarLahan[$i]->alamat;
    //data bobot
  $lahan[$no]['bluas']=$bobotLahan[$i][$dataKriteria[0]->kriteria];
  $lahan[$no]['bharga']=$bobotLahan[$i][$dataKriteria[1]->kriteria];
  $lahan[$no]['bketinggian']=$bobotLahan[$i][$dataKriteria[2]->kriteria];
  $lahan[$no]['bsuhu']=$bobotLahan[$i][$dataKriteria[3]->kriteria];
  $lahan[$no]['bakses']=$bobotLahan[$i][$dataKriteria[4]->kriteria];
    //data nilai
  $lahan[$no]['luas']=$daftarLahan[$i]->luas;
  $lahan[$no]['harga']=$daftarLahan[$i]->harga;
  $lahan[$no]['ketinggian']=$daftarLahan[$i]->ketinggian;
  $lahan[$no]['suhu']=$daftarLahan[$i]->suhu;
  $lahan[$no]['akses']=$daftarLahan[$i]->akses;
  $no++;
}    
}


$jml_alt= count($lahan);
$jml_kri= count($dataKriteria);
$alternatif = array();
$d = array();
$H = array();
$ip = array();// nilai index preferensi
$tot_h = array();//total semua kriteria h(hd)
$hasil = array();

if ($jml_kri!==0) {


//hitung selisih tiap alternatif masing-masing kriteria
  for ($k=0; $k < $jml_kri ; $k++) { 
    $namaKriteria=$dataKriteria[$k]->kriteria;
    for ($i=0; $i < $jml_alt; $i++) { 
      for ($j=0; $j < $jml_alt; $j++) { 
        $d[$k][$i][$j] = (($lahan[$i][$namaKriteria]-$lahan[$j][$namaKriteria]));
      }
    }
  }




    // echo "</br></br>nilai d</br>";
    // for ($k=0; $k < $jml_kri; $k++) { 
    //   for ($i=0; $i < $jml_alt ; $i++) { 
    //     for ($j=0; $j < $jml_alt; $j++) { 
    //       echo $d[$k][$i][$j]." , ";
    //     }echo"</br>";
    //   }echo"</br>";
    // }



  //nilai preferensi
  for ($i=0; $i < $jml_kri; $i++) { 
   for ($j=0; $j < $jml_alt; $j++) { 
     for ($k=0; $k < $jml_alt; $k++) { 
       if ($d[$i][$j][$k]<=0) {
         $H[$i][$j][$k]=0;
       }else{
         $H[$i][$j][$k]=1;
       }
     }
   }
 }


   // hitung dan simpan nilai index preferensi
 if ($jml_kri!==0) {
  for ($i=0; $i < $jml_alt; $i++) { 
    for ($j=0; $j < $jml_alt; $j++) { 
      $tot_h[$i][$j]=0;
      for ($k=0; $k < $jml_kri; $k++) {
        $tot_h[$i][$j]+=$H[$k][$i][$j];
      }
      $ip[$i][$j]=$tot_h[$i][$j]*1/$jml_kri;
    }
  }
} 



//nilai leaving flow, entering flow, net flow
for ($i=0; $i < $jml_alt ; $i++) { 
 $hasil[$i]['leavingFlow'] = 0;
 $hasil[$i]['enteringFlow'] = 0;
 for ($j=0; $j < $jml_alt ; $j++) { 
   $hasil[$i]['leavingFlow']+= $ip[$i][$j];
   $hasil[$i]['enteringFlow'] += $ip[$j][$i];
 }
 $hasil[$i]['leavingFlow'] = 1/$jml_alt*$hasil[$i]['leavingFlow'];
 $hasil[$i]['enteringFlow'] = 1/$jml_alt*$hasil[$i]['enteringFlow'];
 $hasil[$i]['net_flow'] = $hasil[$i]['leavingFlow']-$hasil[$i]['enteringFlow'];
 $hasil[$i]['id_lahan'] = $lahan[$i]['id'];
}


for ($i=0; $i <count($hasil) ; $i++) { 
  $hasil[$i]['kecamatan'] = $lahan[$i]['kecamatan'];
  $hasil[$i]['harga'] = $lahan[$i]['harga'];
  $hasil[$i]['luas'] = $lahan[$i]['luas'];
  $hasil[$i]['ketinggian'] = $lahan[$i]['ketinggian'];
  $hasil[$i]['akses'] = $lahan[$i]['akses'];
  $hasil[$i]['suhu'] = $lahan[$i]['suhu'];
}


$temp = array();
for ($i=0; $i < count($hasil) ; $i++) { 
  for ($j=0; $j < count($hasil)-1; $j++) { 
    if ($hasil[$j]['net_flow']<$hasil[$j+1]['net_flow']) {
      $temp[0]['net_flow'] = $hasil[$j]['net_flow'];
      $temp[0]['leavingFlow'] = $hasil[$j]['leavingFlow'];
      $temp[0]['enteringFlow'] = $hasil[$j]['enteringFlow'];
      $temp[0]['id_lahan'] = $hasil[$j]['id_lahan'];
      $temp[0]['kecamatan'] = $hasil[$j]['kecamatan'];
      $temp[0]['harga'] = $hasil[$j]['harga'];
      $temp[0]['luas'] = $hasil[$j]['luas'];
      $temp[0]['ketinggian'] = $hasil[$j]['ketinggian'];
      $temp[0]['akses'] = $hasil[$j]['akses'];
      $temp[0]['suhu'] = $hasil[$j]['suhu'];

      $hasil[$j]['net_flow'] = $hasil[$j+1]['net_flow'];
      $hasil[$j]['leavingFlow'] = $hasil[$j+1]['leavingFlow'];
      $hasil[$j]['enteringFlow'] = $hasil[$j+1]['enteringFlow'];
      $hasil[$j]['id_lahan'] = $hasil[$j+1]['id_lahan'];
      $hasil[$j]['kecamatan'] = $hasil[$j+1]['kecamatan'];
      $hasil[$j]['harga'] = $hasil[$j+1]['harga'];
      $hasil[$j]['luas'] = $hasil[$j+1]['luas'];
      $hasil[$j]['ketinggian'] = $hasil[$j+1]['ketinggian'];
      $hasil[$j]['akses'] = $hasil[$j+1]['akses'];
      $hasil[$j]['suhu'] = $hasil[$j+1]['suhu'];

      $hasil[$j+1]['net_flow'] = $temp[0]['net_flow'];
      $hasil[$j+1]['leavingFlow'] = $temp[0]['leavingFlow'];
      $hasil[$j+1]['enteringFlow'] = $temp[0]['enteringFlow'];
      $hasil[$j+1]['id_lahan'] = $temp[0]['id_lahan'];
      $hasil[$j+1]['kecamatan'] = $temp[0]['kecamatan'];
      $hasil[$j+1]['harga'] = $temp[0]['harga'];
      $hasil[$j+1]['luas'] = $temp[0]['luas'];
      $hasil[$j+1]['ketinggian'] = $temp[0]['ketinggian'];
      $hasil[$j+1]['akses'] = $temp[0]['akses'];
      $hasil[$j+1]['suhu'] = $temp[0]['suhu'];
    } 
    
  }
}


} 


$data['selisih']=$d;
$data['preferensi']=$H;
$data['index preferensi']=$ip;
$data['lahan']=$lahan;
$data['net_flow']=$hasil;

$this->load->view('member/saran_lahan',$data);
}
}


?>