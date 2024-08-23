<!-- Edit User Modal -->
<div class="modal fade" id="editUserLogistec" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>اضافة مركبة</h3>

        </div>
        <form id="editCarForm" class="row g-3" onsubmit="return false">
          <div class="col-12 col-md-6">
            <label class="form-label" for="model">نوع السيارة</label>
            {{-- <input type="number" id="car_id" name="id" class="form-control" hidden /> --}}

            <input type="text" id="model" name="model" class="form-control"  />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="vin">رقم الشاسيه</label>
            <input type="number" id="vin" name="vin" class="form-control"  />
          </div>
          <div class="col-12">
            <label class="form-label" for="make_year">سنة الصنع</label>
            <input type="date" id="make_year" name="make_year" class="form-control" placeholder="john.doe.007" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="color">اللون</label>
            <input type="text" id="color" name="color" class="form-control"  />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="license_plate">رقم اللوحة</label>
            <input type="number" id="license_plate" name="license_plate" class="form-control"  />


          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="car_length">طول السيارة</label>
            <input type="number" id="car_length" name="car_length" class="form-control"  />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="hight">ارتفاع السيارة</label>
            <input type="number" id="hight" name="height" class="form-control"  />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="hight">حالة السيارة</label>

            <select class="form-select " id="status" name="status" >

              <option value="تعمل" data-tokens="ketchup mustard">تعمل</option>
              <option value="نص" data-tokens="mustard">نص</option>
              <option value="يلزمها صيانة" data-tokens="frosting">يلزمها صيانة</option>
            </select>
          </div>



          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1 submit-btn">تاكيد</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">الغاء</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->
