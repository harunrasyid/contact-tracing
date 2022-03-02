$("#masuk_kampus").change(function() {
    if ($(this).val() == "ya") {
        $('#dynamicAddRemove').show();
    } else {
        $('#dynamicAddRemove').hide();		
    }
});
$("#masuk_kampus").trigger("change");



$("#lokasi_kampus").change(function() {
    if ($(this).val() == "ganesa") {
        $('#lokasiGanesa').show();
        $('#lokasiJatinangor').hide();
        $('#lokasiCCAR').hide();
    }else if($(this).val() == "jatinangor"){
        $('#lokasiGanesa').hide();
        $('#lokasiJatinangor').show();
        $('#lokasiCCAR').hide();
    }else if($(this).val() == "ccar"){
        $('#lokasiGanesa').hide();
        $('#lokasiJatinangor').hide();
        $('#lokasiCCAR').show();	
    }else{
        $('#lokasiGanesa').hide();
        $('#lokasiJatinangor').hide();
        $('#lokasiCCAR').hide();
    }

});
$("#lokasi_kampus").trigger("change");



$("#lokasi_pasien").change(function() {
    if ($(this).val() == "rumah sakit") {
        $('#lokasi_rumah_sakit').show();
    } else {
        $('#lokasi_rumah_sakit').hide();		
    }
});
$("#lokasi_pasien").trigger("change");


$("#status_pengisi_form").change(function() {
    if ($(this).val() == "mewakili pemilik akun") {
        $('#identitas_pengisi_form').show();
    } else {
        $('#identitas_pengisi_form').hide();		
    }
});
$("#status_pengisi_form").trigger("change");


$("#sumber_infeksi").change(function() {
    if ($(this).val() == "ya") {
        $('#label_sumber_infeksi_dikampus').show();
        $('#sumber_infeksi_dikampus').show();
        $('#sumber_infeksi_diket').hide();
        $('#sumber_infeksi_tidak_diket').hide();
    } else if ($(this).val() == "tidak"){
        $('#label_sumber_infeksi_dikampus').hide();
        $('#sumber_infeksi_dikampus').hide();
        $('#sumber_infeksi_diket').hide();
        $('#sumber_infeksi_tidak_diket').show();		
    } else{
        $('#label_sumber_infeksi_dikampus').hide();
        $('#sumber_infeksi_dikampus').hide();
        $('#sumber_infeksi_diket').hide();
        $('#sumber_infeksi_tidak_diket').hide();
    }
});
$("#sumber_infeksi").trigger("change");


$("#sumber_infeksi_dikampus").change(function() {
    if ($(this).val() == "ya") {
        $('#sumber_infeksi_diket').show();
        $('#sumber_infeksi_tidak_diket').hide();
    } else if ($(this).val() == "tidak"){
        $('#sumber_infeksi_diket').hide();
        $('#sumber_infeksi_tidak_diket').hide();		
    } else{
        $('#sumber_infeksi_diket').hide();
        $('#sumber_infeksi_tidak_diket').hide();
    }
});
$("#sumber_infeksi_dikampus").trigger("change");