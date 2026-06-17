

    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <ul class="nav nav-tabs" id="tab1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( !$this->input->get('tab') || $this->input->get('tab') == '1' ) ? ' active' : ''; ?>" id="tab1-1-tab" data-toggle="tab" href="#tab1-1" role="tab" aria-controls="tab1-1" aria-selected="true">인재상 및 부서소개</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $this->input->get('tab') == '2' ) ? ' active' : ''; ?>" id="tab1-2-tab" data-toggle="tab" href="#tab1-2" role="tab" aria-controls="tab1-2" aria-selected="false">채용 절차</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $this->input->get('tab') == '3' ) ? ' active' : ''; ?>" id="tab1-3-tab" data-toggle="tab" href="#tab1-3" role="tab" aria-controls="tab1-3" aria-selected="false">채용 공고</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade<?php echo ( !$this->input->get('tab') || $this->input->get('tab') == '1' ) ? ' show active' : ''; ?> p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <div class="company_sub_title">인재상</div>
                                <div class="company_injae_wrapper">
                                    <div class="company_injae">
                                        <div class="company_injae_image injae1"></div>
                                        <div class="company_injae_title oneline">커뮤니케이터</div>
                                        <div class="company_injae_desc">
                                            고객의 니즈를 이해하고 배려를<br>기반으로 소통할 수 있는 인재
                                        </div>
                                    </div>
                                    <div class="company_injae">
                                        <div class="company_injae_image injae2"></div>
                                        <div class="company_injae_title oneline light">강한 주체의식과 자신감</div>
                                        <div class="company_injae_desc">
                                            오늘보다 더 나은 자신과 회사를<br>위해 끊임없이 도전하는 인재
                                        </div>
                                    </div>
                                    <div class="company_injae">
                                        <div class="company_injae_image injae3"></div>
                                        <div class="company_injae_title">변화에 대한<br>긍정적이고 유연한 자세</div>
                                        <div class="company_injae_desc">
                                            시장과 고객에 대한 변화를 항상 주시하고,<br>긍정적으로 선도할 수 있는 인재
                                        </div>
                                    </div>
                                </div>
                                <div class="company_sub_title">부서소개</div>
                                <div class="company_part_wrapper">
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part001.png"></div>
                                        <div class="company_part_name">프로그램 개발팀</div>
                                        <div class="company_part_desc">
                                            개산견적의 프로그램<br>수정 및 개발
                                        </div>
                                    </div>
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part002.png"></div>
                                        <div class="company_part_name">영업팀</div>
                                        <div class="company_part_desc">
                                            유·무료 회원의<br>유치 및 관리
                                        </div>
                                    </div>
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part003.png"></div>
                                        <div class="company_part_name">홍보팀</div>
                                        <div class="company_part_desc">
                                            SNS 채널,<br>레터 관리 및 광고
                                        </div>
                                    </div>
                                    <div class="company_part">
                                        <div class="company_part_image"><img src="/static/img/part004.png"></div>
                                        <div class="company_part_name">경영지원팀</div>
                                        <div class="company_part_desc">
                                            기획, 인사/총무,<br>재무, 원가
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $this->input->get('tab') == '2' ) ? ' show active' : ''; ?> p-15" id="tab1-2" role="tabpanel" aria-labelledby="tab1-2-tab">
                                <div class="company_sub_title">채용 절차</div>
                                <div class="company_recruit_wrapper">
                                    <p class="top_title">공사비닷컴과 함께 건설시장의 신뢰와 표준을<br>만들어갈 열정적인 인재를 찾습니다!</p>
                                    <div class="recruit_process">
                                        <div class="process">
                                            <img src="/static/img/recruit_process001.png"><br>
                                            온라인 지원 접수
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process002.png"><br>
                                            서류 전형
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process003.png"><br>
                                            1차 면접 (실무면접)
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process004.png"><br>
                                            2차 면접 (임원면접)
                                        </div>
                                        <div class="process">
                                            <img src="/static/img/recruit_process005.png"><br>
                                            최종 합격
                                        </div>
                                    </div>
                                    <!-- <img src="/static/img/recruit_process.png"> -->
                                    <div class="recruit_desc_wrapper">
                                        <!-- <p class="recruit_desc_title">1. 지원분야 및 근무조건</p>
                                        <div class="recruit_desc">
                                            - 프로그램 개발팀 : 개산견적의 프로그램 수정 및 개발<br>
                                            - 영업팀 : 유•무료회원의 유치 및 관리<br>
                                            - 홍보팀 : SNS 채널, 레터 관리 및 광고<br>
                                            - 경영지원 팀 : 기획, 인사/총무, 재무, 원가<br>
                                            - 근무기간 : 주 5일 (월~금) 09시 ~ 17시
                                        </div>
                                        <p class="recruit_desc_title">2. 온라인 지원 접수</p>
                                        <div class="recruit_desc">
                                            - 직무 채용 지원자는 채용 홈페이지 혹은 해당 홈페이지(채용공고)를 확인하여 입사지원서, 자기소개서 및 경력기술서를 <?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL3']; ?>으로 접수시켜야 합니다.<br>
                                            - 지원서 접수 시 본인의 지원 부서와 담당업무를 확인하고, 해당 직무군을 선택하여 지원서를 최종 접수합니다.<br>
                                            ※ 입사지원서 기재사항이 허위로 판명되면 채용이 취소될 수 있습니다.
                                        </div>
                                        <p class="recruit_desc_title">3. 서류전형</p>
                                        <div class="recruit_desc">
                                            입사지원서의 각 항목에 기재된 내용과 자기소개서 및 경력기술서를 바탕으로, 지원자가 회사와 지원업무에 적합한 지 종합적으로 평가합니다. 합격여부는 개별적으로 전달됩니다.
                                        </div>
                                        <p class="recruit_desc_title">4. 1차 면접 (실무면접)</p>
                                        <div class="recruit_desc">
                                            실제 업무를 수행하기 위한 자질, 실무역량, 능력, 경험, 인성, 전략적 사고 등을 종합적으로 평가합니다. 면접 진행 방식은 다대일 방식입니다.
                                        </div>
                                        <p class="recruit_desc_title">5. 2차 면접 (임원면접)</p>
                                        <div class="recruit_desc">
                                            1차 면접 합격자를 대상으로 공사비닷컴에 걸맞는 인재인지 최종 평가를 하는 단계입니다. 회사와 지원자간 소통을 하며 공사비닷컴과 지원 직무에 대해 알아가는 시간을 갖습니다.
                                        </div>
                                        <p class="recruit_desc_title">6. 최종합격</p>
                                        <div class="recruit_desc">
                                            최종 면접에 합격된 대상자에 한해 개별적으로 연락을 드립니다.
                                        </div> -->
                                        <p class="recruit_desc_title">1. 지원분야 및 근무조건</p>
                                        <div class="recruit_desc">
                                            <table class="recruit_desc_table">
                                                <tr>
                                                    <th>지원분야</th>
                                                    <th>근무조건 및 복리후생</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        - 프로그램개발팀<br>
                                                        - 영업팀<br>
                                                        - 홍보팀<br>
                                                        - 경영지원팀
                                                    </td>
                                                    <td>
                                                        - 근무형태 : 정규직<br>
                                                        - 근무기간 : 주5일(월~금)  09시~17시<br>
                                                        - 근 무 지 : 서울<br>
                                                        - 복리후생 : 연차,경조,근속 휴가제도, 포상제도, 생일선물, 건강검진, 인센티브 지급 등
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <p class="recruit_desc_title">2. 제출서류</p>
                                        <div class="recruit_desc">
                                            - 입사지원서<br>
                                            - 자기소개서 및 해당 직무 기술서 (경력직)
                                        </div>
                                        <p class="recruit_desc_title">3. 접수기한 및 문의</p>
                                        <div class="recruit_desc">
                                            - 접수기한 : 상시채용 (당사 홈페이지→ 회사소개→ 채용안내→ 채용공고 온라인접수)<br>
                                            - 문의접수 : 이서진 (sjlee@gongsabi.com / 02-2202-2258)
                                        </div>
                                        <p class="recruit_desc_title">4. 기타사항</p>
                                        <div class="recruit_desc">
                                            - 합격자발표 (합격자에 한하여 개별통지)<br>
                                            - 입사지원서 기재사항이 허위로 판명될 경우 채용이 취소됩니다.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $this->input->get('tab') == '3' ) ? ' show active' : ''; ?> p-15" id="tab1-3" role="tabpanel" aria-labelledby="tab1-3-tab">
                                <div class="company_sub_title">
                                    채용 공고
                                    <button type="button" class="btn btn-success p-a-r" onclick="get_job_application();">입사지원서 양식 다운로드</button>
                                </div>
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table mb-5">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="*">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>제목</th>
                                            <th>작성일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center"><a href="/front/company/recruit_view/2">공사비닷컴 신입사원 모집</a></td>
                                            <td class="text-center">2020-09-01</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center"><a href="/front/company/recruit_view/1">공사비닷컴 경력사원 모집</a></td>
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