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
                        <a href="/admin/config/lecture_regist" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 등록</a>
                        <button type="button" class="btn btn-outline btn-primary" onclick="order_save();"><i class="fa fa-sort-amount-asc"></i> 정렬순서저장</button>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 리스트</h4>

                    <p class="sub-header">
                        총 <?php echo $board_data['count']; ?>개
                    </p>

                    <div class="table-responsive">
                        <form method="post" action="/admin/config/lecture_order">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th class="text-left">교육 제목</th>
                                <th class="text-left">교육 시간</th>
                                <th class="text-left">교육 내용</th>
                                <th class="text-center">정렬순서</th>
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
                                    <td class="text-left"><?php echo $board->lecture_title; ?></td>
                                    <td class="text-left"><?php echo $board->lecture_time; ?></td>
                                    <td class="text-left"><?php echo $board->lecture_content; ?></td>
                                    <td class="text-center">
                                        <input type="hidden" name="lecture_seq[]" value="<?php echo $board->lecture_seq; ?>">
                                        <input type="number" name="lecture_order[]" value="<?php echo $board->lecture_order; ?>" class="form-control" min="1" style="width:80px;display:inline-block;">
                                    </td>
                                    <td class="text-center"><?php echo $board->lecture_ins_datetime; ?></td>
                                    <td class="text-center"><?php echo $board->lecture_upd_datetime; ?></td>
                                    <td class="text-center">
                                        <a href="/admin/config/lecture_modify/<?php echo $board->lecture_seq; ?>" class="btn btn-sm btn-primary">수정</a>
                                        <a href="/admin/config/lecture_delete/<?php echo $board->lecture_seq; ?>" class="btn btn-sm btn-danger btn-delete">삭제</a>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>
<script>
function order_save()
{
    $('form').submit();
}
</script>