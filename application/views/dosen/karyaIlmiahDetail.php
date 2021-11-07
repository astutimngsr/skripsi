<style>
    td {
        vertical-align: baseline !important;
    }
</style>
<div class="col-lg-12">

    <div class="card mb-4">
        <div class="card-header">Judul</div>
        <div class="card-body">
        <a class="btn btn-success btn-sm" href="<?= site_url('dosen/karyailmiah') ?>">Kembali</a>
        <table>
                <tr>
                    <td class="pb-2"><b>Judul</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->judulpublikasi ?></td>
                </tr>
                <tr>
                    <td class="pb-2"><b>File</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2">
                        <a target="_blank" class="btn btn-primary btn-sm" href="<?= 'https://apps.unhas.ac.id/turnitin/files/'.$data->fileasli ?>">Lihat</a>
                    </td>
                </tr>
                <tr>
                    <td class="pb-2"><b>Tujn</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->tjnperikNama ?></td>
                </tr>
                <tr>
                    <td class="pb-2"><b>Status</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->status ?></td>
                </tr>
                <tr>
                    <td class="pb-2"><b>Tanggal Pengajuan</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->tanggal_pengajuan ?></td>
                </tr>
                <!-- <tr>
                    <td class="pb-2"><b>fakultas</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->fakultas ?></td>
                </tr> -->
                <tr>
                    <td class="pb-2"><b>Penilaian</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2">?</td>
                </tr>
            </table>
        </div>
    </div>
</div>