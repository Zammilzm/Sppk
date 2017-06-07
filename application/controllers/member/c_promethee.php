<?php
session_start();
class C_promethee extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// if ($this->session->userdata('username')=="") {
		// 	redirect('auth');
		// }
		$this->load->helper('text');
		$this->load->model('m_alternatif');
		$this->load->model('m_kecamatan');
		$this->load->model('m_kriteria');
		$this->load->helper('url');
	}
	public function index() {
		$data['alternatif'] = $this->m_alternatif->tampil_lahan();
		$this->load->view('member/daftar_lahan',$data);
	}


	public function hitung_prediksi(){
  //memilih lahan yang sesuai dengan pilihan user 
  $luas = $this->input->post('luas');
  $harga = $this->input->post('harga');
  $ketinggian = $this->input->post('ketinggian');
  $suhu = $this->input->post('suhu');
  $akses = $this->input->post('akses');

  $lahan = $this->m_alternatif->cari_lahan($luas,$harga,$ketinggian,$suhu,$akses);


  //menyimpan nilai kriteria yang dipilih user
		$kriteria = array();
		$k = $this->input->post('Kriteria');
		for ($i=0; $i < count($this->input->post('Kriteria')); $i++) { 
			$kriteria[$i]['kriteria']=$k[$i];
		}

		$dataKriteria = $this->m_kriteria->data_kriteria()->result();

		for ($k=0; $k < count($kriteria) ; $k++) {
			for ($i=0; $i < count($dataKriteria); $i++) { 
				if ($dataKriteria[$i]->kriteria==$kriteria[$k]['kriteria']) {
					$kriteria[$k]['id_kriteria']=$dataKriteria[$i]->id_kriteria;
          $kriteria[$k]['min_max']=$dataKriteria[$i]->min_max;
          $kriteria[$k]['golongan']=$dataKriteria[$i]->golongan;
        }
      }                                             
    }


    $jml_alt= count($lahan);
    $jml_kri= count($kriteria);
        $alternatif = array();
        $d = array();
        $H = array();
        $ip = array();// nilai index preferensi
        $tot_h = array();//total semua kriteria h(hd)
    $net_flow = array();

    if ($jml_kri!==0) {
      
		//array bobot persub kriteria
        for ($i=0; $i < $jml_alt; $i++) {
          $alternatif[$i]['id-lahan'] = $lahan[$i]->id_alternatif; 
          for ($j=0; $j < $jml_kri; $j++) { 
           $alternatif[$i][$kriteria[$j]['kriteria']] = $lahan[$i]->$kriteria[$j]['golongan'];
          }
        }


    //hitung selisih tiap alternatif masing-masing kriteria

    for ($k=0; $k < $jml_kri ; $k++) {
      for ($i=0; $i < $jml_alt; $i++) { 
        for ($j=0; $j < $jml_alt; $j++) { 
          $d[$k][$i][$j] = ($alternatif[$i][$kriteria[$k]['kriteria']]-$alternatif[$j][$kriteria[$k]['kriteria']]);
        }
      }
    }

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
       $net_flow[$i]['leavingFlow'] = 0;
       $net_flow[$i]['enteringFlow'] = 0;
       for ($j=0; $j < $jml_alt ; $j++) { 
           $net_flow[$i]['leavingFlow']+= $ip[$i][$j];
           $net_flow[$i]['enteringFlow'] += $ip[$j][$i];
       }
       $net_flow[$i]['leavingFlow'] = 1/$jml_alt*$net_flow[$i]['leavingFlow'];
       $net_flow[$i]['enteringFlow'] = 1/$jml_alt*$net_flow[$i]['enteringFlow'];
       $net_flow[$i]['net_flow'] = $net_flow[$i]['leavingFlow']-$net_flow[$i]['enteringFlow'];
       $net_flow[$i]['id_lahan'] = $lahan[$i]->id_alternatif;
   }


    for ($i=0; $i <count($net_flow) ; $i++) { 
        for ($k=0; $k <count($lahan) ; $k++) { 
            $net_flow[$i]['kecamatan'] = $lahan[$i]->kecamatan;
            $net_flow[$i]['harga'] = $lahan[$i]->harga;
            $net_flow[$i]['luas'] = $lahan[$i]->luas;
            $net_flow[$i]['ketinggian'] = $lahan[$i]->ketinggian;
            $net_flow[$i]['akses'] = $lahan[$i]->akses;
            $net_flow[$i]['suhu'] = $lahan[$i]->suhu;
        }
    }

    //terurut nilai
   rsort($net_flow);


    } 
    
   $data['selisih']=$d;
   $data['preferensi']=$H;
   $data['index preferensi']=$ip;
   $data['lahan']=$lahan;
   $data['net_flow']=$net_flow;

    $this->load->view('member/saran_lahan',$data);
}
}


?>