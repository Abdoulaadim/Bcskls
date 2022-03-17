$(document).ready(function() {
    $('#division').on('change', function() {
        var id = $(this).val();
        console.log(id);

        if (id) {
            $.ajax({
                url: '/service/' + id,
                type: "GET",
                data: { "_token": "{{ csrf_token() }}" },
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#service').empty();
                        $('#service').focus;
                        $('#service').append('<option value="">-- Select service --</option>');
                        $.each(data, function(key, value) {
                            $('select[name="service"]').append('<option value="' + value.nomservice + '">' + value.nomservice + '</option>');
                        });
                    } else {
                        $('#service').empty();
                    }
                }
            });
        } else {
            $('#service').empty();
        }
    });
});


$(document).ready(function() {
    $('#service').on('change', function() {
        var id = $(this).val();
        if (id) {
            $.ajax({
                url: '/employee/' + id,
                type: "GET",
                data: { "_token": "{{ csrf_token() }}" },
                dataType: "json",
                success: function(data) {
                    //console.log(data);
                    if (data) {
                        $('#employee').empty();
                        $('#employee').focus;
                        $('#employee').append('<option value="">-- Select employée --</option>');
                        $.each(data, function(key, value) {
                            $('select[name="employee"]').append('<option value="' + value.nomemployee + '">' + value.nomemployee + '</option>');
                        });
                    } else {
                        $('#employee').empty();
                    }
                }
            });
        } else {
            $('#employee').empty();
        }
    });
});