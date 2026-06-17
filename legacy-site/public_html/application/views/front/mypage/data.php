    <section class="shortcodes_content_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <?php require 'mypage_left.php'; ?>
                </div>
                <div class="col-9">
                    <?php require 'mypage_top.php'; ?>

                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>공사비 검색</h4>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $now == 'gongsabi' ) ? ' active' : ''; ?>" href="/front/mypage/data/gongsabi" role="tab">면적당 공사비 검색</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $now == 'danga' ) ? ' active' : ''; ?>" href="/front/mypage/data/danga" role="tab">공사 단가 검색</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $now == 'goljo' ) ? ' active' : ''; ?>" href="/front/mypage/data/goljo" role="tab">골조 면적별 수량</a>
                            </li>
                        </ul>
                        <div class="tab-content gongsabi-tab">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <div class="single_shortcodes_title m-bottom-15">
                                    <h4>총 <?php echo number_format($board_count); ?>건</h4>
                                </div>
                                <?php if ( $now == 'gongsabi' ) { ?>
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="*">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="7%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>공사명</th>
                                            <th>건물종류</th>
                                            <th>면적(㎡)</th>
                                            <th>공사비</th>
                                            <th>등록일</th>
                                            <th>삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_list as $board ) {
                                            $gongsabi_info = GET_GONGSABI_INFO($board->data_seq);
                                            if ( !$gongsabi_info )
                                                continue;
                                            $_d34 = explode(',', $gongsabi_info->d24_33);
                                            $d34 = 0;
                                            foreach ($_d34 as $price) {
                                                $d34 += (int)$price;
                                            }
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c2; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c4; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c7; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo number_format($d34); ?></td>
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="delete_scrap('<?php echo $board->seq; ?>');">삭제</button></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if ( $board_count == 0 ) { ?>
                                        <tr>
                                            <td class="text-center" colspan="6">최근 스크랩 내역이 없습니다.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } else if ( $now == 'danga' ) { ?>
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="*">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="7%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>품명</th>
                                            <th>설계가</th>
                                            <th>도급가</th>
                                            <th>실행가</th>
                                            <th>등록일</th>
                                            <th>삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_list as $board ) {
                                            $gongsabi_info = GET_GONGSABI_INFO($board->data_seq);
                                            if ( !$gongsabi_info )
                                                continue;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c2; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c11; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c13; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c13; ?></td>
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="delete_scrap('<?php echo $board->seq; ?>');">삭제</button></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if ( $board_count == 0 ) { ?>
                                        <tr>
                                            <td class="text-center" colspan="7">최근 스크랩 내역이 없습니다.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } else if ( $now == 'goljo' ) { ?>
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="*">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="7%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>건물종류</th>
                                            <th>구조형식</th>
                                            <th>면적</th>
                                            <th>층수</th>
                                            <th>등록일</th>
                                            <th>삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_list as $board ) {
                                            $gongsabi_info = GET_GONGSABI_INFO($board->data_seq);
                                            if ( !$gongsabi_info )
                                                continue;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c2; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c2; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c11; ?></td>
                                            <td class="text-center"><a href="#" onclick="view_detail('<?php echo $board->data_seq; ?>');"><?php echo $gongsabi_info->c13; ?></td>
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="delete_scrap('<?php echo $board->seq; ?>');">삭제</button></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if ( $board_count == 0 ) { ?>
                                        <tr>
                                            <td class="text-center" colspan="7">최근 스크랩 내역이 없습니다.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <div class="row m-top-15">
                                    <div class="col-lg-12">
                                        <nav>
                                            <?php echo $pagination; ?>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>