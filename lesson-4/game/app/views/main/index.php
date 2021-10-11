

<div class="container" id="container" >
    <div class="form-container sign-up-container">
        <form class="g-3 needs-validation" novalidate action="registration" method="post">
            <h2 class="text-left">Регистрация</h2>
            <div class="col-md-12 mb-3">
                <label for="validationCustom1" class="form-label">Логин</label>
                <input type="text" name="login" class="form-control" id="validationCustom1"  required>
                <div class="invalid-feedback">
                    Пожалуйста ввведите логин
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationCustomUsername2" class="form-label">Почта</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" class="form-control"
                           id="validationCustomUsername2"
                           aria-describedby="inputGroupPrepend"
                           required>
                    <div class="invalid-feedback">
                        Пожалуйста ввведите почту
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationCustom3" class="form-label">Пароль</label>
                <input type="password" class="form-control"  name="password"  id="validationCustom3"  required>
                <div class="invalid-feedback">
                    Пожалуйста ввведите пароль
                </div>
            </div>
            <div class="mb-5"></div>
            <div class="col-12">
                <button  type="submit">Зарегистрироватся</button>
            </div>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form class="g-3 needs-validation" novalidate action="login" method="post">
            <h2>Вход</h2>
            <div class="col-md-12 mb-3">
                <label for="validationCustom02" class="form-label">Логин</label>
                <input type="text" name="login" class="form-control" id="validationCustom02"  required>
                <div class="invalid-feedback">
                    Пожалуйста ввведите логин
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationCustom03" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="validationCustom03"  required>
                <div class="invalid-feedback">
                    Пожалуйста ввведите пароль
                </div>
            </div>
            <div class="mb-5"></div>
            <div class="col-12">
                <button  type="submit">Войти</button>
            </div>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h2>Авторизоваться</h2>
                <button class="ghost" id="signIn">Войти</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h2>У вас нет аккаунта ?</h2>
                <button class="ghost" id="signUp" type="submit">Зарегистрироватся</button>

            </div>
        </div>
    </div>
</div>