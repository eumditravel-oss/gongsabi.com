const money = (value) => new Intl.NumberFormat("ko-KR").format(Number(value || 0)) + "원";

document.querySelectorAll(".report-form").forEach((form) => {
    form.addEventListener("submit", async (event) => {
        event.preventDefault();
        const result = document.querySelector("#estimate-result");
        const formData = new FormData(form);
        try {
            const response = await fetch("/front/report/estimate", { method: "POST", body: formData, headers: { "X-Requested-With": "XMLHttpRequest" } });
            const payload = await response.json();
            if (!payload.ok) { alert(payload.message || "산정에 실패했습니다."); return; }
            renderEstimate(result, payload.result);
        } catch (error) {
            const area = Number(formData.get("area") || 0);
            const floors = Number(formData.get("floors") || 1);
            const basement = Number(formData.get("basement") || 0);
            const structure = String(formData.get("structure") || "reinforced_concrete");
            const finish = String(formData.get("finish_grade") || "standard");
            const region = String(formData.get("region") || "seoul");
            const building = String(formData.get("building_type") || "office");
            const base = { reinforced_concrete: 1850000, steel: 1420000, src: 2050000, wood: 1280000, remodeling: 960000 }[structure] || 1850000;
            const buildingRatio = { office: 1, housing: 1.07, commercial: .96, factory: .84, medical: 1.24, education: 1.08 }[building] || 1;
            const finishRatio = { economy: .86, standard: 1, premium: 1.22, luxury: 1.38 }[finish] || 1;
            const regionRatio = { seoul: 1.08, gyeonggi: 1.03, local: .97, jeju: 1.12 }[region] || 1;
            const unit = Math.round(base * buildingRatio * finishRatio * regionRatio);
            const direct = Math.round(area * unit);
            const floorPremium = Math.round(direct * Math.max(0, floors - 3) * .018);
            const basementPremium = Math.round(direct * basement * .035);
            const adjusted = direct + floorPremium + basementPremium;
            const indirectRatio = adjusted >= 10000000000 ? .092 : (adjusted >= 3000000000 ? .105 : .118);
            const indirect = Math.round(adjusted * indirectRatio);
            const vat = Math.round((adjusted + indirect) * .1);
            const total = adjusted + indirect + vat;
            renderEstimate(result, { unit_price: unit, direct_cost: direct, floor_premium: floorPremium, basement_premium: basementPremium, adjusted_direct_cost: adjusted, indirect_ratio: Math.round(indirectRatio * 10000) / 100, indirect_cost: indirect, vat, total, duration_months: Math.max(1, Math.ceil(area / 450) + Math.ceil(floors / 4) + basement) });
        }
    });
});
function renderEstimate(target, data) {
    if (!target) return;
    target.innerHTML = `<h2>공사비 상세</h2><dl>
        <div><dt>면적당 단가</dt><dd>${money(data.unit_price)} / ㎡</dd></div>
        <div><dt>직접공사비</dt><dd>${money(data.direct_cost)}</dd></div>
        <div><dt>층수 보정</dt><dd>${money(data.floor_premium)}</dd></div>
        <div><dt>지하층 보정</dt><dd>${money(data.basement_premium)}</dd></div>
        <div><dt>보정 직접공사비</dt><dd>${money(data.adjusted_direct_cost)}</dd></div>
        <div><dt>간접비율</dt><dd>${data.indirect_ratio}%</dd></div>
        <div><dt>간접비</dt><dd>${money(data.indirect_cost)}</dd></div>
        <div><dt>부가세</dt><dd>${money(data.vat)}</dd></div>
        <div><dt>총 공사비</dt><dd>${money(data.total)}</dd></div>
        <div><dt>예상 공사기간</dt><dd>${data.duration_months}개월</dd></div>
    </dl>`;
}

document.querySelectorAll(".js-detail").forEach((button) => {
    button.addEventListener("click", () => {
        const modal = document.querySelector("#detailModal");
        const content = document.querySelector("#modalContent");
        content.innerHTML = `<h3>${escapeHtml(button.dataset.title || "공사비 상세")}</h3><p>${escapeHtml(button.dataset.body || "")}</p><div class="modal-price">공사비/단가: ${escapeHtml(button.dataset.price || "")}</div><p>※ 스크랩 내용은 마이페이지 &gt; 공사비검색에서 보실 수 있습니다.</p>`;
        modal.classList.add("on");
        modal.setAttribute("aria-hidden", "false");
    });
});
document.querySelectorAll("[data-modal-close], #detailModal").forEach((el) => {
    el.addEventListener("click", (event) => {
        if (event.target !== el && !event.target.matches("[data-modal-close]")) return;
        const modal = document.querySelector("#detailModal");
        modal.classList.remove("on");
        modal.setAttribute("aria-hidden", "true");
    });
});
function escapeHtml(str) { return String(str).replace(/[&<>'"]/g, (s) => ({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[s])); }

document.querySelectorAll(".js-payment").forEach((button) => {
    button.addEventListener("click", async () => {
        const buyerName = prompt("결제자 이름"); if (!buyerName) return;
        const buyerEmail = prompt("이메일") || ""; const buyerTel = prompt("연락처") || "";
        const formData = new FormData();
        formData.append("_csrf", window.GONGSABI?.csrf || ""); formData.append("product_code", button.dataset.productCode); formData.append("buyer_name", buyerName); formData.append("buyer_email", buyerEmail); formData.append("buyer_tel", buyerTel);
        try {
            const prepareResponse = await fetch("/front/payment/prepare", { method: "POST", body: formData });
            const prepared = await prepareResponse.json();
            if (!prepared.ok) { alert(prepared.message || "주문 생성에 실패했습니다."); return; }
            if (!window.IMP) { alert("결제 모듈을 불러올 수 없습니다."); return; }
            const order = prepared.order; window.IMP.init(order.merchant_code || window.GONGSABI.merchantCode);
            window.IMP.request_pay({ pg: "html5_inicis", pay_method: "card", merchant_uid: order.merchant_uid, name: order.name, amount: order.amount, buyer_email: buyerEmail, buyer_name: buyerName, buyer_tel: buyerTel }, async (rsp) => {
                if (!rsp.success) { alert(rsp.error_msg || "결제가 취소되었습니다."); return; }
                const completeData = new FormData(); completeData.append("_csrf", window.GONGSABI.csrf); completeData.append("imp_uid", rsp.imp_uid); completeData.append("merchant_uid", rsp.merchant_uid); completeData.append("paid_amount", order.amount);
                const completeResponse = await fetch("/front/payment/complete", { method: "POST", body: completeData });
                const completed = await completeResponse.json();
                if (!completed.ok) { alert(completed.message || "결제 검증에 실패했습니다."); return; }
                alert("결제가 완료되었습니다."); window.location.href = "/front/mypage/info/info2";
            });
        } catch (error) { alert("정적 미리보기에서는 실제 결제가 동작하지 않습니다."); }
    });
});
