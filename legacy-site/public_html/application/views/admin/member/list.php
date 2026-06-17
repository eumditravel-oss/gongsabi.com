<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">회원 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title">회원 리스트</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" onclick="download();">다운로드</button>
                        <form method="post" action="/admin/member/download" id="frm_download">
                            <input type="hidden" name="member_type" value="<?php echo $condition['member_type']; ?>">
                            <input type="hidden" name="member_use" value="<?php echo $condition['member_use']; ?>">
                            <input type="hidden" name="keyword" value="<?php echo $condition['keyword']; ?>">
                        </form>
                    </div>

                    <h4 class="header-title">회원 리스트</h4>

                    <p class="sub-header">
                        총 <?php echo $board_data['count']; ?>명
                    </p>

                    <form method="get">
                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="_member_type">회원유형</label>
                                <select name="member_type" id="_member_type" class="form-control">
                                    <option value="">회원유형</option>
                                    <option value="1"<?php echo ( $condition['member_type'] == '1' ) ? ' selected="true"' : ''; ?>>무료회원</option>
                                    <option value="2"<?php echo ( $condition['member_type'] == '2' ) ? ' selected="true"' : ''; ?>>유료회원</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="_member_use">회원상태</label>
                                <select name="member_use" id="_member_use" class="form-control">
                                    <option value="">회원상태</option>
                                    <option value="1"<?php echo ( $condition['member_use'] == '1' ) ? ' selected="true"' : ''; ?>>정상</option>
                                    <option value="8"<?php echo ( $condition['member_use'] == '8' ) ? ' selected="true"' : ''; ?>>탈퇴</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="_keyword">검색어</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" id="_keyword" value="<?php echo $condition['keyword']; ?>" placeholder="검색어">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">검색</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th class="text-center">번호</th>
                                <th class="text-center">회원유형</th>
                                <th class="text-center">회원상태</th>
                                <th class="text-center">이름</th>
                                <th class="text-center">아이디</th>
                                <th class="text-center">휴대폰번호</th>
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
                                    <td class="text-center<?php echo ( $board->member_type == '2' ) ? ' text-warning' : ''; ?>"><?php echo $this->config->item('MEMBER_TYPE')[$board->member_type]['name']; ?></td>
                                    <td class="text-center<?php echo ( $board->member_use == '8' ) ? ' text-muted' : ''; ?>"><?php echo $this->config->item('MEMBER_USE')[$board->member_use]['name']; ?></td>
                                    <td class="text-center"><?php echo $board->member_name; ?></td>
                                    <td class="text-center"><?php echo $board->member_id; ?></td>
                                    <td class="text-center"><?php echo $board->member_hp; ?></td>
                                    <td class="text-center"><?php echo $board->ins_datetime; ?></td>
                                    <td class="text-center"><?php echo $board->upd_datetime; ?></td>
                                    <td class="text-center">
                                        <a href="/admin/member/modify/<?php echo $board->member_seq; ?>?page=<?php echo $this->input->get('page'); ?>&<?php echo http_build_query($condition); ?>" class="btn btn-sm btn-primary">수정</a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="delete_member('<?php echo $board->member_seq; ?>?page=<?php echo $this->input->get('page'); ?>&<?php echo http_build_query($condition); ?>');">삭제</button>
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
                                    <td class="text-center" colspan="<?php echo $colspan; ?>">회원이 없습니다.</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <?php echo $pagination; ?>
                        </div>
                        <div class="col-lg-6 text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>