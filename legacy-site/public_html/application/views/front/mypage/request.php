    <section class="breadcumb_area background-overlay section_padding_50" style="background-image: url(/static/img/customer.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb_section">
                        <div class="page_title">
                            <h4><a href="/front/mypage">마이페이지</a></h4>
                        </div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/front/mypage/info">회원정보수정</a></li>
                            <li class="breadcrumb-item active"><a href="/front/mypage/request">신청내역</a></li>
                            <?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
                            <li class="breadcrumb-item"><a href="/front/mypage/scrap">스크랩내역</a></li>
                            <?php } ?>
                            <li class="breadcrumb-item"><a href="/front/auth/logout">로그아웃</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>공사비 교육</h4>
                        </div>
                        <ul class="nav nav-tabs" id="tab1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1-1-tab" data-toggle="tab" href="#tab1-1" role="tab" aria-controls="tab1-1" aria-selected="true">교재 구매</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab1-2-tab" data-toggle="tab" href="#tab1-2" role="tab" aria-controls="tab1-2" aria-selected="false">공사비 강의 신청</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="10%">
                                        <col width="*">
                                        <!-- <col width="15%"> -->
                                        <!-- <col width="15%"> -->
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th class="text-center">번호</th>
                                            <th class="text-center">상태</th>
                                            <th class="text-center">책</th>
                                            <!-- <th class="text-center">이름</th> -->
                                            <!-- <th class="text-center">휴대폰번호</th> -->
                                            <th class="text-center">등록일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($board_data1['list'] as $board) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo number_format($board->rownum); ?></td>
                                            <td class="text-center"><a href="/front/mypage/modify/book/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('ORDER_STATUS')[$board->board_etc_3]['name']; ?></a></td>
                                            <td class=""><a href="/front/mypage/modify/book/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('BOOK_LIST')[$board->board_category]['name']; ?></a></td>
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/book/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td> -->
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/book/<?php echo $board->board_seq; ?>"><?php echo $board->board_hp; ?></a></td> -->
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade p-15" id="tab1-2" role="tabpanel" aria-labelledby="tab1-2-tab">
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="*">
                                        <col width="10%">
                                        <col width="10%">
                                        <!-- <col width="15%"> -->
                                        <!-- <col width="15%"> -->
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>교육과정</th>
                                            <th>교육날짜</th>
                                            <th>참석인원</th>
                                            <!-- <th>회사</th> -->
                                            <!-- <th>이름</th> -->
                                            <th>등록일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_data2['list'] as $board ) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class=""><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>?ismypage=1"><?php echo HP_GET_LECTURE_TEXT($board->board_category); ?></a></td>
                                            <td class="text-center"><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>?ismypage=1"><?php echo $board->board_etc_1; ?></a></td>
                                            <td class="text-center"><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>?ismypage=1"><?php echo $board->board_etc_2; ?></a></td>
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>"><?php echo $board->board_company; ?></a></td> -->
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td> -->
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shortcodes_content_area p-top-50 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>건설 장터</h4>
                        </div>
                        <ul class="nav nav-tabs" id="tab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab2-1-tab" data-toggle="tab" href="#tab2-1" role="tab" aria-controls="tab2-1" aria-selected="true">현장 자재 사고팔기</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2-2-tab" data-toggle="tab" href="#tab2-2" role="tab" aria-controls="tab2-2" aria-selected="false">구인, 구직</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2-3-tab" data-toggle="tab" href="#tab2-3" role="tab" aria-controls="tab2-3" aria-selected="false">공사비 작성 의뢰</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-15" id="tab2-1" role="tabpanel" aria-labelledby="tab2-1-tab">
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="10%">
                                        <col width="*">
                                        <!-- <col width="15%"> -->
                                        <!-- <col width="15%"> -->
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>구분</th>
                                            <th>제목</th>
                                            <!-- <th>회사</th> -->
                                            <!-- <th>등록자</th> -->
                                            <th>등록일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_data3['list'] as $board ) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class="text-center"><a href="/front/mypage/modify/market/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('MARKET_TYPE')[$board->board_category]; ?></a></td>
                                            <td class=""><a href="/front/mypage/modify/market/<?php echo $board->board_seq; ?>"><?php echo $board->board_title; ?></a></td>
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/market/<?php echo $board->board_seq; ?>"><?php echo $board->board_company; ?></a></td> -->
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/market/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td> -->
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade p-15" id="tab2-2" role="tabpanel" aria-labelledby="tab2-2-tab">
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="10%">
                                        <col width="*">
                                        <!-- <col width="15%"> -->
                                        <!-- <col width="15%"> -->
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>구분</th>
                                            <th>제목</th>
                                            <!-- <th>회사</th> -->
                                            <!-- <th>등록자</th> -->
                                            <th>등록일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_data4['list'] as $board ) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class="text-center"><a href="/front/mypage/modify/recruit/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('RECRUIT_TYPE')[$board->board_category]; ?></a></td>
                                            <td class=""><a href="/front/mypage/modify/recruit/<?php echo $board->board_seq; ?>"><?php echo $board->board_title; ?></a></td>
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/recruit/<?php echo $board->board_seq; ?>"><?php echo $board->board_company; ?></a></td> -->
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/recruit/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td> -->
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade p-15" id="tab2-3" role="tabpanel" aria-labelledby="tab2-3-tab">
                                <div class="table-responsive">
                                    <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                        <colgroup>
                                            <col width="7%">
                                            <col width="*">
                                            <!-- <col width="15%"> -->
                                            <!-- <col width="15%"> -->
                                            <col width="10%">
                                        </colgroup>
                                        <thead>
                                            <tr class="bg-gray">
                                                <th>번호</th>
                                                <th>작업 범위</th>
                                                <!-- <th>회사</th> -->
                                                <!-- <th>이름</th> -->
                                                <th>등록일</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ( $board_data5['list'] as $board ) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $board->rownum; ?></td>
                                                <td class=""><a href="/front/mypage/modify/gongsabi/<?php echo $board->board_seq; ?>"><?php echo HP_GET_GONGSABI_REQUEST_TEXT($board->board_category); ?></a></td>
                                                <!-- <td class="text-center"><a href="/front/mypage/modify/gongsabi/<?php echo $board->board_seq; ?>"><?php echo $board->board_company; ?></a></td> -->
                                                <!-- <td class="text-center"><a href="/front/mypage/modify/gongsabi/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td> -->
                                                <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shortcodes_content_area p-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>고객센터</h4>
                        </div>
                        <ul class="nav nav-tabs" id="tab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab3-1-tab" data-toggle="tab" href="#tab3-1" role="tab" aria-controls="tab3-1" aria-selected="true">Q&A</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-15" id="tab3-1" role="tabpanel" aria-labelledby="tab3-1-tab">
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="*">
                                        <!-- <col width="15%"> -->
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>제목</th>
                                            <!-- <th>이름</th> -->
                                            <th>등록일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_data6['list'] as $board ) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class="text-left"><a href="/front/mypage/modify/qna/<?php echo $board->board_seq; ?>"><?php echo $board->board_title; ?></a></td>
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/qna/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td> -->
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>