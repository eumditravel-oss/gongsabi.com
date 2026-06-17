<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

	public function change_language()
	{
		$language = $this->input->get('language');
		$this->session->set_userdata('SITE_LANGUAGE', $language);

		return_json(array(
			'result' => true
		));
	}

	public function terms($term)
	{
		$terms = $this->load->view('template/'.$term, false, true);

		echo $terms;
	}

    public function board_delete($board_type, $board_seq, $is_mypage = 'N')
    {  
        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type
        );

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_DELETE($this->config->item('site_id'), $board_type, $board_type, $values);

        $redirect = '';

        switch ($board_type) {
        	case 'market':
        		$redirect = '/front/'.( $is_mypage == 'Y' ? 'mypage/' : '' ).'community/market';
        		break;
        	case 'recruit':
        		$redirect = '/front/'.( $is_mypage == 'Y' ? 'mypage/' : '' ).'community/recruit';
        		break;
        	case 'gongsabi':
        		$redirect = '/front/'.( $is_mypage == 'Y' ? 'mypage/' : '' ).'community/gongsabi';
        		break;
            case 'qna':
                $redirect = '/front/'.( $is_mypage == 'Y' ? 'mypage/' : '' ).'customer/qna';
                break;
        }

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '삭제 되었습니다.');
            redirect($redirect);
        }
        else
            redirect($redirect);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */