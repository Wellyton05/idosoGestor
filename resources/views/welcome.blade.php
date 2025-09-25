<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IdosoGestor - Gestão Completa para Lares de Idosos</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                        'bounce-slow': 'bounce 3s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* ### INÍCIO DA ALTERAÇÃO DE TEMA SUAVE ### */
        .text-gradient {
            background: linear-gradient(135deg, #334155 0%, #0f172a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-nav {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.85); /* Mais transparente */
            transition: all 0.3s ease;
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(100, 116, 139, 0.1); /* Sombra mais suave */
        }
        /* ### FIM DA ALTERAÇÃO DE TEMA ### */
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem; /* 40px */
                line-height: 1.2;
            }
        }
    </style>
</head>
<body class="font-inter bg-slate-50 text-slate-800">

    <nav id="navbar" class="fixed top-0 w-full z-50 glass-nav border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
            <a href="/" class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center shadow-lg">
                    {{-- SVG NOVO - Ícone de Pessoas/Comunidade --}}
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.125-1.274-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.125-1.274.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <span class="text-xl font-bold text-gradient">IdosoGestor</span>
            </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#solucoes" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">Soluções</a>
                    <a href="#contato" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">Contato</a>
                    <a href="{{ route('login') }}" class="bg-slate-800 text-white px-6 py-2.5 rounded-full font-semibold hover:bg-slate-900 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        Acessar Sistema
                    </a>
                </div>
                <button id="mobile-menu-button" class="md:hidden p-2 text-slate-700" aria-label="Abrir menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden px-4 pt-2 pb-4 space-y-2 border-t border-slate-200/50">
            <a href="#solucoes" class="block text-slate-700 hover:bg-slate-100 px-4 py-2 rounded-md font-medium transition-colors">Soluções</a>
            <a href="#contato" class="block text-slate-700 hover:bg-slate-100 px-4 py-2 rounded-md font-medium transition-colors">Contato</a>
            <a href="{{ route('login') }}" class="block w-full text-center bg-slate-800 text-white mt-2 px-6 py-2.5 rounded-full font-semibold">
                Acessar Sistema
            </a>
        </div>
    </nav>

    <section class="pt-20 bg-white flex items-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 h-full w-full bg-white bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:72px_72px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_500px_at_50%_200px,#c9dcf966,transparent)]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="hero-title text-4xl md:text-6xl lg:text-7xl font-bold mb-8 opacity-0 animate-fade-in-up text-slate-900" style="animation-delay: 0.4s;">
                    Cuidando de quem você <span class="text-gradient">ama</span>
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl mb-12 text-slate-600 max-w-3xl mx-auto leading-relaxed opacity-0 animate-fade-in-up" style="animation-delay: 0.6s;">
                    A plataforma mais avançada para gestão de lares de idosos, conectando famílias e cuidadores com transparência e tecnologia de ponta.
                </p>
            </div>
        </div>
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-slate-500 animate-bounce-slow">
            <a href="#solucoes" aria-label="Rolar para baixo"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg></a>
        </div>
    </section>

    <section id="solucoes" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-6">
                    💙 Nossas Soluções
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-6">Tecnologia que <span class="text-gradient">transforma</span> o cuidado</h2>
                <p class="text-lg md:text-xl text-slate-600 max-w-3xl mx-auto">Descubra como nossa plataforma revoluciona a gestão de lares de idosos com recursos intuitivos e poderosos.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card-hover bg-white p-6 md:p-8 rounded-2xl border border-slate-200">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Gestão de Residentes</h3>
                    <p class="text-slate-600">Cadastre e gerencie todas as informações importantes dos residentes em um único lugar, de forma segura e organizada.</p>
                </div>
                <div class="card-hover bg-white p-6 md:p-8 rounded-2xl border border-slate-200">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Agendamento de Visitas</h3>
                    <p class="text-slate-600">Controle as visitas de familiares e amigos com um sistema de agendamento simples e prático, evitando conflitos de horário.</p>
                </div>
                <div class="card-hover bg-white p-6 md:p-8 rounded-2xl border border-slate-200">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Controle de Atividades</h3>
                    <p class="text-slate-600">Registre e acompanhe as atividades diárias, terapias e eventos, garantindo o bem-estar e a participação de todos os residentes.</p>
                </div>
                <div class="card-hover bg-white p-6 md:p-8 rounded-2xl border border-slate-200">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Comunicação Integrada</h3>
                    <p class="text-slate-600">Mantenha os familiares sempre informados com um canal de comunicação direto e seguro para atualizações e comunicados.</p>
                </div>
            </div>
        </div>
    </section>

    <footer id="contato" class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="mb-12">
                    <div class="flex items-center justify-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center shadow-lg">
                            {{-- SVG NOVO - Ícone de Pessoas/Comunidade --}}
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.125-1.274-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.125-1.274.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <span class="text-xl font-bold text-gradient">IdosoGestor</span>
                    </div>
                    <p class="text-slate-400 mb-8 max-w-md mx-auto">
                        Transformando o cuidado de idosos com tecnologia de ponta e muito amor. Conectando famílias, cuidadores e residentes em uma plataforma segura e intuitiva.
                    </p>
                    <div class="flex justify-center">
                        <a href="https://wa.me/5547996013214" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 bg-green-500 text-white font-bold px-8 py-4 rounded-full hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.919 6.066l-1.225 4.429 4.562-1.193z"/></svg>
                            <span>Entre em contato pelo WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 text-center">
                <p class="text-slate-400">&copy; {{ date('Y') }} IdosoGestor. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const navbar = document.getElementById('navbar');
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
            document.querySelectorAll('#mobile-menu a, a[href^="#"]').forEach(link => {
                link.addEventListener('click', (e) => {
                    if(link.getAttribute('href').startsWith('#')) {
                       mobileMenu.classList.add('hidden');
                    }
                });
            });
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-md', 'bg-white/85');
                } else {
                    navbar.classList.remove('shadow-md', 'bg-white/85');
                }
            });
        });
    </script>
</body>
</html> 