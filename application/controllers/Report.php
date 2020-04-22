<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Cetak_pdf');
    $this->load->model('M_admin');
  }

  public function barang_keluar_manual()
  {
    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 7, 'LAPORAN DATA BARANG KELUAR', 0, 1, 'C');
    $pdf->Cell(10, 7, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7, 'Invoice Bukti Pengeluaran Barang', 0, 1, 'C');
    $pdf->Cell(0, 7, 'No. ID Transaksi :', 0, 1, 'L');
    $pdf->Cell(0, 7, 'Ditujukan Untuk :', 0, 1, 'L');
    $pdf->Cell(0, 7, 'Tanggal :', 0, 1, 'L');
    $pdf->Cell(0, 7, 'P.O Customer :', 0, 1, 'L');
    $pdf->Cell(5, 7, '', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(8, 6, 'No', 1, 0, 'C');
    $pdf->Cell(40, 6, 'ID Transaksi', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Tanggal Masuk', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Tanggal Keluar', 1, 0, 'C');
    $pdf->Cell(35, 6, 'Lokasi', 1, 0, 'C');
    $pdf->Cell(35, 6, 'Kode Barang', 1, 0, 'C');
    $pdf->Cell(50, 6, 'Nama Barang', 1, 0, 'C');
    $pdf->Cell(20, 6, 'Satuan', 1, 0, 'C');
    $pdf->Cell(20, 6, 'Jumlah', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    $barang = $this->db->get('tb_barang_keluar')->result();
    $no = 1;
    foreach ($barang as $data) {
      $pdf->Cell(8, 6, $no, 1, 0);
      $pdf->Cell(40, 6, $data->id_transaksi, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->tanggal_masuk, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->tanggal_keluar, 1, 0, 'C');
      $pdf->Cell(35, 6, $data->lokasi, 1, 0);
      $pdf->Cell(35, 6, $data->kode_barang, 1, 0);
      $pdf->Cell(50, 6, $data->nama_barang, 1, 0);
      $pdf->Cell(20, 6, $data->satuan, 1, 0, 'C');
      $pdf->Cell(20, 6, $data->jumlah, 1, 1, 'C');
      $no++;
    }

    $pdf->Cell(10, 7, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7, 'Mengetahui,', 0, 1, 'L');
    $pdf->Cell(0, 7, 'Admin', 0, 1, 'L');

    $pdf->Output();
  }

  // Laporan
  public function barang($id_transaksi)
  {
    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 7, 'LAPORAN DATA BARANG', 0, 1, 'C');
    $pdf->Cell(10, 7, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7, 'Laporan Bukti Pengeluaran dan Pemasukan Barang', 0, 1, 'C');

    $this->db->select('*');
    $this->db->from('tb_barang_keluar');
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->limit(1);
    $barang2 = $this->db->get()->result();
    foreach ($barang2 as $data) {
      $pdf->Cell(0, 7, '', 0, 1, 'L');
      $pdf->Cell(0, 7, 'No. ID Transaksi : ' . $data->id_transaksi, 0, 1, 'L');
      $pdf->Cell(0, 3, '', 0, 1, 'L');
      $pdf->Cell(0, 7, 'Ditujukan Untuk : Manajer', 0, 1, 'L');
      $pdf->Cell(0, 3, '', 0, 1, 'L');
      $pdf->Cell(0, 7, 'Tanggal :', 0, 1, 'L');
      $pdf->Cell(0, 10, '', 0, 1);
    }

    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(8, 6, 'No', 1, 0, 'C');
    $pdf->Cell(40, 6, 'ID Transaksi', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Tanggal Masuk', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Tanggal Keluar', 1, 0, 'C');
    $pdf->Cell(35, 6, 'Lokasi', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Kode Barang', 1, 0, 'C');
    $pdf->Cell(32, 6, 'Nama Barang', 1, 0, 'C');
    $pdf->Cell(20, 6, 'Satuan', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Barang Masuk', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Barang Keluar', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    $this->db->select('*');
    $this->db->from('tb_barang_keluar');
    $this->db->where('id_transaksi', $id_transaksi);
    $barang = $this->db->get()->result();
    $no = 1;
    foreach ($barang as $data) {
      $pdf->Cell(8, 6, $no, 1, 0);
      $pdf->Cell(40, 6, $data->id_transaksi, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->tanggal_masuk, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->tanggal_keluar, 1, 0, 'C');
      $pdf->Cell(35, 6, $data->lokasi, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->kode_barang, 1, 0, 'C');
      $pdf->Cell(32, 6, $data->nama_barang, 1, 0, 'C');
      $pdf->Cell(20, 6, $data->satuan, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->jumlah, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->jumlah, 1, 1, 'C');
      $no++;
    }

    $pdf->Cell(10, 7, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7, 'Mengetahui,', 0, 1, 'L');
    $pdf->Cell(0, 7, '', 0, 1, 'L');
    $pdf->Cell(0, 7, '', 0, 1, 'L');
    $pdf->Cell(0, 7, 'Admin Gudang', 0, 1, 'L');

    $pdf->Output();
  }
  // End Laporan

  public function barang_keluar($id_transaksi)
  {
    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 7, 'LAPORAN DATA BARANG KELUAR', 0, 1, 'C');
    $pdf->Cell(10, 7, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7, 'Invoice Bukti Pengeluaran Barang', 0, 1, 'C');

    $this->db->select('*');
    $this->db->from('tb_barang_keluar');
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->limit(1);
    $barang2 = $this->db->get()->result();
    foreach ($barang2 as $data) {
      $pdf->Cell(0, 7, 'No. ID Transaksi :' . $data->id_transaksi, 0, 1, 'L');
      $pdf->Cell(0, 7, 'Ditujukan Untuk :', 0, 1, 'L');
      $pdf->Cell(0, 7, 'Tanggal :', 0, 1, 'L');
      $pdf->Cell(0, 7, '', 0, 1);
    }

    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(8, 6, 'No', 1, 0, 'C');
    $pdf->Cell(40, 6, 'ID Transaksi', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Tanggal Masuk', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Tanggal Keluar', 1, 0, 'C');
    $pdf->Cell(35, 6, 'Lokasi', 1, 0, 'C');
    $pdf->Cell(35, 6, 'Kode Barang', 1, 0, 'C');
    $pdf->Cell(50, 6, 'Nama Barang', 1, 0, 'C');
    $pdf->Cell(20, 6, 'Satuan', 1, 0, 'C');
    $pdf->Cell(20, 6, 'Jumlah', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    $this->db->select('*');
    $this->db->from('tb_barang_keluar');
    $this->db->where('id_transaksi', $id_transaksi);
    $barang = $this->db->get()->result();
    $no = 1;
    foreach ($barang as $data) {
      $pdf->Cell(8, 6, $no, 1, 0);
      $pdf->Cell(40, 6, $data->id_transaksi, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->tanggal_masuk, 1, 0, 'C');
      $pdf->Cell(30, 6, $data->tanggal_keluar, 1, 0, 'C');
      $pdf->Cell(35, 6, $data->lokasi, 1, 0);
      $pdf->Cell(35, 6, $data->kode_barang, 1, 0);
      $pdf->Cell(50, 6, $data->nama_barang, 1, 0);
      $pdf->Cell(20, 6, $data->satuan, 1, 0, 'C');
      $pdf->Cell(20, 6, $data->jumlah, 1, 1, 'C');
      $no++;
    }

    $pdf->Cell(10, 7, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7, 'Mengetahui,', 0, 1, 'L');
    $pdf->Cell(0, 7, 'Admin', 0, 1, 'L');

    $pdf->Output();
  }

  public function barangKeluarManual()
  {

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // document informasi
    $pdf->SetCreator('Web Aplikasi Gudang');
    $pdf->SetTitle('Laporan Data Barang Keluar');
    $pdf->SetSubject('Barang Keluar');

    //header Data
    $pdf->SetHeaderData('unsada.jpg', 30, 'Laporan Data', 'Barang Keluar', array(203, 58, 44), array(0, 0, 0));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 10, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //FONT Subsetting
    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica', '', 14, '', true);

    $pdf->AddPage('L');

    $html =
      '<div>
        <h1 align="center">Invoice Bukti Pengeluaran Barang</h1>
        <p>No Id Transaksi  :</p>
        <p>Ditunjukan Untuk :</p>
        <p>Tanggal          :</p>
        <p>Po.Customer      :</p>


        <table border="1">
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:110px" align="center">ID Transaksi</th>
            <th style="width:110px" align="center">Tanggal Masuk</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:130px" align="center">Lokasi</th>
            <th style="width:140px" align="center">Kode Barang</th>
            <th style="width:140px" align="center">Nama Barang</th>
            <th style="width:80px" align="center">Satuan</th>
            <th style="width:80px" align="center">Jumlah</th>
          </tr>';

    $html .= '<tr>
                    <td style="height:180px"></td>
                    <td  style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                 </tr>
                 <tr>
                  <td align="center" colspan="8">Jumlah</td>
                  <td></td>
                 </tr>';



    $html .= '
            </table>
            <h6>Mengetahui</h6><br>
            <h6>Admin</h6>
          </div>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

    $pdf->Output('contoh_report.pdf', 'I');
  }

  public function barangKeluar()
  {
    $id = $this->uri->segment(3);
    $tgl1 = $this->uri->segment(4);
    $tgl2 = $this->uri->segment(5);
    $tgl3 = $this->uri->segment(6);
    $ls   = array('id_transaksi' => $id, 'tanggal_keluar' => $tgl1 . '/' . $tgl2 . '/' . $tgl3);
    $data = $this->M_admin->get_data('tb_barang_keluar', $ls);

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // document informasi
    $pdf->SetCreator('Web Aplikasi Gudang');
    $pdf->SetTitle('Laporan Data Barang Keluar');
    $pdf->SetSubject('Barang Keluar');

    //header Data
    $pdf->SetHeaderData('unsada.jpg', 30, 'Laporan Data', 'Barang Keluar', array(203, 58, 44), array(0, 0, 0));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 10, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //FONT Subsetting
    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica', '', 14, '', true);

    $pdf->AddPage('L');

    $html =
      '<div>
        <h1 align="center">Invoice Bukti Pengeluaran Barang</h1><br>
        <p>No Id Transaksi  : ' . $id . '</p>
        <p>Ditunjukan Untuk :</p>
        <p>Tanggal          : ' . $tgl1 . '/' . $tgl2 . '/' . $tgl3 . '</p>
        <p>Po.Customer      :</p>


        <table border="1">
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:110px" align="center">ID Transaksi</th>
            <th style="width:110px" align="center">Tanggal Masuk</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:130px" align="center">Lokasi</th>
            <th style="width:140px" align="center">Kode Barang</th>
            <th style="width:140px" align="center">Nama Barang</th>
            <th style="width:80px" align="center">Satuan</th>
            <th style="width:80px" align="center">Jumlah</th>
          </tr>';


    $no = 1;
    foreach ($data as $d) {
      $html .= '<tr>';
      $html .= '<td align="center">' . $no . '</td>';
      $html .= '<td align="center">' . $d->id_transaksi . '</td>';
      $html .= '<td align="center">' . $d->tanggal_masuk . '</td>';
      $html .= '<td align="center">' . $d->tanggal_keluar . '</td>';
      $html .= '<td align="center">' . $d->lokasi . '</td>';
      $html .= '<td align="center">' . $d->kode_barang . '</td>';
      $html .= '<td align="center">' . $d->nama_barang . '</td>';
      $html .= '<td align="center">' . $d->satuan . '</td>';
      $html .= '<td align="center">' . $d->jumlah . '</td>';
      $html .= '</tr>';

      $html .= '<tr>';
      $html .= '<td align="center" colspan="8"><b>Jumlah</b></td>';
      $html .= '<td align="center">' . $d->jumlah . '</td>';
      $html .= '</tr>';
      $no++;
    }


    $html .= '
            </table><br>
            <h6>Mengetahui</h6></br></br></br>
            <h6>Admin</h6>
          </div>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

    $pdf->Output('invoice_barang_keluar.pdf', 'I');
  }
}
