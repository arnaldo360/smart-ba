<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.js" integrity="sha512-bwanfE29Vxh7VGuxx44U2WkSG9944fjpYRTC3GDUjh0UJ5FOdCQxMJgKWBnlxP5hHKpFJKmawufWEyr5pvwYVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {

        // mobile mask
        $('#mobile').mask('0000-000-000');

        // name validation method
        $.validator.addMethod('name_validation', function(value, element, param) {
            var nameRegex = /^[a-zA-Z]+[a-zA-Z]+$/;
            return value.match(nameRegex);
        });

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // physical address validation method
        $.validator.addMethod('st_address', function(value, element, param) {
            var nameRegex = /^[#.0-9a-zA-Z\s,-]+$/;
            return value.match(nameRegex);
        });

        // password validation method
        // $.validator.addMethod('password', function(value, element, param) {
        //     var nameRegex = /^[#.0-9a-zA-Z\s,-]+$/;
        //     return value.match(nameRegex);
        // });

        // confirm password validation method
        // $.validator.addMethod('confirmpassword', function(value, element, param) {
        //     var nameRegex = /^[#.0-9a-zA-Z\s,-]+$/;
        //     return value.match(nameRegex);
        // });

        //fuction to match password and confirm password
        $('#password, #confirmpassword').on('keyup', function() {
            if ($('#password').val() == $('#confirmpassword').val()) {
                $('#invalid-feedback').innerhtml('Matching').css('color', 'green');
            } else
                $('#invalid-feedback').innerhtml('Not Matching').css('color', 'red');
        });

        // create new employee validation 
        $("#createEmployeeForm").validate({
            rules: {
                fullname: {
                    required: true,
                    name_validation: true
                },
                contact: {
                    required: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    email: true
                },
                title: {
                    required: true
                },
                dateOfBirth: {
                    required: true
                },
                address: {
                    required: true,
                    st_address: true
                },
                gender: {
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: "Employee fullname is required",
                },

                contact: {
                    required: "Employee mobile is required",
                    minlength: "Employee mobile is invalid"
                },
                username: {
                    required: "Employee email is required",
                    email: "Employee email is invalid"
                },
                gender: {
                    required: "Employee gender is required"
                },
                title: {
                    required: "Employee title is required"
                },
                address: {
                    required: "Physical address is required",
                    st_address: "Physical address is invalid"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    $(document).ready(function() {

        // mobile mask
        $('#mobile').mask('0000-000-000');

        // name validation method
        $.validator.addMethod('name_validation', function(value, element, param) {
            var nameRegex = /^[a-zA-Z]+[a-zA-Z]+$/;
            return value.match(nameRegex);
        });

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // physical address validation method
        $.validator.addMethod('st_address', function(value, element, param) {
            var nameRegex = /^[#.0-9a-zA-Z\s,-]+$/;
            return value.match(nameRegex);
        });

        // create edit employee validation 
        $("#editEmployeeForm").validate({
            rules: {
                fullname: {
                    required: true,
                    name_validation: true
                },
                contact: {
                    required: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    email: true
                },
                title: {
                    required: true
                },
                dateOfBirth: {
                    required: true
                },
                address: {
                    required: true,
                    st_address: true
                },
                gender: {
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: "Employee fullname is required",
                },

                contact: {
                    required: "Employee mobile is required",
                    minlength: "Employee mobile is invalid"
                },
                username: {
                    required: "Employee email is required",
                    email: "Employee email is invalid"
                },
                gender: {
                    required: "Employee gender is required"
                },
                title: {
                    required: "Employee title is required"
                },
                address: {
                    required: "Physical address is required",
                    st_address: "Physical address is invalid"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    $(document).ready(function() {

        // mobile mask
        $('#mobile').mask('0000-000-000');

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // physical address validation method
        $.validator.addMethod('st_address', function(value, element, param) {
            var nameRegex = /^[#.0-9a-zA-Z\s,-]+$/;
            return value.match(nameRegex);
        });

        // create new user validation 
        $("#editUserForm").validate({
            rules: {
                fullName: {
                    required: true
                },
                mobile: {
                    required: true,
                    minlength: 10
                },
                Email: {
                    required: true,
                    email: true
                },
                gender: {
                    required: true
                },
                dateOfBirth: {
                    required: true
                },
                address: {
                    required: true,
                    st_address: true
                }
            },
            messages: {
                fullName: {
                    required: "Fullname is required",
                },

                mobile: {
                    required: "Mobile is required",
                    minlength: "Mobile is invalid"
                },
                Email: {
                    required: "Email is required",
                    email: "Email is invalid"
                },
                gender: {
                    required: "Gender is required"
                },
                address: {
                    required: "Physical address is required",
                    st_address: "Physical address is invalid"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>