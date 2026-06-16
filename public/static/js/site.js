const money = (value) => new Intl.NumberFormat("ko-KR").format(Number(value || 0)) + "원";

document.querySelectorAll(".report-form").forEach((form) => {
    form.addEventListener("submit", async (event) => {
        event.preventDefault();
        const result = document.querySelector("#estimate-result");
        const formData = new FormData(form);

        const response = await fetch("/front/report/estimate", {
            method: "POST",
            body: formData,
            headers: { "X-Requested-With": "XMLHttpRequest" },
        });
        const payload = await response.json();
        if (!payload.ok) {
            alert(payload.message || "산정에 실패했습니다.");
            return;
        }

        const data = payload.result;
        result.innerHTML = `
            <h2>공사비 상세</h2>
            <dl>
                <div><dt>단가</dt><dd>${money(data.unit_price)} / ㎡</dd></div>
                <div><dt>직접공사비</dt><dd>${money(data.direct_cost)}</dd></div>
                <div><dt>층수 보정</dt><dd>${money(data.floor_premium)}</dd></div>
                <div><dt>간접비</dt><dd>${money(data.indirect_cost)}</dd></div>
                <div><dt>부가세</dt><dd>${money(data.vat)}</dd></div>
                <div><dt>총 공사비</dt><dd>${money(data.total)}</dd></div>
                <div><dt>예상 공사기간</dt><dd>${data.duration_months}개월</dd></div>
            </dl>
        `;
    });
});

document.querySelectorAll(".js-payment").forEach((button) => {
    button.addEventListener("click", async () => {
        const buyerName = prompt("결제자 이름");
        if (!buyerName) {
            return;
        }

        const buyerEmail = prompt("이메일") || "";
        const buyerTel = prompt("연락처") || "";
        const formData = new FormData();
        formData.append("_csrf", window.GONGSABI.csrf);
        formData.append("product_code", button.dataset.productCode);
        formData.append("buyer_name", buyerName);
        formData.append("buyer_email", buyerEmail);
        formData.append("buyer_tel", buyerTel);

        const prepareResponse = await fetch("/front/payment/prepare", {
            method: "POST",
            body: formData,
        });
        const prepared = await prepareResponse.json();
        if (!prepared.ok) {
            alert(prepared.message || "주문 생성에 실패했습니다.");
            return;
        }

        if (!window.IMP) {
            alert("결제 모듈을 불러올 수 없습니다.");
            return;
        }

        const order = prepared.order;
        window.IMP.init(order.merchant_code || window.GONGSABI.merchantCode);
        window.IMP.request_pay({
            pg: "html5_inicis",
            pay_method: "card",
            merchant_uid: order.merchant_uid,
            name: order.name,
            amount: order.amount,
            buyer_email: buyerEmail,
            buyer_name: buyerName,
            buyer_tel: buyerTel,
        }, async (rsp) => {
            if (!rsp.success) {
                alert(rsp.error_msg || "결제가 취소되었습니다.");
                return;
            }

            const completeData = new FormData();
            completeData.append("_csrf", window.GONGSABI.csrf);
            completeData.append("imp_uid", rsp.imp_uid);
            completeData.append("merchant_uid", rsp.merchant_uid);
            completeData.append("paid_amount", order.amount);

            const completeResponse = await fetch("/front/payment/complete", {
                method: "POST",
                body: completeData,
            });
            const completed = await completeResponse.json();
            if (!completed.ok) {
                alert(completed.message || "결제 검증에 실패했습니다.");
                return;
            }

            alert("결제가 완료되었습니다.");
            window.location.href = "/front/mypage/info/info2";
        });
    });
});
