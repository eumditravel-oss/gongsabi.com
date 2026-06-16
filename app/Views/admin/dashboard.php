<section class="sub-visual"><div class="wrap"><h2>ADMIN</h2><p>관리자</p></div></section>
<div class="wrap sub-content single">
    <h3 class="content-title">관리자</h3>
    <div class="admin-grid">
        <div class="admin-card"><span>공지사항</span><strong><?= e($noticeCount) ?></strong></div>
        <div class="admin-card"><span>미답변 문의</span><strong><?= e($inquiryCount) ?></strong></div>
        <div class="admin-card"><span>최근 주문</span><strong><?= count($orders) ?></strong></div>
    </div>
    <p class="btn-row"><a class="list-btn" href="/admin/settings">사이트 설정</a></p>
    <h4>최근 주문</h4>
    <table class="basic-table"><thead><tr><th>주문번호</th><th>상품</th><th>금액</th><th>상태</th></tr></thead><tbody><?php foreach ($orders as $order): ?><tr><td><?= e($order['merchant_uid']) ?></td><td><?= e($order['product_name']) ?></td><td><?= money((int) $order['amount']) ?></td><td><?= e($order['status']) ?></td></tr><?php endforeach; ?></tbody></table>
</div>
