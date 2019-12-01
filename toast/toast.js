function showToast(msg) {
    var toast = document.getElementById('toast');
    toast.className = 'show';
    setTimeout(function() {
        toast.className = toast.className.replace('show', '');
    }, 5000);

    switch(msg) {
        case 'valid':
            toast.style.backgroundColor = '#00FF55';
            break;
        case 'invalid':
            toast.style.backgroundColor = '#FF1122';
            break;
    }
}