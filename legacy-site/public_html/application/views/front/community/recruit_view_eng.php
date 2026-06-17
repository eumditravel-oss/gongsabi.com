
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Careers</h2>
                        <p>
                            Matching the Right Person to the Right Job in Construction.<br><br>
                            <small>* GongSaBi.com does not accept any responsibility and will not be liable for any loss or damage suffered by you whatsoever arising out of or in connection with any ability/inability to access or to use the website.</small><br>
                            <small>* Offending or inappropiate content will be deleted after reviewed by an administrator.</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <table class="table classy-table table-bordered table-responsive gongsabi-table">
                            <colgroup>
                                <col width="15%">
                                <col width="35%">
                                <col width="15%">
                                <col width="35%">
                            </colgroup>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="text-center bg-gray">Category</th>
                                    <td class="text-left"><?php echo $this->config->item('RECRUIT_TYPE')[$board_data['list'][0]->board_category]; ?></td>
                                    <th class="text-center bg-gray">Posted on</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->ins_datetime; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">Name</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_name, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                    <th class="text-center bg-gray">Company name</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_company, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">Tel</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_hp, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                    <th class="text-center bg-gray">E-mail</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_email, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">Title</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo $board_data['list'][0]->board_title; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">Details</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_data['list'][0]->board_content); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">File</th>
                                    <td class="text-left" colspan="3">                                           
                                        <?php if ( $board_data['list'][0]->board_attach_1 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('recruit', $board_data['list'][0]->board_seq, '1'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_data['list'][0]->board_attach_2 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('recruit', $board_data['list'][0]->board_seq, '2'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_data['list'][0]->board_attach_3 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('recruit', $board_data['list'][0]->board_seq, '3'); ?></p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/community/recruit" class="btn btn-outline-success">List</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <?php if ( $board_data['list'][0]->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                <a href="/front/mypage/modify/recruit/<?php echo $board_data['list'][0]->board_seq; ?>?ismypage=0" class="btn btn-success">Modify Post</a>
                                <a href="#" class="btn btn-success" onclick="board_delete('recruit', '<?php echo $board_data['list'][0]->board_seq; ?>');">Delete Post</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>