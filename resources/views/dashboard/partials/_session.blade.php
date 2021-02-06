@if (session('success'))
    <script>
        new Noty({
            layout: 'topRight',
            type: 'alert',
            text: "{{session('success') }}",
            killer: true,
            timeout: 2000,
        }).show();
    </script>
@endif
