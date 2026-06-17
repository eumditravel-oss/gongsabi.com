

    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <ul class="nav nav-tabs" id="tab1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( !$this->input->get('tab') || $this->input->get('tab') == '1' ) ? ' active' : ''; ?>" id="tab1-1-tab" data-toggle="tab" href="#tab1-1" role="tab" aria-controls="tab1-1" aria-selected="true">Who we are and What we do</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $this->input->get('tab') == '2' ) ? ' active' : ''; ?>" id="tab1-2-tab" data-toggle="tab" href="#tab1-2" role="tab" aria-controls="tab1-2" aria-selected="false">Recruitment process</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $this->input->get('tab') == '3' ) ? ' active' : ''; ?>" id="tab1-3-tab" data-toggle="tab" href="#tab1-3" role="tab" aria-controls="tab1-3" aria-selected="false">Career Opportunities</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade<?php echo ( !$this->input->get('tab') || $this->input->get('tab') == '1' ) ? ' show active' : ''; ?> p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <div class="company_sub_title">Who we hire</div>
                                <div class="company_injae_wrapper">
                                    <div class="company_injae">
                                        <div class="company_injae_image injae1"></div>
                                        <div class="company_injae_title oneline">COMMUNICATOR</div>
                                        <div class="company_injae_desc">
                                            We develope deep empathy for our customer's needs and communicate based on consideration.
                                        </div>
                                    </div>
                                    <div class="company_injae">
                                        <div class="company_injae_image injae2"></div>
                                        <div class="company_injae_title light">CONTROL STRONG SELF-PRIDE<br>AND OWNERSHIP</div>
                                        <div class="company_injae_desc">
                                            We are continually striving to exceed expectations for ourselves and the company.
                                        </div>
                                    </div>
                                    <div class="company_injae">
                                        <div class="company_injae_image injae3"></div>
                                        <div class="company_injae_title oneline">EMBRACE CHALLENGES</div>
                                        <div class="company_injae_desc">
                                            We rapidly take the initiative in a fast-changing world and are ready to grow and create positive changes.
                                        </div>
                                    </div>
                                </div>
                                <div class="company_sub_title">Team roles and resposibilities</div>
                                <div class="company_part_wrapper">
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part001.png"></div>
                                        <div class="company_part_name">Software development team</div>
                                        <div class="company_part_desc">
                                            Develop and test the program for rough quantity take-off
                                        </div>
                                    </div>
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part002.png"></div>
                                        <div class="company_part_name">Sales team</div>
                                        <div class="company_part_desc">
                                            Reel customer in and customer support
                                        </div>
                                    </div>
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part003.png"></div>
                                        <div class="company_part_name">PR team</div>
                                        <div class="company_part_desc">
                                            SNS channel management and marketing
                                        </div>
                                    </div>
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part004.png"></div>
                                        <div class="company_part_name">Management support team</div>
                                        <div class="company_part_desc">
                                            Strategy design, HR, Budget
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $this->input->get('tab') == '2' ) ? ' show active' : ''; ?> p-15" id="tab1-2" role="tabpanel" aria-labelledby="tab1-2-tab">
                                <div class="company_sub_title">Recruitment process</div>
                                <div class="company_recruit_wrapper">
                                    <p class="top_title">We’re looking for people who share their passion for new market standard and confidence!</p>
                                    <div class="recruit_process">
                                        <div class="process">
                                            <img src="/static/img/recruit_process001.png"><br>
                                            Apply to vacancies
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process002.png"><br>
                                            Screening and<br>evaluating candidates
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process003.png"><br>
                                            First interview<br>(Technical Interview)
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process004.png"><br>
                                            Second interview<br>(Executive Interveiw)
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process005.png"><br>
                                            Hiring
                                        </div>
                                    </div>
                                    <!-- <img src="/static/img/recruit_process.png"> -->
                                    <div class="recruit_desc_wrapper">
                                        <p class="recruit_desc_title">1. Job position / Working condition</p>
                                        <div class="recruit_desc">
                                            - Software Development Team : Develop and test the program for rough quantity take-off<br>
                                            - Sales team : Reel customer in and customer support<br>
                                            - PR team : SNS channel management and marketing<br>
                                            - Management support team : Strategy design, HR, Budget<br>
                                            - Working Hours : 5 days a week(Monday to Friday) from 9:00 to 17:00
                                        </div>
                                        <p class="recruit_desc_title">2. Apply to vacancies</p>
                                        <div class="recruit_desc">
                                            - To apply for a job online, please look through current vacancies and job offers on this site or job search sites and submit Job applications, up-to-date resume and cover letter (with recent photo) via <?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL3']; ?>.<br>
                                            - Please make sure to check the position and responsibility you apply before summit the job applications.<br>
                                            ※ Disqualification or cancellation of recruitment if information on the required documents. turns out to be false
                                        </div>
                                        <p class="recruit_desc_title">3. Screening and evaluating candidates</p>
                                        <div class="recruit_desc">
                                            Our HR team will review your application against the job profile to check qualifications and experience required of candidates. We thank all applicants for their interest, however only those candidates selected for interviews will be contacted.
                                        </div>
                                        <p class="recruit_desc_title">4. First interview (Technical Interview)</p>
                                        <div class="recruit_desc">
                                            If you are selected for an interview, you will be invited to talk to a recruiter, hiring manager and other members of the team in person. During the first interview, we would like to find out about your personal interests as well as your enthusiasm for GongSaBi.com. To assess your level of expertise, we also come up with some technical questions so it would be great if you show that you have skills in your field of interest.
                                        </div>
                                        <p class="recruit_desc_title">5. Second interview (Executive Interveiw)</p>
                                        <div class="recruit_desc">
                                            If everything goes well, you will be able to meet our executive to get a better understanding for each other. To us, the most important thing is that you fit in with the company.
                                        </div>
                                        <p class="recruit_desc_title">6. Hiring</p>
                                        <div class="recruit_desc">
                                            If you are selected, you will receive a letter or call.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $this->input->get('tab') == '3' ) ? ' show active' : ''; ?> p-15" id="tab1-3" role="tabpanel" aria-labelledby="tab1-3-tab">
                                <div class="company_sub_title">
                                    Career Opportunities
                                    <button type="button" class="btn btn-success p-a-r" onclick="get_job_application();">Download Job Application Form</button>
                                </div>
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table mb-5">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="*">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center"><a href="#">Job Opening for Inexperienced Worker</a></td>
                                            <td class="text-center">2020-09-01</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center"><a href="/front/company/recruit_view/1">Job Opening for Experienced Worker</a></td>
                                            <td class="text-center">2020-09-01</td>
                                        </tr>
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
            </div>
        </div>
    </section>