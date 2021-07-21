SELECT 
-- PROVINSI
    provinsi.id_provinsi,

-- DAERAH
    daerah.id_daerah,
    daerah.id_provinsi,

-- TIPE
    tipe.id_tipe,
    tipe.id_daerah,

-- TANGIBLE
    tangible.id_tangible,
    tangible.id_tipe,

-- POST TANGIBLE ATAU OBJEK
    post_tangible.id_tangible,
    post_tangible.nama_post_tangible,
    post_tangible.kode_post_tangible,
    post_tangible.id_tangible
FROM
    provinsi 
        INNER JOIN daerah
                ON provinsi.id_provinsi = daerah.id_provinsi
        INNER JOIN tipe
                ON daerah.id_daerah = tipe.id_daerah
        INNER JOIN tangible
                ON tipe.id_tipe = tangible.id_tipe
        INNER JOIN post_tangible
                ON tangible.id_tangible = post_tangible.id_tangible
WHERE
    provinsi.id_provinsi = $id_prov 
    AND 
    post_tangible.nama_post_tangible = $query

-- JOGJA    = 1
-- JATENG   = 2
-- JABAR    = 9
-- JATIM    = 10 