/**
 *  Form Wizard
 */

'use strict';

$(function () {
  const select2 = $('.select2'),
    selectPicker = $('.selectpicker');

  // Bootstrap select
  // select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: 'Select value',
        dropdownParent: $this.parent()
      });
    });
  }
});

(function () {
  let first_name_s,
    middle_name_s,
    last_name_s,
    email_s,
    national_id_s,
    phone_s,
    address_r,
    first_name_r,
    middle_name_r,
    last_name_r,
    email_r,
    national_id_r,
    phone_r,
    address_s,
    line_total_cost,
    total_wight,
    price_for_wight,
    category,
    quantity;
  // Icons Wizard
  const select2 = $('.select2'),
    selectPicker = $('.selectpicker');
  // --------------------------------------------------------------------
  const wizardIcons = document.querySelector('.wizard-icons-example');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  if (typeof wizardIcons !== undefined && wizardIcons !== null) {
    const wizardValidationForm = wizardIcons.querySelector('#wizard-validation-form');

    const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details');
    const wizardValidationFormStep2 = wizardValidationForm.querySelector('#personal-info');
    const wizardValidationFormStep3 = wizardValidationForm.querySelector('#address');
    // const wizardValidationFormStep4 = wizardValidationForm.querySelector('#social-links');
    const wizardValidationFormStep5 = wizardValidationForm.querySelector('#review-submit');

    const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
    const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

    let validationStepper = new Stepper(wizardIcons, {
      linear: true
    });
    // accountdetails
    const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
      fields: {
        first_name_s: {
          validators: {
            notEmpty: {
              message: 'The first name is required'
            }
          }
        },
        middle_name_s: {
          validators: {
            notEmpty: {
              message: 'The middle name is required'
            }
          }
        },
        last_name_s: {
          validators: {
            notEmpty: {
              message: 'The last is required'
            }
          }
        },
        national_id_s: {
          validators: {
            notEmpty: {
              message: 'The national id is required'
            }
          }
        },
        phone_s: {
          validators: {
            notEmpty: {
              message: 'The phone is required'
            }
          }
        },
        email_s: {
          validators: {
            notEmpty: {
              message: 'Please enter your email'
            },
            emailAddress: {
              message: 'The value is not a valid email address'
            }
          }
        },
        address_s: {
          validators: {
            notEmpty: {
              message: 'The address is required'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: ''
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      validationStepper.next();
      national_id_s = $('#national_id_s').val();
      first_name_s = $('#first_name_s').val();
      middle_name_s = $('#middle_name_s').val();
      last_name_s = $('#last_name_s').val();
      email_s = $('#email_s').val();
      phone_s = $('#phone_s').val();
      address_s = $('#address_s').val();
    });

    // Personal info
    const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
      fields: {
        first_name_r: {
          validators: {
            notEmpty: {
              message: 'The first name is required'
            }
          }
        },
        middle_name_r: {
          validators: {
            notEmpty: {
              message: 'The middle name is required'
            }
          }
        },
        last_name_r: {
          validators: {
            notEmpty: {
              message: 'The last is required'
            }
          }
        },
        national_id_r: {
          validators: {
            notEmpty: {
              message: 'The national id is required'
            }
          }
        },
        phone_r: {
          validators: {
            notEmpty: {
              message: 'The phone is required'
            }
          }
        },
        email_r: {
          validators: {
            notEmpty: {
              message: 'Please enter your email'
            },
            emailAddress: {
              message: 'The value is not a valid email address'
            }
          }
        },
        address_r: {
          validators: {
            notEmpty: {
              message: 'The address is required'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: ''
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      validationStepper.next();
      national_id_r = $('#national_id_r').val();
      first_name_r = $('#first_name_r').val();
      middle_name_r = $('#middle_name_r').val();
      last_name_r = $('#last_name_r').val();
      email_r = $('#email_r').val();
      address_r = $('#address_r').val();
      phone_r = $('#phone_r').val();
    });
    // Bootstrap Select (i.e Language select)
    if (selectPicker.length) {
      selectPicker.each(function () {
        var $this = $(this);
        $this.selectpicker().on('change', function () {
          FormValidation2.revalidateField('language');
        });
      });
    }

    // Select 2 (i.e Country select)
    if (select2.length) {
      select2
        .select2({
          placeholder: 'Select an country'
        })
        .on('change.select2', function () {
          // Revalidate the color field when an option is chosen
          FormValidation2.revalidateField('country');
        });
    }
    // address
    const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
      fields: {
        source: {
          validators: {
            notEmpty: {
              message: 'quantity is required'
            }
          }
        },
        destination: {
          validators: {
            notEmpty: {
              message: 'quantity is required'
            }
          }
        },
        category: {
          validators: {
            notEmpty: {
              message: 'category is required'
            }
          }
        },
        price_for_wight: {
          validators: {
            notEmpty: {
              message: 'price is required'
            }
          }
        },
        total_wight: {
          validators: {
            notEmpty: {
              message: 'wight is required'
            }
          }
        },
        line_total_cost: {
          validators: {
            notEmpty: {
              message: 'cost is required'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: ''
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // You can submit the form
      // wizardValidationForm.submit()
      // or send the form data to server via an Ajax request
      // To make the demo simple, I just placed an alert
      // Form is valid, submit data
      validationStepper.next();

      total_wight = $('#total_wight').val();
      price_for_wight = $('#price_for_wight').val();
      category = $('#category_shipment').val();
      quantity = $('#quantity').val();
      var s = $('#s').val();
      var d = $('#d').val();

      line_total_cost = $('#line_total_cost').val();

      $('#review-national-id-r').text(national_id_r);
      $('#review-first-r').text(first_name_r);
      $('#review-middle-r').text(middle_name_r);
      $('#review-last-r').text(last_name_r);
      $('#review-email-r').text(email_r);
      $('#review-phone-r').text(phone_r);
      $('#review-address-r').text(address_r);

      $('#review-national-id-s').text(national_id_s);
      $('#review-first-s').text(first_name_s);
      $('#review-middle-s').text(middle_name_s);
      $('#review-last-s').text(last_name_s);
      $('#review-email-s').text(email_s);
      $('#review-phone-s').text(phone_s);
      $('#review-address-s').text(address_s);

      $('#review-s').text(s);
      $('#review-d').text(d);
      $('#review-quantity').text(quantity);
      $('#review-category').text(category);
      $('#review-price_for_wight').text(price_for_wight);
      $('#review-line_total_cost').text(line_total_cost);
      $('#review-total_wight').text(total_wight);
    });

    //
    // $('#total_wight').on('input', function () {
    //   const totalWeight = parseFloat($(this).val()) || 0;

    //   const pricePerKg = parseFloat($('#price_for_wight').val()) || 0;

    //   const lineTotalCost = totalWeight * pricePerKg;

    //   $('#line_total_cost').val(lineTotalCost);
    // });

    // Social links
    // const FormValidation4 = FormValidation.formValidation(wizardValidationFormStep4, {
    //   fields: {
    //     twitter: {
    //       validators: {
    //         notEmpty: {
    //           message: 'The Twitter URL is required'
    //         },
    //         uri: {
    //           message: 'The URL is not proper'
    //         }
    //       }
    //     },
    //     facebook: {
    //       validators: {
    //         notEmpty: {
    //           message: 'The Facebook URL is required'
    //         },
    //         uri: {
    //           message: 'The URL is not proper'
    //         }
    //       }
    //     },
    //     google: {
    //       validators: {
    //         notEmpty: {
    //           message: 'The Google URL is required'
    //         },
    //         uri: {
    //           message: 'The URL is not proper'
    //         }
    //       }
    //     },
    //     linkedIn: {
    //       validators: {
    //         notEmpty: {
    //           message: 'The LinkedIn URL is required'
    //         },
    //         uri: {
    //           message: 'The URL is not proper'
    //         }
    //       }
    //     }
    //   },
    //   plugins: {
    //     trigger: new FormValidation.plugins.Trigger(),
    //     bootstrap5: new FormValidation.plugins.Bootstrap5({
    //       // Use this for enabling/changing valid/invalid class
    //       // eleInvalidClass: '',
    //       eleValidClass: ''
    //     }),
    //     autoFocus: new FormValidation.plugins.AutoFocus(),
    //     submitButton: new FormValidation.plugins.SubmitButton()
    //   }
    // }).on('core.form.valid', function () {
    //   // You can submit the form
    //   // wizardValidationForm.submit()
    //   // or send the form data to server via an Ajax request
    //   // To make the demo simple, I just placed an alert
    //   validationStepper.next();
    //   $('#review-username').text(username);
    //   $('#review-email').text(email);
    //   $('#review-firstName').text(firstName);
    // });

    // // Populate category details when category changes
    $('#category_shipment').on('change', function () {
      var categoryID = $(this).val();

      $.ajax({
        url: ''.concat(baseUrl, 'get-category-details/').concat(categoryID),
        type: 'GET',
        success: function (data) {
          $('#category-detail').empty();
          $('#category-detail').append('<option value="">' + 'اختر نوع الطرد ' + '</option>');
          $.each(data, function (index, detail) {
            $('#category-detail').append('<option value="' + detail.id + '">' + detail.type + '</option>');
          });
        }
      });
    });

    // show price in category
    function attachChangeHandler(container = document) {
      // Event listeners
      container.addEventListener('change', function (event) {
        if (event.target.matches('#category-detail')) {
          const categoryName = event.target.options[event.target.selectedIndex].text;
          const row = event.target.closest('.shipment-line');
          // ... (rest of the code remains the same)

          $('.shipment-line').on('change', '#category-detail', function () {
            console.log(baseUrl);
            var categoryName = $(this).find(':selected').text();
            var row = $(this).closest('.shipment-line');
            $.ajax({
              type: 'POST',
              url: ''.concat(baseUrl, 'form/wizard-icons/price'),
              data: {
                categoryName: categoryName
              },
              success: function (response) {
                row.find('.price_for_wight').val(response.price);
                if (response.weight) {
                  row.find('.total_wight').val(response.weight);
                } else {
                  row.find('.total_wight').val('لا يوجد وزن');
                }
                $('.quantity').on('change', function () {
                  var quantity = parseFloat(row.find('.quantity').val()) || 1;
                  var priceForWeight = parseFloat(row.find('.price_for_wight').val());
                  var total = priceForWeight * quantity;
                  row.find('.line_total_cost').val(total);
                });
              }
            });
          });
        }
      });
    }
    attachChangeHandler();

    wizardValidationNext.forEach(item => {
      item.addEventListener('click', event => {
        // When click the Next button, we will validate the current step
        switch (validationStepper._currentIndex) {
          case 0:
            FormValidation1.validate();
            break;

          case 1:
            FormValidation2.validate();
            break;

          case 2:
            FormValidation3.validate();
            break;

          default:
            break;
        }
      });
    });

    wizardValidationPrev.forEach(item => {
      item.addEventListener('click', event => {
        switch (validationStepper._currentIndex) {
          case 3:
            validationStepper.previous();
            break;
          case 2:
            validationStepper.previous();
            break;

          case 1:
            validationStepper.previous();
            break;

          case 0:

          default:
            break;
        }
      });
    });

    $('.btn-submit').on('click', function () {
      var formData = {
        // Sender info
        first_name_s: $('#first_name_s').val(),
        middle_name_s: $('#middle_name_s').val(),
        last_name_s: $('#last_name_s').val(),
        national_id_s: $('#national_id_s').val(),
        phone_s: $('#phone_s').val(),
        email_s: $('#email_s').val(),
        address_s: $('#address_s').val(),

        // Receiver info
        first_name_r: $('#first_name_r').val(),
        middle_name_r: $('#middle_name_r').val(),
        last_name_r: $('#last_name_r').val(),
        national_id_r: $('#national_id_r').val(),
        phone_r: $('#phone_r').val(),
        email_r: $('#email_r').val(),
        address_r: $('#address_r').val(),
        // anthor
        shipping_delivery: $('#shipping_delivery').val(),
        destination: $('#d').val(),
        source: $('#s').val(),

        // Shipment lines
        lines: []
      };

      $('.shipment-line').each(function () {
        var line = {
          category_detail: $(this).find('.myCategorydetaile').val(),
          category: $(this).find('.myCategory').val(),
          description: $(this).find('.description').val(),
          quantity: $(this).find('.quantity').val(),
          total_wight: $(this).find('.total_wight').val()
        };

        formData.lines.push(line);
      });

      console.log(formData);

      $.ajax({
        data: formData,
        url: ''.concat(baseUrl, 'order-ship'),
        type: 'POST',
        success: function success(status) {
          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'تم بنجاح '.concat(status.message, '!'),
            text: 'الطلب '.concat(status.message, ' تم بنجاح.'),
            customClass: {
              confirmButton: 'btn btn-success'
            },
            willClose: function (willConfirm) {
              if (willConfirm) {
                // Redirect to a specific URL
                setTimeout(function () {
                  window.location.href = ''.concat(baseUrl, 'app/invoice/add?id='.concat(status.id));
                }, 200);
              }
            }
          });
        },
        error: function error(err) {
          Swal.fire({
            title: 'خطأ',
            text: err.message,
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });

    if (select2.length) {
      select2.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
          placeholder: 'Select value',
          dropdownParent: $this.parent()
        });
      });
    }

    const shipmentLine = document.querySelector('.shipment-line');
    const shipmentLineTemplate = shipmentLine.cloneNode(true);

    function initializeNewRow(newShipmentLine) {
      const categoryShipment = newShipmentLine.querySelector('.myCategory');
      const categoryDetail = newShipmentLine.querySelector('.myCategorydetaile');

      // Populate category details when category changes
      categoryShipment.addEventListener('change', function () {
        const categoryID = $(this).val();

        $.ajax({
          url: `${baseUrl}get-category-details/${categoryID}`,
          type: 'GET',
          success: function (data) {
            categoryDetail.innerHTML = '<option value="">اختر نوع الطرد </option>';
            data.forEach(function (detail) {
              const option = document.createElement('option');
              option.value = detail.id;
              option.textContent = detail.type;
              categoryDetail.appendChild(option);
            });
          }
        });
      });

      attachChangeHandler(newShipmentLine);
    }

    function addNewRow() {
      const newShipmentLine = shipmentLineTemplate.cloneNode(true);
      shipmentLine.after(newShipmentLine);
      const deleteButtonContainer = document.createElement('div');
      deleteButtonContainer.className = 'col-sm-12 d-flex justify-content-between';

      // Add a delete button to the new row
      const deleteButton = document.createElement('button');
      deleteButton.innerHTML = '<i class="fas fa-times"></i>';
      deleteButton.className = 'btn btn-danger removeRowBtn';
      deleteButton.addEventListener('click', function () {
        newShipmentLine.remove(); // Remove the row when the button is clicked
      });

      const h6container = document.createElement('div');
      const smallTag = document.createElement('small');
      smallTag.textContent = 'Extra order info';
      const h6Tag = document.createElement('h6');
      h6Tag.textContent = 'Extra Order';
      h6Tag.className = 'm-0'; // Adjust the margin as needed
      h6container.append(h6Tag, smallTag);
      deleteButtonContainer.append(h6container, deleteButton);

      // Prepend the delete button container to the new row
      newShipmentLine.prepend(deleteButtonContainer);

      // Re-initialize the event handlers for the new row
      initializeNewRow(newShipmentLine);
    }
    attachChangeHandler();
    $('.addRowBtn').on('click', addNewRow);
  }
})();
