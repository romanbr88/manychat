(function () {
    'use strict'
    feather.replace({'aria-hidden': 'true'})

    let deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        let a = event.relatedTarget;
        let target = a.getAttribute('href');
        let form = deleteModal.querySelector('form');
        form.action = target;
    })
})()
