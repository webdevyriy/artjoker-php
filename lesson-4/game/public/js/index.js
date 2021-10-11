(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        });


    $('form').submit(function(event) {
        let json;
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
        }).done(function (result) {
            let data = JSON.parse(result);
            if (JSON.parse(result).message === 'game'){
                window.location.href = '/game';
            }else if(JSON.parse(result).message === 'no'){
                alert('Ошибка авторизационные данные неверны или устарели!')
            }
            else if(JSON.parse(result).message === 'have-user'){
                alert('Такой пользователь уже существует')
            }
            else if(JSON.parse(result).message === 'log-in'){
                alert('Вы успешно зарегистрировались!')
                setTimeout(()=>{
                    window.location.href = '/';
                },500)
            }
        });
    })


    const signUpButton = document.querySelector("#signUp");
    const signInButton = document.querySelector("#signIn");
    const container = document.querySelector("#container");

    if(signInButton){
        signUpButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });
    }

    if(signUpButton){
        signInButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });

    }

})()