const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
const appendAlert = (message, type, icon) => {
    alertPlaceholder.style.removeProperty('display');
    const wrapper = document.createElement('div')
    alertPlaceholder.innerHTML = [
        `<div class="alert alert-${type} mb-0 alert-fixed" role="alert"`,
        'style="width: 300px; top: 10px; right: 10px; text-align: justify;">',
        `   <i class="fas ${icon} me-1"></i>`,
        `   ${message}`,
        '</div>'
    ].join('')

    alertPlaceholder.append(wrapper)

    setTimeout(function () {
        alertPlaceholder.style.display = 'none';
    }, 5000);
}