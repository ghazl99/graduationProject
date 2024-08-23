<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="role-title">إضافة دور جديد</h3>
          <p> تعيين صلاحيات الدور</p>
        </div>
        <!-- Add role form -->
        <form id="addRoleForm" class="row g-3" >
          @csrf
          <div class="col-12 mb-4">
            <label class="form-label" for="modalRoleName">اسم الدور</label>
            <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="ادخل اسم الدور " tabindex="-1" />
          </div>
          <div class="col-12">
            <h4> صلاحيات الدور</h4>
            <!-- Permission table -->
                <div class="d-flex flex-wrap row gx-4 row gap-2">
                      @foreach ($permissions as $permission)
                        <div class="form-check me-3 me-lg-3 item col">
                          <input class="form-check-input" type="checkbox" id="permission_role" name="permission_role[]" value="{{$permission->name}}" />
                          <label class="form-check-label" for="permission">
                            {{$permission->name}}
                          </label>
                        </div>
                      @endforeach
                </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1" >إرسال</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
          </div>
        </form>
        <!--/ Add role form -->
      </div>
    </div>
  </div>
</div>
<!--/ Add Role Modal -->

