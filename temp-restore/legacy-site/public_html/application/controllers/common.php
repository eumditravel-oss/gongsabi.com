<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

	public function download($type, $seq, $idx)
	{
		$path = '';

	    switch ( $type ) {
	        case 'gongsabi':
	            $path = $this->config->item('gongsabi_data_gongsabi_path');
	            break;
	        case 'market':
	            $path = $this->config->item('gongsabi_data_market_path');
	            break;
	        case 'recruit':
	            $path = $this->config->item('gongsabi_data_recruit_path');
	            break;
	        case 'pds':
	            $path = $this->config->item('gongsabi_data_board_path');
	            break;
	        case 'board':
	            $path = $this->config->item('gongsabi_data_board_path');
	            break;
	        case 'notice':
	            $path = $this->config->item('gongsabi_data_board_path');
	            break;
	    }

	    $_fileinfo = HP_GET_BOARD_LIST('gongsabi', $type, $type, array(
	        'board_seq' => $seq
	    ));

        switch ($idx) {
            case '1':
                $_fileinfo = $_fileinfo['list'][0]->board_attach_1;
                break;
            case '2':
                $_fileinfo = $_fileinfo['list'][0]->board_attach_2;
                break;
            case '3':
                $_fileinfo = $_fileinfo['list'][0]->board_attach_3;
                break;
        }

        $_fileinfo = explode('|', $_fileinfo);

		$filepath = $path.'/'.$_fileinfo[0];

		$data = file_get_contents($filepath);
		$name = iconv('UTF-8', 'CP949', $_fileinfo[1]);

		force_download($name, $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */