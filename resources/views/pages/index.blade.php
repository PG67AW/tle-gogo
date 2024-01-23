<?php

use App\Models\Visitor;
use Illuminate\Http\Request;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules, mount};

name('home');
// middleware(['redirect-to-dashboard']);
mount(function (Request $request) {
    $clientIpAddress = $request->getClientIp();
    Visitor::create(['ip_address' => $clientIpAddress]);
});

?>

<x-layouts.marketing>

    @volt('home')
        <div class="relative flex flex-col items-center min-h-[100dvh] justify-center w-full overflow-hidden" x-cloak>

            <img src="/images/left.png"
                class="fixed top-0 left-0 w-7/12 -ml-24 -translate-x-1/2 dark:invert grayscale duration-500 pointer-events-none select-none fill-current opacity-10 dark:opacity-5 text-slate-400">
            <img src="/images/right.png"
                class="fixed top-0 right-0 w-7/12 -mr-24 translate-x-1/2 dark:invert grayscale duration-500 pointer-events-none select-none fill-current opacity-10 dark:opacity-5 text-slate-400">

            <div class="flex items-center w-full max-w-6xl px-8 pt-12 pb-20 mx-auto">
                <div class="container relative max-w-4xl mx-auto text-center">
                    <div style="background-image:linear-gradient(160deg,#e66735,#e335e2 50%,#73f7f8, #a729ed)"
                        class="inline-block w-auto p-0.5 shadow rounded-full animate-gradient">
                        <p
                            class="w-auto h-full px-3 bg-slate-50 dark:bg-neutral-900 dark:text-white py-1.5 font-medium text-sm tracking-widest uppercase  rounded-full text-slate-800/90 group-hover:text-white/100">
                            Welcome to Title's Site</p>
                    </div>
                    {{-- <h1
                        class="mt-5 text-4xl font-light leading-tight tracking-tight text-center dark:text-white text-slate-800 sm:text-5xl md:text-8xl">
                        The Beginning of Your<br> Next Great Idea.</h1> --}}
                    <div class="mt-5 w-full max-w-sm rounded-md overflow-hidden mx-auto">
                        <img src="/images/bean.gif" alt="bean"
                            class="w-full hover:scale-110 duration-300 hover:brightness-110">
                    </div>
                    <p class="w-full max-w-2xl mx-auto mt-5 text-lg dark:text-white/60 text-slate-500">
                        Under Development Come Back Again Soon :P
                    </p>
                    <div class="flex items-center justify-center w-full max-w-sm px-5 mx-auto mt-8 space-x-5">
                        <x-ui.button type="secondary" tag="a" href="https://github.com/thedevdojo/genesis"
                            target="_blank">View the Docs</x-ui.button>
                        <x-ui.button type="primary" tag="a" href="https://github.com/thedevdojo/genesis"
                            target="_blank">View Github Repo</x-ui.button>
                    </div>
                </div>
            </div>

        </div>
    @endvolt

</x-layouts.marketing>
