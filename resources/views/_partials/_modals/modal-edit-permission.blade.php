<!-- Edit Permission Modal -->
<div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-simple">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>تعديل الصلاحية</h3>
        </div>
        <div class="alert alert-warning" role="alert">
          <h6 class="alert-heading mb-2">تحذير</h6>
          <p class="mb-0">
            عند  تعديل اسم الصلاحية ، قد يحدث خلل في  صلاحيات النظام. يرجى التأكد من أنك متأكد تماما قبل المتابعة.
          </p>
        </div>
        <form id="editPermissionForm" class="row" onsubmit="return false">
          <div class="col-sm-9">
            <label class="form-label" for="editPermissionName">اسم الصلاحية</label>
            <input type="text" id="editPermissionId" name="editPermissionId" hidden/>

            <input type="text" id="editPermissionName" name="editPermissionName" class="form-control" placeholder="Permission Name" tabindex="-1" />
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
<!--/ Edit Permission Modal -->
