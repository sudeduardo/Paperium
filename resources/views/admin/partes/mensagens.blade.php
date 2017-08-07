@if(count($errors) > 0)
    @foreach ($errors->all() as $erro)
        <script type="text/javascript">
            $.notify({
                message: '{{$erro}}'
            },{
                type: 'danger'
            });
        </script>
    @endforeach
@endif

@if(Session::has('sucesso'))
    <script type="text/javascript">
        $.notify({
            message: '{{Session::get('sucesso')}}'
        },{
            type: 'success'
        });
    </script>
@endif

@if(Session::has('erro'))
    <script type="text/javascript">
        $.notify({
            message: '{{Session::get('erro')}}'
        },{
            type: 'danger'
        });
    </script>
@endif

@if(Session::has('atencao'))
    <script type="text/javascript">
        $.notify({
            message: '{{Session::get('atencao')}}'
        },{
            type: 'warning'
        });
    </script>
@endif
