<script type="text/javascript" src="{{ asset('global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
    $('#segment').on('change', function(){

        if ( $('#segment').val() != "SBP" ) {

            $('#kategori').prop('disabled', false);
            $('#sub_problem').prop('disabled', false);
            
            if ( $('#segment').val() == "Upstream" ) {
                $('#sub_problem').prop('disabled', true);
            }

            $.post('{{ URL::to('problems/create/optcat') }}', {segment: $('#segment').val()}, function(e){
                $('#kategori').html(e);
            });
        }
        
        if ( $('#segment').val() == "SBP" ) {
            $('#kategori').prop('disabled', true);
            $('#sub_problem').prop('disabled', true);
            $.post('{{ URL::to('problems/create/optprob') }}', {category: 'kosong', segment: $('#segment').val()}, function(e){
                $('#problem').html(e);
            });
        }

    });

    $('#kategori').on('change', function(){
        $.post('{{ URL::to('problems/create/optprob') }}', {category: $('#kategori').val(), segment: $('#segment').val()}, function(e){
            $('#problem').html(e);
        });
    });

    $('#problem').on('change', function(){
        $.post('{{ URL::to('problems/create/optsub') }}', {problem: $('#problem').val(), category: $('#kategori').val(), segment: $('#segment').val()}, function(e){
            $('#sub_problem').html(e);
        });
    });

    $(document).ready(function(){

        $("#problem").select2();
        $("#sub_problem").select2();
        $("#kategori").select2();
        $("#circuit").select2();

    });

    $(".form_datetime").datetimepicker({
        autoclose: true,
        isRTL: Metronic.isRTL(),
        format: "dd MM yyyy hh:ii",
    });

</script>
