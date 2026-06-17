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
                            <li class="breadcrumb-item"><a href="/front/mypage/request">신청내역</a></li>
                            <?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
                            <li class="breadcrumb-item active"><a href="/front/mypage/scrap">스크랩내역</a></li>
                            <?php } ?>
                            <li class="breadcrumb-item"><a href="/front/auth/logout">로그아웃</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>총 <?php echo number_format($board_count); ?>건</h4>
                        </div>
                        <div class="row m-bottom-15">
                            <div class="col-lg-6">
                                <nav>
                                    <?php echo $pagination; ?>
                                </nav>
                            </div>
                            <div class="col-lg-6 text-right">
                            </div>
                        </div>
                        <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                            <colgroup>
                                <col width="7%">
                                <col width="*">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="7%">
                            </colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th>번호</th>
                                    <th>공사명</th>
                                    <th>착공년도</th>
                                    <th>구분</th>
                                    <th>등록일</th>
                                    <th>삭제</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $board_list as $board ) {
                                    $gongsabi_info = GET_GONGSABI_INFO($board->data_seq);
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $board->rownum; ?></td>
                                    <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c2; ?></td>
                                    <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c11; ?></td>
                                    <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c13; ?></td>
                                    <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                    <td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="delete_scrap('<?php echo $board->seq; ?>');">삭제</button></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <nav>
                                    <?php echo $pagination; ?>
                                </nav>
                            </div>
                            <div class="col-lg-6 text-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>