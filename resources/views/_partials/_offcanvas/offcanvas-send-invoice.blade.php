<!-- Send Invoice Sidebar -->
<div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
  <div class="offcanvas-header mb-3">
    <h5 class="offcanvas-title">ارسال الفاتورة</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body flex-grow-1">
    <form>
      <div class="mb-3">
        <label for="invoice-from" class="form-label">من</label>
        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
      </div>
      <div class="mb-3">
        <label for="invoice-to" class="form-label">الى</label>
        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
      </div>
      <div class="mb-3">
        <label for="invoice-subject" class="form-label">الموضوع</label>
        <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="فاتورة البضائع المشحونة" />
      </div>
      <div class="mb-3">
        <label for="invoice-message" class="form-label">الرسالة</label>
        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8"></textarea>
      </div>
      <div class="mb-4">
        <span class="badge bg-label-primary">
          <i class="bx bx-link bx-xs"></i>
          <span class="align-middle">الفاتورة مرفقة</span>
        </span>
      </div>
      <div class="mb-3 d-flex flex-wrap">
        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">ارسال </button>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">الغاء</button>
      </div>
    </form>
  </div>
</div>
<!-- /Send Invoice Sidebar -->
