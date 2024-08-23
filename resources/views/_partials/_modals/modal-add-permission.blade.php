<!-- Add Permission Modal -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-simple">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3> إضافة صلاحية جديدة</h3>
          <p>الصلاحيات التي قد تستخدمها وتعيينها للمستخدمين:</p>
        </div>
        <form id="addPermissionForm" class="row">
          @csrf
          <div class="col-12 mb-3">
            <label class="form-label" for="modalPermissionName">اسم الصلاحية</label>
            <input type="text" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="ادخل اسم الصلاحية" autofocus />
          </div>

          <div class="col-12 text-center demo-vertical-spacing">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">إرسال</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add Permission Modal -->
