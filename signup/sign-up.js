$(function() {
    var nameField = { el: $('#name'), name: 'Name', msg: '' };
    var emailField = { el: $('#email'), name: 'Email', msg: '' };
    var passwdField = { el: $('#passwd'), name: 'Password', msg: '' };
    var confPasswdField = { el: $('#conf-passwd'), name: 'Confirmation Password', msg: '' };
    var emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var passRegEx = /[A-Z+a-z+\d+\S]{7,}[!@#\$%\^&\*\(\)]+/;
    var message = $('#message');
    var borderColor = nameField.el.css('border-color');
    var fields = [nameField, emailField, passwdField, confPasswdField];

    nameField.el.blur(function() { highlightInvalid(nameField); });
    emailField.el.blur(function() { highlightInvalid(emailField, emailRegEx); });
    var passwdSet = false;
    passwdField.el.blur(function() { 
        passwdSet = !highlightInvalid(passwdField, passRegEx);
        if(passwdSet) highlightInvalid(confPasswdField, passRegEx, passwdField);
    });
    confPasswdField.el.blur(function() { highlightInvalid(confPasswdField, passRegEx, passwdField); });

    function highlightInvalid(field, regex, match) {
        let val = field.el.val();
        let valid = true;

        if(!val) {
            valid = false;
            field.msg = 'Please enter your '+field.name+'\n';
        }
        if(regex) {
            let res = val.match(regex);
            if(!res) {
                valid = false;
                field.msg = 'Invalid '+field.name+'\n';
            }
        }
        if(match) {
            valid = val === match.el.val();
            if(!valid) field.msg = field.name+' and '+match.name+' do not match\n';
        }
        if(valid) field.msg = '';

        setMessage();

        if(!valid) {
            field.el.css('border-color', 'var(--volcanic-red)');
            return true;
        } else {
            field.el.css('border-color', borderColor);
            return false;
        }
    }

    function setMessage() {
        message.text('');
        $.each(fields, function(i, val) {
            message.text(message.text()+val.msg);
        });
    }
});