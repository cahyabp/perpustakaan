<!DOCTYPE html>
<html>
<head>
  <title>Cara Membuat PDF Menggunakan DomPDF di Laravel 10 - Leravio</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    /* Style for table cells (td) */
    th {
      border-bottom: 1px solid #dddddd;
      text-align: left !important;
      padding: 10px;
    }

    td {
      border-bottom: 1px solid #dddddd;
      text-align: left;
      padding: 5px;
    }

    /* Alternate row color */
    tr:nth-child(even) {
      border-bottom: 1px solid #dddddd;
    }
  </style>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left" style="border-bottom: 1px solid black;">
          <h2>
            Laporan Peminjaman
          </h2>
        </div>
      </div>
    </div><br>
    <table style="font-size: 10px;">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th width='15%'>Judul Buku</th>
        <th>NIS</th>
        <th width='15%'>Tanggal Peminjaman</th>
        <th width='15%'>Batas Pengembalian</th>
        <th width='15%'>Tanggal Pengembalian</th>
        <th>Denda</th>
      </tr>
      @foreach ($pinjaman as $index => $item)
      <tr style="border-bottom: 1px solid black;">
        <td>{{ $index + 1 }}</td>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->book->judul }}</td>
        <td>{{ $item->user->nis }}</td>
        <td>{{ $item->tanggal_peminjaman }}</td>
        <td>{{ $item->batas_pengembalian }}</td>
        <td>{{ $item->tanggal_pengembalian }}</td>
        <td>Rp. {{ number_format($item->denda, 2, '.', ',') }}</td>
      </tr>
      @endforeach
      <tr>
        <td width='10%'>Total Denda :</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Rp. {{ number_format($total_denda, 2, '.', ',') }}</td>
      </tr>
    </table>
  </div>
</body>
</html>