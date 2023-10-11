@extends('../layout/' . $layout)

@section('head')
<title>Login - BuuGym </title>
@endsection

@section('content')
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('build/assets/images/logo.svg') }}">
                <span class="text-white text-lg ml-3">
                    BuuGym
                </span>
            </a>
            <div class="my-auto">
                <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('build/assets/images/illustration.svg') }}">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Chỉ với vài click nữa <br> để đăng nhập vào tài khoản của bạn</div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Quản lý phòng Gym của bạn ở mọi nơi</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Đăng Nhập</h2>
                <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Chỉ với vài click nữa để đăng nhập vào tài khoản của bạn. Quản lý phòng Gym của bạn ở mọi nơi</div>
                <div class="intro-x mt-8">
                    <form id="login-form" method="post" action="{{ route('login.check') }}">
                        @csrf
                        <input id="email" type="email" name="email" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email" value="{{ old('email') }}" >
                        <div id="error-email" class="login__input-error text-danger mt-2"></div>
                        <input id="password" type="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" value="{{ old('password') }}" >
                        <div id="error-password" class="login__input-error text-danger mt-2"></div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="">Quên mật khẩu?</a>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button id="btn-login" type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Đăng Nhập</button>
                            <a type="button" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top" href="{{ route('register.index') }}">Đăng Ký</a>
                        </div>
                    </form>
                </div>
                <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                    Bằng việc đăng nhập, bạn đã đồng ý với <a class="text-primary dark:text-slate-200" href="">Điều kiện </a> & <a class="text-primary dark:text-slate-200" href="">Điều khoản</a>
                </div>
            </div>
        </div>
        <!-- END: Login Form -->
        <!-- BEGIN: Success Notification Content -->
        <div id="success-notification-content" class="toastify-content hidden flex">
            <i class="text-success" data-lucide="check-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">Registration success!</div>
                <div class="text-slate-500 mt-1">
                    Please check your e-mail for further info!
                </div>
            </div>
        </div>
        <!-- END: Success Notification Content -->
        <!-- BEGIN: Failed Notification Content -->
        <div id="failed-notification-content" class="toastify-content hidden flex">
            <i class="text-danger" data-lucide="x-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">Registration failed!</div>
                <div class="text-slate-500 mt-1">
                    Please check the fileld form.
                </div>
            </div>
        </div>
        <!-- END: Failed Notification Content -->
    </div>
</div>
@endsection
@section('script')
<script>
    $("#login-form").each(function() {
        let pristine = new Pristine(this, {
            classTo: "input-form",
            errorClass: "has-error",
            errorTextParent: "input-form",
            errorTextClass: "text-danger mt-2",
        });

        pristine.addValidator(
            $(this).find('input[type="url"]')[0],
            function(value) {
                let expression =
                    /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
                let regex = new RegExp(expression);
                if (!value.length || (value.length && value.match(regex))) {
                    return true;
                }
                return false;
            },
            "This field is URL format only",
            2,
            false
        );

        $(this).on("submit", function(e) {
            e.preventDefault();
            onSubmit(pristine);
        });
    });
</script>

@endsection