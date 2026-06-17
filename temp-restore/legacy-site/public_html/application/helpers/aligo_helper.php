<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sendMessage($msg){

    $CI =& get_instance();
    
    /**************** 문자전송하기 예제 필독항목 ******************/
    /* 동일내용의 문자내용을 다수에게 동시 전송하실 수 있습니다
    /* 대량전송시에는 반드시 컴마분기하여 1천건씩 설정 후 이용하시기 바랍니다. (1건씩 반복하여 전송하시면 초당 10~20건정도 발송되며 컨텍팅이 지연될 수 있습니다.)
    /* 전화번호별 내용이 각각 다른 문자를 다수에게 보내실 경우에는 send 가 아닌 send_mass(예제:curl_send_mass.html)를 이용하시기 바랍니다.

    /****************** 인증정보 시작 ******************/
    $sms_url        = $CI->config->item('ALIGO')['send_url'];// 전송요청 URL
    $sms['user_id'] = $CI->config->item('ALIGO')['user_id']; // SMS 아이디
    $sms['key']     = $CI->config->item('ALIGO')['key'];//인증키
    $sms['sender']  = $CI->config->item('ALIGO')['sender'];// 발신번호
    /****************** 인증정보 끝 ********************/

    /****************** 필수가 아닌값 초기화 시작 ********************/
    if(empty($msg['destination'])) $msg['destination'] = "";
    if(empty($msg['rdate'])) $msg['rdate'] = "";
    if(empty($msg['rtime'])) $msg['rtime'] = "";
    if(empty($msg['testmode_yn'])) $msg['testmode_yn'] = "";
    $msg['testmode_yn'] = ( $CI->config->item('sms_mode') == 'T' ) ? 'Y' : '';
    if(empty($msg['subject'])) $msg['subject'] = "";
    if(empty($msg['msg_type'])) $msg['msg_type'] = "SMS";
    /****************** 필수가 아닌값 초기화 끝 ********************/
    
    /****************** 전송정보 설정시작 ****************/
    $_POST['msg'] = $msg['msg']; // 메세지 내용 : euc-kr로 치환이 가능한 문자열만 사용하실 수 있습니다. (이모지 사용불가능)
    $_POST['receiver'] = $msg['receiver']; // 수신번호
    $_POST['destination'] = $msg['destination']; //'01111111111|담당자,01111111112|홍길동'; 수신인 %고객명% 치환
    $_POST['rdate'] = $msg['rdate']; // 예약일자 - 20161004 : 2016-10-04일기준
    $_POST['rtime'] = $msg['rtime']; // 예약시간 - 1930 : 오후 7시30분
    $_POST['testmode_yn'] = $msg['testmode_yn']; // Y 인경우 실제문자 전송X , 자동취소(환불) 처리
    $_POST['subject'] = $msg['subject']; //  LMS, MMS 제목 (미입력시 본문중 44Byte 또는 엔터 구분자 첫라인)
    // $_POST['image'] = '/tmp/pic_57f358af08cf7_sms_.jpg'; // MMS 이미지 파일 위치 (저장된 경로)
    $_POST['msg_type'] = $msg['msg_type']; //  SMS, LMS, MMS등 메세지 타입을 지정
    // ※ msg_type 미지정시 글자수/그림유무가 판단되어 자동변환됩니다. 단, 개행문자/특수문자등이 2Byte로 처리되어 SMS 가 LMS로 처리될 가능성이 존재하므로 반드시 msg_type을 지정하여 사용하시기 바랍니다.
    /****************** 전송정보 설정끝 ***************/

    $sms['msg'] = stripslashes($_POST['msg']);
    $sms['receiver'] = $_POST['receiver'];
    $sms['destination'] = $_POST['destination'];
    $sms['rdate'] = $_POST['rdate'];
    $sms['rtime'] = $_POST['rtime'];
    $sms['testmode_yn'] = $_POST['testmode_yn'];
    $sms['title'] = $_POST['subject'];
    $sms['msg_type'] = $_POST['msg_type'];

    // 만일 $_FILES 로 직접 Request POST된 파일을 사용하시는 경우 move_uploaded_file 로 저장 후 저장된 경로를 사용하셔야 합니다.
    if(!empty($_FILES['image']['tmp_name'])) {
        $tmp_filetype = mime_content_type($_FILES['image']['tmp_name']); 
        if($tmp_filetype != 'image/png' && $tmp_filetype != 'image/jpg' && $tmp_filetype != 'image/jpeg') $_POST['image'] = '';
        else {
            $_savePath = "./".uniqid(); // PHP의 권한이 허용된 디렉토리를 지정
            if(move_uploaded_file($_FILES['file']['tmp_name'], $_savePath)) {
                $_POST['image'] = $_savePath;
            }
        }
    }
    // 이미지 전송 설정
    if(!empty($_POST['image'])) {
        if(file_exists($_POST['image'])) {
            $tmpFile = explode('/',$_POST['image']);
            $str_filename = $tmpFile[sizeof($tmpFile)-1];
            $tmp_filetype = mime_content_type($_POST['image']);
            if ((version_compare(PHP_VERSION, '5.5') >= 0)) { // PHP 5.5버전 이상부터 적용
                $sms['image'] = new CURLFile($_POST['image'], $tmp_filetype, $str_filename);
                curl_setopt($oCurl, CURLOPT_SAFE_UPLOAD, true);
            } else {
                $sms['image'] = '@'.$_POST['image'].';filename='.$str_filename. ';type='.$tmp_filetype;
            }
        }
    }
    /*****/
    $host_info = explode("/", $sms_url);
    $port = $host_info[0] == 'https:' ? 443 : 80;

    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_PORT, $port);
    curl_setopt($oCurl, CURLOPT_URL, $sms_url);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sms);
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    $ret = curl_exec($oCurl);
    curl_close($oCurl);

    //echo $ret;
    //$retArr = json_decode($ret); // 결과배열
    //print_r($retArr); // Response 출력 (연동작업시 확인용)
    // return json_decode($ret); 
    $return = json_decode($ret);

    $result = $CI->aligo_model->regist_aligo_log(array(
        'sender'        => $sms['sender'],
        'receiver'      => $sms['receiver'],
        'msg'           => $sms['msg'],
        'testmode_yn'   => ( $sms['testmode_yn'] == 'Y' ) ? 'Y' : 'N',
        'result_code'   => $return->result_code,
        'result_message'=> $return->message,
        'msg_id'        => ( $return->result_code == '1' ) ? $return->msg_id : '',
        'success_cnt'   => ( $return->result_code == '1' ) ? $return->success_cnt : '',
        'error_cnt'     => ( $return->result_code == '1' ) ? $return->error_cnt : '',
        'msg_type'      => ( $return->result_code == '1' ) ? $return->msg_type : '',
        'ins_datetime'  => date('Y-m-d H:i:s', time())
    ));

    return $result;
    exit;


    //발송실패시..
    if($retArr['result_code'] != "1"){
        //log
    }

    /**** Response 항목 안내 ****
    // result_code : 전송성공유무 (성공:1 / 실패: -100 부터 -999)
    // message : success (성공시) / reserved (예약성공시) / 그외 (실패상세사유가 포함됩니다)
    // msg_id : 메세지 고유ID = 고유값을 반드시 기록해 놓으셔야 sms_list API를 통해 전화번호별 성공/실패 유무를 확인하실 수 있습니다
    // error_cnt : 에러갯수 = receiver 에 포함된 전화번호중 문자전송이 실패한 갯수
    // success_cnt : 성공갯수 = 이동통신사에 전송요청된 갯수
    // msg_type : 전송된 메세지 타입 = SMS / LMS / MMS (보내신 타입과 다른경우 로그로 기록하여 확인하셔야 합니다)
    /**** Response 예문 끝 ****/
}

function messageList($msg){

    $CI =& get_instance();

    /**************** 최근 전송 목록 ******************/
    /* "result_code":결과코드,"message":결과문구, */
    /** list : 전송된 목록 배열 ***/
    /******************** 인증정보 ********************/
    $sms_url = $CI->config->item('list'); // 전송요청 URL
    $sms['user_id'] = $CI->config->item('user_id'); // SMS 아이디
    $sms['key'] = $CI->config->item('key');//인증키
    /******************** 인증정보 ********************/

    $sms['page'] = $msg['page'];			    //조회 시작번호1
    $sms['page_size'] = $msg['page_size'];	    //출력 갯수
    $sms['start_date'] = $msg['start_date'];	//조회일 시작
    $sms['limit_day'] = $msg['limit_day'];		//조회일수

    $host_info = explode("/", $sms_url);
    $port = $host_info[0] == 'https:' ? 443 : 80;

    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_PORT, $port);
    curl_setopt($oCurl, CURLOPT_URL, $sms_url);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sms);
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    $ret = curl_exec($oCurl);
    curl_close($oCurl);
    //echo $ret;
    $retArr = json_decode($ret); // 결과배열
    //print_r($retArr);
    
    return json_decode($ret); 
    
}

function messageSmsList($msg){

    $CI =& get_instance();

    /**************** 최근 전송 목록 ******************/
    /* "result_code":결과코드,"message":결과문구, */
    /** list : 전송된 목록 배열 ***/
    /******************** 인증정보 ********************/
    $sms_url = $CI->config->item('sms_list'); // 전송요청 URL
    $sms['user_id'] = $CI->config->item('user_id'); // SMS 아이디
    $sms['key'] = $CI->config->item('key');//인증키
    /******************** 인증정보 ********************/

    $sms['mid'] = $msg['mid'];        // 메세지ID
    $sms['page'] = $msg['page'];       //조회 시작번호1
    $sms['page_size'] = $msg['page_size'];  //출력 갯수

    $host_info = explode("/", $sms_url);
    $port = $host_info[0] == 'https:' ? 443 : 80;

    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_PORT, $port);
    curl_setopt($oCurl, CURLOPT_URL, $sms_url);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sms);
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    $ret = curl_exec($oCurl);
    curl_close($oCurl);
    //echo $ret;
    $retArr = json_decode($ret); // 결과배열
    //print_r($retArr);

    return json_decode($ret); 

}

function remainingMsg(){

    $CI =& get_instance();

    /**************** 최근 전송 목록 ******************/
    /* "result_code":결과코드,"message":결과문구, */
    /** list : 전송된 목록 배열 ***/
    /******************** 인증정보 ********************/
    $sms_url = $CI->config->item('sms_remain'); // 전송요청 URL
    $sms['user_id'] = $CI->config->item('user_id'); // SMS 아이디
    $sms['key'] = $CI->config->item('key');//인증키
    /******************** 인증정보 ********************/

    $host_info = explode("/", $sms_url);
    $port = $host_info[0] == 'https:' ? 443 : 80;

    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_PORT, $port);
    curl_setopt($oCurl, CURLOPT_URL, $sms_url);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sms);
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    $ret = curl_exec($oCurl);
    curl_close($oCurl);
    //echo $ret;
    $retArr = json_decode($ret); // 결과배열
    //print_r($retArr);

    return json_decode($ret); 

}