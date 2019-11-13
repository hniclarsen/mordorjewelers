$(function() {
    var borderColor = $('#name').css('border-color');
    var nameField = $('#name');
    var emailField = $('#email');
    var passwdField = $('#passwd');
    var confPasswdField = $('#conf-passwd');

    nameField.blur(function() { highlightInvalid(nameField); });
    emailField.blur(function() { highlightInvalid(emailField); });
    passwdField.blur(function() { highlightInvalid(passwdField); });
    confPasswdField.blur(function() { highlightInvalid(confPasswdField); });

    function highlightInvalid(field) {
        let val = field.val();
        if(!val) {
            field.css('border-color', 'var(--volcanic-red)');
        } else {
            field.css('border-color', borderColor);
        }
    }
});