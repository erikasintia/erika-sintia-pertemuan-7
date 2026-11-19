<?php
// LAB 7 — Trait (bagian namespace & Composer dikerjakan lokal di Laragon,
//         kirim tautan repositori GitHub pada kolom tautan)
// Spesifikasi:
//  - trait Timestampable: touch(): void (isi createdAt), getCreatedAt(): ?string
//  - Buku(string $judul) dan Anggota(string $nama) memakai Timestampable

trait Timestampable
{
    private ?string $createdAt = null;
    public function touch(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }
}
class Buku
{
    use Timestampable;
    public function __construct(public string $judul)
    {
    }
}
class Anggota
{
    use Timestampable;

    public function __construct(public string $nama)
    {
    }
}
$buku = new Buku('Pemrograman PHP Modern');
echo "Judul Buku: " . $buku->judul . PHP_EOL;
echo "Waktu Dibuat (sebelum touch): " . var_export($buku->getCreatedAt(), true) . PHP_EOL;
$buku->touch();
echo "Waktu Dibuat (setelah touch): " . $buku->getCreatedAt() . PHP_EOL;

echo "------------------------\n";

$anggota = new Anggota('Andi');
$anggota->touch();
echo "Nama Anggota: " . $anggota->nama . PHP_EOL;
echo "Anggota Terdaftar Pada: " . $anggota->getCreatedAt() . PHP_EOL;