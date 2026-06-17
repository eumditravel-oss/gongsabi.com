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
                    <h4 class="page-title"><?php echo $board_title; ?> 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/contact/modify_proc" class="form-horizontal" role="form" enctype="multipart/form-data">

                    <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                    <input type="hidden" name="board_type" value="<?php echo $board_data['list'][0]->board_type; ?>">

                    <div class="float-right">
                        <a href="/admin/contact" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 수정</a>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 수정</h4>

                    <p class="sub-header">
                        <?php echo $board_title; ?>을 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_name">이름</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_name" name="board_name" class="form-control" value="<?php echo $board_data['list'][0]->board_name; ?>" required="true" placeholder="이름">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_company">회사</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_company" name="board_company" class="form-control" value="<?php echo $board_data['list'][0]->board_company; ?>" required="true" placeholder="회사">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_hp">휴대폰번호</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_hp" name="board_hp" class="form-control" value="<?php echo $board_data['list'][0]->board_hp; ?>" required="true" placeholder="휴대폰번호">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_email">이메일주소</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_email" name="board_email" class="form-control" value="<?php echo $board_data['list'][0]->board_email; ?>" required="true" placeholder="이메일주소">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">요청사항</label>
                                    <div class="col-sm-10">
                                        <textarea id="board_content" name="board_content" class="form-control" rows="15" required="true" placeholder="요청사항"><?php echo $board_data['list'][0]->board_content; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">첨부파일 1</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_attach_1" class="form-control">
                                        <?php if ( $board_data['list'][0]->board_attach_1 ) { ?>
                                        <?php
                                            $_file = explode('|', $board_data['list'][0]->board_attach_1);
                                            echo '<a href="'.$this->config->item('gongsabi_data_contact').'/'.$_file[0].'" target="_blank">'.$_file[1].'</a>';
                                        ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">첨부파일 3</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_attach_2" class="form-control">
                                        <?php if ( $board_data['list'][0]->board_attach_2 ) { ?>
                                        <?php
                                            $_file = explode('|', $board_data['list'][0]->board_attach_2);
                                            echo '<a href="'.$this->config->item('gongsabi_data_contact').'/'.$_file[0].'" target="_blank">'.$_file[1].'</a>';
                                        ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">첨부파일 3</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_attach_3" class="form-control">
                                        <?php if ( $board_data['list'][0]->board_attach_3 ) { ?>
                                        <?php
                                            $_file = explode('|', $board_data['list'][0]->board_attach_3);
                                            echo '<a href="'.$this->config->item('gongsabi_data_contact').'/'.$_file[0].'" target="_blank">'.$_file[1].'</a>';
                                        ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>