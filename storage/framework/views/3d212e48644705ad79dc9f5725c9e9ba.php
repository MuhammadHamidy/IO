<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="min-w-max min-h-max sm:min-w-screen sm:min-h-screen p-[100px] flex flex-col gap-16 items-center justify-center bg-cover" style="background-image: url('<?php echo e(asset('img/auth-background.png')); ?>')">
        <img src="<?php echo e(asset('img/logo-white.png')); ?>" class="w-[100px] h-[80px] sm:w-[182px] sm:h-[130px]"/>

        <div class="flex flex-col px-20 py-10 bg-[#1F4894] bg-opacity-85 gap-4 sm:gap-12">
            <div class="flex flex-col items-center justify-center gap-5">
                <h1 class="font-bold text-white text-start text-[20px] sm:text-[28px]">International Office Universitas Pertamina</h1>
                <a href="<?php echo e(route('login-inbound')); ?>" class="text-center text-white bg-[#C4D25A] min-w-max w-[120px] h-max p-2 rounded-lg text-sm">Login with Inbound Account</a>
                <p class="font-bold text-white text-start text-[15px] sm:text-[20px]">OR</p>
            </div>
            <h2 class="font-semibold text-white text-start text-[16px] sm:text-[22px] border-b-[#C4D25A] border-b-[3px] w-max pe-[20px]">Login with SSO</h2>
            <form class="w-full h-fit flex flex-col gap-2" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="flex flex-col">
                    <label class="mb-2 mt-4 text-white">Username</label>
                    <input type="text" name="username" class="p-2  h-10 border border-gray-500 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" required>
                </div>
                <div class="w-full flex flex-col relative">
                    <label class="mb-2 mt-4 text-white">Password</label>
                    <input type="password" name="password" id="password" class="p-2 h-10 border border-gray-500 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" required>
                    <button type="button" onclick="togglePassword()" class="absolute right-4 top-[75%] transform -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" id="eye-icon" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" id="eye-off-icon" class="hidden h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <div class="w-full flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-2">
                        <input id="remember" type="checkbox" name="remember" class="">
                        <label class="text-white" for="remember">Remember me</label>
                    </div>
                </div>
                <div class="w-full flex flex-col justify-center items-center">
                    <button type="submit" class="bg-[#275DCB] text-white rounded-md px-4 py-2 mt-6 hover:bg-[#2b467c] transition duration-300 self-end">Login</button>
                </div>
                <script>
                    function togglePassword() {
                        const password = document.getElementById('password');
                        const eyeIcon = document.getElementById('eye-icon');
                        const eyeOffIcon = document.getElementById('eye-off-icon');

                        if (password.type === 'password') {
                            password.type = 'text';
                            eyeIcon.classList.add('hidden');
                            eyeOffIcon.classList.remove('hidden');
                        } else {
                            password.type = 'password';
                            eyeIcon.classList.remove('hidden');
                            eyeOffIcon.classList.add('hidden');
                        }
                    }
                </script>
            </form>
        </div>

    </div>

    <script>
        document.querySelector('form').addEventListener('submit', async function(e) {
            e.preventDefault();

            try {
                const response = await fetch(`https://sso.universitaspertamina.ac.id/api/login?username=${this.username.value}&password=${this.password.value}`, {
                    method: 'POST',
                    headers: {
                        'Accept': '*/*',
                        'Accept-Encoding': 'gzip, deflate, br',
                        'Connection': 'keep-alive',
                        'Content-Length': '0',
                    }
                });

                const data = await response.json();

                const loginData = {
                    name: data.data.name,
                    email: data.data.email,
                    password: this.password.value,
                    remember: this.remember.value
                }

                if (response.ok) {
                    const loginResponse = await fetch("/api/login-outbound", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(loginData)
                    });

                    if(loginResponse.ok) {
                        const loginData = await loginResponse.json();
                        alert(loginData.message);
                        window.location.href = loginData.redirect;
                    } else {
                        alert(data.message || 'Registration failed');
                    }

                } else {
                    if (data.errors) {
                        Object.keys(data.errors).forEach(key => {
                            alert(data.errors[key][0]);
                        });
                    } else {
                        alert(data.message || 'Registration failed');
                    }
                }
            } catch (error) {
                alert('An error occurred during registration');
                console.error(error);
            }
        });
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/login-outbound.blade.php ENDPATH**/ ?>