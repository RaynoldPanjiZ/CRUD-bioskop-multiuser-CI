<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class path extends CI_Controller {
	var $id_akses = null;

	public function __construct()
   {
	  parent::__construct();
	 $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
	 $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	 $this->output->set_header('Pragma: no-cache');
	 $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	 
	  $this->load->library('cfpdf');
	  $this->load->model('m_jadwal');
	  $this->load->model('m_film');
	  $this->load->model('m_tiket');
	 
	  // id_user saat login
	  $this->id_akses = $this->session->userdata('id');
   }

	public function index()
	{
			if ($this->session->userdata('login') == TRUE){
				if (substr($this->id_akses, 0,5) == "Auser") {
					$data['film']= $this->m_film->tampilkan();  
					$isi =  $this->template->display('admin/content/v_film',$data);
					$this->load->view('admin/vutama',$isi);
				} else
				if (substr($this->id_akses, 0,5) == "Cuser") {
					$data['jadwal']= $this->m_jadwal->tampilkan();  
					$isi =  $this->template->display('customer/content/v_jadwal',$data);
					$this->load->view('customer/vutama',$isi);
				}
			} else { redirect('clogin'); }
	}
	

/*	Path ke Halaman	About Us	*/
		public function about()
	{
		if ($this->session->userdata('login') == TRUE){
			if (substr($this->id_akses, 0,5) == "Auser") {
				$about = $this->template->display('about');
				$this->load->view('admin/vutama', $about);
			} else if (substr($this->id_akses, 0,5) == "Cuser") {			
				$about = $this->template->display('about');
				$this->load->view('customer/vutama', $about);
			}
		} else { redirect('clogin'); }
	}


/*	CRUD data Film 	*/	
	   public function data_film()
	{
			if ($this->session->userdata('login') == TRUE){
				if (substr($this->id_akses, 0,5) == "Auser") {
					$data['film']= $this->m_film->tampilkan();    
					$isi =  $this->template->display('admin/content/v_film',$data);
					$this->load->view('admin/vutama',$isi);
				} else
				if (substr($this->id_akses, 0,5) == "Cuser") {
					$data['film']= $this->m_film->tampilkan();    
					$isi =  $this->template->display('customer/content/v_film',$data);
					$this->load->view('customer/vutama',$isi);
				}
			} else { redirect('clogin'); }
	}
			 
	// akses admin	
		 public function tambah_film()
	{
		if ($this->session->userdata('login') == TRUE){
			$data['cari_kode']= $this->m_film->tampil_kode(); 
			$isi =  $this->template->display('admin/content/v_tambah_film',$data);
			$this->load->view('admin/vutama',$isi);
		} else { redirect('clogin'); }
	}
		
	// akses admin	
		public function edit_film()
	{
		if ($this->session->userdata('login') == TRUE){
			$data['film'] = $this->m_film->get_by_id($this->uri->segment(3));
			$isi =  $this->template->display('admin/content/v_tambah_film',$data);
			$this->load->view('admin/vutama',$isi);
		} else { redirect('clogin'); }
	}
	

/*	CRUD data Jadwal	*/	
		public function data_jadwal()
	{
		if ($this->session->userdata('login') == TRUE){
			if (substr($this->id_akses, 0,5) == "Auser") {
				$data['jadwal']= $this->m_jadwal->tampilkan();    
				$isi =  $this->template->display('admin/content/v_jadwal',$data);
				$this->load->view('admin/vutama',$isi);
			} else
			if (substr($this->id_akses, 0,5) == "Cuser") {
				$data['jadwal']= $this->m_jadwal->tampilkan();    
				$isi =  $this->template->display('customer/content/v_jadwal',$data);
				$this->load->view('customer/vutama',$isi);
			}
		} else { redirect('clogin'); }
	}
	
	// akses admin	
		public function tambah_jadwal()
	{
		if ($this->session->userdata('login') == TRUE){
			$data['cari_kode']= $this->m_jadwal->tampil_kode(); 
			$data['data_studio'] = $this->m_jadwal->tampil_studio();    
			$data['film']= $this->m_film->tampilkan();    
			$isi =  $this->template->display('admin/content/v_tambah_jadwal',$data);
			$this->load->view('admin/vutama',$isi);
		} else { redirect('clogin'); }
	}	
		
	// akses admin	
		public function edit_jadwal()
	{
		if ($this->session->userdata('login') == TRUE){
			$data['jadwal'] = $this->m_jadwal->get_by_id($this->uri->segment(3));
			$data['data_studio'] = $this->m_jadwal->tampil_studio();    
			$data['film']= $this->m_film->tampilkan();    
			$isi = $this->template->display('admin/content/v_tambah_jadwal',$data);
			$this->load->view('admin/vutama',$isi);
		} else { redirect('clogin'); }
	}


/*	CRUD data Tiket	*/	// akses customer
	   public function data_tiket()
	{
			if ($this->session->userdata('login') == TRUE){
			$data['data_tiket']= $this->m_tiket->cek_by_user($this->id_akses);    
			$isi =  $this->template->display('customer/content/v_tiket', $data);
			$this->load->view('customer/vutama',$isi);
			} else { redirect('clogin'); }
	}
		public function pesan_tiket()
	{
		if ($this->session->userdata('login') == TRUE){
			$data['cari_kode']= $this->m_tiket->tampil_kode(); 
			$data['data_tiket']= $this->m_tiket->cek_by_user($this->id_akses);    
			$data['data_jadwal'] = $this->m_jadwal->tampilkan();

			// mengambil kd_jadwal dari 3 segmen uri dari /path/ uri jika klik pesan dari v_jadwal customer user
			$data['id_jadwal'] = $this->uri->segment(3); 
			
			$isi =  $this->template->display('customer/content/v_pesan_tiket',$data);
			$this->load->view('customer/vutama',$isi);
		} else { redirect('clogin'); }
	}

		
/*	Reprot Data transaksi tiket	Admin */	
	public function laporan_data_tiket(){	
		if ($this->session->userdata('login') == TRUE){

			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(45);
			$pdf->Cell(100,0,'Laporan Data Penjualan Tiket',0,0);
			$pdf->Ln(12);
			$pdf->SetFont('Arial','',10);
			$pdf->SetFillColor(100,0,0);
			$pdf->SetTextColor(255);
			$pdf->SetDrawColor(0,0,0);
			$header = array('Kode Tiket', 'Kode Jadwal', 'Id User', 'Jumlah Tiket', 'Total Harga Tiket');
			// Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
				$pdf->Cell(20,8,'',0,0);
			$w = array(30, 30, 30, 30, 30);
			for($i=0;$i<count($header);$i++)
				$pdf->Cell($w[$i],8,$header[$i],1,0,'C',true);
			$pdf->Ln();
			// Data
			$fill = false;
			$pdf->SetFillColor(224,235,255);
			$pdf->SetTextColor(0);
			$pdf->SetFont('');
			
			$penjualan = 0;
			foreach ($this->m_tiket->tampilkan() as $row):
				$pdf->Cell(20,6,'',0,0);
				$pdf->Cell($w[0],6,$row->kd_tiket,'LR',0,'C',$fill); 
				$pdf->Cell($w[1],6,$row->kd_jadwal,'LR',0,'C',$fill);
				$pdf->Cell($w[2],6,$row->id_user,'LR',0,'C',$fill);
				$pdf->Cell($w[3],6,$row->jum_tiket,'LR',0,'R',$fill);
				$pdf->Cell($w[4],6,"Rp.".$row->tot_harga,'LR',0,'R',$fill);
				$pdf->Ln();
				$fill = !$fill;
				$penjualan = $penjualan + $row->tot_harga;
			endforeach;
				$pdf->Cell(20,6,'',0,0);
			$pdf->Cell(array_sum($w),0,'','T');
			$pdf->Ln(2);
			$pdf->Cell(140,7,"Total Penjualan : ",0,0,'R');
			$pdf->Cell(30,7,"Rp.".$penjualan,1,0,'R');
			$pdf->Output();
			
		} else { redirect('clogin'); }
	}
}
