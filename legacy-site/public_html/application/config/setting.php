<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 관리자 NOTI 메시지 발송 여부
$config['is_test_mode'] = FALSE;

$config['site_url'] = 'http://www.gongsabi.com';
$config['site_short_url'] = 'gongsabi.com';
$config['site_id'] = 'gongsabi';
$config['site_name'] = '공사비닷컴';

// 페이징 관련
$config['paging_limit'] = 10;
$config['paging_limit2'] = 15;

$config['dbprefix'] = 'gongsabi_';

// 결제 모드 (테스트 : T, 운영 : R)
$config['pay_mode'] = getenv('GONGSABI_PAY_MODE') ?: 'T';
$config['IMPORT'] = array(
    'imp_code' => getenv('PORTONE_IMP_CODE') ?: '',
    'imp_key' => getenv('PORTONE_API_KEY') ?: '',
    'imp_secret' => getenv('PORTONE_API_SECRET') ?: ''
);

// 문자 발송 모드 (테스트 : T, 운영 : R)
$config['sms_mode'] = getenv('GONGSABI_SMS_MODE') ?: 'T';
// 알리고
$config['ALIGO'] = array(
    'sender'        => getenv('ALIGO_SENDER') ?: '',
    'user_id'       => getenv('ALIGO_USER_ID') ?: '',
    'key'           => getenv('ALIGO_API_KEY') ?: '',
    //문자발송 API Host
    'send_url'      => 'https://apis.aligo.in/send/',
    //문자리스트 API Host
    'list_url'      => 'https://apis.aligo.in/list/',
    //문자상세리스트 API Host
    'sms_list_url'  => 'https://apis.aligo.in/sms_list/',
    //문자발송가능건수 API Host
    'remain_url'    => 'https://apis.aligo.in/remain/'
);

// 주문 상태
$config['ORDER_STATUS'] = array(
    1 => array(
        'name' => '주문접수'
    ),
    2 => array(
        'name' => '결제완료'
    ),
    3 => array(
        'name' => '상품준비중'
    ),
    4 => array(
        'name' => '배송준비중'
    ),
    5 => array(
        'name' => '배송중'
    ),
    6 => array(
        'name' => '배송완료'
    ),
    7 => array(
        'name' => '교환요청'
    ),
    8 => array(
        'name' => '환불요청'
    ),
    9 => array(
        'name' => '주문취소'
    )
);

// 강의 상태
$config['LECTURE_STATUS'] = array(
    1 => array(
        'name' => '입금대기중'
    ),
    2 => array(
        'name' => '강의신청완료'
    ),
    3 => array(
        'name' => '강의완료'
    ),
    8 => array(
        'name' => '강의취소'
    ),
    9 => array(
        'name' => '강의료환불'
    )
);

// 회원 유형
$config['MEMBER_TYPE'] = array(
    '1' => array(
        'name' => '무료회원'
    ),
    '2' => array(
        'name' => '유료회원'
    )
);

// 회원 상태
$config['MEMBER_USE'] = array(
    '1' => array(
        'name' => '정상'
    ),
    '8' => array(
        'name' => '탈퇴'
    )
);

// 관리자 NOTI 메시지
$config['NOTI_MESSAGE'] = array(
    'contact' => array(
        'message' => '업무제휴 문의가 등록 되었습니다.'
    ),
    'qna' => array(
        'message' => '신규 문의가 등록 되었습니다.'
    ),
    'gongsabi' => array(
        'message' => '신규 공사비 작성 의뢰가 등록 되었습니다.'
    ),
    'book' => array(
        'message' => '교재구매 결제 확인 및 승인 요청 요망'
    ),
    'lecture' => array(
        'message' => '신규 강의 요청이 있습니다.'
    )
);

/* 업무제휴 */
$config['gongsabi_data_contact_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/contact';
$config['gongsabi_data_contact'] = '/static/data/contact';
/* 건설장터 */
$config['gongsabi_data_market_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/market';
$config['gongsabi_data_market'] = '/static/data/market';
/* 공사비작성의뢰 */
$config['gongsabi_data_gongsabi_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/gongsabi';
$config['gongsabi_data_gongsabi'] = '/static/data/gongsabi';
/* 구인, 구직 */
$config['gongsabi_data_recruit_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/recruit';
$config['gongsabi_data_recruit'] = '/static/data/recruit';
/* Parners */
$config['gongsabi_data_partners_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/partners';
$config['gongsabi_data_partners'] = '/static/data/partners';
/* 강사 */
$config['gongsabi_data_teacher_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/teacher';
$config['gongsabi_data_teacher'] = '/static/data/teacher';
/* 게시판 */
$config['gongsabi_data_board_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/board';
$config['gongsabi_data_board'] = '/static/data/board';
/* 배너 광고 */
$config['gongsabi_data_banner_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/banner';
$config['gongsabi_data_banner'] = '/static/data/banner';
/* 강의 표 */
$config['gongsabi_data_lecture_table_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/lecture_table';
$config['gongsabi_data_lecture_table'] = '/static/data/lecture_table';

$config['BANNER_LIST'] = array(
    'main_bottom' => array(
        'name' => '메인 하단'
    ),
    'main_left' => array(
        'name' => '메인 왼쪽'
    ),
    'main_right' => array(
        'name' => '메인 오른쪽'
    ),
    'data' => array(
        'name' => '공사비 검색'
    ),
    'education' => array(
        'name' => '공사비 교육'
    ),
    'community' => array(
        'name' => '건설 장터'
    ),
    'customer' => array(
        'name' => '고객센터'
    ),
    'mypage' => array(
        'name' => '마이페이지'
    )
);

$config['gongsabi_data_file_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/gongsabi/excel';
$config['gongsabi_data_batch_path'] = dirname($_SERVER['SCRIPT_FILENAME']).'/static/data/gongsabi/batch';

$config['RECRUIT_TYPE'] = array(
    'person' => '구인',
    'job' => '구직'
);

$config['RECRUIT_TYPE_ENG'] = array(
    'person' => 'Employer',
    'job' => 'Job seekers'
);

$config['MARKET_TYPE'] = array(
    'sell' => '팝니다',
    'buy' => '삽니다'
);

$config['MARKET_TYPE_ENG'] = array(
    'sell' => 'Sell',
    'buy' => 'Buy'
);

$config['BOOK_LIST'] = array(
	'1' => array(
        'name' => '1권 : 도면을 이해하고 도면이 어떻게 공사비로 바뀌나 이해하자!',
        'eng_name' => '1. Understanding of drawings and construction costs',
        'price' => 16200,
        'org_price' => 18000
    ),
	'2' => array(
        'name' => '2권 : 골조 수량 산출법을 실습하고 남들이 한것을 이해하자!',
        'eng_name' => '2. Quantity take-off for structural frame and understanding of results from others',
        'price' => 19800,
        'org_price' => 22000
    ),
	'3' => array(
        'name' => '3권 : 마감 수량 산출법을 실습하고 남들이 한것을 이해하자!',
        'eng_name' => '3. Quantity take-off for finishes and understanding of results from others',
        'price' => 19800,
        'org_price' => 22000
    ),
	'4' => array(
        'name' => '4권 : 공사비에 가장 중요한 내역서를 알고 문제점을 찾아내자!',
        'eng_name' => '4. Understaning of Bill of Quantity and finding out the errors',
        'price' => 18000,
        'org_price' => 20000
    ),
	'5' => array(
        'name' => '5권 : 내역서를 구성하는 공종별 항목을 이해하자!',
        'eng_name' => '5. Understanding the item described in BoQ with pictures',
        'price' => 18000,
        'org_price' => 20000
    ),
	'6' => array(
        'name' => '6권 : 설계변경과 건설클레임을 알고 대처하자!',
        'eng_name' => '6. Drawing changes and claims.',
        'price' => 16200,
        'org_price' => 18000
    ),
	'9' => array(
        'name' => '1 ~ 6권 : 현장기술자를 위한 건축견적 이야기',
        'eng_name' => 'Books 1-6. Construction Cost Estimating For Field Engineer',
        'price' => 108000,
        'org_price' => 120000
    )
);

$config['GONGSABI_REQUEST_LIST'] = array(
	'1' => '개산견적 내역서 요청',
	'2' => '정미견적 요청',
    '3' => '현장 물량검증 요청',
    '4' => '설계변경 요청',
    '5' => '감정 및 건설 클레임 요청',
    '9' => '기타'
);

$config['GONGSABI_REQUEST_LIST_ENG'] = array(
    '1' => 'Request concept estimates',
    '2' => 'Request definitive quantity estimates',
    '3' => 'Request quantity inspection on construction site',
    '4' => 'Request drawing changes',
    '5' => 'Request validation test and claims',
    '9' => 'etc'
);

$config['PARTNERS_CATEGORY_LIST'] = array(
    '7' => '종합건설 / 설계 / 시행',
    '1' => '가설 / 토공 / 골조',
    '2' => '타일 / 석공 / 창호 / 유리',
    '3' => '조적 / 방수 / 미장',
    '4' => '도장 / 수장 / 장비',
    '5' => '전기 / 기계 / 통신 / 소방',
    '6' => '견적 / 기타',
);

$config['PARTNERS_CATEGORY_LIST_ENG'] = array(
    '7' => 'General construction / Architect / Developer',
    '1' => 'Temporary / Civil / Structural Frame',
    '2' => 'Tiling / Stone / Windows and doors / Glazing',
    '3' => 'Masonry / Waterproofing / Plastering',
    '4' => 'Painting / Interior Finishing / Equipment',
    '5' => 'Electrical / Mechanical / Telecommunication / Fire Protection',
    '6' => 'Estimation / etc',
);

// hooks 에서 처리
/*
$config['LECTURE_LIST'] = array(
	'1' => array(
		'title' => '수량산정 및 내역서',
		'time' => '2시간',
		'desc' => '적산 및 견적의 이론'
	),
	'2' => array(
		'title' => '107% 원가율을 97%로 변경 하는 방법 (일반)',
		'time' => '2시간',
		'desc' => '현장 원가개선 방법과 실천 방안'
	),
    '3' => array(
    	'title' => '수량산출 및 내역서의 오류 검토 방법',
    	'time' => '4시간',
    	'desc' => '타인이 작성한 내용을 검토하는 방법'
    ),
    '4' => array(
    	'title' => '원가율 개선 하는 방법 (심화과정)',
    	'time' => '4시간',
    	'desc' => '현장 원가개선 방법과 실천 방안'
    ),
    '5' => array(
    	'title' => '구조, 마감 수량 산출 실습 및 설명 (도면참조)',
    	'time' => '8시간',
    	'desc' => '도면을 가지고 구조, 마감 산출 방법 및 검토 방법'
    ),
    '6' => array(
    	'title' => '구조 수량 산출 실습 (도면을 갖고 심화 실습)',
    	'time' => '8시간',
    	'desc' => '도면 및 산출양식지를 가지고 레미콘, 거푸집, 철근 산출 및 산출후 검토 방법'
    ),
    '7' => array(
    	'title' => '마감 수량 산출 실습 (도면을 갖고 심화 실습)',
    	'time' => '8시간',
    	'desc' => '도면 및 산출양식지를 가지고 창호, 조적, 내부, 외부, 가설 산출 및 산출후 검토 방법'
    ),
    '8' => array(
    	'title' => '구조, 마감, 내역서 작성 실습 (전문가 과정)',
    	'time' => '16시간',
    	'desc' => '도면을 가지고 구조 마감을 전체적으로 수량산출 하고 내역서 작성하는 전문가 양성 과정'
    ),
    '9' => array(
        'title' => '자유 강의',
        'time' => '협의',
        'desc' => '자유 형식'
    )
);
*/

$config['FAQ_CATEGORY'] = array(
    '1' => array(
        'name' => '이용문의',
        'eng_name' => '이용문의'
    ),
    '2' => array(
        'name' => '신청/결제/취소',
        'eng_name' => '신청/결제/취소'
    ),
    '3' => array(
        'name' => '배송문의',
        'eng_name' => '배송문의'
    ),
    '4' => array(
        'name' => '기타',
        'eng_name' => '기타'
    )
);

$config['SITE_INFO']['KOR'] = array(
    // 상호
    'COMPANY_NAME'      => '(주)공사비닷컴',
    // 대표
    'CEO_NAME'          => '현동명',
    // 사업자등록번호
    'BUSINESS_NUMBER'   => '152-87-00466',
    // 사업자등록번호
    'BUSINESS_ONLY_NUMBER'   => '1528700466',
    // 통신판매업신고번호
    'SALES_NUMBER'      => '2017-서울송파-2115호',
    // 주소 
    'ADDRESS'           => '(05585) 서울특별시 송파구 백제고분로 37길 6 송원빌딩 6층',
    // 대표
    'PRIVACY_NAME'      => '이서진',
    'PRIVACY_PART'      => '경영지원 부서',
    'PRIVACY_POSITION'  => '상무',
    // 대표전화번호
    'TEL1'              => '02-2202-2258',
    // 서비스 이용문의
    'TEL2'              => '070-4048-1315',
    // 팩스
    'FAX1'              => '02-2202-2259',
    // 대표이메일
    'EMAIL1'            => 'cs@gongsabi.com',
    // 서비스 제휴문의
    'EMAIL2'            => 'partner@gongsabi.com',
    // 채용문의
    'EMAIL3'            => 'sjlee@gongsabi.com',
    // LAT
    'LAT'               => 37.5041693,
    // LNG
    'LNG'               => 127.1038218
);
$config['SITE_INFO']['ENG'] = array(
    // 상호
    'COMPANY_NAME'      => 'GongSaBi.com CO.,Ltd',
    // 대표
    'CEO_NAME'          => 'David Hyun',
    // 사업자등록번호
    'BUSINESS_NUMBER'   => '152-87-00466',
    // 사업자등록번호
    'BUSINESS_ONLY_NUMBER'   => '1528700466',
    // 통신판매업신고번호
    'SALES_NUMBER'      => '2017-서울송파-2115호',
    // 주소 
    'ADDRESS'           => '6F, Songwon Building, 6, Baekjegobun-ro 37-Gil, Songpa-gu, Seoul, REP. OF KOREA',
    // 대표
    'PRIVACY_NAME'      => '이서진',
    'PRIVACY_POSITION'  => '상무',
    // 대표전화번호
    'TEL1'              => '02-2202-2258',
    // 서비스 이용문의
    'TEL2'              => '070-4048-1315',
    // 팩스
    'FAX1'              => '02-2202-2259',
    // 대표이메일
    'EMAIL1'            => 'cs@gongsabi.com',
    // 서비스 제휴문의
    'EMAIL2'            => 'partner@gongsabi.com',
    // 채용문의
    'EMAIL3'            => 'sjlee@gongsabi.com',
    // LAT
    'LAT'               => 37.5041693,
    // LNG
    'LNG'               => 127.1038218
);

$config['TOP_MENU']['KOR'] = array(
    'CUSTOMER_CENTER' => array(
        'name' => '고객센터'
    ),
    'NOTICE' => array(
        'name' => '공지사항'
    ),
    'PDS' => array(
        'name' => '자료실'
    ),
    'FAQ' => array(
        'name' => '자주 묻는 질문'
    ),
    'QNA' => array(
        'name' => 'Q&A'
    ),
    'MYPAGE' => array(
        'name' => '마이페이지'
    ),
    'LOGOUT' => array(
        'name' => '로그아웃'
    ),
    'JOIN' => array(
        'name' => '회원가입'
    ),
    'LOGIN' => array(
        'name' => '로그인'
    ),
);
$config['TOP_MENU']['ENG'] = array(
    'CUSTOMER_CENTER' => array(
        'name' => 'CONTACT US'
    ),
    'NOTICE' => array(
        'name' => 'News'
    ),
    'PDS' => array(
        'name' => 'Reference Room'
    ),
    'FAQ' => array(
        'name' => 'FAQ'
    ),
    'QNA' => array(
        'name' => 'Q&A'
    ),
    'MYPAGE' => array(
        'name' => 'MY PAGE'
    ),
    'LOGOUT' => array(
        'name' => 'LOG OUT'
    ),
    'JOIN' => array(
        'name' => 'GREATE ACCOUNT'
    ),
    'LOGIN' => array(
        'name' => 'LOG IN'
    ),
);

$config['BOTTOM_MENU1']['KOR'] = array(
    array(
        'name' => '이용약관',
        'link' => '/front/company/term'
    ),
    array(
        'name' => '개인정보처리방침',
        'link' => '/front/company/privacy'
    ),
    array(
        'name' => '오시는길',
        'link' => '/front/company/company4'
    ),
);
$config['BOTTOM_MENU1']['ENG'] = array(
    array(
        'name' => 'Terms of service',
        'link' => '/front/company/term'
    ),
    array(
        'name' => 'Privacy policy',
        'link' => '/front/company/privacy'
    ),
    array(
        'name' => 'Location',
        'link' => '/front/company/company4'
    ),
);

$config['BOTTOM_MENU2']['KOR'] = array(
    'COMPANY_NAME' => array(
        'name' => '법인명'
    ),
    'CEO_NAME' => array(
        'name' => '대표이사'
    ),
    'BUSINESS_NUMBER' => array(
        'name' => '사업자등록번호'
    ),
    'BUSINESS_INFORMATION' => array(
        'name' => '사업자정보확인'
    ),
    'SALES_NUMBER' => array(
        'name' => '통신판매업'
    ),
    'PRIVACY_NAME' => array(
        'name' => '개인정보책임자'
    ),
    'ADDRESS' => array(
        'name' => '주소'
    ),
);
$config['BOTTOM_MENU2']['ENG'] = array(
    'COMPANY_NAME' => array(
        'name' => 'Company'
    ),
    'CEO_NAME' => array(
        'name' => 'CEO '
    ),
    'BUSINESS_NUMBER' => array(
        'name' => 'ABN'
    ),
    'BUSINESS_INFORMATION' => array(
        'name' => 'Business information'
    ),
    'SALES_NUMBER' => array(
        'name' => 'Main-order-sales registration number'
    ),
    'PRIVACY_NAME' => array(
        'name' => 'Personal information manager'
    ),
    'ADDRESS' => array(
        'name' => 'Address'
    ),
);

$config['BOTTOM_MENU3']['KOR'] = array(
    'SNS_KAKAO' => array(
        'name' => '카카오톡'
    ),
    'SNS_FACEBOOK' => array(
        'name' => '페이스북'
    ),
    'SNS_YOUTUBE' => array(
        'name' => '유튜브'
    ),
    'SNS_INSTAGRAM' => array(
        'name' => '인스타그램'
    ),
);
$config['BOTTOM_MENU3']['ENG'] = array(
    'SNS_KAKAO' => array(
        'name' => 'KakaoTalk'
    ),
    'SNS_FACEBOOK' => array(
        'name' => 'Facebook'
    ),
    'SNS_YOUTUBE' => array(
        'name' => 'Youtube'
    ),
    'SNS_INSTAGRAM' => array(
        'name' => 'Instagram'
    ),
);

$config['BOTTOM_MENU4']['KOR'] = array(
    'CONTACT1' => array(
        'name' => '채용문의'
    ),
    'CONTACT2' => array(
        'name' => '업무 및 파트너 제휴'
    ),
    'CONTACT3' => array(
        'name' => '기타 문의'
    ),
    'CONTACT4' => array(
        'name' => '대표전화'
    ),
);
$config['BOTTOM_MENU4']['ENG'] = array(
    'CONTACT1' => array(
        'name' => 'Careers'
    ),
    'CONTACT2' => array(
        'name' => 'Task and partner inquiry'
    ),
    'CONTACT3' => array(
        'name' => 'Other enquiry'
    ),
    'CONTACT4' => array(
        'name' => 'Tel'
    ),
);

$config['sub_menu']['KOR'] = array(
    'regist' => array(
        'id' => 'auth/regist',
        'name' => '회원가입'
    ),
    'login' => array(
        'id' => 'auth/login',
        'name' => '로그인'
    ),
    'term' => array(
        'id' => 'company/term',
        'name' => '이용약관'
    ),
    'privacy' => array(
        'id' => 'company/privacy',
        'name' => '개인정보처리방침'
    ),
    'contact' => array(
        'id' => 'customer/contact',
        'name' => '업무제휴'
    ),
    'leave' => array(
        'id' => 'mypage/leave',
        'name' => '회원탈퇴'
    ),
    'find' => array(
        'id' => 'auth/find',
        'name' => '로그인 정보 찾기'
    ),
);

$config['sub_menu']['ENG'] = array(
    'regist' => array(
        'id' => 'auth/regist',
        'name' => 'GREATE ACCOUNT'
    ),
    'login' => array(
        'id' => 'auth/login',
        'name' => 'LOG IN'
    ),
    'term' => array(
        'id' => 'company/term',
        'name' => 'Terms'
    ),
    'privacy' => array(
        'id' => 'company/privacy',
        'name' => 'Privacy'
    ),
    'contact' => array(
        'id' => 'customer/contact',
        'name' => 'Contact'
    ),
    'leave' => array(
        'id' => 'mypage/leave',
        'name' => 'Leave'
    ),
    'find' => array(
        'id' => 'auth/find',
        'name' => 'Find Account'
    ),
);

$config['gnb_menu']['KOR'] = array(
    'company' => array(
        'root' => true,
        'id' => 'company',
        'name' => '회사소개',
        'child' => array(
            'company1' => '대표이사 인사말',
            'company2' => '기업소개',
            'company3' => '채용안내',
            'company4' => '오시는길'
        )
    ),
    'data' => array(
        'root' => true,
        'id' => 'data',
        'name' => '공사비 검색',
        'child' => array(
            'gongsabi' => '면적당 공사비 검색',
            'danga' => '공사 단가 검색',
            'goljo' => '골조 면적별 수량'
        )
    ),
    'report' => array(
        'root' => true,
        'id' => 'report',
        'name' => '내역서 작성',
        'child' => array(
            'geonchuk' => '건축 내역서 작성',
            'goljo' => '골조 내역서 작성',
            'gigan' => '공사기간 산정',
            'ganjeob' => '간접 공사비 계산'
        )
    ),
    'education' => array(
        'root' => true,
        'id' => 'education',
        'name' => '공사비 교육',
        'child' => array(
            'youtube' => '동영상 교육',
            'book' => '교재 구매',
            'lecture' => '강의신청'
        )
    ),
    'community' => array(
        'root' => true,
        'id' => 'community',
        'name' => '건설 장터',
        'child' => array(
            'market' => '현장 자재 거래',
            'recruit' => '구인 / 구직',
            'gongsabi' => '공사비 작성 의뢰',
            'partners' => 'Partners'
        )
    ),
    'mypage' => array(
        'root' => false,
        'id' => 'mypage',
        'name' => '마이페이지',
        'child' => array(
            'data' => array(
                'name' => '공사비 검색',
                'child' => array(
                    'gongsabi' => '면적당 공사비 검색',
                    'danga' => '공사 단가 검색',
                    'goljo' => '골조 면적별 수량',
                )
            ),
            'report' => array(
                'name' => '내역서 작성',
                'child' => array(                    
                )
            ),
            'education' => array(
                'name' => '공사비 교육',
                'child' => array(
                    'book' => '교재 구매',
                    'lecture' => '강의 신청',
                    'bookcs' => '취소/교환/환불 신청'
                )
            ),
            'community' => array(
                'name' => '건설 장터',
                'child' => array(
                    'market' => '현장 자재 거래',
                    'recruit' => '구인 / 구직',
                    'gongsabi' => '공사비 작성 의뢰',
                )
            ),
            'info' => array(
                'name' => '회원 정보 관리',
                'child' => array(
                    'info1' => '회원 정보 수정',
                    'info2' => '회원 등급 관리',
                    'info3' => '뉴스레터 수신 설정'
                )
            ),
            'customer' => array(
                'name' => '고객센터',
                'child' => array(
                    'qna' => 'Q&A'
                )
            )
        )
    ),
    'customer' => array(
        'root' => false,
        'id' => 'customer',
        'name' => '고객센터',
        'child' => array(
            'notice' => '공지사항',
            'pds' => '자료실',
            'faq' => '자주 묻는 질문',
            'qna' => 'Q&A'
        )
    )
);
$config['gnb_menu']['ENG'] = array(
    'company' => array(
        'root' => true,
        'id' => 'company',
        'name' => 'ABOUT US',
        'child' => array(
            'company1' => 'About CEO',
            'company2' => 'About Company',
            'company3' => 'Career Opportunities',
            'company4' => 'Location'
        )
    ),
    'data' => array(
        'root' => true,
        'id' => 'data',
        'name' => 'CONSTRUCTION COST ANALYSIS',
        'child' => array(
            'gongsabi' => 'Construction Cost Per Area',
            'danga' => 'Unit Price Estimating',
            'goljo' => ' Analysis of Frame Quantity Per Area'
        )
    ),
    'report' => array(
        'root' => true,
        'id' => 'report',
        'name' => 'BOQ',
        'child' => array(
            'geonchuk' => 'Construction BOQ Drafting',
            'goljo' => 'Frame BOQ  Drafting',
            'gigan' => 'Project Period Assessment',
            'ganjeob' => 'Indirect Construction Cost'
        )
    ),
    'education' => array(
        'root' => true,
        'id' => 'education',
        'name' => 'EDUCATION',
        'child' => array(
            'youtube' => 'Online Courses',
            'book' => 'Purchase Book',
            'lecture' => 'Education Inquiry'
        )
    ),
    'community' => array(
        'root' => true,
        'id' => 'community',
        'name' => 'CONSTRUCTION MARKET',
        'child' => array(
            'market' => 'Trade Field Materials',
            'recruit' => 'Careers',
            'gongsabi' => 'Estimate Inquiry',
            'partners' => 'Partners'
        )
    ),
    'mypage' => array(
        'root' => false,
        'id' => 'mypage',
        'name' => 'MY PAGE',
        'child' => array(
            'data' => array(
                'name' => 'CONSTRUCTION COST ANALYSIS',
                'child' => array(
                    'gongsabi' => 'Construction Cost Per Area',
                    'danga' => 'Unit Price Estimating',
                    'goljo' => ' Analysis of Frame Quantity Per Area'
                )
            ),
            'report' => array(
                'name' => 'Construction BOQ Drafting',
                'child' => array(                    
                )
            ),
            'education' => array(
                'name' => 'PR CENTER',
                'child' => array(
                    'book' => 'Purchase Book',
                    'lecture' => 'Education Inquiry',
                    'bookcs' => '취소/교환/환불 신청'
                )
            ),
            'community' => array(
                'name' => 'CONTACT US',
                'child' => array(
                    'market' => 'Trade Field Materials',
                    'recruit' => 'Careers',
                    'gongsabi' => 'Estimate Inquiry',
                )
            ),
            'info' => array(
                'name' => '회원 정보 관리',
                'child' => array(
                    'info1' => '회원 정보 수정',
                    'info2' => '회원 등급 관리',
                    'info3' => '뉴스레터 수신 설정'
                )
            ),
            'customer' => array(
                'name' => 'CONTACT US',
                'child' => array(
                    'qna' => 'Q&A'
                )
            )
        )
    ),
    'customer' => array(
        'root' => false,
        'id' => 'customer',
        'name' => 'CONTACT US',
        'child' => array(
            'notice' => 'News',
            'pds' => 'Reference Room',
            'faq' => 'FAQ',
            'qna' => 'Q&A'
        )
    )
);

$config['BANK_LIST'] = array(
    '국민은행',
    '하나은행',
    '신한은행',
    '우리은행',
    '농협',
    '기업은행',
    '씨티은행',
    'SC제일은행',
    '우체국',
    '산업은행',
    '부산은행',
    '대구은행',
    '경남은행',
    '수협',
    '광주은행',
    '전북은행',
    '제주은행',
    '케이뱅크',
    '카카오뱅크',
    '기타',
);

$config['PAY_STATUS'] = array(
    'ready'     => '미결제',
    'paid'      => '결제완료',
    'cancelled' => '결제취소',
    'failed'    => '결제실패',
);

$config['PAY_METHOD'] = array(
    'bank'      => '무통장입금',
    'card'      => '신용카드',
    'trans'     => '실시간계좌이체',
    'vbank'     => '가상계좌',
    'phone'     => '휴대폰',
    'kakaopay ' => '카카오페이',
    'payco'     => '페이코',
    'lpay'      => 'LPAY',
    'ssgpay'    => 'SSG페이',
    'tosspay'   => '토스간편결제',
    'point'     => '포인트결제',
    ''          => '미결제',
);

$config['CARRIERS'] = array(
   'kr.cjlogistics' => array(
      'name' => 'CJ대한통운',
      'tel' => '+8215881255'
   ),
   'kr.epost' => array(
      'name' => '우체국 택배',
      'tel' => '+8215881300'
   ),
   'kr.hanjin' => array(
      'name' => '한진택배',
      'tel' => '+8215880011'
   ),
   'kr.logen' => array(
      'name' => '로젠택배',
      'tel' => '+8215889988'
   ),
   'kr.lotte' => array(
      'name' => '롯데택배',
      'tel' => '+8215882121'
   ),
   'kr.cupost' => array(
      'name' => 'CU 편의점택배',
      'tel' => '+8215771287'
   ),
   'kr.cvsnet' => array(
      'name' => 'GS Postbox 택배',
      'tel' => '+8215771287'
   ),
   'kr.daesin' => array(
      'name' => '대신택배',
      'tel' => '+82314620100'
   ),
   'kr.hdexp' => array(
      'name' => '합동택배',
      'tel' => '+8218993392'
   ),
   'kr.homepick' => array(
      'name' => '홈픽',
      'tel' => '+8218000987'
   ),
   'kr.honamlogis' => array(
      'name' => '한서호남택배',
      'tel' => '+8218770572'
   ),
   'kr.ilyanglogis' => array(
      'name' => '일양로지스',
      'tel' => '+8215880002'
   ),
   'kr.kdexp' => array(
      'name' => '경동택배',
      'tel' => '+8218995368'
   ),
   'kr.kunyoung' => array(
      'name' => '건영택배',
      'tel' => '+82533543001'
   ),
   'de.dhl' => array(
      'name' => 'DHL',
      'tel' => '+8215880001'
   ),
   'kr.chunilps' => array(
      'name' => '천일택배',
      'tel' => '+8218776606'
   ),
   'kr.slx' => array(
      'name' => 'SLX',
      'tel' => '+82316375400'
   ),
   'kr.swgexp' => array(
      'name' => '성원글로벌카고',
      'tel' => '+82327469984'
   )
);

$config['DATA_GONGSABI_C4'] = array(
    '1' => array(
        '아파트', '주상복합', '오피스텔', '빌라', '단독주택', '숙박'
    ),
    '2' => array(
        '근생', '오피스', '연구시설', '관청', '교육연구', '업무'
    ),
    '3' => array(
        '문화', '종교', '판매', '의료', '운동', '문화및집회'
    ),
    '4' => array(
        '공장', '창고'
    ),
    '5' => array(
        '기타'
    )
);
