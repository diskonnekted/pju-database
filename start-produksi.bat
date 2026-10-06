@echo off
REM ============================================================
REM  PJU - Produksi app local server
REM  Document root = project root (same as production cPanel),
REM  so /assets/... resolves correctly. Front controller: index.php
REM  Router: router.php (serves static files, routes rest to CI4)
REM ============================================================
set PHP=D:\xampp\php\php.exe
set ROOT=D:\xampp\htdocs\pju\produksi
set PORT=8081

echo Starting PJU produksi at http://localhost:%PORT%/
echo (docroot = %ROOT%)
echo Press Ctrl+C to stop.
echo.

"%PHP%" -S localhost:%PORT% -t "%ROOT%" "%ROOT%\router.php"
