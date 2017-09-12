@if(Session::has('success'))
    <script>
        $("body").overhang({
            type: '',
            custom: true,
            primary: '#66a215',
            accent: 'rgba(0, 0, 0, 0.3)',
            message: "{{ Session::get('success') }}",
            duration: 3,
            closeConfirm: false
        });
    </script>
@endif

@if(Session::has('status'))
    <script>
        $("body").overhang({
            type: '',
            custom: true,
            primary: '#158fa2',
            accent: 'rgba(0, 0, 0, 0.3)',
            message: "{{ Session::get('status') }}",
            duration: 3,
            closeConfirm: false
        });
    </script>
@endif

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            $("body").overhang({
                type: '',
                custom: true,
                primary: '#a21515',
                accent: 'rgba(0, 0, 0, 0.3)',
                message: "{{ $error }}",
                duration: 3,
                closeConfirm: false
            });
        </script>

    @endforeach
@endif