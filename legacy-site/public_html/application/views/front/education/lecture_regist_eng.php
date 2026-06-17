
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Education Inquiry</h2>
                        <p>                            
                            You will understand in death regarding QS(Quantity take-off), Bill of Quantity and Drawing changes after taking lectures.<br>
                            You can request open topic lectures on the subject you may need or be curious about.<br>
                            Please contact (+82) 2.2202.2258 for the location of the lecture and tuition fees.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <ul class="nav nav-tabs" id="tab1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1-1-tab" data-toggle="tab" href="#tab1-1" role="tab" aria-controls="tab1-1" aria-selected="true">Topic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab1-2-tab" data-toggle="tab" href="#tab1-2" role="tab" aria-controls="tab1-2" aria-selected="false">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab1-3-tab" data-toggle="tab" href="#tab1-3" role="tab" aria-controls="tab1-3" aria-selected="false">Instructor</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <table class="table table-bordered classy-table gongsabi-table lecture-list-table m-top-30 m-bottom-30">
                                <colgroup>
                                    <col width="*">
                                    <col width="15%">
                                    <col width="*">
                                </colgroup>
                                <thead>
                                    <tr class="bg-gray">
                                        <th>Subject</th>
                                        <th>Learning time</th>
                                        <th>Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->config->item('LECTURE_LIST') as $key => $lecture) { ?>
                                    <tr>
                                        <td class=""><?php echo $lecture['title_eng']; ?></td>
                                        <td class="text-center"><?php echo $lecture['time_eng']; ?></td>
                                        <td class=""><?php echo $lecture['desc_eng']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade p-15" id="tab1-2" role="tabpanel" aria-labelledby="tab1-2-tab">
                                <form action="/front/education/lecture_regist_proc" method="post" class="m-top-30 classy-form">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="board_category">Curriculum <small class="text-danger">* Required</small></label>
                                            <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                            <?php foreach ($this->config->item('LECTURE_LIST') as $key => $lecture) { ?>
                                                <option value="<?php echo $key; ?>"<?php if ( $key == '1' ) { ?> selected="true"<?php } ?>><?php echo $lecture['title_eng']; ?> (<?php echo $lecture['time_eng']; ?>)</option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="board_etc_1">Date <small class="text-danger">* Required</small></label>
                                            <input type="text" class="form-control air-datepicker" name="board_etc_1" id="board_etc_1" placeholder="Date" value="" maxlength="10" required autocomplete="off">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="board_etc_2">Participants <small class="text-danger">* Required</small></label>
                                            <input type="text" class="form-control" name="board_etc_2" id="board_etc_2" placeholder="Participants" value="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="board_company">Company name <small class="text-danger">* Required</small></label>
                                            <input type="text" class="form-control" name="board_company" id="board_company" placeholder="Company name" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="board_name">Name <small class="text-danger">* Required</small></label>
                                            <input type="text" class="form-control" name="board_name" id="board_name" placeholder="Name" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required>
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
                                        <div class="col-md-12">
                                            <label for="board_content">Details</label>
                                            <textarea class="form-control" name="board_content" id="board_content" cols="30" rows="10" placeholder="Enter text here."></textarea>
                                        </div>
                                    </div>
                                    <div class="row m-top-15">
                                        <div class="col-lg-6">
                                            <!-- <a href="/front/education/lecture" class="btn btn-outline-success">취소</a> -->
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button type="submit" class="btn btn-success">Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade p-15" id="tab1-3" role="tabpanel" aria-labelledby="tab1-3-tab">
                                <p class="mt-3">Founded <span class="mfc fb"><?php echo count($teacher_list); ?></span> Instructor(s).</p>
                                <ul class="teacher_list">
                                <?php foreach ($teacher_list as $teacher) { ?>
                                    <li>
                                        <div class="teacher_info_wrapper">
                                            <div class="teacher_image"><img src="/static/data/teacher/<?php echo $teacher->teacher_photo; ?>"></div>
                                            <div class="teacher_info">
                                                <p class="teacher_name"><?php echo $teacher->teacher_name_eng; ?></p>
                                                <div class="teacher_desc">
                                                    <?php echo nl2br($teacher->teacher_desc_eng); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>