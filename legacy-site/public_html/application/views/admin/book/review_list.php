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
                        <!-- <a href="/admin/book/regist" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 등록</a> -->
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 리스트</h4>

                    <p class="sub-header">
                        총 <?php echo $board_data['count']; ?>개
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th class="text-center">책</th>
                                <th class="text-center">평점</th>
                                <th class="text-center">내용</th>
                                <th class="text-center">등록자</th>
                                <th class="text-center">등록일</th>
                                <th class="text-center">관리</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($board_data['list'] as $review) {
                                $on_count = (int)$review->review_score;
                                $off_count = 5 - (int)$review->review_score;
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $this->config->item('BOOK_LIST')[$review->book_num]['name']; ?></td>
                                    <td class="text-center"><?php for ( $i = 0; $i < $on_count; $i++ ) { ?><img src="/static/img/star_small_on.png"><?php } ?><?php for ( $i = 0; $i < $off_count; $i++ ) { ?><img src="/static/img/star_small_off.png"><?php } ?></td>
                                    <td class="text-left"><?php echo nl2br($review->review_comment); ?></td>
                                    <td class="text-center"><?php echo $review->member_name; ?></td>
                                    <td class="text-center"><?php echo $review->ins_datetime; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="delete_review('<?php echo $review->review_seq; ?>');">삭제</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <?php
                            if ( $board_data['count'] == 0 ) {
                                $colspan = 6;
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