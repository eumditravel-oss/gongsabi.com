<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $board_title; ?> 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $board_title; ?> 리스트</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" onclick="download();">다운로드</button>
                        <form method="post" action="/admin/lecture/download" id="frm_download">
                        </form>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 리스트</h4>

                    <p class="sub-header">
                        총 <?php echo $board_data['count']; ?>개
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th class="text-center">번호</th>
                                <th class="text-center">상태</th>
                                <th class="text-center">교육과정</th>
                                <th class="text-center">참석날짜</th>
                                <th class="text-center">참석인원</th>
                                <th class="text-center">회사</th>
                                <th class="text-center">이름</th>
                                <th class="text-center">등록일</th>
                                <th class="text-center">최종수정일</th>
                                <th class="text-center">관리</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($board_data['list'] as $board) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo number_format($board->rownum); ?></td>
                                    <td class="text-center"><?php echo $this->config->item('LECTURE_STATUS')[$board->board_etc_3]['name']; ?></td>
                                    <td class="text-center"><?php echo HP_GET_LECTURE_TEXT($board->board_category); ?></td>
                                    <td class="text-center"><?php echo $board->board_etc_1; ?></td>
                                    <td class="text-center"><?php echo $board->board_etc_2; ?></td>
                                    <td class="text-center"><?php echo $board->board_company; ?></td>
                                    <td class="text-center"><?php echo $board->board_name; ?></td>
                                    <td class="text-center"><?php echo $board->ins_datetime; ?></td>
                                    <td class="text-center"><?php echo $board->upd_datetime; ?></td>
                                    <td class="text-center">
                                        <a href="/admin/lecture/modify/lecture/<?php echo $board->board_seq; ?>" class="btn btn-sm btn-primary">수정</a>
                                        <a href="/admin/lecture/delete/lecture/<?php echo $board->board_seq; ?>" class="btn btn-sm btn-danger btn-delete">삭제</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <?php
                            if ( $board_data['count'] == 0 ) {
                                $colspan = 9;
                            ?>
                                <tr>
                                    <td class="text-center" colspan="<?php echo $colspan; ?>">글이 없습니다.</td>
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