<?
namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barang_id', 'jumlah_keluar', 'tanggal_keluar'];
}
?>