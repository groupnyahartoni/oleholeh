var isicart=new Array();
  cart=0;



function viewcart(){
document.getElementById("cart").innerHTML="<a href='#' data-toggle='modal' data-target=''#myModal' ><span style='color:white;' class='glyphicon glyphicon-shopping-cart'></span>"+cart+"</a>";
}

//setInterval(viewcart, 100 );

function loadpage(str, str2, str3){
//isicart.push('This is a string.');
	if (str3=="remove"){	//hapus carousel
		$(str2).removeClass("carousel");
		$(str2).removeClass("slide");
	}else{
		$(str2).addClass("carousel");
		$(str2).addClass("slide");
	}
$.get(str, function(data){
  $(str2).html(data);
});
}

function kirimpesanan(str,nama,alamat,notelp, email){ //kirim pesan di modal
	
$.get("konfirmasi.php?pesanan="+str+"&nama="+nama+"&alamat="+alamat+"&notelp="+notelp+"&email="+email, function(data){
  $("#bodycart").html(data);
});
}

function konfirmasidata(pesanan,nama,alamat,notelp, email){
	
$.get("konfirmasidata.php?pesanan="+pesanan+"&nama="+nama+"&alamat="+alamat+"&notelp="+notelp+"&email="+email, function(data){
  $("#bodycart").html(data);
});
}



//proses cart
function addvalue(str){
obj=document.getElementById("barang");
obj.value=str;
}
function pushtocart(str){
	isicart.push("");
}
function viewcart(){
		obj=document.getElementById("boxcart");
		obj.value=isicart;
}
function addtocart(str){
  cart+=1;
  document.getElementById("cart").innerHTML="<a href='#' data-toggle='modal' onclick='viewcart();' data-target='#myModal' ><span style='color:white;' class='glyphicon glyphicon-shopping-cart'></span>"+cart+"</a>";
isicart.push(String(str));
}
