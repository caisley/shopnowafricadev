# Optional database

The first release does not require MySQL/MariaDB. It uses a protected file spool so the site remains deployable on ordinary shared hosting without a database setup step. If SNA later needs structured reporting, user accounts, an admin queue, or CRM integration, design a least-privilege schema and migrate the submission functions to PDO prepared statements before enabling it.
