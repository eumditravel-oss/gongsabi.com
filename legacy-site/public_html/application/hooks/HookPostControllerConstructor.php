<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*************************************************************
 * Class HookPostControllerConstructor
 ************************************************************/
class HookPostControllerConstructor {
    protected $CI;

    function init() {
        // 인스턴스화 된 컨트롤러를 불러와 참조시킨다.
        $this->CI =& get_instance();

        $this->load_config();
        // $this->setup_device_view();
    }

    /**************************************************************************************************
     * 환경설정 파일을 로드한다.
     *************************************************************************************************/
    function load_config()
    {
        // 강의 주제 설정
        $lecture_list = $this->CI->lecture_model->get_lecture_list(array(
            'lecture_use' => '1',
            'limit' => 100
        ));

        $_lecture_list = array();

        foreach ($lecture_list as $lecture) {
            $_lecture = array(
                'title' => $lecture->lecture_title,
                'time' => $lecture->lecture_time,
                'desc' => $lecture->lecture_content,
                'title_eng' => $lecture->lecture_title_eng,
                'time_eng' => $lecture->lecture_time_eng,
                'desc_eng' => $lecture->lecture_content_eng,
            );

            $_lecture_list[$lecture->lecture_seq] = $_lecture;
        }

        $this->CI->config->set_item('LECTURE_LIST', $_lecture_list);

        // 사이트 설정
        $config = $this->CI->config_model->get_config_list(array(
            'seq' => '1',
            'limit' => 1
        ));

        $this->CI->session->set_userdata('SITE_CONFIG', $config[0]);

        $is_member = $this->CI->session->userdata('MEMBER_SESSION');

        if ( $is_member )
        {
            $this->CI->session->set_userdata('MEMBER_LEVEL', 2);
        }
        else
        {
            $this->CI->session->set_userdata('MEMBER_LEVEL', 1);
        }

        // 전역 언어 설정
        $language = ( $this->CI->session->userdata('SITE_LANGUAGE') ) ? $this->CI->session->userdata('SITE_LANGUAGE') : 'KOR';
        $this->CI->config->set_item('SITE_LANGUAGE', $language);
    }

    /**************************************************************************************************
     * 현재 접속한 기기정보와, 보기 모드 설정들을 정의한다.
     *************************************************************************************************/
    function setup_device_view()
    {
        // 모바일 접속여부에 따라 device 정보 확인
        $device = $view_mode = $this->CI->agent->is_mobile() ? DEVICE_MOBILE : DEVICE_DESKTOP;

        // 해당 모드로 보기 쿠키가 존재한다면 해당 보기 모드로
        if( get_cookie( COOKIE_VIEWMODE )  && ( get_cookie( COOKIE_VIEWMODE ) == DEVICE_DESKTOP OR get_cookie( COOKIE_VIEWMODE ) == DEVICE_MOBILE) )
        {
            $view_mode = get_cookie(COOKIE_VIEWMODE);
        }

        // 사이트 정보에 저장
        $this->CI->site->device = $device;
        $this->CI->site->view_mode = $view_mode;
    }
}