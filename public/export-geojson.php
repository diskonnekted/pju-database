<?php
/**
 * export-geojson.php  (v2 - onlinkid_parkir schema)
 * --------------------------------------------------------------
 * Ekspor data perhubungan ke JSON untuk Dasbor Dishub Banjarnegara.
 *
 * CARA PAKAI via CLI:
 *   php export-geojson.php ruas
 *   php export-geojson.php titik_parkir
 *   php export-geojson.php titik_jukir
 *   php export-geojson.php choropleth
 *   php export-geojson.php all
 *
 * CARA PAKAI via browser:
 *   http://localhost/pju/public/export-geojson.php?type=ruas
 *
 * Output dikirim ke STDOUT (browser / file redirect).
 * Untuk file batch Windows, redirect:  php script.php type > file.json
 *
 * ⚠️  HAPUS FILE INI SETELAH EKSPOR SELESAI.
 * --------------------------------------------------------------
 */

// ---- KONFIG ----
// Suppress PHP warnings (e.g. imagick) yang ikut nyangkut di output
@ini_set('display_errors', '0');
@error_reporting(0);
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'onlinkid_parkir';   // <-- database yang benar
$TOKEN   = '';                  // opsional, contoh: 'dishub2026'

// ---- ARGS ----
$type = $_GET['type'] ?? ($argv[1] ?? 'all');
$allowed = ['ruas', 'titik_parkir', 'titik_jukir', 'choropleth', 'all'];

if (!in_array($type, $allowed)) {
    http_response_code(400);
    die("Tipe tidak valid. Pilihan: " . implode(', ', $allowed) . "\n");
}
if ($TOKEN !== '' && ($_GET['token'] ?? '') !== $TOKEN) {
    http_response_code(403);
    die("Token salah.\n");
}

// ---- KONEK ----
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    http_response_code(500);
    die("DB error: " . $mysqli->connect_error . "\n");
}
$mysqli->set_charset('utf8mb4');

// ---- HEADER JSON ----
header('Content-Type: application/json; charset=utf-8');

// ---- DISPATCH ----
$out = [];
if ($type === 'all') {
    $out['ruas']         = exportRuas($mysqli);
    $out['titik_parkir'] = exportTitikParkir($mysqli);
    $out['titik_jukir']  = exportTitikJukir($mysqli);
    $out['choropleth']   = exportChoropleth($mysqli);
    echo json_encode($out, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    $fn = 'export' . str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));
    if (!function_exists($fn)) {
        http_response_code(500);
        die("Handler tidak ditemukan: $fn\n");
    }
    echo json_encode($fn($mysqli), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
$mysqli->close();


// ============================================================
// HANDLERS
// ============================================================

function exportRuas($db) {
    $sql = "SELECT id_ruas_jalan, status_ruas, nomor_ruas, nama_ruas,
                   panjang, lebar, luas, titik_awal, titik_akhir,
                   from_lat, from_lng, to_lat, to_lng
            FROM ruas_jalan
            WHERE from_lat IS NOT NULL AND to_lat IS NOT NULL
              AND from_lat <> 0 AND to_lat <> 0
            ORDER BY status_ruas, nomor_ruas";
    $res = $db->query($sql);
    $features = [];
    $skip = 0;
    while ($r = $res->fetch_assoc()) {
        $fromLat = (float) $r['from_lat'];
        $fromLng = (float) $r['from_lng'];
        $toLat = (float) $r['to_lat'];
        $toLng = (float) $r['to_lng'];
        if (!$fromLat || !$toLat) { $skip++; continue; }
        $features[] = [
            'type' => 'Feature',
            'properties' => [
                'id' => (int) $r['id_ruas_jalan'],
                'nomor_ruas' => $r['nomor_ruas'],
                'nama_ruas' => $r['nama_ruas'],
                'status_ruas' => $r['status_ruas'],
                'kelas' => $r['status_ruas'],   // alias
                'titik_awal' => $r['titik_awal'],
                'titik_akhir' => $r['titik_akhir'],
                'panjang_km' => (float) $r['panjang'],
                'lebar_m' => (float) $r['lebar'],
                'luas_m2' => (float) $r['luas'],
                'layer' => 'ruas'
            ],
            'geometry' => [
                'type' => 'LineString',
                'coordinates' => [
                    [$fromLng, $fromLat],
                    [$toLng, $toLat]
                ]
            ]
        ];
    }
    return [
        'type' => 'FeatureCollection',
        'name' => 'dishub_ruas_jalan',
        'metadata' => [
            'sumber' => 'Dinas Perhubungan Kabupaten Banjarnegara',
            'database' => 'onlinkid_parkir.ruas_jalan',
            'generated_at' => date('c'),
            'total' => count($features),
            'skipped_no_coord' => $skip
        ],
        'features' => $features
    ];
}


function exportTitikParkir($db) {
    $sql = "SELECT tp.id_titik_parkir, tp.jenis_fasilitas, tp.jenis_parkir_luar,
                   tp.nama_lokasi, tp.panjang_lokasi, tp.lebar_lokasi, tp.luas_lokasi,
                   tp.srp_motor, tp.srp_mobil,
                   tp.id_kecamatan, tp.id_desa, tp.jenis_desa, tp.id_ruas_jalan,
                   tp.titik_lat, tp.titik_lng, tp.foto_lokasi, tp.update_time,
                   r.nama_ruas, r.status_ruas,
                   wkc.nama AS nama_kecamatan
            FROM titik_parkir tp
            LEFT JOIN ruas_jalan r ON tp.id_ruas_jalan = r.id_ruas_jalan
            LEFT JOIN wilayah_kecamatan wkc ON tp.id_kecamatan = wkc.id
            WHERE tp.titik_lat IS NOT NULL AND tp.titik_lng IS NOT NULL
              AND tp.titik_lat <> 0";
    $res = $db->query($sql);
    $features = [];
    while ($r = $res->fetch_assoc()) {
        $lat = (float) $r['titik_lat'];
        $lng = (float) $r['titik_lng'];
        if (!$lat) continue;
        $features[] = [
            'type' => 'Feature',
            'properties' => [
                'id' => (int) $r['id_titik_parkir'],
                'nama' => $r['nama_lokasi'],
                'jenis_fasilitas' => $r['jenis_fasilitas'],
                'jenis_parkir_luar' => $r['jenis_parkir_luar'],
                'srp_motor' => $r['srp_motor'] !== null ? (int) $r['srp_motor'] : 0,
                'srp_mobil' => $r['srp_mobil'] !== null ? (int) $r['srp_mobil'] : 0,
                'id_ruasjalan' => (int) $r['id_ruas_jalan'],
                'ruas' => $r['nama_ruas'],
                'kelas_ruas' => $r['status_ruas'],
                'id_kecamatan' => $r['id_kecamatan'],
                'nama_kecamatan' => $r['nama_kecamatan'],
                'id_desa' => $r['id_desa'],
                'jenis_desa' => $r['jenis_desa'],
                'panjang_lokasi' => (float) $r['panjang_lokasi'],
                'lebar_lokasi' => (float) $r['lebar_lokasi'],
                'luas_lokasi' => (float) $r['luas_lokasi'],
                'foto' => $r['foto_lokasi'],
                'update_time' => $r['update_time'],
                'layer' => 'titik_parkir'
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [$lng, $lat]
            ]
        ];
    }
    return [
        'type' => 'FeatureCollection',
        'name' => 'dishub_titik_parkir',
        'metadata' => [
            'sumber' => 'Dinas Perhubungan Kabupaten Banjarnegara',
            'database' => 'onlinkid_parkir.titik_parkir',
            'generated_at' => date('c'),
            'total' => count($features)
        ],
        'features' => $features
    ];
}


function exportTitikJukir($db) {
    $sql = "SELECT tj.id_titik_jukir, tj.tahun_pengelolaan,
                   tj.id_titik_parkir, tj.id_juru_parkir,
                   tj.no_spt, tj.tmt_spt_awal, tj.tmt_spt_akhir, tj.tgl_spt,
                   tj.setoran_perbulan, tj.actived,
                   tj.jam_kerja_awal, tj.jam_kerja_akhir,
                   tp.nama_lokasi, tp.titik_lat, tp.titik_lng,
                   jp.no_juru_parkir, jp.nama AS nama_jukir, jp.nik
            FROM titik_jukir tj
            LEFT JOIN titik_parkir tp ON tj.id_titik_parkir = tp.id_titik_parkir
            LEFT JOIN juru_parkir jp ON tj.id_juru_parkir = jp.id_juru_parkir
            WHERE tp.titik_lat IS NOT NULL AND tp.titik_lat <> 0";
    $res = $db->query($sql);
    $features = [];
    while ($r = $res->fetch_assoc()) {
        $lat = (float) $r['titik_lat'];
        $lng = (float) $r['titik_lng'];
        if (!$lat) continue;
        $features[] = [
            'type' => 'Feature',
            'properties' => [
                'id' => (int) $r['id_titik_jukir'],
                'id_juru_parkir' => (int) $r['id_juru_parkir'],
                'no_juru_parkir' => $r['no_juru_parkir'],
                'nama_jukir' => $r['nama_jukir'],
                'nik' => $r['nik'],
                'id_titik_parkir' => (int) $r['id_titik_parkir'],
                'nama_lokasi' => $r['nama_lokasi'],
                'no_spt' => $r['no_spt'],
                'tmt_awal' => $r['tmt_spt_awal'],
                'tmt_akhir' => $r['tmt_spt_akhir'],
                'setoran_perbulan' => (int) $r['setoran_perbulan'],
                'activated' => (int) $r['actived'],
                'jam_awal' => $r['jam_kerja_awal'],
                'jam_akhir' => $r['jam_kerja_akhir'],
                'tahun' => (int) $r['tahun_pengelolaan'],
                'layer' => 'titik_jukir'
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [$lng, $lat]
            ]
        ];
    }
    return [
        'type' => 'FeatureCollection',
        'name' => 'dishub_titik_jukir',
        'metadata' => [
            'sumber' => 'Dinas Perhubungan Kabupaten Banjarnegara',
            'database' => 'onlinkid_parkir.titik_jukir + titik_parkir + juru_parkir',
            'generated_at' => date('c'),
            'total' => count($features)
        ],
        'features' => $features
    ];
}


function exportChoropleth($db) {
    $sql = "SELECT wkc.nama AS kecamatan,
                   COUNT(DISTINCT r.id_ruas_jalan) AS jumlah_ruas,
                   COALESCE(SUM(r.panjang), 0) AS total_panjang_km,
                   COUNT(DISTINCT tp.id_titik_parkir) AS jumlah_titik_parkir,
                   COUNT(DISTINCT tj.id_titik_jukir) AS jumlah_jukir
            FROM wilayah_kecamatan wkc
            LEFT JOIN titik_parkir tp ON tp.id_kecamatan = wkc.id
            LEFT JOIN titik_jukir tj ON tj.id_titik_parkir = tp.id_titik_parkir
            LEFT JOIN ruas_jalan r ON r.id_ruas_jalan = tp.id_ruas_jalan
            WHERE wkc.kabupaten_id = '3304'
            GROUP BY wkc.id, wkc.nama
            ORDER BY wkc.nama";
    $res = $db->query($sql);
    $rows = [];
    while ($r = $res->fetch_assoc()) {
        $key = strtolower(trim($r['kecamatan']));
        $rows[$key] = [
            'jumlah_ruas' => (int) $r['jumlah_ruas'],
            'total_panjang_km' => (float) $r['total_panjang_km'],
            'jumlah_titik_parkir' => (int) $r['jumlah_titik_parkir'],
            'jumlah_jukir' => (int) $r['jumlah_jukir'],
            'densitas_parkir' => $r['total_panjang_km'] > 0
                ? round((float) $r['jumlah_titik_parkir'] / (float) $r['total_panjang_km'], 2)
                : 0
        ];
    }
    return [
        'type' => 'ChoroplethLookup',
        'name' => 'choropleth_kecamatan',
        'metadata' => [
            'sumber' => 'Dinas Perhubungan Kabupaten Banjarnegara',
            'database' => 'onlinkid_parkir.wilayah_kecamatan (kabupaten_id=3304)',
            'generated_at' => date('c'),
            'note' => 'Key=nama_kecamatan (lowercase). Frontend join dengan peta_kecamatan.geojson.'
        ],
        'data' => $rows
    ];
}
