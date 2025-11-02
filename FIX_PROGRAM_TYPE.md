# Fix: Program Tidak Muncul untuk User Outbound/Inbound

## Masalah
Saat login sebagai outbound/inbound, tidak ada program yang muncul karena program yang sudah ada di database belum memiliki nilai `program_type`.

## Penyebab
Field `program_type` sudah ada di tabel programs, tetapi program-program yang dibuat sebelumnya memiliki nilai NULL pada field ini. Saat filter aktif, hanya program dengan `program_type` yang sesuai yang ditampilkan.

## Solusi

### Opsi 1: Jalankan Seeder (RECOMMENDED)

Jalankan command berikut untuk auto-update program_type:

```bash
php artisan db:seed --class=UpdateProgramTypeSeeder
```

Seeder ini akan:
- ✅ Mendeteksi otomatis program_type berdasarkan nama/code program
- ✅ Update program yang cocok dengan pattern outbound/inbound
- ✅ Menampilkan summary dan list program yang perlu di-update manual
- ✅ Skip program yang sudah memiliki program_type

**Pattern Detection:**
- **Outbound**: Jika nama/code mengandung: `outbound`, `iisma`, `uper`, `study abroad`, `overseas`
- **Inbound**: Jika nama/code mengandung: `inbound`, `exchange program`, `student exchange`, `international student`

### Opsi 2: Update Manual via Database

Jika ingin update manual, jalankan SQL query:

```sql
-- Update program IISMA menjadi outbound
UPDATE programs SET program_type = 'outbound' WHERE LOWER(name) LIKE '%iisma%' OR LOWER(code) LIKE '%iisma%';

-- Update program UPER menjadi outbound
UPDATE programs SET program_type = 'outbound' WHERE LOWER(name) LIKE '%uper%' OR LOWER(code) LIKE '%uper%';

-- Update program dengan kata 'outbound' menjadi outbound
UPDATE programs SET program_type = 'outbound' WHERE LOWER(name) LIKE '%outbound%';

-- Update program dengan kata 'inbound' menjadi inbound
UPDATE programs SET program_type = 'inbound' WHERE LOWER(name) LIKE '%inbound%';

-- Update program student exchange menjadi inbound
UPDATE programs SET program_type = 'inbound' WHERE LOWER(name) LIKE '%student exchange%';

-- Check hasil
SELECT id, name, code, program_type FROM programs;
```

### Opsi 3: Update via Admin Panel

1. Login sebagai Admin
2. Buka halaman edit program
3. Set field `Program Type` untuk setiap program
4. Save changes

## Verifikasi

Setelah update, cek dengan query:

```sql
-- Lihat semua program dengan program_type
SELECT id, name, code, type, program_type FROM programs;

-- Count program per type
SELECT program_type, COUNT(*) as count 
FROM programs 
GROUP BY program_type;
```

## Testing Setelah Fix

1. **Login sebagai Outbound**:
   - Seharusnya melihat program dengan `program_type = 'outbound'`
   
2. **Login sebagai Inbound**:
   - Seharusnya melihat program dengan `program_type = 'inbound'`
   
3. **Sebagai Guest (tidak login)**:
   - Seharusnya melihat SEMUA program (inbound + outbound)

## Catatan Penting

- Field `program_type` bersifat **nullable**, jadi program baru harus di-set program_type-nya saat dibuat
- Update form create/edit program di admin panel untuk memastikan field `program_type` wajib diisi
- Jika ada program yang tidak ter-detect oleh seeder, update manual sesuai kebutuhan

## Quick Fix untuk Testing

Jika ingin quick test, update satu program secara manual:

```bash
php artisan tinker
```

Lalu di tinker:

```php
// Update program dengan ID 1 menjadi outbound
$program = \App\Models\Programs::find(1);
$program->program_type = 'outbound';
$program->save();

// Update program dengan ID 2 menjadi inbound  
$program = \App\Models\Programs::find(2);
$program->program_type = 'inbound';
$program->save();

// Check semua program
\App\Models\Programs::all(['id', 'name', 'program_type']);
```

