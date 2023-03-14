<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS*');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        } elseif($this->session->userdata('level') != 'Murid'){
            redirect('auth/blocked');
        }
        $this->load->model('Transaksi_model', 'transaksi');

        $params = array('server_key' => 'SB-Mid-server-WrnlcKyj1zVCIJ5-XVbS1fkw', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
    }

    public function index()
    {
		$data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $data['title'] = "Transaksi";
		$data['spp'] = $this->db->get('spp')->result_array();
		$data['transaksi'] = $this->transaksi->get_transaksi_user($this->session->userdata('id'));

		$this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
		$this->load->view('checkout_snap', $data);
        $this->load->view('layouts/footer');
    }

    public function token()
    {
		$profile = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();

		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => 350000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => 350000,
		  'quantity' => 1,
		  'name' => "Pembayaran SPP"
		);

		// Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
		  'first_name'    => $profile['name'],
		  'email'         => $profile['email'],
		  'phone'         => $profile['no_telp'],
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'), true);
    	$data = [
			'id_users' => $this->session->userdata('id'),
			'order_id' => $result['order_id'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'transaction_status' => $result['transaction_status'],
			'bank' => $result['va_numbers'][0]['bank'],
			'va_number' => $result['va_numbers'][0]['va_number'],
			'id_spp' => $this->input->post('id_spp'),
			'bulan_bayar' => $this->input->post('bulan_bayar'),
			'pdf_url' => $result['pdf_url'],
			'finish_redirect_url' => $result['finish_redirect_url'],
			'status_code' => $result['status_code'],
		];

		$data_pembayaran = [
			'id_users' => $this->session->userdata('id'),
			'tgl_bayar' => date('Y-m-d'),
			'bulan_bayar' => $this->input->post('bulan_bayar'),
			'id_spp' => $this->input->post('id_spp'),
			'jumlah_bayar' => $result['gross_amount'],
		];

		$this->db->insert('transaksi', $data);
		$this->db->insert('pembayaran', $data_pembayaran);
		$this->session->set_flashdata('transaksi', '<div class="alert alert-success" role="alert">Transaksi berhasil!</div>');
        redirect('snap');
    }
}
