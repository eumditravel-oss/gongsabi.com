    <section class="breadcumb_area background-overlay section_padding_50" style="background-image: url(/static/img/customer.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb_section">
                        <div class="page_title">
                            <h4><a href="/front/education">공사비 교육</a></h4>
                        </div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/front/education/youtube">동영상 교육</a></li>
                            <li class="breadcrumb-item active"><a href="/front/education/book">교재 구매</a></li>
                            <li class="breadcrumb-item"><a href="/front/education/lecture">공사비 강의 신청</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are m-top-30">

                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>책 구매요청 수정</h4>
                        </div>

                        <form action="/front/mypage/modify_proc/book" method="post" class="classy-form">
                            <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            주문상태 : <?php echo $this->config->item('ORDER_STATUS')[$board_data['list'][0]->board_etc_3]['name']; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="board_category">책 선택 <small class="text-danger">* 필수</small></label>
                                            <!-- <select class="custom-select d-block w-100" name="board_category" id="board_category" readonly="true">
                                            <?php foreach ($this->config->item('BOOK_LIST') as $key => $book) { ?>
                                                <option value="<?php echo $key; ?>|<?php echo $book['price']; ?>"<?php if ( $key == $board_data['list'][0]->board_category ) { ?> selected="true"<?php } ?>><?php echo $book['name']; ?></option>
                                            <?php } ?>
                                            </select> -->
                                            <input type="text" class="form-control" value="<?php echo $this->config->item('BOOK_LIST')[$board_data['list'][0]->board_category]['name']; ?>" readonly="true">
                                            <input type="hidden" name="board_category" value="<?php echo $board_data['list'][0]->board_category; ?>">
                                            <input type="hidden" class="book-price" value="<?php echo $this->config->item('BOOK_LIST')[$board_data['list'][0]->board_category]['price']; ?>">
                                            <input type="hidden" class="order-price" value="<?php echo $this->config->item('BOOK_LIST')[$board_data['list'][0]->board_category]['price']; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="board_etc_2">수량 <small class="text-danger">* 필수</small></label>
                                            <input type="number" class="form-control" name="board_etc_2" id="board_etc_2" placeholder="수량" value="1" min="1" value="<?php echo $board_data['list'][0]->board_etc_2; ?>" required readonly="true">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                            <input type="text" class="form-control" name="board_name" id="board_name" placeholder="이름" value="<?php echo $board_data['list'][0]->board_name; ?>" required="true"<?php if ( (int)$board_data['list'][0]->board_etc_3 > 2 ) { ?> readonly="true"<?php } ?>>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="board_company">회사 <small class="text-danger">* 필수</small></label>
                                            <input type="text" class="form-control" name="board_company" id="board_company" placeholder="회사" value="<?php echo $board_data['list'][0]->board_company; ?>" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="board_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
                                            <input type="text" class="form-control handle-cell-phone" name="board_hp" id="board_hp" placeholder="휴대폰번호" value="<?php echo $board_data['list'][0]->board_hp; ?>" maxlength="13" required="true"<?php if ( (int)$board_data['list'][0]->board_etc_3 > 2 ) { ?> readonly="true"<?php } ?>>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="board_email">이메일주소 <small class="text-danger">* 필수</small></label>
                                            <div class="form-email">
                                                <input type="hidden" name="board_email" value="<?php echo $board_data['list'][0]->board_email; ?>">
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
                                            <label for="board_etc_1">배송주소 <small class="text-danger">* 필수</small></label><br>
                                            <button class="btn btn-success mb-2" type="button" onclick="execDaumPostcode()">주소 검색</button><br>
                                            <div id="wrap" class="mb-2" style="display:none;border:1px solid;width:500px;height:300px;position:relative;">
                                                <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
                                            </div>
                                            <input type="text" class="form-control mb-2" name="board_etc_1" id="board_etc_1" placeholder="배송주소" value="<?php echo $board_data['list'][0]->board_etc_1; ?>" required="true"<?php if ( (int)$board_data['list'][0]->board_etc_3 > 2 ) { ?> readonly="true"<?php } ?>>
                                            <input type="text" class="form-control mb-3" name="board_etc_4" id="board_etc_4" placeholder="상세주소" value="<?php echo $board_data['list'][0]->board_etc_4; ?>" required="true"<?php if ( (int)$board_data['list'][0]->board_etc_3 > 2 ) { ?> readonly="true"<?php } ?>>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="board_content">배송메시지 <small class="text-danger">* 필수</small></label>
                                            <input type="text" class="form-control mb-3" name="board_content" id="board_content" value="<?php echo $board_data['list'][0]->board_content; ?>" placeholder="요청사항을 자세히 입력해 주세요."<?php if ( (int)$board_data['list'][0]->board_etc_3 > 2 ) { ?> readonly="true"<?php } ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 text-center">
                                    <img src="/static/img/book<?php echo $board_data['list'][0]->board_category; ?>.jpg" alt="" style="height:350px;" class="book-image my-3">
                                    <hr>
                                    <p>현장기술자를 위한 <b>건축견적이야기</b>
                                    <p class="text-mat-green">저자 현동명</p>
                                    <hr>
                                    <p>결제금액</p>
                                    <h3 class="m-top-15 text-mat-green font-weight-bold book-price-text"><?php echo number_format($this->config->item('BOOK_LIST')[$board_data['list'][0]->board_category]['price']); ?>원</h3>
                                </div>
                            </div>
                            <div class="row m-top-15">
                                <div class="col-lg-8 text-right">
                                    <a href="/front/mypage/request" class="btn btn-outline-success">취소</a>
                                    <button type="submit" class="btn btn-success">수정하기</button>
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <h5>배송/반품/교환 안내</h5>
                                    <table class="table classy-table table-bordered table-responsive gongsabi-table">
                                        <colgroup>
                                            <col width="20%">
                                            <col width="*">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <th class="text-left">배송 방법</th>
                                                <td>
                                                    택배 배송<br>
                                                    결제 완료기준 1 ~ 2일 이내 출고
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">반품/교환 방법</th>
                                                <td>고객만족센터 (070-4048-1315)</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">반품/교환 가능기간</th>
                                                <td>출고 완료 후 10일 이내의 주문 상품</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">반품/교환 비용</th>
                                                <td>고객의 단순변심 및 착오구매일 경우 상품 반송비용은 고객 부담임</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">반품/교환 불가사유</th>
                                                <td>
                                                    소비자의 책임 있는 사유로 상품 등이 손실 또는 훼손된 경우<br>
                                                    시간의 경과에 의해 재판매가 곤란한 정도로 가치가 현저히 감소한 경우<br>
                                                    전자상거래 등에서의 소비자보호에 관한 법률이 정하는 소비자 청약철회 제한 내용에 해당되는 경우
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(function() {
        $('#board_category').on('change', function() {
            var book_info = $(this).val();
            var book_number = book_info.split('|')[0];
            var book_price = parseInt(book_info.split('|')[1]);
            $('.book-image').attr('src', '/static/img/book' + book_number + '.jpg');
            $('.book-price').val(book_price);
            var qty = parseInt($('#board_etc_2').val());
            var order_price = book_price * qty;
            $('.order-price').val(order_price);
            $('.book-price-text').text(numberWithCommas(order_price) + '원');
        });

        // 수량 변경시
        $('#board_etc_2').on('change', function() {
            var book_price = parseInt($('.book-price').val());
            var qty = parseInt($(this).val());
            var order_price = book_price * qty;
            $('.order-price').val(order_price);
            $('.book-price-text').text(numberWithCommas(order_price) + '원');
        });
    });
    </script>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        // 우편번호 찾기 찾기 화면을 넣을 element
        var element_wrap = document.getElementById('wrap');

        function foldDaumPostcode() {
            // iframe을 넣은 element를 안보이게 한다.
            element_wrap.style.display = 'none';
        }

        function execDaumPostcode() {
            // 현재 scroll 위치를 저장해놓는다.
            var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
            new daum.Postcode({
                oncomplete: function(data) {
                    // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var addr = ''; // 주소 변수
                    var extraAddr = ''; // 참고항목 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    // 커서를 상세주소 필드로 이동한다.
                    $('#board_etc_3').val(data.zonecode);
                    $('#board_etc_1').val(addr).focus();

                    // iframe을 넣은 element를 안보이게 한다.
                    // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                    element_wrap.style.display = 'none';

                    // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                    document.body.scrollTop = currentScroll;
                },
                // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
                onresize : function(size) {
                    element_wrap.style.height = size.height+'px';
                },
                width : '100%',
                height : '100%'
            }).embed(element_wrap);

            // iframe을 넣은 element를 보이게 한다.
            element_wrap.style.display = 'block';
        }
    </script>