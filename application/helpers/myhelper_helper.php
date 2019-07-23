<?php

	function seo_title($s) {
		$c = array (' ');
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		$s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
		$s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
		return $s;
	}

	function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = null) {
		$ci = & get_instance();
		$cmb = "<select name='$name' class='form-control' $extra>";
		//$ci->db->where('status_delete', 0);
		$data = $ci->db->get($table)->result();
		foreach ($data as $row) {
			$cmb .="<option value='" . $row->$pk . "'";
			$cmb .= $selected == $row->$pk ? 'selected' : '';
			$cmb .=">" . $row->$field . "</option>";
		}
		$cmb .= "</select>";
		return $cmb;
	}
	
	function get_data_info($field) {
		$ci = & get_instance();
		$tahun = $ci->db->get('dtbinfo')->row_array();
		return $tahun[$field];
	}

    function Terbilang($x) {
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return " " . $abil[$x];
        elseif ($x < 20)
            return Terbilang($x - 10) . "belas";
        elseif ($x < 100)
            return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
        elseif ($x < 200)
            return " seratus" . Terbilang($x - 100);
        elseif ($x < 1000)
            return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
        elseif ($x < 2000)
            return " seribu" . Terbilang($x - 1000);
        elseif ($x < 1000000)
            return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
        elseif ($x < 1000000000)
            return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
    }
	
	function tgl_indo($tgl){
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}

	function bulan($bln){
		switch ($bln){
			case 1:
				return "January";
				break;
			case 2:
				return "February";
				break;
			case 3:
				return "March";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "May";
				break;
			case 6:
				return "June";
				break;
			case 7:
				return "July";
				break;
			case 8:
				return "August";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "October";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "December";
				break;
		}
	}
	
	function nama_hari($tanggal){
		$ubah	= gmdate($tanggal, time()+60*60*8);
		$pecah	= explode("-", $ubah);
		$tgl	= $pecah[2];
		$bln	= $pecah[1];
		$thn	= $pecah[0];
		$nama	= date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Sunday";}
		else if($nama=="Monday") {$nama_hari="Monday";}
		else if($nama=="Tuesday") {$nama_hari="Tuesday";}
		else if($nama=="Wednesday") {$nama_hari="Wednesday";}
		else if($nama=="Thursday") {$nama_hari="Thursday";}
		else if($nama=="Friday") {$nama_hari="Friday";}
		else if($nama=="Saturday") {$nama_hari="Saturday";}
		return $nama_hari;
	}

	function hitung_mundur($wkt){
		$waktu=array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik");
		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5){
			$hasil = 'kurang dari 5 detik yang lalu';
		}else{
			$stop = 0;
			foreach($waktu as $periode => $satuan){
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0){
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
	
	function nominal($angka){
        $nominal = number_format($angka , 0, ',' , '.' );
        return $nominal;
	}
	
	function getCountTable($tabel) {
		$ci = & get_instance();
		$ci->db->where('delete',0);
		$count = $ci->db->get($tabel)->num_rows();
		return $count;
	}
	
	
