<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">게시판 관리</a></li>
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
                        <!-- <a href="/admin/board/regist/<?php echo $board; ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 등록</a> -->
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
                                <?php if ( $top_yn ) { ?><th class="text-center">상단공지</th><?php } ?>                                
                                <th class="text-center"><?php echo ( $reply_yn ) ? '질문' : '제목'; ?></th>
                                <?php if ( $reply_yn ) { ?><th class="text-center">답변여부</th><?php } ?>
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
                                    <?php if ( $top_yn ) { ?>
                                    <td class="text-center"><?php echo ( $board->board_top_yn == 'Y' ) ? '예' : '아니오'; ?></td>
                                    <?php } ?>
                                    <td class=""><?php echo $board->board_title; ?></td>
                                    <?php if ( $reply_yn ) { ?>
                                    <td class="text-center">
                                        <?php echo ( $board->board_reply_yn == 'Y' ) ? '예' : '아니오'; ?>                                      
                                        <?php echo ( $board->board_reply_yn == 'Y' ) ? '<br>('.$board->reply_datetime.')' : ''; ?>
                                    </td>
                                    <?php } ?>
                                    <td class="text-center"><?php echo $board->ins_datetime; ?></td>
                                    <td class="text-center"><?php echo $board->upd_datetime; ?></td>
                                    <td class="text-center">
                                        <a href="/admin/market/modify/<?php echo $board->board_type; ?>/<?php echo $board->board_seq; ?>" class="btn btn-sm btn-primary">수정</a>
                                        <a href="/admin/market/delete/<?php echo $board->board_type; ?>/<?php echo $board->board_seq; ?>" class="btn btn-sm btn-danger btn-delete">삭제</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <?php
                            if ( $board_data['count'] == 0 ) {
                                $colspan = 5;
                                if ( $top_yn )
                                    $colspan++;
                                if ( $reply_yn )
                                    $colspan++;
                            ?>
                                <tr>
                                    <td class="text-center" colspan="<?php echo $colspan; ?>">글이 없습니다.</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <?php echo $board_data['pagination']; ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>