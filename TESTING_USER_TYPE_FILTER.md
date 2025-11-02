# Testing Guide: User Type Program Filter

## Perubahan yang Dilakukan

### 1. Database Migration
✅ Menambahkan kolom `user_type` (enum: 'inbound', 'outbound') ke tabel `users`

### 2. Model Update
✅ Menambahkan `user_type` ke fillable fields di model User

### 3. Authentication Updates
✅ **UserController**: 
   - `loginOutbound()` - Set user_type = 'outbound' saat login outbound
   - `loginInbound()` - Set user_type = 'inbound' saat login inbound (method baru)
   - `register()` - Set user_type = 'inbound' untuk registrasi inbound

### 4. Program Filtering
✅ **ProgramsController**:
   - `index()` - Filter programs berdasarkan user_type
   - `degreeList()` - Filter degree programs berdasarkan user_type
   - `nonDegreeList()` - Filter non-degree programs berdasarkan user_type

✅ **HomeController**:
   - Filter programs dan featured programs di homepage berdasarkan user_type

✅ **Routes** (`routes/web.php`):
   - Filter featured programs di route `/program` berdasarkan user_type
   - Menambahkan route `/api/login-inbound` untuk inbound login

### 5. View Updates
✅ `login-inbound.blade.php` - Update untuk menggunakan endpoint `/api/login-inbound`

## Logika Filter

**Prioritas Filter:**
1. **Manual Filter** (parameter request) - Jika user memilih filter manual, gunakan itu
2. **User Type Filter** - Jika user login dan punya user_type, filter otomatis
3. **Show All** - Jika guest (tidak login), tampilkan semua program

## Cara Testing

### Persiapan
1. Pastikan migration sudah dijalankan:
   ```bash
   php artisan migrate
   ```

2. Pastikan database memiliki program dengan `program_type` 'inbound' dan 'outbound'

### Test Case 1: Guest User (Tidak Login)
1. Buka aplikasi tanpa login
2. Buka halaman `/programs` atau `/home`
3. **Expected**: Semua program (inbound dan outbound) ditampilkan

### Test Case 2: User Inbound
1. Register/Login melalui `/regist-inbound` atau `/login-inbound`
2. Buka halaman `/programs`, `/home`, atau program list lainnya
3. **Expected**: Hanya program dengan `program_type = 'inbound'` yang ditampilkan

### Test Case 3: User Outbound
1. Register/Login melalui `/login-outbound`
2. Buka halaman `/programs`, `/home`, atau program list lainnya
3. **Expected**: Hanya program dengan `program_type = 'outbound'` yang ditampilkan

### Test Case 4: Manual Filter Override
1. Login sebagai user inbound atau outbound
2. Buka halaman `/program/degree/list` atau `/program/non-degree/list`
3. Gunakan dropdown filter untuk memilih program_type yang berbeda
4. **Expected**: Filter manual mengoverride filter otomatis

### Test Case 5: Existing Users
1. User lama yang belum punya `user_type` masih bisa login
2. Saat login inbound, sistem akan auto-update user_type menjadi 'inbound'
3. **Expected**: Login berhasil dan filter bekerja setelah user_type ter-set

## Halaman yang Terpengaruh

1. **Home Page** (`/home`)
   - Programs section
   - Featured programs section

2. **Programs Page** (`/programs`)
   - Main programs list

3. **Featured Programs** (`/program`)
   - Featured programs slider

4. **Degree Programs List** (`/program/degree/list`)
   - Degree programs dengan filter

5. **Non-Degree Programs List** (`/program/non-degree/list`)
   - Non-degree programs dengan filter

## Database Verification

Untuk verify di database:

```sql
-- Check user_type field exists
SELECT id, name, email, user_type FROM users;

-- Check programs by type
SELECT id, name, program_type FROM programs WHERE status = 'published';

-- Verify user dapat melihat program yang sesuai
-- (This should be tested through the application)
```

## Rollback (Jika Diperlukan)

Jika perlu rollback migration:
```bash
php artisan migrate:rollback --step=1
```

## Notes
- User dengan `role_id = 1` (Admin) tidak terpengaruh oleh filter ini
- Guest users tetap bisa melihat semua program
- Filter tidak mengubah data, hanya display logic


