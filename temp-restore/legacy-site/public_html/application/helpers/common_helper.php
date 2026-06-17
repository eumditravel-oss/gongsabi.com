<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function HP_ENC_TEXT($text, $is_enc = true)
{
    if ( $text )
    {        
        // 전화번호(휴대폰)
        if ( strpos($text, '-') !== false )
        {
            $_temp = array();
            $_temp_text = explode('-', $text);
            foreach ($_temp_text as $key => $value) {
                if ( count($_temp_text) == ( $key + 1 ) )
                    $_temp[] = '****';
                else
                    $_temp[] = $value; 
            }

            $_text = implode('-', $_temp);
        }
        // 이메일주소
        else if ( strpos($text, '@') !== false )
        {
            $_temp = array();
            $_temp_text = explode('@', $text);
            $_temp[] = mb_substr($_temp_text[0], '0', -2).'**';
            $_temp[] = $_temp_text[1];

            $_text = implode('@', $_temp);
        }
        // 일반 텍스트
        else
        {
            $length = mb_strlen($text, 'UTF-8');
            
            if ( $length >= 4 )
                $_text = mb_substr($text, '0', -2).'**';
            else if ( $length < 4 && $length > 1 )
                $_text = mb_substr($text, '0', -1).'*';
            else
                $_text = $text;
        }

        if ( $is_enc )
            return $_text;
        else
            return $text;
    }
    else
        return $text;
}

// 상품 상태
function HP_GET_COMMON_USE_TEXT($use)
{
    switch ($use) {
        case '10':
            return '<span class="text-warning">미사용</span>';
            break;
        case '80':
            return '<span class="text-danger">삭제</span>';
            break;
        case '90':
            return '<span class="text-success">사용</span>';
            break;
    }   
}

// 상품 상태
function HP_GET_PRODUCT_USE_TEXT($use)
{
    switch ($use) {
        case '10':
            return '<span class="text-warning">미사용</span>';
            break;
        case '80':
            return '<span class="text-danger">삭제</span>';
            break;
        case '90':
            return '<span class="text-success">사용</span>';
            break;
    }   
}

// 상품 승인 상태
function HP_GET_PRODUCT_APPROVAL_TEXT($approval)
{
    switch ($approval) {
        case '10':
            return '<span class="text-warning">승인대기</span>';
            break;
        case '20':
            return '<span class="text-danger">승인보류</span>';
            break;
        case '90':
            return '<span class="text-success">승인</span>';
            break;
    }   
}

// 상품 품절 여부
function HP_GET_PRODUCT_SOLDOUT_TEXT($soldout)
{
    switch ($soldout) {
        case '10':
            return '<span class="text-danger">품절</span>';
            break;
        case '90':
            return '<span class="text-success">품절아님</span>';
            break;
    }   
}

function HP_GET_CATEGORY_INFO($category_seq)
{
    $CI =& get_instance();

    $CI->load->model('category_model');

    $category_info = $CI->category_model->get_category_list(array(
        'category_seq' => $category_seq
    ));    

    if ( count($category_info) > 0 )
    {
        return $category_info[0];
    }
    else
    {
        return false;
    }
}

function HP_GET_PRODUCT_CATEGORY($product_seq, $glue = '<br>')
{
    $CI =& get_instance();

    $CI->load->model('category_model', 'product_model');

    $condition = array(
        'product_seq'   => $product_seq
    );

    $product = $CI->product_model->get_product_list($condition);

    if ( count($product) > 0 )
    {
        $product = $product[0];
        $category = [];
        if ( $product->category1_seq )
            $category[] = HP_GET_CATEGORY_INFO($product->category1_seq)->category_name;
        if ( $product->category2_seq )
            $category[] = HP_GET_CATEGORY_INFO($product->category2_seq)->category_name;
        if ( $product->category3_seq )
            $category[] = HP_GET_CATEGORY_INFO($product->category3_seq)->category_name;

        return implode($glue, $category);
    }
    else
    {
        return '';
    }
}

function HP_GET_BOARD_LIST($site_id, $board_db, $board_type, $condition = false)
{
    $CI =& get_instance();

    $CI->load->model('board_model');

    $board_condition = array(
        'board_db'      => $board_db,
        'board_type'    => $board_type
    );

    if ( is_array($condition) )
    {
        if ( isset($condition['page']) )
            $board_condition['page'] = $condition['page'];
        if ( isset($condition['limit']) )
            $board_condition['limit'] = $condition['limit'];
        if ( isset($condition['keyword']) && $condition['keyword'] != '' )
            $board_condition['keyword'] = $condition['keyword'];
        if ( isset($condition['board_seq']) && $condition['board_seq'] != '' )
            $board_condition['board_seq'] = $condition['board_seq'];
        if ( isset($condition['board_category']) && $condition['board_category'] != '' )
            $board_condition['board_category'] = $condition['board_category'];
        if ( isset($condition['board_etc_10']) && $condition['board_etc_10'] != '' )
            $board_condition['board_etc_10'] = $condition['board_etc_10'];
        if ( isset($condition['ins_user']) && $condition['ins_user'] != '' )
            $board_condition['ins_user'] = $condition['ins_user'];
    }

    $board_list = $CI->board_model->get_board_list($board_condition);
    $board_count = $CI->board_model->get_board_count($board_condition);

    if ( count($board_list) > 0 )
    {
        $count = $board_count[0]->cnt;
        $list = $board_list;

        unset($board_condition['board_db']);
        unset($board_condition['board_type']);
        unset($board_condition['page']);

        switch ( $board_db ) {
            case 'youtube':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            case 'book':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            case 'lecture':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            case 'market':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            case 'recruit':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            case 'gongsabi':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            case 'partners':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            case 'contact':
                $url_query = '/admin/'.$board_db.'?'.http_build_query($board_condition);
                break;
            default:
                $url_query = '/admin/board/'.$board_db.'?'.http_build_query($board_condition);
                break;
        }

        $config['base_url']                 = $url_query;
        $config['total_rows']               = $count;
        $config['per_page']                 = (int)$CI->config->item('paging_limit');
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

        $CI->pagination->initialize($config);

        $pagination = $CI->pagination->create_links();
    }
    else
    {
        $count = 0;
        $list = [];
        $pagination = '';
    }

    return array(
        'count'         => $count,
        'list'          => $list,
        'pagination'    => $pagination
    );
}

function HP_GET_BOARD_REGIST($site_id, $board_db, $board_type, $condition = false)
{
    $CI =& get_instance();

    $CI->load->model('board_model');

    $values = array(
        'board_db'      => $board_db,
        'board_type'    => $board_type,
        'ins_ip'        => $_SERVER['REMOTE_ADDR']
    );

    if ( is_array($condition) )
    {
        if ( isset($condition['board_category']) )
            $values['board_category'] = $condition['board_category'];
        if ( isset($condition['board_name']) )
            $values['board_name'] = $condition['board_name'];
        if ( isset($condition['board_company']) )
            $values['board_company'] = $condition['board_company'];
        if ( isset($condition['board_top_yn']) )
            $values['board_top_yn'] = $condition['board_top_yn'];
        if ( isset($condition['board_secret_yn']) )
            $values['board_secret_yn'] = $condition['board_secret_yn'];
        if ( isset($condition['board_password']) )
            $values['board_password'] = $condition['board_password'];
        if ( isset($condition['board_email']) )
            $values['board_email'] = $condition['board_email'];
        if ( isset($condition['board_phone']) )
            $values['board_phone'] = $condition['board_phone'];
        if ( isset($condition['board_hp']) )
            $values['board_hp'] = $condition['board_hp'];
        if ( isset($condition['board_title']) )
            $values['board_title'] = $condition['board_title'];
        if ( isset($condition['board_content']) )
            $values['board_content'] = $condition['board_content'];
        if ( isset($condition['board_link']) )
            $values['board_link'] = $condition['board_link'];
        if ( isset($condition['board_etc_1']) )
            $values['board_etc_1'] = $condition['board_etc_1'];
        if ( isset($condition['board_etc_2']) )
            $values['board_etc_2'] = $condition['board_etc_2'];
        if ( isset($condition['board_etc_3']) )
            $values['board_etc_3'] = $condition['board_etc_3'];
        if ( isset($condition['board_etc_4']) )
            $values['board_etc_4'] = $condition['board_etc_4'];
        if ( isset($condition['board_etc_5']) )
            $values['board_etc_5'] = $condition['board_etc_5'];
        if ( isset($condition['board_etc_6']) )
            $values['board_etc_6'] = $condition['board_etc_6'];
        if ( isset($condition['board_etc_7']) )
            $values['board_etc_7'] = $condition['board_etc_7'];
        if ( isset($condition['board_etc_8']) )
            $values['board_etc_8'] = $condition['board_etc_8'];
        if ( isset($condition['board_etc_9']) )
            $values['board_etc_9'] = $condition['board_etc_9'];
        if ( isset($condition['board_etc_10']) )
            $values['board_etc_10'] = $condition['board_etc_10'];
        if ( isset($condition['board_image']) )
            $values['board_image'] = $condition['board_image'];
        if ( isset($condition['board_attach_1']) )
            $values['board_attach_1'] = $condition['board_attach_1'];
        if ( isset($condition['board_attach_2']) )
            $values['board_attach_2'] = $condition['board_attach_2'];
        if ( isset($condition['board_attach_3']) )
            $values['board_attach_3'] = $condition['board_attach_3'];
        if ( isset($condition['ins_datetime']) )
            $values['ins_datetime'] = $condition['ins_datetime'];
        else
            $values['ins_datetime'] = date('Y-m-d H:i:s', now());
        if ( isset($condition['ins_user']) )
            $values['ins_user'] = $condition['ins_user'];
    }

    $result = $CI->board_model->regist_board($values);

    return $result;
}

function HP_GET_BOARD_MODIFY($site_id, $board_db, $board_type, $condition = false)
{
    $CI =& get_instance();

    $CI->load->model('board_model');

    $values = array(
        'board_db'      => $board_db,
        'board_type'    => $board_type,
        'upd_datetime'  => date('Y-m-d H:i:s', now()),
        'upd_ip'        => $_SERVER['REMOTE_ADDR']
    );

    if ( is_array($condition) )
    {
        if ( isset($condition['board_seq']) )
            $values['board_seq'] = $condition['board_seq'];
        if ( isset($condition['board_category']) )
            $values['board_category'] = $condition['board_category'];
        if ( isset($condition['board_name']) )
            $values['board_name'] = $condition['board_name'];
        if ( isset($condition['board_company']) )
            $values['board_company'] = $condition['board_company'];
        if ( isset($condition['board_top_yn']) )
            $values['board_top_yn'] = $condition['board_top_yn'];
        if ( isset($condition['board_secret_yn']) )
            $values['board_secret_yn'] = $condition['board_secret_yn'];
        if ( isset($condition['board_password']) )
            $values['board_password'] = $condition['board_password'];
        if ( isset($condition['board_email']) )
            $values['board_email'] = $condition['board_email'];
        if ( isset($condition['board_phone']) )
            $values['board_phone'] = $condition['board_phone'];
        if ( isset($condition['board_hp']) )
            $values['board_hp'] = $condition['board_hp'];
        if ( isset($condition['board_title']) )
            $values['board_title'] = $condition['board_title'];
        if ( isset($condition['board_content']) )
            $values['board_content'] = $condition['board_content'];
        if ( isset($condition['board_reply_yn']) )
            $values['board_reply_yn'] = $condition['board_reply_yn'];
        if ( isset($condition['board_reply_content']) )
            $values['board_reply_content'] = $condition['board_reply_content'];
        if ( isset($condition['board_link']) )
            $values['board_link'] = $condition['board_link'];
        if ( isset($condition['board_etc_1']) )
            $values['board_etc_1'] = $condition['board_etc_1'];
        if ( isset($condition['board_etc_2']) )
            $values['board_etc_2'] = $condition['board_etc_2'];
        if ( isset($condition['board_etc_3']) )
            $values['board_etc_3'] = $condition['board_etc_3'];
        if ( isset($condition['board_etc_4']) )
            $values['board_etc_4'] = $condition['board_etc_4'];
        if ( isset($condition['board_etc_5']) )
            $values['board_etc_5'] = $condition['board_etc_5'];
        if ( isset($condition['board_etc_6']) )
            $values['board_etc_6'] = $condition['board_etc_6'];
        if ( isset($condition['board_etc_7']) )
            $values['board_etc_7'] = $condition['board_etc_7'];
        if ( isset($condition['board_etc_8']) )
            $values['board_etc_8'] = $condition['board_etc_8'];
        if ( isset($condition['board_etc_9']) )
            $values['board_etc_9'] = $condition['board_etc_9'];
        if ( isset($condition['board_etc_10']) )
            $values['board_etc_10'] = $condition['board_etc_10'];
        if ( isset($condition['board_image']) )
            $values['board_image'] = $condition['board_image'];
        if ( isset($condition['board_attach_1']) )
            $values['board_attach_1'] = $condition['board_attach_1'];
        if ( isset($condition['board_attach_2']) )
            $values['board_attach_2'] = $condition['board_attach_2'];
        if ( isset($condition['board_attach_3']) )
            $values['board_attach_3'] = $condition['board_attach_3'];
        if ( isset($condition['upd_datetime']) )
            $values['upd_datetime'] = $condition['upd_datetime'];
        else
            $values['upd_datetime'] = date('Y-m-d H:i:s', now());
        if ( isset($condition['board_reply_yn']) && $condition['board_reply_yn'] == 'Y' )
        {
            if ( isset($condition['reply_datetime']) )
                $values['reply_datetime'] = $condition['reply_datetime'];
            else
                $values['reply_datetime'] = date('Y-m-d H:i:s', now());
        }
    }

    $result = $CI->board_model->modify_board($values);

    return $result;
}

function HP_GET_BOARD_DELETE($site_id, $board_db, $board_type, $condition = false)
{
    $CI =& get_instance();

    $CI->load->model('board_model');

    $values = array(
        'site_id'       => $site_id,
        'board_db'      => $board_db,
        'board_type'    => $board_type,
        'del_datetime'  => date('Y-m-d H:i:s', now()),
        'del_ip'        => $_SERVER['REMOTE_ADDR']
    );

    if ( is_array($condition) )
    {
        if ( isset($condition['board_seq']) )
            $values['board_seq'] = $condition['board_seq'];
    }

    $result = $CI->board_model->delete_board($values);

    return $result;
}

// 전체 카테고리
function HP_GET_ALL_CATEGORY_LIST()
{
	$CI =& get_instance();

    $CI->load->model('category_model');

    $category_list = array();

    $category1_list = $CI->category_model->get_category_list(array(
        'site_id'         => 'zenitnko',
        'category_depth'    => '1',
        'category_parent'   => '0'
    ));

    $c1 = 0;

    if ( count($category1_list) > 0 )
    {       
        foreach ($category1_list as $category1) {
            $category_list[$c1] = array(
                'depth'     => $category1->category_depth,
                'seq'       => $category1->category_seq,
                'name'      => $category1->category_name
            );

            $category2_list = $CI->category_model->get_category_list(array(
                'site_id'         => 'zenitnko',
                'category_depth'    => '2',
                'category_parent'   => $category1->category_seq
            ));

            $c2 = 0;

            if ( count($category2_list) > 0 )
            {
                $category_list[$c1]['child'] = array();

                foreach ($category2_list as $category2) {

                    $category_list[$c1]['child'][$c2] = array(
                        'depth'     => $category2->category_depth,
                        'seq'       => $category2->category_seq,
                        'name'      => $category2->category_name
                    );                            

                    $category3_list = $CI->category_model->get_category_list(array(
                        'site_id'         => 'zenitnko',
                        'category_depth'    => '3',
                        'category_parent'   => $category2->category_seq
                    ));     

                    $c3 = 0;

                    if ( count($category3_list) > 0 )
                    {
                        $category_list[$c1]['child'][$c2]['child'] = array();

                        foreach ($category3_list as $category3) {
                            $category_list[$c1]['child'][$c2]['child'][$c3] = array(
                                'depth'     => $category3->category_depth,
                                'seq'       => $category3->category_seq,
                                'name'      => $category3->category_name
                            );

                            $c3++;
                        }                    
                    }  

                    $c2++;
                }             
            }

            $c1++;
        }
    }

    return $category_list;
}

// 하위 카테고리
function HP_GET_CHILD_CATEGORY_LIST($category_seq)
{
	$CI =& get_instance();

    $CI->load->model('category_model');

    $category_list = array();

    $child_list = $CI->category_model->get_category_list(array(
        'site_id'         => 'zenitnko',
        'category_parent'   => $category_seq
    ));

    if ( count($child_list) > 0 )
    {       
        foreach ($child_list as $child) {
            $category_list[] = array(
                'depth'     => $child->category_depth,
                'seq'       => $child->category_seq,
                'name'      => $child->category_name
            );
        }
    }

    return $category_list;
}

// 카테고리 트리
function HP_GET_CATEGORY_TREE($category_seq, $depth)
{
	$CI =& get_instance();

    $CI->load->model('category_model');

    $category_tree = array();

    if ( $depth == '3' )
    {
		$child_info = $CI->category_model->get_category_list(array(
            'site_id' => 'zenitnko',
		    'category_depth' => '3',
		    'category_seq' => $category_seq
		));

		$child_info = $child_info[0];

		$category_seq = $child_info->category_parent_seq;

		$category_info = $CI->category_model->get_category_list(array(
            'site_id' => 'zenitnko',
		    'category_depth' => '2',
		    'category_seq' => $category_seq
		));

		$category_info = $category_info[0];

		$parent_category = $category_info->category_parent_seq;

		$parent_info = $CI->category_model->get_category_list(array(
            'site_id' => 'zenitnko',
		    'category_depth' => '1',
		    'category_seq' => $parent_category
		));

		$parent_info = $parent_info[0];

		$category_tree[] = array(
    		'seq' => $parent_info->category_seq,
    		'name' => $parent_info->category_name,
    		'depth' => $parent_info->category_depth
    	);

		$category_tree[] = array(
    		'seq' => $category_info->category_seq,
    		'name' => $category_info->category_name,
    		'depth' => $category_info->category_depth
    	);

		$category_tree[] = array(
    		'seq' => $child_info->category_seq,
    		'name' => $child_info->category_name,
    		'depth' => $child_info->category_depth
    	);
    }
    else if ( $depth == '2' )
    {
		$category_info = $CI->category_model->get_category_list(array(
            'site_id' => 'zenitnko',
		    'category_depth' => '2',
		    'category_seq' => $category_seq
		));

		$category_info = $category_info[0];

		$parent_category = $category_info->category_parent_seq;

		$parent_info = $CI->category_model->get_category_list(array(
            'site_id' => 'zenitnko',
		    'category_depth' => '1',
		    'category_seq' => $parent_category
		));

		$parent_info = $parent_info[0];

		$category_tree[] = array(
    		'seq' => $parent_info->category_seq,
    		'name' => $parent_info->category_name,
    		'depth' => $parent_info->category_depth
    	);

		$category_tree[] = array(
    		'seq' => $category_info->category_seq,
    		'name' => $category_info->category_name,
    		'depth' => $category_info->category_depth
    	);
    }
    else if ( $depth == '1' )
    {
		$category_info = $CI->category_model->get_category_list(array(
            'site_id' => 'zenitnko',
		    'category_depth' => '1',
		    'category_parent' => '0',
		    'category_seq' => $category_seq
		));

		$category_tree[] = array(
    		'seq' => $category_info[0]->category_seq,
    		'name' => $category_info[0]->category_name,
    		'depth' => $category_info[0]->category_depth
    	);
    }

    return $category_tree;
}

function GET_AS_STATUS_TEXT($status)
{
    switch ($status) {
        case '1':
            return '<span class="text-warning">A/S요청</span>';
            break;
        case '2':
            return '<span class="text-info">접수</span>';
            break;
        case '3':
            return '<span class="text-info">처리중</span>';
            break;
        case '9':
            return '<span class="text-success">처리완료</span>';
            break;
    }
}

function GET_BANNER_STATUS_TEXT($status)
{
    switch ($status) {
        case '1':
            return '<span class="text-warning">사용안함</span>';
            break;
        case '8':
            return '<span class="text-danger">삭제</span>';
            break;
        case '9':
            return '<span class="text-success">사용중</span>';
            break;
    }
}

// 네이버 이미지 캡차 Open API 예제 - 키 발급
function HP_NAVER_CAPTCHA_KEY()
{
    $CI =& get_instance();

    $client_id = $CI->config->item('naver_client_id');
    $client_secret = $CI->config->item('naver_client_secret');

    $code = '0';
    $url = $CI->config->item('naver_captcha_key_url').$code;
    $is_post = false;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, $is_post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = array();
    $headers[] = 'X-Naver-Client-Id: '.$client_id;
    $headers[] = 'X-Naver-Client-Secret: '.$client_secret;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec ($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // echo 'status_code:'.$status_code.'<br>';
    curl_close ($ch);

    /*
    if($status_code == 200) {
        echo $response;
    } else {
        echo 'Error 내용:'.$response;
    }
    */
    if ( $status_code == 200 )
    {
        $response = json_decode($response);
        return $response->key;
    }
    else
    {
        return false;
    }
}

// 네이버 이미지 캡차 Open API 예제 - 이미지 수신
function HP_NAVER_CAPTCHA_IMAGE()
{
    $CI =& get_instance();

    $client_id = $CI->config->item('naver_client_id');
    $client_secret = $CI->config->item('naver_client_secret');

    $key = HP_NAVER_CAPTCHA_KEY();
    $url = $CI->config->item('naver_captcha_image_url').$key;
    $is_post = false;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, $is_post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = array();
    $headers[] = 'X-Naver-Client-Id: '.$client_id;
    $headers[] = 'X-Naver-Client-Secret: '.$client_secret;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec ($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // echo 'status_code:'.$status_code.'<br>';
    curl_close ($ch);

    if ( $status_code == 200 )
    {
        $fp = fopen('./static/captcha/captcha.jpg', 'w+');
        fwrite($fp, $response);
        fclose($fp);
        return array(
            'key' => $key,
            'image' => '/static/captcha/captcha.jpg?time='.time()
        );
    }
    else
    {
        return array(
            'key' => false
        );
    }
}

// 네이버 이미지 캡차 Open API 예제 - 입력값 검증
function HP_NAVER_CAPTCHA_CHECK($captcha_key, $captcha_input)
{
    $CI =& get_instance();

    $client_id = $CI->config->item('naver_client_id');
    $client_secret = $CI->config->item('naver_client_secret');

    $code = '1';
    $url = $CI->config->item('naver_captcha_key_url').$code.'&key='.$captcha_key.'&value='.$captcha_input;
    $is_post = false;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, $is_post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = array();
    $headers[] = 'X-Naver-Client-Id: '.$client_id;
    $headers[] = 'X-Naver-Client-Secret: '.$client_secret;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec ($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // echo 'status_code:'.$status_code.'<br>';
    curl_close ($ch);

    if ( $status_code == 200 )
    {
        return json_decode($response);
    }
    else
    {
        return json_decode($response);
        /*
        return array(
            'result' => false,
            'resultMessage' => 'CAPTCHA 검증 실패'
        );
        */
    }    
}

// 크롭 썸네일 만들기
function make_cropimage($source_file, $target_file)
{
	$CI =& get_instance();

	$m_w = 310;
	$m_h = 220;

	list($w, $h) = getimagesize($source_file);
	$master_dim = $w >= $h ? 'height' : 'width';

	$config = array(
		'image_library' 	=> 'gd2',
		'source_image' 		=> $source_file,
		'new_image' 		=> $target_file,
		'maintain_ratio' 	=> TRUE,   
		'master_dim' 		=> $master_dim,
		'width' 			=> $m_w,
		'height' 			=> $m_h
	);

	$CI->image_lib->clear();
	$CI->image_lib->initialize($config);

    if ( !$CI->image_lib->resize() ) {
        // echo $CI->image_lib->display_errors();
    }      

	list($w, $h) = getimagesize($target_file);

	// 세로형 이미지
	if ($master_dim == 'width')
		$y_axis = 50;
	// 가로형 이미지
	else if ($master_dim == 'height')
		$y_axis = round(($h - $m_h) / 2);

	$config = array(
		'image_library' 	=> 'gd2',
		'source_image' 		=> $target_file,
		'maintain_ratio' 	=> FALSE,   
		'width' 			=> $m_w,
		'height' 			=> $m_h,
		'y_axis' 			=> $y_axis,
		'x_axis' 			=> round(($w - $m_w) / 2)
	);

	$CI->image_lib->clear();
	$CI->image_lib->initialize($config);

	if ( !$CI->image_lib->crop()) {
	    // echo $CI->image_lib->display_errors();
	}
}

function MAKE_POINT_TEXT($point, $text)
{
    $keywords = explode(' ', $point);

    foreach ($keywords as $keyword) {
        $text = str_replace($keyword, '<span class="point">'.$keyword.'</span>', $text);
    }

    return $text;  
}

function SEND_NOTI($type)
{
    $CI =& get_instance();

    $receiver = '';

    switch ( $type ) {
        // 업무제휴 글 등록시
        case 'contact':
            $receiver = $CI->session->userdata('SITE_CONFIG')->noti_contact_phone1;
            $msg = $CI->config->item('NOTI_MESSAGE')['contact']['message'];
            break;
        // 고객센터 - Q&A 글 등록시
        case 'qna':
            $receiver = $CI->session->userdata('SITE_CONFIG')->noti_qna_phone1;
            $msg = $CI->config->item('NOTI_MESSAGE')['qna']['message'];
            break;
        // 건설장터 - 공사비 작성 의뢰 등록시
        case 'gongsabi':
            $receiver = $CI->session->userdata('SITE_CONFIG')->noti_gongsabi_phone1;
            $msg = $CI->config->item('NOTI_MESSAGE')['gongsabi']['message'];
            break;
        // 교육 - 책 구매요청 등록시
        case 'book':
            $receiver = $CI->session->userdata('SITE_CONFIG')->noti_book_phone1;
            $msg = $CI->config->item('NOTI_MESSAGE')['book']['message'];
            break;
        // 교육 - 강의요청 등록시
        case 'lecture':
            $receiver = $CI->session->userdata('SITE_CONFIG')->noti_lecture_phone1;
            $msg = $CI->config->item('NOTI_MESSAGE')['lecture']['message'];
            break;
    }

    $msg = array(
        'receiver' => $receiver,
        'msg' => $msg
    );

    if ( $CI->config->item('is_test_mode') == FALSE )
        $result = sendMessage($msg);

    /*
    if ( $result )
        echo 'NOTI SEND SUCCESS';
    else
        echo 'NOTI SEND FAIL';
    */
}

// 랜덤 문자열 생성
function GET_RANDOM_PASSWORD($length = 5)
{
    $key = '';
    $keys = array_merge(
        range(0, 9),
        range('a', 'z'),
        range('A', 'Z')
    );

    for ( $i = 0; $i < $length; $i++ ) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function return_json($data)
{
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($data);
}

function GET_GONGSABI_INFO($seq)
{
    $CI =& get_instance();

    $condition = array(
        'seq' => $seq
    );

    $gongsabi_list = $CI->data_model->get_gongsabi_list($condition);
    $gongsabi_count = $CI->data_model->get_gongsabi_count($condition);
    if ( $gongsabi_count[0]->cnt > 0 )
        $gongsabi_info = $gongsabi_list[0];
    else
        $gongsabi_info = false;

    return $gongsabi_info;
}

function MAKE_PRICE($price)
{
    return floor($price / 10) * 10;
}

function MAKE_DATE($date, $format)
{
    $_date = strtotime($date);

    if ( $format == '년월일' )
        return date('Y', $_date).'년 '.date('m', $_date).'월 '.date('d', $_date).'일';
    else
        return date('Y', $_date).'-'.date('m', $_date).'-'.date('d', $_date);
}

function HP_CHECK_FILE_TYPE($file)
{
    $filetype = pathinfo($file);
    switch ($filetype['extension']) {
        case 'jpg':
            return 'image';
            break;
        case 'jpeg':
            return 'image';
            break;
        case 'gif':
            return 'image';
            break;
        case 'png':
            return 'image';
            break;
        case 'bmp':
            return 'image';
            break;
        default:
            return 'file';
            break;
    }
}

function HP_GET_FILEINFO($type, $seq, $idx)
{
    $CI =& get_instance();

    switch ( $type ) {
        case 'gongsabi':
            $path = $CI->config->item('gongsabi_data_gongsabi_path');
            break;
        case 'market':
            $path = $CI->config->item('gongsabi_data_market_path');
            break;
        case 'recruit':
            $path = $CI->config->item('gongsabi_data_recruit_path');
            break;
        case 'pds':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
        case 'board':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
    }

    $_fileinfo = HP_GET_BOARD_LIST('gongsabi', $type, $type, array(
        'board_seq' => $seq
    ));

    return $_fileinfo;
}

function HP_GET_FILE($type, $seq, $idx)
{
    $CI =& get_instance();

    switch ( $type ) {
        case 'gongsabi':
            $path = $CI->config->item('gongsabi_data_gongsabi_path');
            break;
        case 'market':
            $path = $CI->config->item('gongsabi_data_market_path');
            break;
        case 'recruit':
            $path = $CI->config->item('gongsabi_data_recruit_path');
            break;
        case 'pds':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
        case 'notice':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
        case 'board':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
    }

    $_fileinfo = HP_GET_BOARD_LIST('gongsabi', $type, $type, array(
        'board_seq' => $seq
    ));

    if ( $_fileinfo['count'] == 0 ) {
        return ( $this->config->item('SITE_LANGUAGE') == 'ENG' ) ? 'No such file' : '해당 파일 없음';
    } else {
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

        $filetype = HP_CHECK_FILE_TYPE($path.'/'.$_fileinfo[0]);

        if ( $filetype == 'image' ) {
            if ( $type == 'pds' )
                $type = 'board';
            return '<img src="/static/data/'.$type.'/'.$_fileinfo[0].'" class="mb-2">';
        }
        else if ( $filetype == 'file' )
            return GET_FILE_LINK($type, $seq, $idx);
    }
}

function GET_FILE_LINK($type, $seq, $idx = 1)
{
    $CI =& get_instance();

    switch ( $type ) {
        case 'gongsabi':
            $path = $CI->config->item('gongsabi_data_gongsabi_path');
            break;
        case 'market':
            $path = $CI->config->item('gongsabi_data_market_path');
            break;
        case 'recruit':
            $path = $CI->config->item('gongsabi_data_recruit_path');
            break;
        case 'pds':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
        case 'board':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
        case 'notice':
            $path = $CI->config->item('gongsabi_data_board_path');
            break;
    }

    $_fileinfo = HP_GET_BOARD_LIST($CI->config->item('site_id'), $type, $type, array(
        'board_seq' => $seq
    ));

    if ( $_fileinfo['count'] == 0 ) {
        return ( $CI->config->item('SITE_LANGUAGE') == 'ENG' ) ? 'No such file' : '해당 파일 없음';
    } else {
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

        $filetype = HP_CHECK_FILE_TYPE($path.'/'.$_fileinfo[0]);

        $link = '<a href="/common/download/'.$type.'/'.$seq.'/'.$idx.'">'.$_fileinfo[1].'</a>';

        return $link;  
    }  
}