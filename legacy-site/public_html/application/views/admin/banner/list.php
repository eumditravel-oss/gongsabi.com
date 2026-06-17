<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">배너 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title">배너 리스트</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="/admin/banner/banner_regist" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 등록</a>
                        <button type="button" class="btn btn-outline btn-primary" onclick="order_save();"><i class="fa fa-sort-amount-asc"></i> 정렬순서저장</button>
                    </div>

                    <h4 class="header-title">배너 리스트</h4>

                    <p class="sub-header">
                        총 <?php echo number_format($board_data['count']); ?>개
                    </p>

                    <form method="get">
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="_keyword">영역</label>
                                <div class="input-group">
                                    <select name="area" id="area" class="form-control">
                                        <option value="">전체</option>
                                        <?php foreach ($this->config->item('BANNER_LIST') as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"<?php echo ( $condition['area']== $key ) ? ' selected="true"' : ''; ?>><?php echo $value['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">검색</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="table-responsive">
                        <form method="post" action="/admin/banner/banner_order">
                        <input type="hidden" name="area" value="<?php echo $condition['area']; ?>">
                        <table class="table table-bordered handle-table">
                        <thead>
                            <tr>
                                <th class="text-center">번호</th>
                                <!-- <th class="text-center">상태</th> -->
                                <th class="text-center">영역</th>
                                <th class="text-center">설명</th>
                                <th class="text-center">웹</th>
                                <th class="text-center">모바일</th>
                                <th class="text-center">정렬순서</th>
                                <th class="text-center">등록일</th>
                                <th class="text-center">수정일</th>
                                <th class="text-center">관리</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($board_data['list'] as $board) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo number_format($board->rownum); ?></td>
                                <!-- <td class="text-center"><?php echo ( $board->status == '9' ) ? '사용함' : '<span class="text-danger">사용중지</span>'; ?></td> -->
                                <td class="text-center"><?php echo $this->config->item('BANNER_LIST')[$board->area]['name']; ?></td>
                                <td class="text-center"><?php echo $board->desc; ?></td>
                                <td class="text-center"><a href="/static/data/banner/<?php echo $board->area; ?>/<?php echo $board->w_image; ?>" target="_blank"><img src="/static/data/banner/<?php echo $board->area; ?>/<?php echo $board->w_image; ?>" style="height:70px;"></a></td>
                                <td class="text-center"><a href="/static/data/banner/<?php echo $board->area; ?>/<?php echo $board->m_image; ?>" target="_blank"><img src="/static/data/banner/<?php echo $board->area; ?>/<?php echo $board->m_image; ?>" style="height:70px;"></a></td>
                                <td class="text-center">
                                    <input type="hidden" name="seq[]" value="<?php echo $board->seq; ?>">
                                    <input type="hidden" name="area[]" value="<?php echo $board->area; ?>">
                                    <input type="number" name="banner_order[]" value="<?php echo $board->banner_order; ?>" class="form-control" min="1" style="width:80px;display:inline-block;">
                                </td>
                                <td class="text-center"><?php echo $board->ins_datetime; ?></td>
                                <td class="text-center"><?php echo $board->upd_datetime; ?></td>
                                <td class="text-center">
                                    <a href="/admin/banner/banner_modify/<?php echo $board->area; ?>/<?php echo $board->seq; ?>?area=<?php echo $condition['area']; ?>&page=<?php echo $this->input->get('page'); ?>" class="btn btn-sm btn-primary">수정</a>
                                    <a href="/admin/banner/banner_delete/<?php echo $board->area; ?>/<?php echo $board->seq; ?>?area=<?php echo $condition['area']; ?>&page=<?php echo $this->input->get('page'); ?>" class="btn btn-sm btn-danger btn-delete">삭제</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <?php if ( count($board_data['count']) == 0 ) { ?>
                            <tr>
                                <td class="text-center" colspan="<?php echo ( $board == 'main' ) ? '9' : '8'; ?>">글이 없습니다.</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                        </form>
                    </div>

                    <div>
                        <?php echo $board_data['pagination']; ?>
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