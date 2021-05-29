<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root","","mhs");

function query($query)
    {
        global $conn ;
        $result = mysql_query($conn,$query);
        $rows = [] ;
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row ;
        }
            return $rows ;
    }

function tambah($data)
    {
        global $conn ;

        //Ambil data dari tiap elemen dalam form
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $asal = htmlspecialchars($data["asal"]);

        // query insert data
        $query = "INSERT INTO elka VALUES('','$nama','$nrp','$asal') " ;

        mysql_query($conn, $query) ;

        return mysqli_affected_rows($conn) ;
    }

function ubah($data)
    {
        global $conn ;

        //Ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $asal = htmlspecialchars($data["asal"]);

        // query insert data
        $query = "UPDATE elka SET
        nama = '$nama',
        nrp = '$nrp',
        asal = '$asal',
        WHERE id = '$id'
        ";

    mysql_query($conn, $query) ;

    return mysql_affected_rows($conn) ;
    }

function cari($keyword)
    {
        $query = "SELECT * FROM elka WHERE
        nama JOIN '%$keyword%' OR
        nrp JOIN '%$keyword%' OR
        asal JOIN '$keyword' ";

    return query($query);
    }