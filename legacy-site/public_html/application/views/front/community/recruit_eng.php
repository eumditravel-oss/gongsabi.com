
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
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

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search_wrapper">
                    <form method="get" class="">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group down_arrow">
                                    <div class="dropdown">
                                        <div class="dropdown-title">
                                            <?php echo ( $condition['board_category'] == '' ) ? 'Select' : ''; ?>
                                            <?php foreach ($this->config->item('RECRUIT_TYPE_ENG') as $key => $gongsabi) { ?>
                                            <?php echo ( $condition['board_category'] == $key ) ? $gongsabi : ''; ?>
                                            <?php } ?>
                                        </div>

                                        <div class="custom-dropdown-menu">
                                            <div class="dropdown-menu-option" data-value="">Select</div>
                                            <?php foreach ($this->config->item('RECRUIT_TYPE_ENG') as $key => $gongsabi) { ?>
                                            <div class="dropdown-menu-option" data-value="<?php echo $key; ?>"><?php echo $gongsabi; ?></div>
                                            <?php } ?>
                                        </div>

                                        <input type="hidden" name="board_category" value="<?php echo $condition['board_category']; ?>" class="dropdown-select">
                                    </div>
                                    <!-- <select name="board_category" id="board_category" class="form-control select-align-center">
                                        <option value="" selected="true">= Select =</option>
                                        <option value="person"<?php echo ( $condition['board_category'] == 'person' ) ? ' selected="true"' : ''; ?>>Employer</option>
                                        <option value="job"<?php echo ( $condition['board_category'] == 'job' ) ? ' selected="true"' : ''; ?>>Job seekers</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6 m-xs-top-15">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="Find Jobs.">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <button type="submit" class="btn btn-block btn-default">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>Founded <?php echo number_format($board_data['count']); ?> Result(s)</h4>
                        </div>
                        <div class="row m-bottom-15">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6 text-right">
                            </div>
                        </div>
                        <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                            <colgroup>
                                <col width="7%">
                                <col width="10%">
                                <col width="*">
                                <col width="15%">
                                <col width="15%">
                                <col width="10%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Organization</th>
                                    <th>Posted by</th>
                                    <th>Posted on</th>
                                    <th>Attachment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $board_data['list'] as $board ) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $board->rownum; ?></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('RECRUIT_TYPE')[$board->board_category]; ?></a></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_title; ?></a></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo HP_ENC_TEXT($board->board_company, !$this->session->userdata('MEMBER_SESSION')); ?></a></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo HP_ENC_TEXT($board->board_name, !$this->session->userdata('MEMBER_SESSION')); ?></a></td>
                                    <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                    <td class="text-center">
                                        <?php if ( $board->board_attach_1 || $board->board_attach_2 || $board->board_attach_3 ) { ?>
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-12 text-right">
                                <?php if ( $this->session->userdata('MEMBER_LEVEL') > 1 ) { ?>
                                <a href="/front/community/recruit_regist" class="btn btn-success">Add post</a>
                                <?php } else { ?>
                                <a href="#" onclick="login_required();" class="btn btn-success">Add post</a>
                                <?php } ?>
                            </div>
                        </div>
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
    </section>