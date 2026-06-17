<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        // if ( !$this->session->userdata('ADMIN_SESSION') )
            // redirect('/admin/auth');
    }

    public function gongsabi()
    {
        $data = array();

        $condition = array(
            'keyword' => $this->input->get('keyword')
        );

        $c4                 = ( $this->input->get('c4') ) ? $this->input->get('c4') : '';
        $c9                 = ( $this->input->get('c9') ) ? $this->input->get('c9') : '';
        $c11                = ( $this->input->get('c11') ) ? $this->input->get('c11') : '';
        $c13                = ( $this->input->get('c13') ) ? $this->input->get('c13') : '';
        $keyword            = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page               = $this->input->get('page');

        $condition = array(
            'c4'                => $c4,
            'c9'                => $c9,
            'c11'               => $c11,
            'c13'               => $c13,
            'keyword'           => $keyword,
            'page'              => $page,
            'limit'             => 30,
            'order_by'          => 'ins_datetime'
        );

        $data['condition'] = $condition;

        $data_list = $this->data_model->get_gongsabi_list($condition);
        $data_count = $this->data_model->get_gongsabi_count($condition);

        $data['data_list'] = $data_list;
        $data['data_count'] = $data_count[0]->cnt;

        unset($data['condition']['page']);

        $data['url_query'] = '/admin/data/gongsabi?'.http_build_query($data['condition']);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $data['data_count'];
        // $config['per_page']                 = (int)$this->config->item('paging_limit');
        $config['per_page']                 = 30;
        $config['page_query_string']        = true;
        $config['num_links']                = 5;
        $config['query_string_segment']     = 'page';

        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open']   = '<li class="page-item first">';
        $config['first_tag_close']  = '</li>';
        $config['prev_link']        = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open']    = '<li class="page-item prev">';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['last_link']        = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open']    = '<li class="page-item last">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['anchor_class']     = 'class="page-link"';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = '면적당 공사비';

        $data['condition'] = $condition;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/data/gongsabi/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function gongsabi_delete()
    {
        foreach ($this->input->post('chk') as $key => $seq) {
            $condition = array(
                'seq' => $seq
            );

            $this->data_model->delete_gongsabi($condition);
        }

        redirect('/admin/data/gongsabi');
    }

    public function gongsabi_regist()
    {
        $data = array();

        $condition = array(
            'keyword' => $this->input->get('keyword')
        );

        $data['title'] = '면적당 공사비';

        $data['condition'] = $condition;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/data/gongsabi/regist', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function gongsabi_batch_list2()
    {
        set_time_limit(0); // 실행 시간 무제한
        ini_set('memory_limit', -1); // 메모리 무제한

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_batch_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $_insert = array();

        $dir = $upload_dir;
         
        $handle  = opendir($dir);
         
        $files = array();
         
        // 디렉터리에 포함된 파일을 저장한다.
        while (false !== ($filename = readdir($handle))) {
            if($filename == "." || $filename == ".."){
                continue;
            }
         
            // 파일인 경우만 목록에 추가한다.
            if(is_file($dir . "/" . $filename)){
                $files[] = $filename;
            }
        }
         
        // 핸들 해제 
        closedir($handle);
         
        // 정렬, 역순으로 정렬하려면 rsort 사용
        sort($files);

        $i = 1;

        $_insert = array();
        $_values = array();

        ob_end_clean();

        foreach ($files as $f) {

            $dir = $upload_dir.'/'.$f;

            $full_path = $dir;

            $objPHPExcel = new PHPExcel();
        
            $objPHPExcel = PHPExcel_IOFactory::load($full_path);

            // 시트 선택
            // $objPHPExcel->setActiveSheetIndexByName('Pro #1');
            $objPHPExcel->setActiveSheetIndex(1);

            $sheet = $objPHPExcel->getActiveSheet();

            // 공사명
            $c2 = trim($sheet->getCell('C2')->getFormattedValue());
            // 건물종류
            $c4 = trim($sheet->getCell('C4')->getFormattedValue());
            // 면적
            $c7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
            $d7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
            // 지역
            $c9 = trim($sheet->getCell('C9')->getFormattedValue());
            // 착공연도
            $c11 = trim($sheet->getCell('C11')->getFormattedValue());
            // 구분
            $c13 = trim($sheet->getCell('C13')->getFormattedValue());
            // 등급
            $c15 = trim($sheet->getCell('C15')->getFormattedValue());

            // 공정별
            $_d18_27 = array();
            $_e18_27 = array();
            for ( $i = 18; $i <= 27; $i++ ) {
                $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d18_27 = implode(',', $_d18_27);
            $e18_27 = implode(',', $_e18_27);

            // 공통가설
            $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
            $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

            // 건축
            $_d34_53 = array();
            $_e34_53 = array();
            for ( $i = 34; $i <= 53; $i++ ) {
                $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d34_53 = implode(',', $_d34_53);
            $e34_53 = implode(',', $_e34_53);

            // 토목공종
            $_d57_59 = array();
            $_e57_59 = array();
            for ( $i = 55; $i <= 57; $i++ ) {
                $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d57_59 = implode(',', $_d57_59);
            $e57_59 = implode(',', $_e57_59);

            // 기계공종
            $_d63_88 = array();
            $_e63_88 = array();
            for ( $i = 61; $i <= 86; $i++ ) {
                $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d63_88 = implode(',', $_d63_88);
            $e63_88 = implode(',', $_e63_88);

            // 전기공종
            $_d92_112 = array();
            $_e92_112 = array();
            for ( $i = 90; $i <= 110; $i++ ) {
                $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d92_112 = implode(',', $_d92_112);
            $e92_112 = implode(',', $_e92_112);

            // 통신공종
            $_d116_126 = array();
            $_e116_126 = array();
            for ( $i = 114; $i <= 124; $i++ ) {
                $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d116_126 = implode(',', $_d116_126);
            $e116_126 = implode(',', $_e116_126);

            // 소방공종
            $_d130_139 = array();
            $_e130_139 = array();
            for ( $i = 128; $i <= 137; $i++ ) {
                $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d130_139 = implode(',', $_d130_139);
            $e130_139 = implode(',', $_e130_139);

            // 부대공종
            $_d143_147 = array();
            $_e143_147 = array();
            for ( $i = 141; $i <= 145; $i++ ) {
                $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d143_147 = implode(',', $_d143_147);
            $e143_147 = implode(',', $_e143_147);

            // 조경공종
            $_d151_154 = array();
            $_e151_154 = array();
            for ( $i = 149; $i <= 152; $i++ ) {
                $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
            }

            $d151_154 = implode(',', $_d151_154);
            $e151_154 = implode(',', $_e151_154);

            $values = array(
                'c2' => $c2,
                'c4' => $c4,
                'c7' => $c7,
                'd7' => $d7,
                'c9' => $c9,
                'c11' => $c11,
                'c13' => $c13,
                'c15' => $c15,
                'd18_27' => $d18_27,
                'e18_27' => $e18_27,
                'd31' => $d31,
                'e31' => $e31,
                'd34_53' => $d34_53,
                'e34_53' => $e34_53,
                'd57_59' => $d57_59,
                'e57_59' => $e57_59,
                'd63_88' => $d63_88,
                'e63_88' => $e63_88,
                'd92_112' => $d92_112,
                'e92_112' => $e92_112,
                'd116_126' => $d116_126,
                'e116_126' => $e116_126,
                'd130_139' => $d130_139,
                'e130_139' => $e130_139,
                'd143_147' => $d143_147,
                'e143_147' => $e143_147,
                'd151_154' => $d151_154,
                'e151_154' => $e151_154,
                // 'ins_datetime' => date('Y-m-d H:i:s'),
                // 'ins_user' => ''
            );

            // $seq = $this->data_model->regist_gongsabi($values);

            // 설계가
            $level1_list = array(
                array('I', 'J'),
                array('K', 'L'),
                array('M', 'N'),
                array('O', 'P'),
                array('Q', 'R'),
                array('S', 'T'),
                array('U', 'V'),
                array('W', 'X'),
                array('Y', 'Z'),
                array('AA', 'AB'),
                array('AC', 'AD'),
                array('AE', 'AF'),
                array('AG', 'AH'),
                array('AI', 'AJ'),
                array('AK', 'AL'),
                array('AM', 'AN'),
                array('AO', 'AP'),
                array('AQ', 'AR'),
                array('AS', 'AT'),
                array('AU', 'AV'),
                array('AW', 'AX'),
                array('AY', 'AZ'),
            );

            foreach ($level1_list as $key => $value) {
                $_D = $value[0];
                $_E = $value[1];

                // 공정별
                $_d18_27 = array();
                $_e18_27 = array();
                for ( $i = 18; $i <= 27; $i++ ) {
                    $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d18_27 = implode(',', $_d18_27);
                $e18_27 = implode(',', $_e18_27);

                // 공통가설
                $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                // 건축
                $_d34_53 = array();
                $_e34_53 = array();
                for ( $i = 34; $i <= 53; $i++ ) {
                    $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d34_53 = implode(',', $_d34_53);
                $e34_53 = implode(',', $_e34_53);

                // 토목공종
                $_d57_59 = array();
                $_e57_59 = array();
                for ( $i = 57; $i <= 59; $i++ ) {
                    $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d57_59 = implode(',', $_d57_59);
                $e57_59 = implode(',', $_e57_59);

                // 기계공종
                $_d63_88 = array();
                $_e63_88 = array();
                for ( $i = 63; $i <= 88; $i++ ) {
                    $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d63_88 = implode(',', $_d63_88);
                $e63_88 = implode(',', $_e63_88);

                // 전기공종
                $_d92_112 = array();
                $_e92_112 = array();
                for ( $i = 92; $i <= 112; $i++ ) {
                    $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d92_112 = implode(',', $_d92_112);
                $e92_112 = implode(',', $_e92_112);

                // 통신공종
                $_d116_126 = array();
                $_e116_126 = array();
                for ( $i = 116; $i <= 126; $i++ ) {
                    $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d116_126 = implode(',', $_d116_126);
                $e116_126 = implode(',', $_e116_126);

                // 소방공종
                $_d130_139 = array();
                $_e130_139 = array();
                for ( $i = 130; $i <= 139; $i++ ) {
                    $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d130_139 = implode(',', $_d130_139);
                $e130_139 = implode(',', $_e130_139);

                // 부대공종
                $_d143_147 = array();
                $_e143_147 = array();
                for ( $i = 143; $i <= 147; $i++ ) {
                    $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d143_147 = implode(',', $_d143_147);
                $e143_147 = implode(',', $_e143_147);

                // 조경공종
                $_d151_154 = array();
                $_e151_154 = array();
                for ( $i = 151; $i <= 154; $i++ ) {
                    $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d151_154 = implode(',', $_d151_154);
                $e151_154 = implode(',', $_e151_154);

                $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                $c13 = '설계가';

                $values = array(
                    'c2' => $c2,
                    'c4' => $c4,
                    'c7' => $c7,
                    'd7' => $d7,
                    'c9' => $c9,
                    'c11' => $c11,
                    'c13' => $c13,
                    'c15' => $c15,
                    'd18_27' => $d18_27,
                    'e18_27' => $e18_27,
                    'd31' => $d31,
                    'e31' => $e31,
                    'd34_53' => $d34_53,
                    'e34_53' => $e34_53,
                    'd57_59' => $d57_59,
                    'e57_59' => $e57_59,
                    'd63_88' => $d63_88,
                    'e63_88' => $e63_88,
                    'd92_112' => $d92_112,
                    'e92_112' => $e92_112,
                    'd116_126' => $d116_126,
                    'e116_126' => $e116_126,
                    'd130_139' => $d130_139,
                    'e130_139' => $e130_139,
                    'd143_147' => $d143_147,
                    'e143_147' => $e143_147,
                    'd151_154' => $d151_154,
                    'e151_154' => $e151_154,
                    // 'ins_datetime' => date('Y-m-d H:i:s'),
                    // 'ins_user' => ''
                );

                $_insert[] = array($values);

                $seq = $this->data_model->regist_gongsabi($values);
            }

            // 도급가
            $level2_list = array(
                array('CA', 'CB'),
                array('CC', 'CD'),
                array('CE', 'CF'),
                array('CG', 'CH'),
                array('CI', 'CJ'),
                array('CK', 'CL'),
                array('CM', 'CN'),
                array('CO', 'CP'),
                array('CQ', 'CR'),
                array('CS', 'CT'),
                array('CU', 'CV'),
                array('CW', 'CX'),
                array('CY', 'CZ'),
                array('DA', 'DB'),
                array('DC', 'DD'),
                array('DE', 'DF'),
                array('DG', 'DH'),
                array('DI', 'DJ'),
                array('DK', 'DL'),
                array('DM', 'DN'),
                array('DO', 'DO'),
                array('DQ', 'DR'),
            );

            foreach ($level2_list as $key => $value) {
                $_D = $value[0];
                $_E = $value[1];

                // 공정별
                $_d18_27 = array();
                $_e18_27 = array();
                for ( $i = 18; $i <= 27; $i++ ) {
                    $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d18_27 = implode(',', $_d18_27);
                $e18_27 = implode(',', $_e18_27);

                // 공통가설
                $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                // 건축
                $_d34_53 = array();
                $_e34_53 = array();
                for ( $i = 34; $i <= 53; $i++ ) {
                    $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d34_53 = implode(',', $_d34_53);
                $e34_53 = implode(',', $_e34_53);

                // 토목공종
                $_d57_59 = array();
                $_e57_59 = array();
                for ( $i = 57; $i <= 59; $i++ ) {
                    $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d57_59 = implode(',', $_d57_59);
                $e57_59 = implode(',', $_e57_59);

                // 기계공종
                $_d63_88 = array();
                $_e63_88 = array();
                for ( $i = 63; $i <= 88; $i++ ) {
                    $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d63_88 = implode(',', $_d63_88);
                $e63_88 = implode(',', $_e63_88);

                // 전기공종
                $_d92_112 = array();
                $_e92_112 = array();
                for ( $i = 92; $i <= 112; $i++ ) {
                    $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d92_112 = implode(',', $_d92_112);
                $e92_112 = implode(',', $_e92_112);

                // 통신공종
                $_d116_126 = array();
                $_e116_126 = array();
                for ( $i = 116; $i <= 126; $i++ ) {
                    $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d116_126 = implode(',', $_d116_126);
                $e116_126 = implode(',', $_e116_126);

                // 소방공종
                $_d130_139 = array();
                $_e130_139 = array();
                for ( $i = 130; $i <= 139; $i++ ) {
                    $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d130_139 = implode(',', $_d130_139);
                $e130_139 = implode(',', $_e130_139);

                // 부대공종
                $_d143_147 = array();
                $_e143_147 = array();
                for ( $i = 143; $i <= 147; $i++ ) {
                    $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d143_147 = implode(',', $_d143_147);
                $e143_147 = implode(',', $_e143_147);

                // 조경공종
                $_d151_154 = array();
                $_e151_154 = array();
                for ( $i = 151; $i <= 154; $i++ ) {
                    $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d151_154 = implode(',', $_d151_154);
                $e151_154 = implode(',', $_e151_154);

                $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                $c13 = '도급가';

                $values = array(
                    'c2' => $c2,
                    'c4' => $c4,
                    'c7' => $c7,
                    'd7' => $d7,
                    'c9' => $c9,
                    'c11' => $c11,
                    'c13' => $c13,
                    'c15' => $c15,
                    'd18_27' => $d18_27,
                    'e18_27' => $e18_27,
                    'd31' => $d31,
                    'e31' => $e31,
                    'd34_53' => $d34_53,
                    'e34_53' => $e34_53,
                    'd57_59' => $d57_59,
                    'e57_59' => $e57_59,
                    'd63_88' => $d63_88,
                    'e63_88' => $e63_88,
                    'd92_112' => $d92_112,
                    'e92_112' => $e92_112,
                    'd116_126' => $d116_126,
                    'e116_126' => $e116_126,
                    'd130_139' => $d130_139,
                    'e130_139' => $e130_139,
                    'd143_147' => $d143_147,
                    'e143_147' => $e143_147,
                    'd151_154' => $d151_154,
                    'e151_154' => $e151_154,
                    // 'ins_datetime' => date('Y-m-d H:i:s'),
                    // 'ins_user' => ''
                );

                $_insert[] = array($values);

                $seq = $this->data_model->regist_gongsabi($values);
            }

            // 실행가
            $level3_list = array(
                array('ES', 'ET'),
                array('EU', 'EV'),
                array('EW', 'EX'),
                array('EY', 'EZ'),
                array('FA', 'FB'),
                array('FC', 'FD'),
                array('FE', 'FF'),
                array('FG', 'FH'),
                array('FI', 'FJ'),
                array('FK', 'FL'),
                array('FM', 'FN'),
                array('FO', 'FP'),
                array('FQ', 'FR'),
                array('FS', 'FT'),
                array('FU', 'FV'),
                array('FW', 'FX'),
                array('FY', 'FZ'),
                array('GA', 'GB'),
                array('GC', 'GD'),
                array('GE', 'GF'),
                array('GG', 'GH'),
                array('GI', 'GJ'),
            );

            foreach ($level3_list as $key => $value) {
                $_D = $value[0];
                $_E = $value[1];

                // 공정별
                $_d18_27 = array();
                $_e18_27 = array();
                for ( $i = 18; $i <= 27; $i++ ) {
                    $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d18_27 = implode(',', $_d18_27);
                $e18_27 = implode(',', $_e18_27);

                // 공통가설
                $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                // 건축
                $_d34_53 = array();
                $_e34_53 = array();
                for ( $i = 34; $i <= 53; $i++ ) {
                    $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d34_53 = implode(',', $_d34_53);
                $e34_53 = implode(',', $_e34_53);

                // 토목공종
                $_d57_59 = array();
                $_e57_59 = array();
                for ( $i = 57; $i <= 59; $i++ ) {
                    $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d57_59 = implode(',', $_d57_59);
                $e57_59 = implode(',', $_e57_59);

                // 기계공종
                $_d63_88 = array();
                $_e63_88 = array();
                for ( $i = 63; $i <= 88; $i++ ) {
                    $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d63_88 = implode(',', $_d63_88);
                $e63_88 = implode(',', $_e63_88);

                // 전기공종
                $_d92_112 = array();
                $_e92_112 = array();
                for ( $i = 92; $i <= 112; $i++ ) {
                    $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d92_112 = implode(',', $_d92_112);
                $e92_112 = implode(',', $_e92_112);

                // 통신공종
                $_d116_126 = array();
                $_e116_126 = array();
                for ( $i = 116; $i <= 126; $i++ ) {
                    $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d116_126 = implode(',', $_d116_126);
                $e116_126 = implode(',', $_e116_126);

                // 소방공종
                $_d130_139 = array();
                $_e130_139 = array();
                for ( $i = 130; $i <= 139; $i++ ) {
                    $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d130_139 = implode(',', $_d130_139);
                $e130_139 = implode(',', $_e130_139);

                // 부대공종
                $_d143_147 = array();
                $_e143_147 = array();
                for ( $i = 143; $i <= 147; $i++ ) {
                    $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d143_147 = implode(',', $_d143_147);
                $e143_147 = implode(',', $_e143_147);

                // 조경공종
                $_d151_154 = array();
                $_e151_154 = array();
                for ( $i = 151; $i <= 154; $i++ ) {
                    $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                    $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                }

                $d151_154 = implode(',', $_d151_154);
                $e151_154 = implode(',', $_e151_154);

                $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                $c13 = '실행가';

                $values = array(
                    'c2' => $c2,
                    'c4' => $c4,
                    'c7' => $c7,
                    'd7' => $d7,
                    'c9' => $c9,
                    'c11' => $c11,
                    'c13' => $c13,
                    'c15' => $c15,
                    'd18_27' => $d18_27,
                    'e18_27' => $e18_27,
                    'd31' => $d31,
                    'e31' => $e31,
                    'd34_53' => $d34_53,
                    'e34_53' => $e34_53,
                    'd57_59' => $d57_59,
                    'e57_59' => $e57_59,
                    'd63_88' => $d63_88,
                    'e63_88' => $e63_88,
                    'd92_112' => $d92_112,
                    'e92_112' => $e92_112,
                    'd116_126' => $d116_126,
                    'e116_126' => $e116_126,
                    'd130_139' => $d130_139,
                    'e130_139' => $e130_139,
                    'd143_147' => $d143_147,
                    'e143_147' => $e143_147,
                    'd151_154' => $d151_154,
                    'e151_154' => $e151_154,
                    // 'ins_datetime' => date('Y-m-d H:i:s'),
                    // 'ins_user' => ''
                );

                $_insert[] = array($values);

                $seq = $this->data_model->regist_gongsabi($values);
            }

            // echo var_dump($_insert);

            // $_values = array();

            // foreach ($_insert as $insert) {

            //     $_fields = array();
            //     foreach ($insert as $fields) {
            //         foreach ($fields as $key => $field) {
            //             $_fields[] = '\''.$field.'\'';
            //         }
            //     }

            //     $_values[] = '('.implode(',', $_fields).')';
            // }

            // $str = implode(',', $_values);

            // echo count($_values);

            // $sql = "INSERT INTO gongsabi_data_gongsabi (c2,c4,c7,d7,c9,c11,c13,c15,d18_27,e18_27,d31,e31,d34_53,e34_53,d57_59,e57_59,d63_88,e63_88,d92_112,e92_112,d116_126,e116_126,d130_139,e130_139,d143_147,e143_147,d151_154,e151_154) VALUES ".$str."";

            // $query = $this->db->query($sql);

            // if ( $query )
                // $result = unlink($full_path);

            unlink($full_path);

            echo $f;
            echo str_repeat(' ', 4096). "\n";
            flush();

        }

        exit;
    }

    public function gongsabi_batch_list()
    {
        set_time_limit(0); // 실행 시간 무제한
        ini_set('memory_limit', -1); // 메모리 무제한

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_batch_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $_insert = array();

        $dir = $upload_dir;
         
        $handle  = opendir($dir);
         
        $files = array();
         
        // 디렉터리에 포함된 파일을 저장한다.
        while (false !== ($filename = readdir($handle))) {
            if($filename == "." || $filename == ".."){
                continue;
            }
         
            // 파일인 경우만 목록에 추가한다.
            if(is_file($dir . "/" . $filename)){
                $files[] = $filename;
            }
        }
         
        // 핸들 해제 
        closedir($handle);
         
        // 정렬, 역순으로 정렬하려면 rsort 사용
        sort($files);

        $i = 1;

        $objPHPExcel = new PHPExcel();

        foreach ($files as $f) {$objPHPExcel = new PHPExcel();
                
            $objPHPExcel = PHPExcel_IOFactory::load($upload_dir.'/'.$f);

            echo $upload_dir.'/'.$f;

            // 시트 선택
            $objPHPExcel->setActiveSheetIndex(1);

            $sheet = $objPHPExcel->getActiveSheet();

            // 공사명
            $c2 = trim($sheet->getCell('C2')->getFormattedValue());
            // 건물종류
            $c4 = trim($sheet->getCell('C4')->getFormattedValue());
            // 연면적
            $c7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
            $d7 = str_replace(',', '', trim($sheet->getCell('D7')->getFormattedValue()));
            // 지역
            $c9 = trim($sheet->getCell('C9')->getFormattedValue());
            // 착공연도
            $c11 = str_replace('년', '', trim($sheet->getCell('C11')->getFormattedValue()));
            // 구분
            $c13 = trim($sheet->getCell('C13')->getFormattedValue());
            $c13_order ='';
            switch ($c13) {
                case '설계가':
                    $c13_order = '1';
                    break;
                case '도급가':
                    $c13_order = '2';
                    break;
                case '실행가':
                    $c13_order = '3';
                    break;
            }
            // 등급
            $c15 = trim($sheet->getCell('C15')->getFormattedValue());

            // 공정
            $_d24_33 = array();
            $_e24_33 = array();
            for ( $i = 24; $i <= 33; $i++ ) {
                $_d24_33[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e24_33[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d24_33 = implode(',', $_d24_33);
            $e24_33 = implode(',', $_e24_33);

            // 공통가설
            $d37 = trim(str_replace(',', '', trim($sheet->getCell('D37')->getFormattedValue())));
            $e37 = trim(str_replace(',', '', trim($sheet->getCell('E37')->getFormattedValue())));

            // 건축
            $_d40_59 = array();
            $_e40_59 = array();
            for ( $i = 40; $i <= 59; $i++ ) {
                $_d40_59[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e40_59[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d40_59 = implode(',', $_d40_59);
            $e40_59 = implode(',', $_e40_59);

            // 토목공종
            $_d63_65 = array();
            $_e63_65 = array();
            for ( $i = 63; $i <= 65; $i++ ) {
                $_d63_65[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e63_65[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d63_65 = implode(',', $_d63_65);
            $e63_65 = implode(',', $_e63_65);

            // 기계공종
            $_d69_94 = array();
            $_e69_94 = array();
            for ( $i = 69; $i <= 94; $i++ ) {
                $_d69_94[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e69_94[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d69_94 = implode(',', $_d69_94);
            $e69_94 = implode(',', $_e69_94);

            // 전기공종
            $_d98_118 = array();
            $_e98_118 = array();
            for ( $i = 98; $i <= 118; $i++ ) {
                $_d98_118[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e98_118[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d98_118 = implode(',', $_d98_118);
            $e98_118 = implode(',', $_e98_118);

            // 통신공종
            $_d122_132 = array();
            $_e122_132 = array();
            for ( $i = 122; $i <= 132; $i++ ) {
                $_d122_132[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e122_132[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d122_132 = implode(',', $_d122_132);
            $e122_132 = implode(',', $_e122_132);

            // 소방공종
            $_d136_145 = array();
            $_e136_145 = array();
            for ( $i = 136; $i <= 145; $i++ ) {
                $_d136_145[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e136_145[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d136_145 = implode(',', $_d136_145);
            $e136_145 = implode(',', $_e136_145);

            // 부대공종
            $_d149_153 = array();
            $_e149_153 = array();
            for ( $i = 149; $i <= 153; $i++ ) {
                $_d149_153[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e149_153[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d149_153 = implode(',', $_d149_153);
            $e149_153 = implode(',', $_e149_153);

            // 조경공종
            $_d157_160 = array();
            $_e157_160 = array();
            for ( $i = 157; $i <= 160; $i++ ) {
                $_d157_160[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                $_e157_160[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
            }

            $d157_160 = implode(',', $_d157_160);
            $e157_160 = implode(',', $_e157_160);

            $values = array(
                'c2' => $c2,
                'c4' => $c4,
                'c7' => $c7,
                'd7' => $d7,
                'c9' => $c9,
                'c11' => $c11,
                'c13' => $c13,
                'c13_order' => $c13_order,
                'c15' => $c15,
                'd24_33' => $d24_33,
                'e24_33' => $e24_33,
                'd37' => $d37,
                'e37' => $e37,
                'd40_59' => $d40_59,
                'e40_59' => $e40_59,
                'd63_65' => $d63_65,
                'e63_65' => $e63_65,
                'd69_94' => $d69_94,
                'e69_94' => $e69_94,
                'd98_118' => $d98_118,
                'e98_118' => $e98_118,
                'd122_132' => $d122_132,
                'e122_132' => $e122_132,
                'd136_145' => $d136_145,
                'e136_145' => $e136_145,
                'd149_153' => $d149_153,
                'e149_153' => $e149_153,
                'd157_160' => $d157_160,
                'e157_160' => $e157_160,
                'ins_datetime' => '2020-12-08 09:00:00',
                'ins_user' => ''
            );

            $seq = $this->data_model->regist_gongsabi($values);
        }
    }

    public function gongsabi_batch_proc($file)
    {
        set_time_limit(0); // 실행 시간 무제한
        ini_set('memory_limit', -1); // 메모리 무제한

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_batch_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $_insert = array();

        $dir = $upload_dir.'/'.$file;

        $full_path = $dir;

        $objPHPExcel = new PHPExcel();
    
        $objPHPExcel = PHPExcel_IOFactory::load($full_path);

        // 시트 선택
        // $objPHPExcel->setActiveSheetIndexByName('Pro #1');
        $objPHPExcel->setActiveSheetIndex(1);

        $sheet = $objPHPExcel->getActiveSheet();

        $table = '<table class="table">';
        for ( $i = 1; $i < 116; $i++ ) { 
            $table .= '<tr>';
            $table .= '<td>'.$sheet->getCell('A'.$i)->getFormattedValue().'</td>';
            $table .= '<td>'.$sheet->getCell('B'.$i)->getFormattedValue().'</td>';
            $table .= '<td>'.$sheet->getCell('C'.$i)->getFormattedValue().'</td>';
            $table .= '<td>'.$sheet->getCell('D'.$i)->getFormattedValue().'</td>';
            $table .= '<td>'.$sheet->getCell('E'.$i)->getFormattedValue().'</td>';
            $table .= '</tr>';
        }
        $table .= '</table>';

        // 공사명
        $c2 = trim($sheet->getCell('C2')->getFormattedValue());
        // 건물종류
        $c4 = trim($sheet->getCell('C4')->getFormattedValue());
        // 면적
        $c7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
        $d7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
        // 지역
        $c9 = trim($sheet->getCell('C9')->getFormattedValue());
        // 착공연도
        $c11 = trim($sheet->getCell('C11')->getFormattedValue());
        // 구분
        $c13 = trim($sheet->getCell('C13')->getFormattedValue());
        // 등급
        $c15 = trim($sheet->getCell('C15')->getFormattedValue());

        // 공정별
        $_d18_27 = array();
        $_e18_27 = array();
        for ( $i = 18; $i <= 27; $i++ ) {
            $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d18_27 = implode(',', $_d18_27);
        $e18_27 = implode(',', $_e18_27);

        // 공통가설
        $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
        $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

        // 건축
        $_d34_53 = array();
        $_e34_53 = array();
        for ( $i = 34; $i <= 53; $i++ ) {
            $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d34_53 = implode(',', $_d34_53);
        $e34_53 = implode(',', $_e34_53);

        // 토목공종
        $_d57_59 = array();
        $_e57_59 = array();
        for ( $i = 55; $i <= 57; $i++ ) {
            $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d57_59 = implode(',', $_d57_59);
        $e57_59 = implode(',', $_e57_59);

        // 기계공종
        $_d63_88 = array();
        $_e63_88 = array();
        for ( $i = 61; $i <= 86; $i++ ) {
            $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d63_88 = implode(',', $_d63_88);
        $e63_88 = implode(',', $_e63_88);

        // 전기공종
        $_d92_112 = array();
        $_e92_112 = array();
        for ( $i = 90; $i <= 110; $i++ ) {
            $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d92_112 = implode(',', $_d92_112);
        $e92_112 = implode(',', $_e92_112);

        // 통신공종
        $_d116_126 = array();
        $_e116_126 = array();
        for ( $i = 114; $i <= 124; $i++ ) {
            $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d116_126 = implode(',', $_d116_126);
        $e116_126 = implode(',', $_e116_126);

        // 소방공종
        $_d130_139 = array();
        $_e130_139 = array();
        for ( $i = 128; $i <= 137; $i++ ) {
            $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d130_139 = implode(',', $_d130_139);
        $e130_139 = implode(',', $_e130_139);

        // 부대공종
        $_d143_147 = array();
        $_e143_147 = array();
        for ( $i = 141; $i <= 145; $i++ ) {
            $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d143_147 = implode(',', $_d143_147);
        $e143_147 = implode(',', $_e143_147);

        // 조경공종
        $_d151_154 = array();
        $_e151_154 = array();
        for ( $i = 149; $i <= 152; $i++ ) {
            $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
            $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
        }

        $d151_154 = implode(',', $_d151_154);
        $e151_154 = implode(',', $_e151_154);

        $values = array(
            'c2' => $c2,
            'c4' => $c4,
            'c7' => $c7,
            'd7' => $d7,
            'c9' => $c9,
            'c11' => $c11,
            'c13' => $c13,
            'c15' => $c15,
            'd18_27' => $d18_27,
            'e18_27' => $e18_27,
            'd31' => $d31,
            'e31' => $e31,
            'd34_53' => $d34_53,
            'e34_53' => $e34_53,
            'd57_59' => $d57_59,
            'e57_59' => $e57_59,
            'd63_88' => $d63_88,
            'e63_88' => $e63_88,
            'd92_112' => $d92_112,
            'e92_112' => $e92_112,
            'd116_126' => $d116_126,
            'e116_126' => $e116_126,
            'd130_139' => $d130_139,
            'e130_139' => $e130_139,
            'd143_147' => $d143_147,
            'e143_147' => $e143_147,
            'd151_154' => $d151_154,
            'e151_154' => $e151_154,
            // 'ins_datetime' => date('Y-m-d H:i:s'),
            // 'ins_user' => ''
        );

        // $seq = $this->data_model->regist_gongsabi($values);

        // 설계가
        $level1_list = array(
            array('I', 'J'),
            array('K', 'L'),
            array('M', 'N'),
            array('O', 'P'),
            array('Q', 'R'),
            array('S', 'T'),
            array('U', 'V'),
            array('W', 'X'),
            array('Y', 'Z'),
            array('AA', 'AB'),
            array('AC', 'AD'),
            array('AE', 'AF'),
            array('AG', 'AH'),
            array('AI', 'AJ'),
            array('AK', 'AL'),
            array('AM', 'AN'),
            array('AO', 'AP'),
            array('AQ', 'AR'),
            array('AS', 'AT'),
            array('AU', 'AV'),
            array('AW', 'AX'),
            array('AY', 'AZ'),
        );

        foreach ($level1_list as $key => $value) {
            $_D = $value[0];
            $_E = $value[1];

            // 공정별
            $_d18_27 = array();
            $_e18_27 = array();
            for ( $i = 18; $i <= 27; $i++ ) {
                $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d18_27 = implode(',', $_d18_27);
            $e18_27 = implode(',', $_e18_27);

            // 공통가설
            $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
            $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

            // 건축
            $_d34_53 = array();
            $_e34_53 = array();
            for ( $i = 34; $i <= 53; $i++ ) {
                $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d34_53 = implode(',', $_d34_53);
            $e34_53 = implode(',', $_e34_53);

            // 토목공종
            $_d57_59 = array();
            $_e57_59 = array();
            for ( $i = 57; $i <= 59; $i++ ) {
                $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d57_59 = implode(',', $_d57_59);
            $e57_59 = implode(',', $_e57_59);

            // 기계공종
            $_d63_88 = array();
            $_e63_88 = array();
            for ( $i = 63; $i <= 88; $i++ ) {
                $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d63_88 = implode(',', $_d63_88);
            $e63_88 = implode(',', $_e63_88);

            // 전기공종
            $_d92_112 = array();
            $_e92_112 = array();
            for ( $i = 92; $i <= 112; $i++ ) {
                $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d92_112 = implode(',', $_d92_112);
            $e92_112 = implode(',', $_e92_112);

            // 통신공종
            $_d116_126 = array();
            $_e116_126 = array();
            for ( $i = 116; $i <= 126; $i++ ) {
                $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d116_126 = implode(',', $_d116_126);
            $e116_126 = implode(',', $_e116_126);

            // 소방공종
            $_d130_139 = array();
            $_e130_139 = array();
            for ( $i = 130; $i <= 139; $i++ ) {
                $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d130_139 = implode(',', $_d130_139);
            $e130_139 = implode(',', $_e130_139);

            // 부대공종
            $_d143_147 = array();
            $_e143_147 = array();
            for ( $i = 143; $i <= 147; $i++ ) {
                $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d143_147 = implode(',', $_d143_147);
            $e143_147 = implode(',', $_e143_147);

            // 조경공종
            $_d151_154 = array();
            $_e151_154 = array();
            for ( $i = 151; $i <= 154; $i++ ) {
                $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d151_154 = implode(',', $_d151_154);
            $e151_154 = implode(',', $_e151_154);

            $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
            $c13 = '설계가';

            $values = array(
                'c2' => $c2,
                'c4' => $c4,
                'c7' => $c7,
                'd7' => $d7,
                'c9' => $c9,
                'c11' => $c11,
                'c13' => $c13,
                'c15' => $c15,
                'd18_27' => $d18_27,
                'e18_27' => $e18_27,
                'd31' => $d31,
                'e31' => $e31,
                'd34_53' => $d34_53,
                'e34_53' => $e34_53,
                'd57_59' => $d57_59,
                'e57_59' => $e57_59,
                'd63_88' => $d63_88,
                'e63_88' => $e63_88,
                'd92_112' => $d92_112,
                'e92_112' => $e92_112,
                'd116_126' => $d116_126,
                'e116_126' => $e116_126,
                'd130_139' => $d130_139,
                'e130_139' => $e130_139,
                'd143_147' => $d143_147,
                'e143_147' => $e143_147,
                'd151_154' => $d151_154,
                'e151_154' => $e151_154,
                // 'ins_datetime' => date('Y-m-d H:i:s'),
                // 'ins_user' => ''
            );

            $_insert[] = array($values);

            // $seq = $this->data_model->regist_gongsabi($values);
        }

        // 도급가
        $level2_list = array(
            array('CA', 'CB'),
            array('CC', 'CD'),
            array('CE', 'CF'),
            array('CG', 'CH'),
            array('CI', 'CJ'),
            array('CK', 'CL'),
            array('CM', 'CN'),
            array('CO', 'CP'),
            array('CQ', 'CR'),
            array('CS', 'CT'),
            array('CU', 'CV'),
            array('CW', 'CX'),
            array('CY', 'CZ'),
            array('DA', 'DB'),
            array('DC', 'DD'),
            array('DE', 'DF'),
            array('DG', 'DH'),
            array('DI', 'DJ'),
            array('DK', 'DL'),
            array('DM', 'DN'),
            array('DO', 'DO'),
            array('DQ', 'DR'),
        );

        foreach ($level2_list as $key => $value) {
            $_D = $value[0];
            $_E = $value[1];

            // 공정별
            $_d18_27 = array();
            $_e18_27 = array();
            for ( $i = 18; $i <= 27; $i++ ) {
                $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d18_27 = implode(',', $_d18_27);
            $e18_27 = implode(',', $_e18_27);

            // 공통가설
            $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
            $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

            // 건축
            $_d34_53 = array();
            $_e34_53 = array();
            for ( $i = 34; $i <= 53; $i++ ) {
                $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d34_53 = implode(',', $_d34_53);
            $e34_53 = implode(',', $_e34_53);

            // 토목공종
            $_d57_59 = array();
            $_e57_59 = array();
            for ( $i = 57; $i <= 59; $i++ ) {
                $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d57_59 = implode(',', $_d57_59);
            $e57_59 = implode(',', $_e57_59);

            // 기계공종
            $_d63_88 = array();
            $_e63_88 = array();
            for ( $i = 63; $i <= 88; $i++ ) {
                $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d63_88 = implode(',', $_d63_88);
            $e63_88 = implode(',', $_e63_88);

            // 전기공종
            $_d92_112 = array();
            $_e92_112 = array();
            for ( $i = 92; $i <= 112; $i++ ) {
                $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d92_112 = implode(',', $_d92_112);
            $e92_112 = implode(',', $_e92_112);

            // 통신공종
            $_d116_126 = array();
            $_e116_126 = array();
            for ( $i = 116; $i <= 126; $i++ ) {
                $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d116_126 = implode(',', $_d116_126);
            $e116_126 = implode(',', $_e116_126);

            // 소방공종
            $_d130_139 = array();
            $_e130_139 = array();
            for ( $i = 130; $i <= 139; $i++ ) {
                $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d130_139 = implode(',', $_d130_139);
            $e130_139 = implode(',', $_e130_139);

            // 부대공종
            $_d143_147 = array();
            $_e143_147 = array();
            for ( $i = 143; $i <= 147; $i++ ) {
                $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d143_147 = implode(',', $_d143_147);
            $e143_147 = implode(',', $_e143_147);

            // 조경공종
            $_d151_154 = array();
            $_e151_154 = array();
            for ( $i = 151; $i <= 154; $i++ ) {
                $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d151_154 = implode(',', $_d151_154);
            $e151_154 = implode(',', $_e151_154);

            $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
            $c13 = '도급가';

            $values = array(
                'c2' => $c2,
                'c4' => $c4,
                'c7' => $c7,
                'd7' => $d7,
                'c9' => $c9,
                'c11' => $c11,
                'c13' => $c13,
                'c15' => $c15,
                'd18_27' => $d18_27,
                'e18_27' => $e18_27,
                'd31' => $d31,
                'e31' => $e31,
                'd34_53' => $d34_53,
                'e34_53' => $e34_53,
                'd57_59' => $d57_59,
                'e57_59' => $e57_59,
                'd63_88' => $d63_88,
                'e63_88' => $e63_88,
                'd92_112' => $d92_112,
                'e92_112' => $e92_112,
                'd116_126' => $d116_126,
                'e116_126' => $e116_126,
                'd130_139' => $d130_139,
                'e130_139' => $e130_139,
                'd143_147' => $d143_147,
                'e143_147' => $e143_147,
                'd151_154' => $d151_154,
                'e151_154' => $e151_154,
                // 'ins_datetime' => date('Y-m-d H:i:s'),
                // 'ins_user' => ''
            );

            $_insert[] = array($values);

            // $seq = $this->data_model->regist_gongsabi($values);
        }

        // 실행가
        $level3_list = array(
            array('ES', 'ET'),
            array('EU', 'EV'),
            array('EW', 'EX'),
            array('EY', 'EZ'),
            array('FA', 'FB'),
            array('FC', 'FD'),
            array('FE', 'FF'),
            array('FG', 'FH'),
            array('FI', 'FJ'),
            array('FK', 'FL'),
            array('FM', 'FN'),
            array('FO', 'FP'),
            array('FQ', 'FR'),
            array('FS', 'FT'),
            array('FU', 'FV'),
            array('FW', 'FX'),
            array('FY', 'FZ'),
            array('GA', 'GB'),
            array('GC', 'GD'),
            array('GE', 'GF'),
            array('GG', 'GH'),
            array('GI', 'GJ'),
        );

        foreach ($level3_list as $key => $value) {
            $_D = $value[0];
            $_E = $value[1];

            // 공정별
            $_d18_27 = array();
            $_e18_27 = array();
            for ( $i = 18; $i <= 27; $i++ ) {
                $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d18_27 = implode(',', $_d18_27);
            $e18_27 = implode(',', $_e18_27);

            // 공통가설
            $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
            $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

            // 건축
            $_d34_53 = array();
            $_e34_53 = array();
            for ( $i = 34; $i <= 53; $i++ ) {
                $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d34_53 = implode(',', $_d34_53);
            $e34_53 = implode(',', $_e34_53);

            // 토목공종
            $_d57_59 = array();
            $_e57_59 = array();
            for ( $i = 57; $i <= 59; $i++ ) {
                $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d57_59 = implode(',', $_d57_59);
            $e57_59 = implode(',', $_e57_59);

            // 기계공종
            $_d63_88 = array();
            $_e63_88 = array();
            for ( $i = 63; $i <= 88; $i++ ) {
                $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d63_88 = implode(',', $_d63_88);
            $e63_88 = implode(',', $_e63_88);

            // 전기공종
            $_d92_112 = array();
            $_e92_112 = array();
            for ( $i = 92; $i <= 112; $i++ ) {
                $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d92_112 = implode(',', $_d92_112);
            $e92_112 = implode(',', $_e92_112);

            // 통신공종
            $_d116_126 = array();
            $_e116_126 = array();
            for ( $i = 116; $i <= 126; $i++ ) {
                $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d116_126 = implode(',', $_d116_126);
            $e116_126 = implode(',', $_e116_126);

            // 소방공종
            $_d130_139 = array();
            $_e130_139 = array();
            for ( $i = 130; $i <= 139; $i++ ) {
                $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d130_139 = implode(',', $_d130_139);
            $e130_139 = implode(',', $_e130_139);

            // 부대공종
            $_d143_147 = array();
            $_e143_147 = array();
            for ( $i = 143; $i <= 147; $i++ ) {
                $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d143_147 = implode(',', $_d143_147);
            $e143_147 = implode(',', $_e143_147);

            // 조경공종
            $_d151_154 = array();
            $_e151_154 = array();
            for ( $i = 151; $i <= 154; $i++ ) {
                $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
            }

            $d151_154 = implode(',', $_d151_154);
            $e151_154 = implode(',', $_e151_154);

            $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
            $c13 = '실행가';

            $values = array(
                'c2' => $c2,
                'c4' => $c4,
                'c7' => $c7,
                'd7' => $d7,
                'c9' => $c9,
                'c11' => $c11,
                'c13' => $c13,
                'c15' => $c15,
                'd18_27' => $d18_27,
                'e18_27' => $e18_27,
                'd31' => $d31,
                'e31' => $e31,
                'd34_53' => $d34_53,
                'e34_53' => $e34_53,
                'd57_59' => $d57_59,
                'e57_59' => $e57_59,
                'd63_88' => $d63_88,
                'e63_88' => $e63_88,
                'd92_112' => $d92_112,
                'e92_112' => $e92_112,
                'd116_126' => $d116_126,
                'e116_126' => $e116_126,
                'd130_139' => $d130_139,
                'e130_139' => $e130_139,
                'd143_147' => $d143_147,
                'e143_147' => $e143_147,
                'd151_154' => $d151_154,
                'e151_154' => $e151_154,
                // 'ins_datetime' => date('Y-m-d H:i:s'),
                // 'ins_user' => ''
            );

            $_insert[] = array($values);

            // $seq = $this->data_model->regist_gongsabi($values);
        }

        $_values = array();

        foreach ($_insert as $insert) {

            $_fields = array();
            foreach ($insert as $fields) {
                foreach ($fields as $key => $field) {
                    $_fields[] = '\''.$field.'\'';
                }
            }

            $_values[] = '('.implode(',', $_fields).')';
        }

        $str = implode(',', $_values);

        $sql = "INSERT INTO gongsabi_data_gongsabi (c2,c4,c7,d7,c9,c11,c13,c15,d18_27,e18_27,d31,e31,d34_53,e34_53,d57_59,e57_59,d63_88,e63_88,d92_112,e92_112,d116_126,e116_126,d130_139,e130_139,d143_147,e143_147,d151_154,e151_154) VALUES ".$str."";

        echo $sql;

        exit;

        $query = $this->db->query($sql);

        if ( $query )
            $result = unlink($full_path);

        if ( $result )
            redirect('/admin/data/gongsabi_batch_list');
    }

    public function gongsabi_batch()
    {
        set_time_limit(0); // 실행 시간 무제한
        ini_set('memory_limit', -1); // 메모리 무제한

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_batch_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $_insert = array();

        for ( $fseq = 2004; $fseq <= 2020; $fseq++ ) { 
            $dir = $upload_dir.'/'.$fseq;
             
            $handle  = opendir($dir);
             
            $files = array();
             
            // 디렉터리에 포함된 파일을 저장한다.
            while (false !== ($filename = readdir($handle))) {
                if($filename == "." || $filename == ".."){
                    continue;
                }
             
                // 파일인 경우만 목록에 추가한다.
                if(is_file($dir . "/" . $filename)){
                    $files[] = $filename;
                }
            }
             
            // 핸들 해제 
            closedir($handle);
             
            // 정렬, 역순으로 정렬하려면 rsort 사용
            sort($files);
             
            // 파일명을 출력한다.
            foreach ($files as $f) {
                echo $dir.'/'.$f;
                echo "<br />";

                $full_path = $dir.'/'.$f;

                $objPHPExcel = new PHPExcel();
            
                $objPHPExcel = PHPExcel_IOFactory::load($full_path);

                // 시트 선택
                // $objPHPExcel->setActiveSheetIndexByName('Pro #1');
                $objPHPExcel->setActiveSheetIndex(1);

                $sheet = $objPHPExcel->getActiveSheet();

                $table = '<table class="table">';
                for ( $i = 1; $i < 116; $i++ ) { 
                    $table .= '<tr>';
                    $table .= '<td>'.$sheet->getCell('A'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('B'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('C'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('D'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('E'.$i)->getFormattedValue().'</td>';
                    $table .= '</tr>';
                }
                $table .= '</table>';

                // 공사명
                $c2 = trim($sheet->getCell('C2')->getFormattedValue());
                // 건물종류
                $c4 = trim($sheet->getCell('C4')->getFormattedValue());
                // 면적
                $c7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
                $d7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
                // 지역
                $c9 = trim($sheet->getCell('C9')->getFormattedValue());
                // 착공연도
                $c11 = trim($sheet->getCell('C11')->getFormattedValue());
                // 구분
                $c13 = trim($sheet->getCell('C13')->getFormattedValue());
                // 등급
                $c15 = trim($sheet->getCell('C15')->getFormattedValue());

                // 공정별
                $_d18_27 = array();
                $_e18_27 = array();
                for ( $i = 18; $i <= 27; $i++ ) {
                    $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d18_27 = implode(',', $_d18_27);
                $e18_27 = implode(',', $_e18_27);

                // 공통가설
                $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                // 건축
                $_d34_53 = array();
                $_e34_53 = array();
                for ( $i = 34; $i <= 53; $i++ ) {
                    $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d34_53 = implode(',', $_d34_53);
                $e34_53 = implode(',', $_e34_53);

                // 토목공종
                $_d57_59 = array();
                $_e57_59 = array();
                for ( $i = 55; $i <= 57; $i++ ) {
                    $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d57_59 = implode(',', $_d57_59);
                $e57_59 = implode(',', $_e57_59);

                // 기계공종
                $_d63_88 = array();
                $_e63_88 = array();
                for ( $i = 61; $i <= 86; $i++ ) {
                    $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d63_88 = implode(',', $_d63_88);
                $e63_88 = implode(',', $_e63_88);

                // 전기공종
                $_d92_112 = array();
                $_e92_112 = array();
                for ( $i = 90; $i <= 110; $i++ ) {
                    $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d92_112 = implode(',', $_d92_112);
                $e92_112 = implode(',', $_e92_112);

                // 통신공종
                $_d116_126 = array();
                $_e116_126 = array();
                for ( $i = 114; $i <= 124; $i++ ) {
                    $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d116_126 = implode(',', $_d116_126);
                $e116_126 = implode(',', $_e116_126);

                // 소방공종
                $_d130_139 = array();
                $_e130_139 = array();
                for ( $i = 128; $i <= 137; $i++ ) {
                    $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d130_139 = implode(',', $_d130_139);
                $e130_139 = implode(',', $_e130_139);

                // 부대공종
                $_d143_147 = array();
                $_e143_147 = array();
                for ( $i = 141; $i <= 145; $i++ ) {
                    $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d143_147 = implode(',', $_d143_147);
                $e143_147 = implode(',', $_e143_147);

                // 조경공종
                $_d151_154 = array();
                $_e151_154 = array();
                for ( $i = 149; $i <= 152; $i++ ) {
                    $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d151_154 = implode(',', $_d151_154);
                $e151_154 = implode(',', $_e151_154);

                $values = array(
                    'c2' => $c2,
                    'c4' => $c4,
                    'c7' => $c7,
                    'd7' => $d7,
                    'c9' => $c9,
                    'c11' => $c11,
                    'c13' => $c13,
                    'c15' => $c15,
                    'd18_27' => $d18_27,
                    'e18_27' => $e18_27,
                    'd31' => $d31,
                    'e31' => $e31,
                    'd34_53' => $d34_53,
                    'e34_53' => $e34_53,
                    'd57_59' => $d57_59,
                    'e57_59' => $e57_59,
                    'd63_88' => $d63_88,
                    'e63_88' => $e63_88,
                    'd92_112' => $d92_112,
                    'e92_112' => $e92_112,
                    'd116_126' => $d116_126,
                    'e116_126' => $e116_126,
                    'd130_139' => $d130_139,
                    'e130_139' => $e130_139,
                    'd143_147' => $d143_147,
                    'e143_147' => $e143_147,
                    'd151_154' => $d151_154,
                    'e151_154' => $e151_154,
                    // 'ins_datetime' => date('Y-m-d H:i:s'),
                    // 'ins_user' => ''
                );

                // $seq = $this->data_model->regist_gongsabi($values);

                // 설계가
                $level1_list = array(
                    array('I', 'J'),
                    array('K', 'L'),
                    array('M', 'N'),
                    array('O', 'P'),
                    array('Q', 'R'),
                    array('S', 'T'),
                    array('U', 'V'),
                    array('W', 'X'),
                    array('Y', 'Z'),
                    array('AA', 'AB'),
                    array('AC', 'AD'),
                    array('AE', 'AF'),
                    array('AG', 'AH'),
                    array('AI', 'AJ'),
                    array('AK', 'AL'),
                    array('AM', 'AN'),
                    array('AO', 'AP'),
                    array('AQ', 'AR'),
                    array('AS', 'AT'),
                    array('AU', 'AV'),
                    array('AW', 'AX'),
                    array('AY', 'AZ'),
                );

                foreach ($level1_list as $key => $value) {
                    $_D = $value[0];
                    $_E = $value[1];

                    // 공정별
                    $_d18_27 = array();
                    $_e18_27 = array();
                    for ( $i = 18; $i <= 27; $i++ ) {
                        $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d18_27 = implode(',', $_d18_27);
                    $e18_27 = implode(',', $_e18_27);

                    // 공통가설
                    $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                    $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                    // 건축
                    $_d34_53 = array();
                    $_e34_53 = array();
                    for ( $i = 34; $i <= 53; $i++ ) {
                        $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d34_53 = implode(',', $_d34_53);
                    $e34_53 = implode(',', $_e34_53);

                    // 토목공종
                    $_d57_59 = array();
                    $_e57_59 = array();
                    for ( $i = 57; $i <= 59; $i++ ) {
                        $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d57_59 = implode(',', $_d57_59);
                    $e57_59 = implode(',', $_e57_59);

                    // 기계공종
                    $_d63_88 = array();
                    $_e63_88 = array();
                    for ( $i = 63; $i <= 88; $i++ ) {
                        $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d63_88 = implode(',', $_d63_88);
                    $e63_88 = implode(',', $_e63_88);

                    // 전기공종
                    $_d92_112 = array();
                    $_e92_112 = array();
                    for ( $i = 92; $i <= 112; $i++ ) {
                        $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d92_112 = implode(',', $_d92_112);
                    $e92_112 = implode(',', $_e92_112);

                    // 통신공종
                    $_d116_126 = array();
                    $_e116_126 = array();
                    for ( $i = 116; $i <= 126; $i++ ) {
                        $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d116_126 = implode(',', $_d116_126);
                    $e116_126 = implode(',', $_e116_126);

                    // 소방공종
                    $_d130_139 = array();
                    $_e130_139 = array();
                    for ( $i = 130; $i <= 139; $i++ ) {
                        $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d130_139 = implode(',', $_d130_139);
                    $e130_139 = implode(',', $_e130_139);

                    // 부대공종
                    $_d143_147 = array();
                    $_e143_147 = array();
                    for ( $i = 143; $i <= 147; $i++ ) {
                        $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d143_147 = implode(',', $_d143_147);
                    $e143_147 = implode(',', $_e143_147);

                    // 조경공종
                    $_d151_154 = array();
                    $_e151_154 = array();
                    for ( $i = 151; $i <= 154; $i++ ) {
                        $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d151_154 = implode(',', $_d151_154);
                    $e151_154 = implode(',', $_e151_154);

                    $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                    $c13 = '설계가';

                    $values = array(
                        'c2' => $c2,
                        'c4' => $c4,
                        'c7' => $c7,
                        'd7' => $d7,
                        'c9' => $c9,
                        'c11' => $c11,
                        'c13' => $c13,
                        'c15' => $c15,
                        'd18_27' => $d18_27,
                        'e18_27' => $e18_27,
                        'd31' => $d31,
                        'e31' => $e31,
                        'd34_53' => $d34_53,
                        'e34_53' => $e34_53,
                        'd57_59' => $d57_59,
                        'e57_59' => $e57_59,
                        'd63_88' => $d63_88,
                        'e63_88' => $e63_88,
                        'd92_112' => $d92_112,
                        'e92_112' => $e92_112,
                        'd116_126' => $d116_126,
                        'e116_126' => $e116_126,
                        'd130_139' => $d130_139,
                        'e130_139' => $e130_139,
                        'd143_147' => $d143_147,
                        'e143_147' => $e143_147,
                        'd151_154' => $d151_154,
                        'e151_154' => $e151_154,
                        // 'ins_datetime' => date('Y-m-d H:i:s'),
                        // 'ins_user' => ''
                    );

                    $_insert[] = array($values);

                    // $seq = $this->data_model->regist_gongsabi($values);
                }

                // 도급가
                $level2_list = array(
                    array('CA', 'CB'),
                    array('CC', 'CD'),
                    array('CE', 'CF'),
                    array('CG', 'CH'),
                    array('CI', 'CJ'),
                    array('CK', 'CL'),
                    array('CM', 'CN'),
                    array('CO', 'CP'),
                    array('CQ', 'CR'),
                    array('CS', 'CT'),
                    array('CU', 'CV'),
                    array('CW', 'CX'),
                    array('CY', 'CZ'),
                    array('DA', 'DB'),
                    array('DC', 'DD'),
                    array('DE', 'DF'),
                    array('DG', 'DH'),
                    array('DI', 'DJ'),
                    array('DK', 'DL'),
                    array('DM', 'DN'),
                    array('DO', 'DO'),
                    array('DQ', 'DR'),
                );

                foreach ($level2_list as $key => $value) {
                    $_D = $value[0];
                    $_E = $value[1];

                    // 공정별
                    $_d18_27 = array();
                    $_e18_27 = array();
                    for ( $i = 18; $i <= 27; $i++ ) {
                        $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d18_27 = implode(',', $_d18_27);
                    $e18_27 = implode(',', $_e18_27);

                    // 공통가설
                    $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                    $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                    // 건축
                    $_d34_53 = array();
                    $_e34_53 = array();
                    for ( $i = 34; $i <= 53; $i++ ) {
                        $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d34_53 = implode(',', $_d34_53);
                    $e34_53 = implode(',', $_e34_53);

                    // 토목공종
                    $_d57_59 = array();
                    $_e57_59 = array();
                    for ( $i = 57; $i <= 59; $i++ ) {
                        $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d57_59 = implode(',', $_d57_59);
                    $e57_59 = implode(',', $_e57_59);

                    // 기계공종
                    $_d63_88 = array();
                    $_e63_88 = array();
                    for ( $i = 63; $i <= 88; $i++ ) {
                        $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d63_88 = implode(',', $_d63_88);
                    $e63_88 = implode(',', $_e63_88);

                    // 전기공종
                    $_d92_112 = array();
                    $_e92_112 = array();
                    for ( $i = 92; $i <= 112; $i++ ) {
                        $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d92_112 = implode(',', $_d92_112);
                    $e92_112 = implode(',', $_e92_112);

                    // 통신공종
                    $_d116_126 = array();
                    $_e116_126 = array();
                    for ( $i = 116; $i <= 126; $i++ ) {
                        $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d116_126 = implode(',', $_d116_126);
                    $e116_126 = implode(',', $_e116_126);

                    // 소방공종
                    $_d130_139 = array();
                    $_e130_139 = array();
                    for ( $i = 130; $i <= 139; $i++ ) {
                        $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d130_139 = implode(',', $_d130_139);
                    $e130_139 = implode(',', $_e130_139);

                    // 부대공종
                    $_d143_147 = array();
                    $_e143_147 = array();
                    for ( $i = 143; $i <= 147; $i++ ) {
                        $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d143_147 = implode(',', $_d143_147);
                    $e143_147 = implode(',', $_e143_147);

                    // 조경공종
                    $_d151_154 = array();
                    $_e151_154 = array();
                    for ( $i = 151; $i <= 154; $i++ ) {
                        $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d151_154 = implode(',', $_d151_154);
                    $e151_154 = implode(',', $_e151_154);

                    $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                    $c13 = '도급가';

                    $values = array(
                        'c2' => $c2,
                        'c4' => $c4,
                        'c7' => $c7,
                        'd7' => $d7,
                        'c9' => $c9,
                        'c11' => $c11,
                        'c13' => $c13,
                        'c15' => $c15,
                        'd18_27' => $d18_27,
                        'e18_27' => $e18_27,
                        'd31' => $d31,
                        'e31' => $e31,
                        'd34_53' => $d34_53,
                        'e34_53' => $e34_53,
                        'd57_59' => $d57_59,
                        'e57_59' => $e57_59,
                        'd63_88' => $d63_88,
                        'e63_88' => $e63_88,
                        'd92_112' => $d92_112,
                        'e92_112' => $e92_112,
                        'd116_126' => $d116_126,
                        'e116_126' => $e116_126,
                        'd130_139' => $d130_139,
                        'e130_139' => $e130_139,
                        'd143_147' => $d143_147,
                        'e143_147' => $e143_147,
                        'd151_154' => $d151_154,
                        'e151_154' => $e151_154,
                        // 'ins_datetime' => date('Y-m-d H:i:s'),
                        // 'ins_user' => ''
                    );

                    $_insert[] = array($values);

                    // $seq = $this->data_model->regist_gongsabi($values);
                }

                // 실행가
                $level3_list = array(
                    array('ES', 'ET'),
                    array('EU', 'EV'),
                    array('EW', 'EX'),
                    array('EY', 'EZ'),
                    array('FA', 'FB'),
                    array('FC', 'FD'),
                    array('FE', 'FF'),
                    array('FG', 'FH'),
                    array('FI', 'FJ'),
                    array('FK', 'FL'),
                    array('FM', 'FN'),
                    array('FO', 'FP'),
                    array('FQ', 'FR'),
                    array('FS', 'FT'),
                    array('FU', 'FV'),
                    array('FW', 'FX'),
                    array('FY', 'FZ'),
                    array('GA', 'GB'),
                    array('GC', 'GD'),
                    array('GE', 'GF'),
                    array('GG', 'GH'),
                    array('GI', 'GJ'),
                );

                foreach ($level3_list as $key => $value) {
                    $_D = $value[0];
                    $_E = $value[1];

                    // 공정별
                    $_d18_27 = array();
                    $_e18_27 = array();
                    for ( $i = 18; $i <= 27; $i++ ) {
                        $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d18_27 = implode(',', $_d18_27);
                    $e18_27 = implode(',', $_e18_27);

                    // 공통가설
                    $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                    $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                    // 건축
                    $_d34_53 = array();
                    $_e34_53 = array();
                    for ( $i = 34; $i <= 53; $i++ ) {
                        $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d34_53 = implode(',', $_d34_53);
                    $e34_53 = implode(',', $_e34_53);

                    // 토목공종
                    $_d57_59 = array();
                    $_e57_59 = array();
                    for ( $i = 57; $i <= 59; $i++ ) {
                        $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d57_59 = implode(',', $_d57_59);
                    $e57_59 = implode(',', $_e57_59);

                    // 기계공종
                    $_d63_88 = array();
                    $_e63_88 = array();
                    for ( $i = 63; $i <= 88; $i++ ) {
                        $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d63_88 = implode(',', $_d63_88);
                    $e63_88 = implode(',', $_e63_88);

                    // 전기공종
                    $_d92_112 = array();
                    $_e92_112 = array();
                    for ( $i = 92; $i <= 112; $i++ ) {
                        $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d92_112 = implode(',', $_d92_112);
                    $e92_112 = implode(',', $_e92_112);

                    // 통신공종
                    $_d116_126 = array();
                    $_e116_126 = array();
                    for ( $i = 116; $i <= 126; $i++ ) {
                        $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d116_126 = implode(',', $_d116_126);
                    $e116_126 = implode(',', $_e116_126);

                    // 소방공종
                    $_d130_139 = array();
                    $_e130_139 = array();
                    for ( $i = 130; $i <= 139; $i++ ) {
                        $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d130_139 = implode(',', $_d130_139);
                    $e130_139 = implode(',', $_e130_139);

                    // 부대공종
                    $_d143_147 = array();
                    $_e143_147 = array();
                    for ( $i = 143; $i <= 147; $i++ ) {
                        $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d143_147 = implode(',', $_d143_147);
                    $e143_147 = implode(',', $_e143_147);

                    // 조경공종
                    $_d151_154 = array();
                    $_e151_154 = array();
                    for ( $i = 151; $i <= 154; $i++ ) {
                        $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d151_154 = implode(',', $_d151_154);
                    $e151_154 = implode(',', $_e151_154);

                    $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                    $c13 = '실행가';

                    $values = array(
                        'c2' => $c2,
                        'c4' => $c4,
                        'c7' => $c7,
                        'd7' => $d7,
                        'c9' => $c9,
                        'c11' => $c11,
                        'c13' => $c13,
                        'c15' => $c15,
                        'd18_27' => $d18_27,
                        'e18_27' => $e18_27,
                        'd31' => $d31,
                        'e31' => $e31,
                        'd34_53' => $d34_53,
                        'e34_53' => $e34_53,
                        'd57_59' => $d57_59,
                        'e57_59' => $e57_59,
                        'd63_88' => $d63_88,
                        'e63_88' => $e63_88,
                        'd92_112' => $d92_112,
                        'e92_112' => $e92_112,
                        'd116_126' => $d116_126,
                        'e116_126' => $e116_126,
                        'd130_139' => $d130_139,
                        'e130_139' => $e130_139,
                        'd143_147' => $d143_147,
                        'e143_147' => $e143_147,
                        'd151_154' => $d151_154,
                        'e151_154' => $e151_154,
                        // 'ins_datetime' => date('Y-m-d H:i:s'),
                        // 'ins_user' => ''
                    );

                    $_insert[] = array($values);

                    // $seq = $this->data_model->regist_gongsabi($values);
                }

                // echo count($_insert);

                // echo $sql;
            } 
        }

        $_values = array();

        foreach ($_insert as $insert) {

            $_fields = array();
            foreach ($insert as $fields) {
                foreach ($fields as $key => $field) {
                    $_fields[] = '\''.$field.'\'';
                }
            }

            $_values[] = '('.implode(',', $_fields).')';
        }

        echo count($_values);
        exit;

        $str = implode(',', $_values);

        $sql = "INSERT INTO gongsabi_data_gongsabi (c2,c4,c7,d7,c9,c11,c13,c15,d18_27,e18_27,d31,e31,d34_53,e34_53,d57_59,e57_59,d63_88,e63_88,d92_112,e92_112,d116_126,e116_126,d130_139,e130_139,d143_147,e143_147,d151_154,e151_154) VALUES ".$str."";

        $query = $this->db->query($sql);
    }

    public function gongsabi_regist_proc_old()
    {

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_file_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['allowed_types']    = 'xls|xlsx';
        $config['encrypt_name']     = TRUE;
        
        $this->load->library('upload', $config);
    
        // 업로드 에러 발생시
        /*
        if ( !$this->upload->do_upload('attach_file_zip') )
        {
            sleep(30);
            $this->config_model->modify_config(array(
                'seq' => '1',
                'status' => '503'
            ));
            exit;
        }
        */
    
        // 업로드 에러 발생시
        for ( $num = 1; $num < 6; $num++ ) { 
            if ( !$this->upload->do_upload('attach_file'.$num) )
            {
                $this->session->set_flashdata('ERROR_MESSAGE', $this->upload->display_errors('', ''));
                redirect('/admin/data/gongsabi_regist');
            }   
            // 업로드 문제 없을시
            else
            {
                $data = array('upload_data' => $this->upload->data());

                $objPHPExcel = new PHPExcel();
                
                $objPHPExcel = PHPExcel_IOFactory::load($data['upload_data']['full_path']);

                // 시트 선택
                // $objPHPExcel->setActiveSheetIndexByName('Pro #1');
                $objPHPExcel->setActiveSheetIndex(1);

                $sheet = $objPHPExcel->getActiveSheet();

                $table = '<table class="table">';
                for ( $i = 1; $i < 116; $i++ ) { 
                    $table .= '<tr>';
                    $table .= '<td>'.$sheet->getCell('A'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('B'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('C'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('D'.$i)->getFormattedValue().'</td>';
                    $table .= '<td>'.$sheet->getCell('E'.$i)->getFormattedValue().'</td>';
                    $table .= '</tr>';
                }
                $table .= '</table>';

                // 공사명
                $c2 = trim($sheet->getCell('C2')->getFormattedValue());
                // 건물종류
                $c4 = trim($sheet->getCell('C4')->getFormattedValue());
                // 면적
                $c7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
                $d7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
                // 지역
                $c9 = trim($sheet->getCell('C9')->getFormattedValue());
                // 착공연도
                $c11 = trim($sheet->getCell('C11')->getFormattedValue());
                // 구분
                $c13 = trim($sheet->getCell('C13')->getFormattedValue());
                // 등급
                $c15 = trim($sheet->getCell('C15')->getFormattedValue());

                // 공정별
                $_d18_27 = array();
                $_e18_27 = array();
                for ( $i = 18; $i <= 27; $i++ ) {
                    $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d18_27 = implode(',', $_d18_27);
                $e18_27 = implode(',', $_e18_27);

                // 공통가설
                $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                // 건축
                $_d34_53 = array();
                $_e34_53 = array();
                for ( $i = 34; $i <= 53; $i++ ) {
                    $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d34_53 = implode(',', $_d34_53);
                $e34_53 = implode(',', $_e34_53);

                // 토목공종
                $_d57_59 = array();
                $_e57_59 = array();
                for ( $i = 55; $i <= 57; $i++ ) {
                    $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d57_59 = implode(',', $_d57_59);
                $e57_59 = implode(',', $_e57_59);

                // 기계공종
                $_d63_88 = array();
                $_e63_88 = array();
                for ( $i = 61; $i <= 86; $i++ ) {
                    $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d63_88 = implode(',', $_d63_88);
                $e63_88 = implode(',', $_e63_88);

                // 전기공종
                $_d92_112 = array();
                $_e92_112 = array();
                for ( $i = 90; $i <= 110; $i++ ) {
                    $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d92_112 = implode(',', $_d92_112);
                $e92_112 = implode(',', $_e92_112);

                // 통신공종
                $_d116_126 = array();
                $_e116_126 = array();
                for ( $i = 114; $i <= 124; $i++ ) {
                    $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d116_126 = implode(',', $_d116_126);
                $e116_126 = implode(',', $_e116_126);

                // 소방공종
                $_d130_139 = array();
                $_e130_139 = array();
                for ( $i = 128; $i <= 137; $i++ ) {
                    $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d130_139 = implode(',', $_d130_139);
                $e130_139 = implode(',', $_e130_139);

                // 부대공종
                $_d143_147 = array();
                $_e143_147 = array();
                for ( $i = 141; $i <= 145; $i++ ) {
                    $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d143_147 = implode(',', $_d143_147);
                $e143_147 = implode(',', $_e143_147);

                // 조경공종
                $_d151_154 = array();
                $_e151_154 = array();
                for ( $i = 149; $i <= 152; $i++ ) {
                    $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue()));
                    $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue()));
                }

                $d151_154 = implode(',', $_d151_154);
                $e151_154 = implode(',', $_e151_154);

                $values = array(
                    'c2' => $c2,
                    'c4' => $c4,
                    'c7' => $c7,
                    'd7' => $d7,
                    'c9' => $c9,
                    'c11' => $c11,
                    'c13' => $c13,
                    'c15' => $c15,
                    'd18_27' => $d18_27,
                    'e18_27' => $e18_27,
                    'd31' => $d31,
                    'e31' => $e31,
                    'd34_53' => $d34_53,
                    'e34_53' => $e34_53,
                    'd57_59' => $d57_59,
                    'e57_59' => $e57_59,
                    'd63_88' => $d63_88,
                    'e63_88' => $e63_88,
                    'd92_112' => $d92_112,
                    'e92_112' => $e92_112,
                    'd116_126' => $d116_126,
                    'e116_126' => $e116_126,
                    'd130_139' => $d130_139,
                    'e130_139' => $e130_139,
                    'd143_147' => $d143_147,
                    'e143_147' => $e143_147,
                    'd151_154' => $d151_154,
                    'e151_154' => $e151_154,
                    // 'ins_datetime' => date('Y-m-d H:i:s'),
                    // 'ins_user' => ''
                );

                // $seq = $this->data_model->regist_gongsabi($values);

                // 설계가
                $level1_list = array(
                    array('I', 'J'),
                    array('K', 'L'),
                    array('M', 'N'),
                    array('O', 'P'),
                    array('Q', 'R'),
                    array('S', 'T'),
                    array('U', 'V'),
                    array('W', 'X'),
                    array('Y', 'Z'),
                    array('AA', 'AB'),
                    array('AC', 'AD'),
                    array('AE', 'AF'),
                    array('AG', 'AH'),
                    array('AI', 'AJ'),
                    array('AK', 'AL'),
                    array('AM', 'AN'),
                    array('AO', 'AP'),
                    array('AQ', 'AR'),
                    array('AS', 'AT'),
                    array('AU', 'AV'),
                    array('AW', 'AX'),
                    array('AY', 'AZ'),
                );

                foreach ($level1_list as $key => $value) {
                    $_D = $value[0];
                    $_E = $value[1];

                    // 공정별
                    $_d18_27 = array();
                    $_e18_27 = array();
                    for ( $i = 18; $i <= 27; $i++ ) {
                        $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d18_27 = implode(',', $_d18_27);
                    $e18_27 = implode(',', $_e18_27);

                    // 공통가설
                    $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                    $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                    // 건축
                    $_d34_53 = array();
                    $_e34_53 = array();
                    for ( $i = 34; $i <= 53; $i++ ) {
                        $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d34_53 = implode(',', $_d34_53);
                    $e34_53 = implode(',', $_e34_53);

                    // 토목공종
                    $_d57_59 = array();
                    $_e57_59 = array();
                    for ( $i = 55; $i <= 57; $i++ ) {
                        $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d57_59 = implode(',', $_d57_59);
                    $e57_59 = implode(',', $_e57_59);

                    // 기계공종
                    $_d63_88 = array();
                    $_e63_88 = array();
                    for ( $i = 61; $i <= 86; $i++ ) {
                        $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d63_88 = implode(',', $_d63_88);
                    $e63_88 = implode(',', $_e63_88);

                    // 전기공종
                    $_d92_112 = array();
                    $_e92_112 = array();
                    for ( $i = 90; $i <= 110; $i++ ) {
                        $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d92_112 = implode(',', $_d92_112);
                    $e92_112 = implode(',', $_e92_112);

                    // 통신공종
                    $_d116_126 = array();
                    $_e116_126 = array();
                    for ( $i = 114; $i <= 124; $i++ ) {
                        $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d116_126 = implode(',', $_d116_126);
                    $e116_126 = implode(',', $_e116_126);

                    // 소방공종
                    $_d130_139 = array();
                    $_e130_139 = array();
                    for ( $i = 128; $i <= 137; $i++ ) {
                        $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d130_139 = implode(',', $_d130_139);
                    $e130_139 = implode(',', $_e130_139);

                    // 부대공종
                    $_d143_147 = array();
                    $_e143_147 = array();
                    for ( $i = 141; $i <= 145; $i++ ) {
                        $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d143_147 = implode(',', $_d143_147);
                    $e143_147 = implode(',', $_e143_147);

                    // 조경공종
                    $_d151_154 = array();
                    $_e151_154 = array();
                    for ( $i = 149; $i <= 152; $i++ ) {
                        $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d151_154 = implode(',', $_d151_154);
                    $e151_154 = implode(',', $_e151_154);

                    $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                    $c13 = '설계가';

                    $values = array(
                        'c2' => $c2,
                        'c4' => $c4,
                        'c7' => $c7,
                        'd7' => $d7,
                        'c9' => $c9,
                        'c11' => $c11,
                        'c13' => $c13,
                        'c13_order' => '1',
                        'c15' => $c15,
                        'd18_27' => $d18_27,
                        'e18_27' => $e18_27,
                        'd31' => $d31,
                        'e31' => $e31,
                        'd34_53' => $d34_53,
                        'e34_53' => $e34_53,
                        'd57_59' => $d57_59,
                        'e57_59' => $e57_59,
                        'd63_88' => $d63_88,
                        'e63_88' => $e63_88,
                        'd92_112' => $d92_112,
                        'e92_112' => $e92_112,
                        'd116_126' => $d116_126,
                        'e116_126' => $e116_126,
                        'd130_139' => $d130_139,
                        'e130_139' => $e130_139,
                        'd143_147' => $d143_147,
                        'e143_147' => $e143_147,
                        'd151_154' => $d151_154,
                        'e151_154' => $e151_154,
                        'ins_datetime' => date('Y-m-d H:i:s'),
                        'ins_user' => $this->session->userdata('ADMIN_MEMBER')['admin_member_id']
                    );

                    $seq = $this->data_model->regist_gongsabi($values);
                }

                // 도급가
                $level2_list = array(
                    array('CA', 'CB'),
                    array('CC', 'CD'),
                    array('CE', 'CF'),
                    array('CG', 'CH'),
                    array('CI', 'CJ'),
                    array('CK', 'CL'),
                    array('CM', 'CN'),
                    array('CO', 'CP'),
                    array('CQ', 'CR'),
                    array('CS', 'CT'),
                    array('CU', 'CV'),
                    array('CW', 'CX'),
                    array('CY', 'CZ'),
                    array('DA', 'DB'),
                    array('DC', 'DD'),
                    array('DE', 'DF'),
                    array('DG', 'DH'),
                    array('DI', 'DJ'),
                    array('DK', 'DL'),
                    array('DM', 'DN'),
                    array('DO', 'DO'),
                    array('DQ', 'DR'),
                );

                foreach ($level2_list as $key => $value) {
                    $_D = $value[0];
                    $_E = $value[1];

                    // 공정별
                    $_d18_27 = array();
                    $_e18_27 = array();
                    for ( $i = 18; $i <= 27; $i++ ) {
                        $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d18_27 = implode(',', $_d18_27);
                    $e18_27 = implode(',', $_e18_27);

                    // 공통가설
                    $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                    $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                    // 건축
                    $_d34_53 = array();
                    $_e34_53 = array();
                    for ( $i = 34; $i <= 53; $i++ ) {
                        $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d34_53 = implode(',', $_d34_53);
                    $e34_53 = implode(',', $_e34_53);

                    // 토목공종
                    $_d57_59 = array();
                    $_e57_59 = array();
                    for ( $i = 55; $i <= 57; $i++ ) {
                        $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d57_59 = implode(',', $_d57_59);
                    $e57_59 = implode(',', $_e57_59);

                    // 기계공종
                    $_d63_88 = array();
                    $_e63_88 = array();
                    for ( $i = 61; $i <= 86; $i++ ) {
                        $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d63_88 = implode(',', $_d63_88);
                    $e63_88 = implode(',', $_e63_88);

                    // 전기공종
                    $_d92_112 = array();
                    $_e92_112 = array();
                    for ( $i = 90; $i <= 110; $i++ ) {
                        $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d92_112 = implode(',', $_d92_112);
                    $e92_112 = implode(',', $_e92_112);

                    // 통신공종
                    $_d116_126 = array();
                    $_e116_126 = array();
                    for ( $i = 114; $i <= 124; $i++ ) {
                        $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d116_126 = implode(',', $_d116_126);
                    $e116_126 = implode(',', $_e116_126);

                    // 소방공종
                    $_d130_139 = array();
                    $_e130_139 = array();
                    for ( $i = 128; $i <= 137; $i++ ) {
                        $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d130_139 = implode(',', $_d130_139);
                    $e130_139 = implode(',', $_e130_139);

                    // 부대공종
                    $_d143_147 = array();
                    $_e143_147 = array();
                    for ( $i = 141; $i <= 145; $i++ ) {
                        $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d143_147 = implode(',', $_d143_147);
                    $e143_147 = implode(',', $_e143_147);

                    // 조경공종
                    $_d151_154 = array();
                    $_e151_154 = array();
                    for ( $i = 149; $i <= 152; $i++ ) {
                        $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d151_154 = implode(',', $_d151_154);
                    $e151_154 = implode(',', $_e151_154);

                    $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                    $c13 = '도급가';

                    $values = array(
                        'c2' => $c2,
                        'c4' => $c4,
                        'c7' => $c7,
                        'd7' => $d7,
                        'c9' => $c9,
                        'c11' => $c11,
                        'c13' => $c13,
                        'c13_order' => '2',
                        'c15' => $c15,
                        'd18_27' => $d18_27,
                        'e18_27' => $e18_27,
                        'd31' => $d31,
                        'e31' => $e31,
                        'd34_53' => $d34_53,
                        'e34_53' => $e34_53,
                        'd57_59' => $d57_59,
                        'e57_59' => $e57_59,
                        'd63_88' => $d63_88,
                        'e63_88' => $e63_88,
                        'd92_112' => $d92_112,
                        'e92_112' => $e92_112,
                        'd116_126' => $d116_126,
                        'e116_126' => $e116_126,
                        'd130_139' => $d130_139,
                        'e130_139' => $e130_139,
                        'd143_147' => $d143_147,
                        'e143_147' => $e143_147,
                        'd151_154' => $d151_154,
                        'e151_154' => $e151_154,
                        'ins_datetime' => date('Y-m-d H:i:s'),
                        'ins_user' => $this->session->userdata('ADMIN_MEMBER')['admin_member_id']
                    );

                    $seq = $this->data_model->regist_gongsabi($values);
                }

                // 실행가
                $level3_list = array(
                    array('ES', 'ET'),
                    array('EU', 'EV'),
                    array('EW', 'EX'),
                    array('EY', 'EZ'),
                    array('FA', 'FB'),
                    array('FC', 'FD'),
                    array('FE', 'FF'),
                    array('FG', 'FH'),
                    array('FI', 'FJ'),
                    array('FK', 'FL'),
                    array('FM', 'FN'),
                    array('FO', 'FP'),
                    array('FQ', 'FR'),
                    array('FS', 'FT'),
                    array('FU', 'FV'),
                    array('FW', 'FX'),
                    array('FY', 'FZ'),
                    array('GA', 'GB'),
                    array('GC', 'GD'),
                    array('GE', 'GF'),
                    array('GG', 'GH'),
                    array('GI', 'GJ'),
                );

                foreach ($level3_list as $key => $value) {
                    $_D = $value[0];
                    $_E = $value[1];

                    // 공정별
                    $_d18_27 = array();
                    $_e18_27 = array();
                    for ( $i = 18; $i <= 27; $i++ ) {
                        $_d18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e18_27[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d18_27 = implode(',', $_d18_27);
                    $e18_27 = implode(',', $_e18_27);

                    // 공통가설
                    $d31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('D31')->getFormattedValue()));
                    $e31 = trim($sheet->getCell('C31')->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell('E31')->getFormattedValue()));

                    // 건축
                    $_d34_53 = array();
                    $_e34_53 = array();
                    for ( $i = 34; $i <= 53; $i++ ) {
                        $_d34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e34_53[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d34_53 = implode(',', $_d34_53);
                    $e34_53 = implode(',', $_e34_53);

                    // 토목공종
                    $_d57_59 = array();
                    $_e57_59 = array();
                    for ( $i = 55; $i <= 57; $i++ ) {
                        $_d57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e57_59[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d57_59 = implode(',', $_d57_59);
                    $e57_59 = implode(',', $_e57_59);

                    // 기계공종
                    $_d63_88 = array();
                    $_e63_88 = array();
                    for ( $i = 61; $i <= 86; $i++ ) {
                        $_d63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e63_88[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d63_88 = implode(',', $_d63_88);
                    $e63_88 = implode(',', $_e63_88);

                    // 전기공종
                    $_d92_112 = array();
                    $_e92_112 = array();
                    for ( $i = 90; $i <= 110; $i++ ) {
                        $_d92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e92_112[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d92_112 = implode(',', $_d92_112);
                    $e92_112 = implode(',', $_e92_112);

                    // 통신공종
                    $_d116_126 = array();
                    $_e116_126 = array();
                    for ( $i = 114; $i <= 124; $i++ ) {
                        $_d116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e116_126[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d116_126 = implode(',', $_d116_126);
                    $e116_126 = implode(',', $_e116_126);

                    // 소방공종
                    $_d130_139 = array();
                    $_e130_139 = array();
                    for ( $i = 128; $i <= 137; $i++ ) {
                        $_d130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e130_139[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d130_139 = implode(',', $_d130_139);
                    $e130_139 = implode(',', $_e130_139);

                    // 부대공종
                    $_d143_147 = array();
                    $_e143_147 = array();
                    for ( $i = 141; $i <= 145; $i++ ) {
                        $_d143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e143_147[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d143_147 = implode(',', $_d143_147);
                    $e143_147 = implode(',', $_e143_147);

                    // 조경공종
                    $_d151_154 = array();
                    $_e151_154 = array();
                    for ( $i = 149; $i <= 152; $i++ ) {
                        $_d151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_D.$i)->getFormattedValue()));
                        $_e151_154[] = trim($sheet->getCell('C'.$i)->getFormattedValue()).'|'.str_replace(',', '', trim($sheet->getCell($_E.$i)->getFormattedValue()));
                    }

                    $d151_154 = implode(',', $_d151_154);
                    $e151_154 = implode(',', $_e151_154);

                    $c11 = str_replace(' ', '', trim($sheet->getCell($_D.'16')->getFormattedValue()));
                    $c13 = '실행가';

                    $values = array(
                        'c2' => $c2,
                        'c4' => $c4,
                        'c7' => $c7,
                        'd7' => $d7,
                        'c9' => $c9,
                        'c11' => $c11,
                        'c13' => $c13,
                        'c13_order' => '3',
                        'c15' => $c15,
                        'd18_27' => $d18_27,
                        'e18_27' => $e18_27,
                        'd31' => $d31,
                        'e31' => $e31,
                        'd34_53' => $d34_53,
                        'e34_53' => $e34_53,
                        'd57_59' => $d57_59,
                        'e57_59' => $e57_59,
                        'd63_88' => $d63_88,
                        'e63_88' => $e63_88,
                        'd92_112' => $d92_112,
                        'e92_112' => $e92_112,
                        'd116_126' => $d116_126,
                        'e116_126' => $e116_126,
                        'd130_139' => $d130_139,
                        'e130_139' => $e130_139,
                        'd143_147' => $d143_147,
                        'e143_147' => $e143_147,
                        'd151_154' => $d151_154,
                        'e151_154' => $e151_154,
                        'ins_datetime' => date('Y-m-d H:i:s'),
                        'ins_user' => $this->session->userdata('ADMIN_MEMBER')['admin_member_id']
                    );

                    $seq = $this->data_model->regist_gongsabi($values);
                }
            }

            echo $num.'<br>';
        }

        $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
        redirect('/admin/data/gongsabi_regist');
    }

    public function gongsabi_regist_proc()
    {

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_file_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['allowed_types']    = 'xls|xlsx';
        $config['encrypt_name']     = TRUE;
        
        $this->load->library('upload', $config);
    
        // 업로드 에러 발생시
        for ( $num = 1; $num < 6; $num++ ) { 
            if ( !$this->upload->do_upload('attach_file'.$num) )
            {
                $this->session->set_flashdata('ERROR_MESSAGE', $this->upload->display_errors('', ''));
                redirect('/admin/data/gongsabi_regist');
            }   
            // 업로드 문제 없을시
            else
            {
                $data = array('upload_data' => $this->upload->data());

                $objPHPExcel = new PHPExcel();
                
                $objPHPExcel = PHPExcel_IOFactory::load($data['upload_data']['full_path']);

                // 시트 선택
                $objPHPExcel->setActiveSheetIndex(1);

                $sheet = $objPHPExcel->getActiveSheet();

                // 공사명
                $c2 = trim($sheet->getCell('C2')->getFormattedValue());
                // 건물종류
                $c4 = trim($sheet->getCell('C4')->getFormattedValue());
                // 연면적
                $c7 = str_replace(',', '', trim($sheet->getCell('C7')->getFormattedValue()));
                $d7 = str_replace(',', '', trim($sheet->getCell('D7')->getFormattedValue()));
                // 지역
                $c9 = trim($sheet->getCell('C9')->getFormattedValue());
                // 착공연도
                $c11 = str_replace('년', '', trim($sheet->getCell('C11')->getFormattedValue()));
                // 구분
                $c13 = trim($sheet->getCell('C13')->getFormattedValue());
                $c13_order ='';
                switch ($c13) {
                    case '설계가':
                        $c13_order = '1';
                        break;
                    case '도급가':
                        $c13_order = '2';
                        break;
                    case '실행가':
                        $c13_order = '3';
                        break;
                }
                // 등급
                $c15 = trim($sheet->getCell('C15')->getFormattedValue());

                // 공정
                $_d24_33 = array();
                $_e24_33 = array();
                for ( $i = 24; $i <= 33; $i++ ) {
                    $_d24_33[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e24_33[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d24_33 = implode(',', $_d24_33);
                $e24_33 = implode(',', $_e24_33);

                // 공통가설
                $d37 = trim(str_replace(',', '', trim($sheet->getCell('D37')->getFormattedValue())));
                $e37 = trim(str_replace(',', '', trim($sheet->getCell('E37')->getFormattedValue())));

                // 건축
                $_d40_59 = array();
                $_e40_59 = array();
                for ( $i = 40; $i <= 59; $i++ ) {
                    $_d40_59[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e40_59[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d40_59 = implode(',', $_d40_59);
                $e40_59 = implode(',', $_e40_59);

                // 토목공종
                $_d63_65 = array();
                $_e63_65 = array();
                for ( $i = 63; $i <= 65; $i++ ) {
                    $_d63_65[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e63_65[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d63_65 = implode(',', $_d63_65);
                $e63_65 = implode(',', $_e63_65);

                // 기계공종
                $_d69_94 = array();
                $_e69_94 = array();
                for ( $i = 69; $i <= 94; $i++ ) {
                    $_d69_94[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e69_94[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d69_94 = implode(',', $_d69_94);
                $e69_94 = implode(',', $_e69_94);

                // 전기공종
                $_d98_118 = array();
                $_e98_118 = array();
                for ( $i = 98; $i <= 118; $i++ ) {
                    $_d98_118[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e98_118[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d98_118 = implode(',', $_d98_118);
                $e98_118 = implode(',', $_e98_118);

                // 통신공종
                $_d122_132 = array();
                $_e122_132 = array();
                for ( $i = 122; $i <= 132; $i++ ) {
                    $_d122_132[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e122_132[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d122_132 = implode(',', $_d122_132);
                $e122_132 = implode(',', $_e122_132);

                // 소방공종
                $_d136_145 = array();
                $_e136_145 = array();
                for ( $i = 136; $i <= 145; $i++ ) {
                    $_d136_145[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e136_145[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d136_145 = implode(',', $_d136_145);
                $e136_145 = implode(',', $_e136_145);

                // 부대공종
                $_d149_153 = array();
                $_e149_153 = array();
                for ( $i = 149; $i <= 153; $i++ ) {
                    $_d149_153[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e149_153[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d149_153 = implode(',', $_d149_153);
                $e149_153 = implode(',', $_e149_153);

                // 조경공종
                $_d157_160 = array();
                $_e157_160 = array();
                for ( $i = 157; $i <= 160; $i++ ) {
                    $_d157_160[] = trim(str_replace(',', '', trim($sheet->getCell('D'.$i)->getFormattedValue())));
                    $_e157_160[] = trim(str_replace(',', '', trim($sheet->getCell('E'.$i)->getFormattedValue())));
                }

                $d157_160 = implode(',', $_d157_160);
                $e157_160 = implode(',', $_e157_160);

                $values = array(
                    'c2' => $c2,
                    'c4' => $c4,
                    'c7' => $c7,
                    'd7' => $d7,
                    'c9' => $c9,
                    'c11' => $c11,
                    'c13' => $c13,
                    'c13_order' => $c13_order,
                    'c15' => $c15,
                    'd24_33' => $d24_33,
                    'e24_33' => $e24_33,
                    'd37' => $d37,
                    'e37' => $e37,
                    'd40_59' => $d40_59,
                    'e40_59' => $e40_59,
                    'd63_65' => $d63_65,
                    'e63_65' => $e63_65,
                    'd69_94' => $d69_94,
                    'e69_94' => $e69_94,
                    'd98_118' => $d98_118,
                    'e98_118' => $e98_118,
                    'd122_132' => $d122_132,
                    'e122_132' => $e122_132,
                    'd136_145' => $d136_145,
                    'e136_145' => $e136_145,
                    'd149_153' => $d149_153,
                    'e149_153' => $e149_153,
                    'd157_160' => $d157_160,
                    'e157_160' => $e157_160,
                    // 'ins_datetime' => date('Y-m-d H:i:s'),
                    // 'ins_user' => ''
                );

                $seq = $this->data_model->regist_gongsabi($values);
            }

            echo $num.'<br>';
        }

        $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
        redirect('/admin/data/gongsabi_regist');
    }

    public function danga()
    {
        $data = array();

        $danga_category1    = ( $this->input->get('danga_category1') ) ? $this->input->get('danga_category1') : '';
        $danga_category2    = ( $this->input->get('danga_category2') ) ? $this->input->get('danga_category2') : '';
        $keyword            = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page               = $this->input->get('page');

        $condition = array(
            'danga_category1'   => $danga_category1,
            'danga_category2'   => $danga_category2,
            'keyword'           => $keyword,
            'page'              => $page
        );

        $data['condition'] = $condition;

        $danga_list = $this->data_model->get_danga_list($condition);
        $danga_count = $this->data_model->get_danga_count($condition);

        $data['danga_list'] = $danga_list;
        $data['danga_count'] = $danga_count[0]->cnt;

        unset($data['condition']['page']);

        $data['url_query'] = '/admin/data/danga?'.http_build_query($data['condition']);

        $data['title'] = '공사 단가';

        $data['condition'] = $condition;

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $data['danga_count'];
        $config['per_page']                 = (int)$this->config->item('paging_limit');
        $config['page_query_string']        = true;
        $config['num_links']                = 5;
        $config['query_string_segment']     = 'page';

        $config['full_tag_open']    = '<ul class="pagination pagination-rounded justify-content-end my-2">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = '<<';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['prev_link']        = '<';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['last_link']        = '>>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['anchor_class']     = 'class="page-link"';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/_common/header');
        $this->load->view('admin/data/danga/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function goljo()
    {
        $data = array();

        $condition = array(
            'keyword' => $this->input->get('keyword')
        );

        $data['title'] = '골조 면적별 수량';

        $data['condition'] = $condition;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/data/goljo/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function goljo_regist_proc()
    {
        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('goljo_data_file_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['allowed_types']    = 'xls|xlsx';
        $config['encrypt_name']     = TRUE;
        
        $this->load->library('upload', $config);
    
        // 업로드 에러 발생시
        if ( !$this->upload->do_upload('attach_file') )
        {
            $this->session->set_flashdata('ERROR_MESSAGE', $this->upload->display_errors('', ''));
            redirect('/admin/data/goljo_regist');
        }   
        // 업로드 문제 없을시
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $objPHPExcel = new PHPExcel();
            
            $objPHPExcel = PHPExcel_IOFactory::load($data['upload_data']['full_path']);

            // 시트 선택
            $objPHPExcel->setActiveSheetIndexByName('Pro #1');
            // $objPHPExcel->setActiveSheetIndex(1);

            $sheet = $objPHPExcel->getActiveSheet();

            $table = '<table class="table">';
            for ( $i = 1; $i < 116; $i++ ) { 
                $table .= '<tr>';
                $table .= '<td>'.$sheet->getCell('A'.$i)->getFormattedValue().'</td>';
                $table .= '<td>'.$sheet->getCell('B'.$i)->getFormattedValue().'</td>';
                $table .= '<td>'.$sheet->getCell('C'.$i)->getFormattedValue().'</td>';
                $table .= '<td>'.$sheet->getCell('D'.$i)->getFormattedValue().'</td>';
                $table .= '<td>'.$sheet->getCell('E'.$i)->getFormattedValue().'</td>';
                $table .= '</tr>';
            }
            $table .= '</table>';

            $data['title'] = '면적당 공사비';

            $data['table'] = $table;

            $this->load->view('admin/_common/header');
            $this->load->view('admin/data/goljo/view', $data);
            $this->load->view('admin/_common/footer');  
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */