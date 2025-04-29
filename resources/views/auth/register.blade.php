<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="monster-login-wrapper">
        <!-- Left Side Image Container -->
        <div class="login-image-container">
            <img src="{{ asset('background.png') }}" alt="Register Background" class="login-side-image" />
            <div class="image-overlay">
                <h2 class="overlay-title">Join Our Community</h2>
                <p class="overlay-text">Create your Monster App account and start your adventure today.</p>
            </div>
        </div>

        <div class="monster-login-container">
            <form method="POST" action="{{ route('register') }}" class="login-form">
                @csrf
                
                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                </div>
                
                <h1 class="login-title">Create an Account</h1>

                <!-- Name -->
                <div class="input-group">
                    <div class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <x-text-input id="name" class="monster-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Your Name" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="error-message" />

                <!-- Email Address -->
                <div class="input-group">
                    <div class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <x-text-input id="email" class="monster-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Your Email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="error-message" />

                <!-- Password -->
                <div class="input-group">
                    <div class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                    <x-text-input id="password" class="monster-input" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="error-message" />

                <!-- Confirm Password -->
                <div class="input-group">
                    <div class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                    <x-text-input id="password_confirmation" class="monster-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />

                <div class="button-container">
                    <button type="submit" class="monster-button">
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="links-container">
                    <a class="monster-link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        :root {
            --primary-color: #3B82F6; /* blue-500 */
            --primary-hover: #2563EB; /* blue-600 */
            --secondary-color: #6B7280; /* gray-500 */
            --background-color: #1F2937; /* gray-800 */
            --form-bg-color: #111827; /* gray-900 */
            --text-color: #F9FAFB; /* gray-50 */
            --error-color: #EF4444; /* red-500 */
            --input-bg: #374151; /* gray-700 */
            --border-color: #4B5563; /* gray-600 */
            --success-color: #10B981; /* green-500 */
        }
        
        body {
            background-color: var(--form-bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        /* Wrapper for the split layout */
        .monster-login-wrapper {
            display: flex;
            width: 900px;
            max-width: 95%;
            margin: 40px auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            overflow: hidden;
        }
        
        /* Container for the side image */
        .login-image-container {
            flex: 1;
            position: relative;
            display: none; /* Hide by default on small screens */
        }
        
        .login-side-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.8));
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            color: white;
        }
        
        .overlay-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 16px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }
        
        .overlay-text {
            font-size: 16px;
            max-width: 80%;
            line-height: 1.6;
        }
        
        .monster-login-container {
            background: var(--background-color);
            padding: 25px;
            flex: 1;
            position: relative;
            border-radius: 0;
            border: none;
            box-shadow: none;
        }
        
        .login-title {
            color: var(--text-color);
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: var(--input-bg);
            transition: all 0.2s ease;
        }
        
        .input-group:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }
        
        .input-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 15px;
            color: var(--secondary-color);
        }
        
        .input-icon svg {
            width: 20px;
            height: 20px;
        }
        
        .monster-input {
            background: transparent !important;
            border: none !important;
            color: var(--text-color) !important;
            padding: 12px 10px !important;
            width: 100% !important;
            font-size: 16px !important;
            outline: none !important;
            box-shadow: none !important;
        }
        
        .monster-input::placeholder {
            color: var(--secondary-color);
            opacity: 0.7;
        }
        
        .error-message {
            color: var(--error-color);
            margin-top: 5px;
            font-size: 14px;
        }
        
        .button-container {
            margin: 25px 0;
        }
        
        .monster-button {
            background: var(--primary-color);
            border: none;
            border-radius: 6px;
            padding: 12px 20px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .monster-button:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }
        
        .links-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .monster-link {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 14px;
            position: relative;
        }
        
        .monster-link:hover {
            color: #60A5FA; /* blue-400 */
        }
        
        /* Responsive Design */
        @media (min-width: 768px) {
            .login-image-container {
                display: block; /* Show on larger screens */
            }
            
            .monster-login-container {
                border-radius: 0 10px 10px 0;
            }
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 767px) {
            .monster-login-wrapper {
                flex-direction: column;
                width: 95%;
            }
            
            .monster-login-container {
                border-radius: 10px;
                width: 100%;
                padding: 30px 20px;
            }
            
            .login-title {
                font-size: 22px;
            }
        }

        body {
            background: url('{{ asset('Background.png') }}') no-repeat center center fixed;
            background-size: cover;
        }

    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple focus/blur effects
            const inputs = document.querySelectorAll('.monster-input');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.closest('.input-group').style.borderColor = 'var(--primary-color)';
                    this.closest('.input-group').style.boxShadow = '0 0 0 2px rgba(59, 130, 246, 0.2)';
                });
                
                input.addEventListener('blur', function() {
                    this.closest('.input-group').style.borderColor = 'var(--border-color)';
                    this.closest('.input-group').style.boxShadow = 'none';
                });
            });
        });
    </script>
</x-guest-layout>