
	<div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Estimate Inquiry</h2>
                        <p>
                            Grow your business by using GongSabi.com to get rough and definitive quantity estimates, quantity inspection on construction site, drawing changes, validation test and claims, etc.<br>
                            Simply ask us about from cost estimating to quantity surveying <span class="mfc fb">without logging in</span>.<br>
                            We will address your inquiry as quickly as possible and contact you via text messages, email or [MY PAGE -  Estimate Inquiry].
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
                    <form action="/front/community/gongsabi_regist_proc" method="post" class="classy-form" enctype="multipart/form-data">

                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>Consent</h4>
                        </div>
                        <div class="termarea">
<pre style="white-space:pre-line;"><?php echo $privacy; ?></pre>
                        </div>
                        <div class="termcheck">
                            <label for="agree"><input type="checkbox" name="agree" id="agree" value="1">&nbsp;I agree to the privacy policy.</label>
                        </div>
                    </div>

                    <div class="single_shortcodes_are m-top-50">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>Estimate Inquiry</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="board_category">Category</label>
                                <select class="form-control" name="board_category" id="board_category">
                                <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST_ENG') as $key => $gongsabi) { ?>
                                    <option value="<?php echo $key; ?>"<?php if ( $key == '1' ) { ?> selected="true"<?php } ?>><?php echo $gongsabi; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="board_name">Name <small class="text-danger">* Required</small></label>
                                <input type="text" class="form-control" name="board_name" id="board_name" placeholder="Name" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="board_company">Company name <small class="text-danger">* Required</small></label>
                                <input type="text" class="form-control" name="board_company" id="board_company" placeholder="Company name" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="board_hp">Tel <small class="text-danger">* Required</small></label>
                                <input type="text" class="form-control handle-cell-phone" name="board_hp" id="board_hp" placeholder="Tel" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" maxlength="13" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="board_email">E-mail <small class="text-danger">* Required</small></label>
                                <div class="form-email">
                                    <input type="hidden" name="board_email" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>">
                                    <span class="email-part"><input type="text" class="form-control" name="email_id" required></span>
                                    <span class="email-at">@</span>
                                    <span class="email-part pr-1"><input type="text" class="form-control" name="email_address" required></span>
                                    <span class="email-part">
                                        <select name="email_address_list" class="form-control" required>
                                            <option value="">직접입력</option>
                                            <option value="gmail.com">gmail.com</option>
                                            <option value="naver.com">naver.com</option>
                                            <option value="daum.net">daum.net</option>
                                            <option value="nate.com">nate.com</option>
                                        </select>
                                    </span>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="board_content">Inquiry <small class="text-danger">* Required</small></label>
                                <textarea class="form-control" name="board_content" id="board_content" rows="15" placeholder="Enter text here."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="board_attach_1">File 1</label>
                                <input type="file" class="form-control" id="board_attach_1" name="board_attach_1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="board_attach_2">File 2</label>
                                <input type="file" class="form-control" id="board_attach_2" name="board_attach_2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="board_attach_3">File 3</label>
                                <input type="file" class="form-control" id="board_attach_3" name="board_attach_3">
                            </div>
                        </div>
                        <small class="text-danger">※ Maximum allowed file size is 10MB. (Allowed file types : doc, docx, jpg, pdf, png, etc)</small>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="button" class="btn btn-success" onclick="gongsabi_regist(this);">Post</button>
                            </div>
                        </div>

                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search_wrapper">
                    <form method="get" class="">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group down_arrow">
                                    <div class="dropdown">
                                        <div class="dropdown-title">
                                            <?php echo ( $condition['board_category'] == '' ) ? 'Select' : ''; ?>
                                            <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST_ENG') as $key => $gongsabi) { ?>
                                            <?php echo ( $condition['board_category'] == $key ) ? $gongsabi : ''; ?>
                                            <?php } ?>
                                        </div>

                                        <div class="custom-dropdown-menu">
                                            <div class="dropdown-menu-option" data-value="">Select</div>
                                            <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST_ENG') as $key => $gongsabi) { ?>
                                            <div class="dropdown-menu-option" data-value="<?php echo $key; ?>"><?php echo $gongsabi; ?></div>
                                            <?php } ?>
                                        </div>

                                        <input type="hidden" name="board_category" value="<?php echo $condition['board_category']; ?>" class="dropdown-select">
                                    </div>
                                    <!-- <select name="board_category" id="board_category" class="form-control select-align-center">
                                        <option value="" selected="true">= Select =</option>
                                        <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST_ENG') as $key => $gongsabi) { ?>
                                            <option value="<?php echo $key; ?>"<?php if ( $key == $condition['board_category'] ) { ?> selected="true"<?php } ?>><?php echo $gongsabi; ?></option>
                                        <?php } ?>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-5 m-xs-top-15">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="Enter the keyword.">
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
									<th>Organization</th>
                                    <th>Name</th>
									<th>Posted on</th>
                                    <th>Attachment</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $board_data['list'] as $board ) { ?>
								<tr>
									<td class="text-center"><?php echo $board->rownum; ?></td>                                    
                                    <?php if ( $board->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                    <td class="text-center"><a href="/front/community/gongsabi_view/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('GONGSABI_REQUEST_LIST_ENG')[$board->board_category]; ?></a></td>
                                    <td class="text-center"><a href="/front/community/gongsabi_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_company; ?></a></td>
                                    <td class="text-center"><a href="/front/community/gongsabi_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td>
                                    <?php } else { ?>
                                    <td class="text-center"><a href="#" onclick="not_access();"><?php echo $this->config->item('GONGSABI_REQUEST_LIST_ENG')[$board->board_category]; ?></a></td>
                                    <td class="text-center"><a href="#" onclick="not_access();"><?php echo HP_ENC_TEXT($board->board_company); ?></a></td>
                                    <td class="text-center"><a href="#" onclick="not_access();"><?php echo HP_ENC_TEXT($board->board_name); ?></a></td>
                                    <?php } ?>
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