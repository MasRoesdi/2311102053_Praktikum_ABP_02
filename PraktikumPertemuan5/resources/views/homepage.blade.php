@extends('app')
@section('page-title')
    Home
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-emerald-50 via-white to-slate-50">
        <header class="border-b border-emerald-100/80 bg-white/70 backdrop-blur-sm">
            <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ url('/') }}" class="text-lg font-semibold tracking-tight text-emerald-900">
                    Toko Pak Cokomi
                </a>
                <nav class="flex items-center gap-3 text-sm font-medium">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="rounded-lg bg-emerald-600 px-4 py-2 text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-lg px-3 py-2 text-emerald-800 transition hover:bg-emerald-50">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}"
                            class="rounded-lg bg-emerald-600 px-4 py-2 text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                            Daftar
                        </a>
                    @endauth
                </nav>
            </div>
        </header>

        <main>
            <section class="mx-auto max-w-6xl px-4 pb-20 pt-16 sm:px-6 sm:pt-24 lg:px-8 lg:pt-28">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700">
                        Belanja online simpel
                    </p>
                    <h1 class="mt-4 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                        Produk pilihan, harga bersahabat
                    </h1>
                    <p class="mt-6 text-lg leading-relaxed text-slate-600 sm:text-xl">
                        Selamat datang di Website Toko Pak Cokomi. Temukan kebutuhan harian Anda dengan pengalaman
                        belanja yang rapi dan mudah diingat.
                    </p>
                    <div class="mt-10 flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-4">
                        @guest
                            <a href="{{ route('register') }}"
                                class="inline-flex w-full items-center justify-center rounded-xl bg-emerald-600 px-8 py-3 text-base font-semibold text-white shadow-lg shadow-emerald-600/25 transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 sm:w-auto">
                                Mulai belanja
                            </a>
                            <a href="{{ route('login') }}"
                                class="inline-flex w-full items-center justify-center rounded-xl border border-emerald-200 bg-white px-8 py-3 text-base font-semibold text-emerald-800 transition hover:border-emerald-300 hover:bg-emerald-50 sm:w-auto">
                                Sudah punya akun?
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex w-full items-center justify-center rounded-xl bg-emerald-600 px-8 py-3 text-base font-semibold text-white shadow-lg shadow-emerald-600/25 transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 sm:w-auto">
                                Lanjut ke dashboard
                            </a>
                        @endguest
                    </div>
                </div>

                <div class="mx-auto mt-20 grid max-w-5xl gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h2 class="mt-4 text-lg font-semibold text-slate-900">Katalog rapi</h2>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">
                            Tampilan produk yang jelas supaya cepat menemukan barang yang Anda cari.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <h2 class="mt-4 text-lg font-semibold text-slate-900">Aman & terpercaya</h2>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">
                            Akun Anda dilindungi sehingga transaksi dan data tetap terkendali.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm sm:col-span-2 lg:col-span-1">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.25 2.25 0 0 0-1.227-1.227 17.902 17.902 0 0 0-9.193-3.213m0 0A1.5 1.5 0 0 0 5.25 6.75h10.5a1.5 1.5 0 0 0 1.372-2.213 48.516 48.516 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m0 0c.38-.005.743-.097 1.027-.25m0 0a48.554 48.554 0 0 1 1.783-.004m0 0v.991c0 2.225-1.021 3.645-2.896 4.464a48.672 48.672 0 0 0-2.758.06m12 5.311c0 1.033-.893 1.867-2 1.867H9.75c-1.107 0-2-.834-2-1.867V18.75m12 0v.709c0 .655-.503 1.184-1.141 1.269m-12 0c-.638-.085-1.141-.614-1.141-1.269V18.75m12 0a48.907 48.907 0 0 1-3.478-.397" />
                            </svg>
                        </div>
                        <h2 class="mt-4 text-lg font-semibold text-slate-900">Pengiriman terencana</h2>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">
                            Informasi pesanan terpusat di dashboard setelah Anda masuk.
                        </p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="border-t border-emerald-100 bg-white/80 py-8 text-center text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} Toko Pak Cokomi. All Rights Reserved.</p>
        </footer>
    </div>
@endsection
