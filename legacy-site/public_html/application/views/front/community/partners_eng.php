
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Partners</h2>
                        <p>
                            We're eternally grateful to the partners who make GongSaBi.com a thriving example of new platform.<br>
                            The success of our effort owes much to the involvement of these partners.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container partners_category_wrapper section_padding_0_100">
        <div class="row">
            <div class="col-lg-12">
                <table class="partners_category_table">
                    <tr>
                        <td class="<?php echo ( $condition['board_category'] == '' ) ? ' active' : ''; ?>"><a class="fss" href="/front/community/partners">Total</a></td>
                        <?php foreach ($this->config->item('PARTNERS_CATEGORY_LIST_ENG') as $key => $category) { ?>           
                        <td class="<?php echo ( $condition['board_category'] == $key ) ? 'active' : ''; ?>"><a class="fss" href="/front/community/partners?board_category=<?php echo $key; ?>"><?php echo $category; ?></a></td>
                        <?php } ?>                        
                    </tr>
                </table>
                <div class="partners_list_wrapper p-15">
                    <ul class="partners_list">
                    <?php foreach ( $board_data['list'] as $board ) { ?>
                        <li><a href="<?php echo $board->board_link; ?>" target="_blank"><img src="/static/data/partners/<?php echo $board->board_image; ?>"></a></li>
                    <?php } ?>
                    </ul>
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

    <!-- <div class="partners_category_wrapper">          
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link<?php echo ( $condition['board_category'] == '' ) ? ' active' : ''; ?>" href="/front/community/partners">전체</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo ( $condition['board_category'] == '1' ) ? ' active' : ''; ?>" href="/front/community/partners?board_category=1">가설 / 토공 / 골조</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo ( $condition['board_category'] == '2' ) ? ' active' : ''; ?>" href="/front/community/partners?board_category=2">타일 / 석공 / 창호 / 유리</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo ( $condition['board_category'] == '3' ) ? ' active' : ''; ?>" href="/front/community/partners?board_category=3">조적 / 방수 / 미장</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo ( $condition['board_category'] == '4' ) ? ' active' : ''; ?>" href="/front/community/partners?board_category=4">도장 / 수장 / 장비</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo ( $condition['board_category'] == '5' ) ? ' active' : ''; ?>" href="/front/community/partners?board_category=5">전기 / 기계 / 통신 / 소방</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo ( $condition['board_category'] == '6' ) ? ' active' : ''; ?>" href="/front/community/partners?board_category=6">견적 / 기타</a>
            </li>
        </ul>
    </div>

    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="partners_list">
                    <?php foreach ( $board_data['list'] as $board ) { ?>
                        <li><a href="<?php echo $board->board_link; ?>" target="_blank"><img src="/static/data/partners/<?php echo $board->board_image; ?>"></a></li>
                    <?php } ?>
                    </ul>
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
    </section> -->