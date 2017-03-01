//Validasi Jumlah karakter
function lengthRestriction(elem, min, max) {
   var uInput = elem.value;
      if(uInput.length >= min && uInput.length <= max){
      return true;
      } else {
           alert("Mohon masukkan panjang password antara " +min+ " dan " +max+ " karakter");
           elem.focus();
           return false;
      }
}




function validasiDaftar(){
		var namaValid    = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        var emailValid   = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		//=============================================
        var username       = formulir.username.value;       
        var pass1	       = formulir.pass1.value;       
        var pass2	       = formulir.pass2.value;
        var nama_pegawai   = formulir.nama_pegawai.value;
        var jenis_kelamin  = formulir.jenis_kelamin.value;		
		var agama	       = formulir.agama.value;
		var alamat1        = formulir.alamat1.value;
		var no_hp          = formulir.no_hp.value;
		var tanggal_lahir  = formulir.tanggal_lahir.value;		
        var email          = formulir.email.value;
		var jabatan        = formulir.jabatan.value;

        var pesan = '';
        
		if (username == '') {
            pesan += '- Username tidak boleh kosong\n';
        }		
		if (pass1 == '') {
            pesan += '- Password tidak boleh kosong\n';
        }		
		if (pass2 == '') {
            pesan += '- Konfirmasi password tidak boleh kosong\n';
        }
		
        if (nama_pegawai == '') {
            pesan += '- Nama tidak boleh kosong\n';
        }
        if (nama_pegawai != '' && !nama_pegawai.match(namaValid)) {
            pesan += '-Nama tidak valid\n';
        }
         
        if (jenis_kelamin == '') {
            pesan += '- Jenis kelamin harus dipilih\n';
        }
         
		if (agama == '') {
            pesan += '- Agama harus dipilih\n';
        }
		
		if (alamat1 == '') {
            pesan += '- Alamat tidak boleh kosong\n';
        }
		
		if (no_hp == '') {
            pesan += '- Nomor HP tidak boleh kosong\n';
        }
		 		
		if (tanggal_lahir == '') {
            pesan += '- Tanggal lahir tidak boleh kosong\n';
        }
		 
		if (email == '') {
            pesan += '- Alamat email tidak boleh kosong\n';
        }
        if (email !=''  && !email.match(emailValid)) {
            pesan += '- Alamat email tidak valid\n';
        }

		if (jabatan == '') {
            pesan += '- Jabatan harus dipilih\n';
        }

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}


function validasiDaftarPelanggan1(){
		var namaValid    = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        var emailValid   = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		//=============================================
        var username       = f_pelanggan.username.value;       
        var pass1	       = f_pelanggan.pass1.value;       
        var pass2	       = f_pelanggan.pass2.value;
        var nama_pelanggan = f_pelanggan.nama_pelanggan.value;
        var jenis_kelamin  = f_pelanggan.jenis_kelamin.value;
		var email          = f_pelanggan.email.value;

        var pesan = '';
        
		if (username == '') {
            pesan += '- Username tidak boleh kosong\n';
        }		
		if (pass1 == '') {
            pesan += '- Password tidak boleh kosong\n';
        }		
		if (pass2 == '') {
            pesan += '- Konfirmasi password tidak boleh kosong\n';
        }		
		if (pass1 != pass2) {
            pesan += '- Password tidak sama\n';
        }
		
        if (nama_pelanggan == '') {
            pesan += '- Nama tidak boleh kosong\n';
        }
        if (nama_pelanggan != '' && !nama_pelanggan.match(namaValid)) {
            pesan += '-Nama tidak valid\n';
        }
         
        if (jenis_kelamin == '') {
            pesan += '- Jenis kelamin harus dipilih\n';
        }
		 
		if (email == '') {
            pesan += '- Alamat email tidak boleh kosong\n';
        }
        if (email !=''  && !email.match(emailValid)) {
            pesan += '- Alamat email tidak valid\n';
        }

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}

function validasiDaftarPelanggan(){
		var namaValid    = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        var emailValid   = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		//=============================================
        var username       = f_pelanggan.username.value;       
        var pass1	       = f_pelanggan.pass1.value;       
        var pass2	       = f_pelanggan.pass2.value;
        var nama_pelanggan = f_pelanggan.nama_pelanggan.value;
        var jenis_kelamin  = f_pelanggan.jenis_kelamin.value;		
		var agama	       = f_pelanggan.agama.value;
		var alamat1        = f_pelanggan.alamat1.value;
		var kota           = f_pelanggan.kota.value;
		var provinsi       = f_pelanggan.provinsi.value;
		var kode_pos       = f_pelanggan.kode_pos.value;
		var email          = f_pelanggan.email.value;
		var no_hp          = f_pelanggan.no_hp.value;
		var no_ktp         = f_pelanggan.no_ktp.value;
		var tanggal_lahir  = f_pelanggan.tanggal_lahir.value;

        var pesan = '';
        
		if (username == '') {
            pesan += '- Username tidak boleh kosong\n';
        }		
		if (pass1 == '') {
            pesan += '- Password tidak boleh kosong\n';
        }		
		if (pass2 == '') {
            pesan += '- Konfirmasi password tidak boleh kosong\n';
        }
		
        if (nama_pelanggan == '') {
            pesan += '- Nama tidak boleh kosong\n';
        }
        if (nama_pelanggan != '' && !nama_pelanggan.match(namaValid)) {
            pesan += '-Nama tidak valid\n';
        }
         
        if (jenis_kelamin == '') {
            pesan += '- Jenis kelamin harus dipilih\n';
        }
         
		if (agama == '') {
            pesan += '- Agama harus dipilih\n';
        }
		
		if (alamat1 == '') {
            pesan += '- Alamat tidak boleh kosong\n';
        }
		
		if (kota == '') {
            pesan += '- Kota tidak boleh kosong\n';
        }
		
		if (provinsi == '') {
            pesan += '- Provinsi tidak boleh kosong\n';
        }
		
		if (kode_pos == '') {
            pesan += '- Kode Pos tidak boleh kosong\n';
        }
		 
		if (email == '') {
            pesan += '- Alamat email tidak boleh kosong\n';
        }
        if (email !=''  && !email.match(emailValid)) {
            pesan += '- Alamat email tidak valid\n';
        }
		
		if (no_hp == '') {
            pesan += '- Nomor HP tidak boleh kosong\n';
        }
		
		if (no_ktp == '') {
            pesan += '- Nomor KTP tidak boleh kosong\n';
        }
		 		
		if (tanggal_lahir == '') {
            pesan += '- Tanggal lahir tidak boleh kosong\n';
        }

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}


function validasiSA(){
		//=============================================
        var username       = sa.username.value;       
        var password1	   = sa.password1.value;       
        var password2	   = sa.password2.value;

        var pesan = '';
        
		if (username == '') {
            pesan += '- Username tidak boleh kosong\n';
        }		
		if (password1 == '') {
            pesan += '- Password tidak boleh kosong\n';
        }		
		if (password2 == '') {
            pesan += '- Konfirmasi password tidak boleh kosong\n';
        }

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}

function validasiGantiPassword(){
		//=============================================
        var username        = ganti_pass.username.value;       
        var passwordLama	= ganti_pass.passwordLama.value;       
        var passwordBaru	= ganti_pass.passwordBaru.value;
        var KpasswordBaru	= ganti_pass.KpasswordBaru.value;

        var pesan = '';
        
		if (username == '') {
            pesan += '- Username tidak boleh kosong\n';
        }		
		if (passwordLama == '') {
            pesan += '- Password lama tidak boleh kosong\n';
        }		
		if (passwordBaru == '') {
            pesan += '- Password baru tidak boleh kosong\n';
        }		
		if (KpasswordBaru == '') {
            pesan += '- Konfirmasi password baru tidak boleh kosong\n';
        }

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}

function validasiLoginSA(){
		//=============================================
        var username       = login_sa.username.value;       
        var password1	   = login_sa.password1.value;  

        var pesan = '';
        
		if (username == '') {
            pesan += '- Username tidak boleh kosong\n';
        }		
		if (password1 == '') {
            pesan += '- Password tidak boleh kosong\n';
        }		

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}

function validasiBerita(){
		//=============================================
        var judul_berita   = berita.judul_berita.value;       
        var isi_berita	   = berita.isi_berita.value;  

        var pesan = '';
        
		if (judul_berita == '') {
            pesan += '- Judul Berita tidak boleh kosong\n';
        }		
		if (isi_berita == '') {
            pesan += '- Isi Berita tidak boleh kosong\n';
        }		

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}

function validasiBarang(){
		//=============================================
        var kategori   		= formulir_barang.kategori.value;       
        var nama_barang	   	= formulir_barang.nama_barang.value;  
        var harga_barang	= formulir_barang.harga_barang.value;  
        var stok_barang	    = formulir_barang.stok_barang.value;  
        var gambar	    	= formulir_barang.gambar.value;  

        var pesan = '';
        
		if (kategori == '') {
            pesan += '- Kategori tidak boleh kosong\n';
        }	
		if (nama_barang == '') {
            pesan += '- Nama Barang tidak boleh kosong\n';
        }
		if (harga_barang == '') {
            pesan += '- Harga tidak boleh kosong\n';
        }			
		if (stok_barang == '') {
            pesan += '- Merek tidak boleh kosong\n';
        }			
		if (merek == '') {
            pesan += '- Stok tidak boleh kosong\n';
        }			
		if (gambar == '') {
            pesan += '- Foto tidak boleh kosong\n';
        }		

        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}


function validasiOrder(){
        var namaValid    = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        var emailValid   = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
		//=============================================
        var id_pelanggan    = f_order.id_pelanggan.value;
        var nama_pelanggan  = f_order.nama_pelanggan.value;
        var jenis_kelamin 	= f_order.jenis_kelamin.value;
		var alamat          = f_order.alamat.value;
		var kota       	    = f_order.kota.value;
		var provinsi   	    = f_order.provinsi.value;
		var kode_pos        = f_order.kode_pos.value;
        var email           = f_order.email.value;
		var no_hp       	= f_order.no_hp.value;
		var no_ktp          = f_order.no_ktp.value;
		var tanggal_lahir   = f_order.tanggal_lahir.value;
		
        var pesan = '';
         
        if (id_pelanggan == '') {
            pesan += '- Id tidak boleh kosong\n';
        } 
        if (nama_pelanggan == '') {
            pesan += '- Nama tidak boleh kosong\n';
        }
         
        if (nama_pelanggan != '' && !nama.match(namaValid)) {
            pesan += '-nama tidak valid\n';
        }
         
        if (jenis_kelamin == '') {
            pesan += '- Jenis kelamin harus dipilih\n';
        }
         
		if (alamat == '') {
            pesan += '- Alamat tidak boleh kosong\n';
        }
		
		if (kota == '') {
            pesan += '- Kota tidak boleh kosong\n';
        }
		 
		
		if (provinsi == '') {
            pesan += '- Provinsi tidak boleh kosong\n';
        }
		 		
		if (kode_pos == '') {
            pesan += '- Kode Pos tidak boleh kosong\n';
        }
		
        if (email == '') {
            pesan += '- Alamat email tidak boleh kosong\n';
        }
         
        if (email !=''  && !email.match(emailValid)) {
            pesan += '- Alamat email tidak valid\n';
        }
		
		if (no_hp == '') {
            pesan += '- No.HP tidak boleh kosong\n';
        }
			
		if (no_ktp == '') {
            pesan += '- No.KTP tidak boleh kosong\n';
        }
		
		if (tanggal_lahir == '') {
            pesan += '- Tanggal lahir tidak boleh kosong\n';
        }	
		
        if (pesan != '') {
            alert("Maaf, ada kesalahan pada pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
}

function getkey(e) 
{ 
	if (window.event) return window.event.keyCode; 
	else if (e) return e.which; else return null; 
} 

function goodchars(e, goods, field) 
{ 
	var key, keychar; 
	key = getkey(e); 
	if (key == null) 
	return true; 
	keychar = String.fromCharCode(key); 
	keychar = keychar.toLowerCase(); 
	goods = goods.toLowerCase(); 
	// check goodkeys 
	if (goods.indexOf(keychar) != -1) return true;
	// control keys 
	if ( key==null || key==0 || key==8 || key==9 || key==27 ) return true; 
	if (key == 13) { var i; 
	
	for (i = 0; i < field.form.elements.length; i++) 
	if (field == field.form.elements[i]) break; i = (i + 1) % field.form.elements.length; 
	field.form.elements[i].focus(); return false; }; 
	// else return false 
	return false; 
} 