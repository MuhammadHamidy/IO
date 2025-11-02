-- Masukkan data ke tabel roles
INSERT INTO "roles" ("name", "created_at", "updated_at")
VALUES
('Admin', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('User', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Masukkan data ke tabel users
INSERT INTO "users" ("role_id", "email", "password", "name", "email_verified_at", "created_at", "updated_at")
VALUES
(1, 'admin@example.com', 'password123', 'Admin User', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 'user@example.com', 'password123', 'Regular User', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
