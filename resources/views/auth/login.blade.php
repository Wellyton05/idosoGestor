@section('title', 'Entrar - ' . config('app.name'))

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Entrar - {{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .subtle-background {
            background-color: #f8fafc; /* bg-slate-50 */
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center p-4 subtle-background">
        
        <div class="absolute top-4 left-4">
            <a href="/" class="inline-flex items-center text-sm text-slate-600 hover:text-blue-600 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Voltar para o site
            </a>
        </div>
        
        <div class="w-full max-w-md bg-white p-8 md:p-10 rounded-2xl shadow-2xl shadow-slate-200 border border-slate-200">
            
            <div class="flex justify-center mb-6">
                <a href="/">
                    <img src="{{ asset('images/logoIdosoGestor-removebg-preview.png') }}" alt="Idoso Gestor" class="w-28 h-auto">
                </a>
            </div>
            
            <h2 class="text-3xl font-bold text-center text-slate-800 mb-2">Bem-vindo(a) de volta!</h2>
            <p class="text-center text-slate-500 mb-8">Faça login para continuar.</p>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block font-medium text-sm text-slate-700 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <input id="email" class="block w-full pl-10 pr-3 py-2 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                               placeholder="seuemail@exemplo.com" />
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block font-medium text-sm text-slate-700">Senha</label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Esqueceu a senha?') }}
                            </a>
                        @endif
                    </div>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                             <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input id="password" class="block w-full pl-10 pr-3 py-2 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               type="password" name="password" required autocomplete="current-password" 
                               placeholder="••••••••"/>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-slate-700 to-slate-900 hover:from-slate-800 hover:to-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all transform hover:scale-[1.02]">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>