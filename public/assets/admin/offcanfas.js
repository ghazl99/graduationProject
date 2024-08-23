$(function () {
  // إعدادات Ajax
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  document.getElementById('addSubjectForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // مسح رسائل الخطأ القديمة
    const errorElements = document.querySelectorAll('.text-danger');
    errorElements.forEach(element => {
      element.textContent = '';
    });

    const formData = new FormData(this);
    const actionUrl = this.getAttribute('action'); // الحصول على URL من خاصية action الخاصة بالنموذج
    const url = new URL(actionUrl);
    let bUrl = url.pathname;

    console.log(baseUrl + bUrl);
    fetch(actionUrl, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: formData
    })
    .then(response => {
      return response.json();
    })
    .then(data => {
      if (data.errors) {
        // عرض رسائل التحقق تحت الحقول
        for (const [field, messages] of Object.entries(data.errors)) {
          const errorElement = document.getElementById(`${field}_error`);
          if (errorElement) {
            errorElement.textContent = messages[0];
          }
        }
      } else {
        // تحقق من البيانات المستلمة
        if (data.success) {
          $('#addSubjectModal').modal('hide');
          $('#addSubjectForm')[0].reset();
          document.getElementById('addSubjectForm').reset();
          // Reset the select2 field
          $('#add-select').val(null).trigger('change');
          $('#table').load(  bUrl + ' #table'); // إعادة تحميل الجدول
          Swal.fire({
            icon: 'success',
            title: 'تمت عملية الإضافة بنجاح',
            text: 'تم إنشاء مادة جديدة',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        } else {
          Swal.fire({
            title: 'حدث خطأ',
            text: 'لم يتم إنشاء مادة جديدة',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      }
    })
    .catch(error => {
      console.error('Error:', error); // معالجة الأخطاء العامة
      Swal.fire({
        title: 'حدث خطأ',
        text: 'حدث خطأ أثناء معالجة الطلب',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-danger'
        }
      });
    });
  });



 // Delete Record
 $(document).on('click', '.delete-record', function () {
  var subject_id = $(this).data('id'),
   path=$(this).data('url'),
    dtrModal = $('.dtr-bs-modal.show');
  // hide responsive modal in small screen
  if (dtrModal.length) {
    dtrModal.modal('hide');
  }

  // sweetalert for confirmation of delete
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    customClass: {
      confirmButton: 'btn btn-primary me-3',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: false
  }).then(function (result) {
    if (result.value) {
      // delete the data
      $.ajax({
        type: 'DELETE',
        url: "".concat(baseUrl, path).concat(subject_id),
        success: function success() {
              $('#table').load('/'+path + ' #table');
        },
        error: function error(_error) {
          console.log(_error);
        }
      });

      // success sweetalert
      Swal.fire({
        icon: 'success',
        title: 'Deleted!',
        text: 'The user has been deleted!',
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire({
        title: 'Cancelled',
        text: 'The User is not deleted!',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
    }
  });
});

 // edit record
//  $(document).on('click', '.edit-record', function () {
//   const actionUrl = this.dataset.url;
//   console.log(actionUrl);
//   var user_id = $(this).data('id'),
//     dtrModal = $('.dtr-bs-modal.show');

//   // hide responsive modal in small screen
//   if (dtrModal.length) {
//     dtrModal.modal('hide');
//   }

//   // changing the title of offcanvas
//   $('#offcanvasAddUserLabel').html('Edit User');
//   // get data
//   $.get("".concat(baseUrl, actionUrl).concat(user_id, "/edit"), function (data) {
//     $('#edit_name_en').val(data.name_en);
//     $('#edit_name_ar').val(data.name_ar);
//   });
// });
//edit
$(document).on('click', '.edit-record', function () {
  const path = this.dataset.url;
  var id = $(this).data('id'),
  dtrModal = $('.dtr-bs-modal.show');

  // تحقق من وجود العنصر dtrModal
  console.log('Modal length:', dtrModal.length);
  console.log('Modal element:', dtrModal);

  // إخفاء المودال الاستجابي في الشاشة الصغيرة
  if (dtrModal.length) {
    dtrModal.modal('hide');
  }


  // get data
  $.get("".concat(baseUrl, path).concat(id, "/edit"), function (data) {
    console.log(data);
    // console.log(data);
    for (const key in data) {
      if (data.hasOwnProperty(key)) {
        $(`#edit_${key}`).val(data[key]);

      }

    }
    if (data.class_id) {
      $.ajax({
        url: '/classes/' + data.class_id + '/types',
        type: 'GET',
        dataType: 'json',
        success: function(types) {
          $('#edit_type_id').empty();
          $('#edit_type_id').append('<option value="">اختر الشعبة</option>');
          $.each(types, function(key, type) {
            var option = $('<option value="' + type.type_id + '">' + type.name_ar + type.name_en + '</option>');
            $('#edit_type_id').append(option);
            if (data.hasOwnProperty('type_id') && data['type_id'] === type.type_id) {
              option.prop('selected', true);
            }
          });
        }
      });
    }
    // Set selected values for the select2 field
    if (data.types) {
      let selectedTypes = data.types.map(type => type.id);
      $('#edit_type').val(selectedTypes).trigger('change');
    }


    // Update form action URL
    const formAction =baseUrl + path + id;
    console.log(formAction);
    $('#editForm').attr('action', formAction);
  });
});

//update
document.getElementById('editForm').addEventListener('submit', function(event) {
  event.preventDefault();
  let path = document. getElementById("url").value;


  // مسح رسائل الخطأ القديمة
  const errorElements = document.querySelectorAll('.text-danger');
  errorElements.forEach(element => {
    element.textContent = '';
  });

  const formData = new FormData(this);
  const actionUrl = this.getAttribute('action'); // الحصول على URL من خاصية action الخاصة بالنموذج
  const url = new URL(actionUrl);
  let bUrl = url.pathname;
  console.log(actionUrl);

  fetch(actionUrl, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: formData
  })
  .then(response => {
    return response.json();
  })
  .then(data => {
    if (data.errors) {
      // عرض رسائل التحقق تحت الحقول
      for (const [field, messages] of Object.entries(data.errors)) {
        const errorElement = document.getElementById(`${field}_error`);
        if (errorElement) {
          errorElement.textContent = messages[0];
        }
      }
    } else {
      // تحقق من البيانات المستلمة
      if (data.success) {
        $('#editModal').modal('hide');

        $('#table').load(path + ' #table'); // إعادة تحميل الجدول
        Swal.fire({
          icon: 'success',
          title: 'تمت عملية الإضافة بنجاح',
          text: 'تم إنشاء مادة جديدة',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else {
        Swal.fire({
          title: 'حدث خطأ',
          text: 'لم يتم إنشاء مادة جديدة',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    }
  })
  .catch(error => {
    console.error('Error:', error); // معالجة الأخطاء العامة
    Swal.fire({
      title: 'حدث خطأ',
      text: 'حدث خطأ أثناء معالجة الطلب',
      icon: 'error',
      customClass: {
        confirmButton: 'btn btn-danger'
      }
    });
  });
});


}
)
