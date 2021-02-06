@if (session('success'))
    <script>
        new Noty({
            layout: 'topCenter',
            type: 'alert',
            theme: 'nest',
            text: "{{session('success') }}",
            killer: true,
            timeout: 6000,
        }).show();
    </script>
@endif
