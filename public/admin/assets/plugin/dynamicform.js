var i = 0;
$("#dynamic-ar").click(function () {
    ++i;
    $("#dynamicAddRemove").append('<tr><td><div class="row"><div class="col-xs-4"><label>Waktu</label><select class="form-control" name="waktu[' + i + ']"><option value="7">7.00</option><option value="8">8.00</option><option value="9">9.00</option></select></div><div class="col-xs-4"><label>Gedung</label><select class="form-control" name="gedung[' + i + ']"><option value="1">Gedung 1</option><option value="2">Gedung 2</option><option value="3">Gedung 3</option></select></div><div class="col-xs-4"><label>Ruang</label><select class="form-control" name="ruang[' + i + ']"><option value="1">Ruang 1</option><option value="2">Ruang 2</option><option value="3">Ruang 3</option></select></div></div></td></tr>');
});
$(document).on('click', '.remove-input-field', function () {
    $(this).parents('tr').remove();
});


var j = 0;
$("#add-kontak").click(function () {
    ++i;
    $("#kontak").append('<tr><td><div class="row"><div class="col-xs-3"><label>Nama</label><input type="text" name="nama[' + j + ']" placeholder="Nama" class="form-control" /></div><div class="col-xs-3"><label>NIM</label><input type="text" name="nim[' + j + ']" placeholder="NIM" class="form-control" /></div><div class="col-xs-2"><label>Tanggal Kontak</label><input type="date" name="tanggal[' + j + ']" class="form-control" /></div><div class="col-xs-2"><label>Waktu Kontak</label><select class="form-control" name="waktu[' + j + ']"><option value="7">7.00</option><option value="8">8.00</option><option value="9">9.00</option></select></div><div class="col-xs-2"><label>Lokasi Kontak</label><input type="text" name="lokasi[' + j +']" placeholder="Lokasi Kontak" class="form-control" /></div></div></td></tr>');
});
$(document).on('click', '.remove-input-field', function () {
    $(this).parents('tr').remove();
});