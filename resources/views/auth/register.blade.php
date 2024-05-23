<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;

    }

    body {
        background: #6a62d2;
    }

    .login-page {
        height: 100vh;
        width: 100%;
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .form {
        position: relative;
        filter: drop-shadow(0 0 2px #000000);
        border-radius: 5px;
        width: 360px;
        height: 420px;
        background-color: #ffffff;
        padding: 40px;
    }

    .form img {
        position: absolute;
        height: 20px;
        top: 230px;
        right: 60px;
        cursor: pointer;
    }

    .form input {
        outline: 0;
        background: #f2f2f2;
        border-radius: 4px;
        width: 100%;
        border: 0;
        margin: 15px 0;
        padding: 15px;
        font-size: 14px;
    }

    .form input:focus {
        box-shadow: 0 0 5px 0 rgba(106, 98, 210);
    }

    span {
        color: red;
        margin: 10px 0;
        font-size: 14px;
    }

    .form button {
        outline: 0;
        background: #6a62d2;
        width: 100%;
        border: 0;
        margin-top: 10px;
        border-radius: 3px;
        padding: 15px;
        color: #FFFFFF;
        font-size: 15px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.4s ease-in-out;
        cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: black;
        color: #fff;

    }

    .message {
        margin: 15px 0;
        text-align: center;

    }

    .form .message a {
        font-size: 14px;
        color: #6a62d2;
        text-decoration: none;
    }
</style>

<div class="login-page" >
    <div class="form" style="height: 500px;">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ url('register') }}">
            @csrf
            <h2>REGISTER</h2>
            <input placeholder="Name" id="name" type="text" name="name" required autofocus autocomplete="name" />
            <input placeholder="Phone" id="phone" type="text" name="phone" pattern="\d{11}" required autocomplete="tel" title="Phone number must be 11 digits"  />
            <input placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <input oninput="return formvalid()" type="password" name="password" required placeholder="Password" id="password" autocomplete="new-password" />
            <input oninput="return formvalid()" type="password" name="password_confirmation" required placeholder="Confirm Password" id="password_confirmation" autocomplete="new-password" />

            {{-- <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png" onclick="show()" id="showimg"> --}}
            <span id="valid-pass"></span>
            <button type="submit">Register</button>
            <!-- <p class="message"><a href="#">Forgot your password?</a></p> -->
        </form>
    </div>
</div>


<script>
    //TODO : Its a Completed Code
    function formvalid() {
        var vaildpass = document.getElementById("pass").value;

        if (vaildpass.length <= 6 || vaildpass.length >= 20) {
            document.getElementById("vaild-pass").innerHTML = "Minimum 6 characters";
            return false;
        } else {
            document.getElementById("vaild-pass").innerHTML = "";
        }
    }

    function show() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById("showimg").src =
                "https://static.thenounproject.com/png/777494-200.png";
        } else {
            x.type = "password";
            document.getElementById("showimg").src =
                "https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png";
        }
    }
</script>

<script>
    document.getElementById('phone').addEventListener('input', function (e) {
        var phoneInput = e.target;
        var message = '';
        if (phoneInput.value.length !== 11) {
            message = 'Phone number must be exactly 11 digits.';
        }
        phoneInput.setCustomValidity(message);
    });
</script>
