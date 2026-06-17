<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    public function index()
    {
    	$data = array();

        $banner_list = $this->banner_model->get_banner_list(array(
            'area' => 'report'
        ));
        $data['banner_list'] = $banner_list;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['child']['geonchuk'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/report/main_eng', $data);
        else
            $this->load->view('front/report/main', $data);
		$this->load->view('front/_common/new_footer');    	
    }

	public function geonchuk()
	{
    	$data = array();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['child']['geonchuk'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/report/geonchuk_eng', $data);
        else
            $this->load->view('front/report/geonchuk', $data); 
		$this->load->view('front/_common/new_footer'); 
	}

	public function goljo()
	{
    	$data = array();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['child']['goljo'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/report/goljo_eng', $data);
        else
            $this->load->view('front/report/goljo', $data);  
		$this->load->view('front/_common/new_footer'); 
	}

	public function gigan()
	{
    	$data = array();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['child']['gigan'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/report/gigan_eng', $data);
        else
            $this->load->view('front/report/gigan', $data);     
		$this->load->view('front/_common/new_footer'); 
	}

	public function ganjeob()
	{
    	$data = array();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['report']['child']['ganjeob'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/report/ganjeob_eng', $data);
        else
            $this->load->view('front/report/ganjeob', $data);	
		$this->load->view('front/_common/new_footer'); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */