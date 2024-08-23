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
const wizardVertical = document.querySelector('.wizard-vertical');

if (typeof wizardVertical !== undefined && wizardVertical !== null) {
  const wizardVerticalBtnNextList = [].slice.call(wizardVertical.querySelectorAll('.btn-next')),
    wizardVerticalBtnPrevList = [].slice.call(wizardVertical.querySelectorAll('.btn-prev')),
    wizardVerticalBtnSubmit = wizardVertical.querySelector('.btn-submit');

  const numberedVerticalStepper = new Stepper(wizardVertical, {
    linear: false
  });
  if (wizardVerticalBtnNextList) {
    wizardVerticalBtnNextList.forEach(wizardVerticalBtnNext => {
      wizardVerticalBtnNext.addEventListener('click', event => {
        numberedVerticalStepper.next();
      });
    });
  }
  if (wizardVerticalBtnPrevList) {
    wizardVerticalBtnPrevList.forEach(wizardVerticalBtnPrev => {
      wizardVerticalBtnPrev.addEventListener('click', event => {
        numberedVerticalStepper.previous();
      });
    });
  }
  if (wizardVerticalBtnSubmit) {
    wizardVerticalBtnSubmit.addEventListener('click', event => {
      alert('Submitted..!!');
    });
  }
}
