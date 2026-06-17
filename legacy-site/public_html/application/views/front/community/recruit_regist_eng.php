
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

	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are m-top-100">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>구인 / 구직 글등록</h4>
                        </div>

                        <form action="/front/community/recruit_regist_proc" method="post" class="classy-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_category">Select <small class="text-danger">* Required</small></label>
                                    <select class="custom-select d-block w-100" id="board_category" name="board_category">
                                        <option value="person" selected="true">Employer</option>
                                        <option value="job">Job seekers</option>
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
                                    <label for="board_email">E-mail</label>
                                    <div class="form-email">
                                        <input type="hidden" name="board_email" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>">
                                        <span class="email-part"><input type="text" class="form-control" name="email_id"></span>
                                        <span class="email-at">@</span>
                                        <span class="email-part pr-1"><input type="text" class="form-control" name="email_address"></span>
                                        <span class="email-part">
                                            <select name="email_address_list" class="form-control">
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
                                    <label for="board_title">Title <small class="text-danger">* Required</small></label>
                                    <input type="text" class="form-control" id="board_title" name="board_title" placeholder="Title" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_content">Details <small class="text-danger">* Required</small></label>
                                    <textarea class="form-control" id="board_content" name="board_content" rows="15" placeholder="Enter text here." required="true"></textarea>
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
                                    <a href="/front/community/recruit" class="btn btn-outline-success">Cancel Post</a>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="button" class="btn btn-success" onclick="market_regist(this);">Publish Post</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>