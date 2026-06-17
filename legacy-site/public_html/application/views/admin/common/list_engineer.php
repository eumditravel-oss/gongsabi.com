<header class="page-header">
    <h2><?php echo $depth2; ?> 관리</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="/">
                    관리자
                </a>
            </li>
            <li><span><?php echo $depth1; ?></span></li>
            <li><span><?php echo $depth2; ?> 관리</span></li>
        </ol>
    </div>
</header>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?php echo $depth2; ?> 리스트</h2>
            </header>
            <div class="panel-body">
                <div class="text-right">
                    <a href="/admin/<?php echo $parent; ?>/regist/<?php echo $target; ?>" class="btn btn-primary">등록</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">이름</th>
                                <th class="text-center">입사일</th>
                                <th class="text-center">자격종목 및 등급</th>
                                <th class="text-center">관리</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ( $count > 0 ) { ?>
                        <?php
                        $i = 1;
                        foreach ($list as $item) { ?>
                            <tr>
                                <td class="text-center"><?php echo $item->rownum; ?></td>
                                <td class="text-center"><?php echo $item->name; ?></td>
                                <td class="text-center"><?php echo $item->in_day; ?></td>
                                <td class="text-center"><?php echo $item->license; ?></td>
                                <td class="text-center">
                                    <a href="/admin/<?php echo $parent; ?>/modify/<?php echo $target; ?>/<?php echo $item->seq; ?>" class="btn btn-success btn-xs">수정</a>
                                    <a href="/admin/<?php echo $parent; ?>/delete/<?php echo $target; ?>/<?php echo $item->seq; ?>" class="btn btn-danger btn-xs btn_delete">삭제</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        } ?>
                        <?php } else { ?>
                            <tr>
                                <td class="text-center" colspan="5">해당하는 내용이 없습니다.</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <?php echo $pagination; ?>
                </div>
            </div>
        </section>
    </div>
</div>