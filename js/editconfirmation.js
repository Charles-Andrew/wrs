let myModal = new bootstrap.Modal(document.getElementById('statusmodal'), {});
myModal.show();

setTimeout(function() {
    myModal.hide();
}, 2500);