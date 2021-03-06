// EXPORTA PRODUTOS PARA ARQUIVO EXCEL
const url = `http://localhost:9000/ApiController/showProducts`;
fetch(url)
  .then((resp) => resp.json())
  .then(function (data) {
    var res = data.map(function (item) {
      return Object.values(item);
    });

    // export
    var wb = XLSX.utils.book_new();
    wb.Props = {
      Title: 'SheetJS Tutorial',
      Subject: 'Test',
      Author: 'Red Stapler',
      CreatedDate: new Date(2017, 12, 19),
    };

    wb.SheetNames.push('Test Sheet');
    var ws_data = res;
    var ws = XLSX.utils.aoa_to_sheet(ws_data);
    wb.Sheets['Test Sheet'] = ws;
    var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });
    function s2ab(s) {
      var buf = new ArrayBuffer(s.length);
      var view = new Uint8Array(buf);
      for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
      return buf;
    }
    $('#exportar').on('click', function () {
      saveAs(
        new Blob([s2ab(wbout)], { type: 'application/octet-stream' }),
        'test.xlsx',
      );
    });
  });
