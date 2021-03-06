@include('template.header')
    @include('menu.topbar')
    <section class="container body">
        @yield('content-body')
    </section>
@include('template.footer')