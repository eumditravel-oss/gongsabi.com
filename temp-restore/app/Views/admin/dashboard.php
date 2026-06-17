<section class="page-title">
    <p>ADMIN</p>
    <h1>관리자</h1>
</section>

<section class="admin-stats">
    <div><span>공지사항</span><strong><?= e($noticeCount) ?></strong></div>
    <div><span>미답변 문의</span><strong><?= e($inquiryCount) ?></strong></div>
    <div><span>최근 주문</span><strong><?= count($orders) ?></strong></div>
</section>

<section class="content-band">
    <p><a class="btn primary" href="/admin/settings">사이트 설정</a></p>
    <h2>최근 주문</h2>
    <table class="list-table">
        <thead>
            <tr>
                <th>주문번호</th>
                <th>상품</th>
                <th>금액</th>
                <th>상태</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= e($order['merchant_uid']) ?></td>
                    <td><?= e($order['product_name']) ?></td>
                    <td><?= money((int) $order['amount']) ?></td>
                    <td><?= e($order['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
